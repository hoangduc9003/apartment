<?php

namespace App\Repositories\Backend\Location;

use App\Models\Location\City;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 * Class UserRepository.
 */
class CityRepository extends BaseRepository
{
    /**
     * @return string
     */
    public function model()
    {
        return City::class;
    }


    /**
     * @param int    $paged
     * @param string $orderBy
     * @param string $sort
     *
     * @return mixed
     */
    public function getPaginated($paged = 25, $orderBy = 'created_at', $sort = 'desc') : LengthAwarePaginator
    {
        return $this->model
            ->orderBy($orderBy, $sort)
            ->paginate($paged);
    }


    /**
     * @param int    $paged
     * @param string $orderBy
     * @param string $sort
     *
     * @return LengthAwarePaginator
     */
    public function getDeletedPaginated($paged = 25, $orderBy = 'created_at', $sort = 'desc') : LengthAwarePaginator
    {
        return $this->model
            ->onlyTrashed()
            ->orderBy($orderBy, $sort)
            ->paginate($paged);
    }

    /**
     * @param array $data
     *
     * @throws \Exception
     * @throws \Throwable
     * @return City
     */
    public function create(array $data) : City
    {
        return DB::transaction(function () use ($data) {
            $city = parent::create([
                'country_id' => $data['country_id'],
                'name' => $data['name'],
                'code' => $data['code'],
            ]);

            if ($city) {
                return $city;
            }

            throw new GeneralException(__('exceptions.backend.access.users.create_error'));
        });
    }

    /**
     * @param City $city
     * @param array $data
     *
     * @throws GeneralException
     * @throws \Exception
     * @throws \Throwable
     * @return City
     */
    public function update(City $city, array $data) : City
    {

        return DB::transaction(function () use ($apartment, $data) {
            if ($city->update([
                'country_id' => $data['country_id'],
                'name' => $data['name'],
                'code' => $data['code'],
            ])) {

                return $city;
            }

            throw new GeneralException(__('exceptions.backend.access.users.update_error'));
        });
    }

    /**
    * @param array $data
    *
    */
    public function import($data) : City
    {
        throw new GeneralException(__('exceptions.backend.access.users.restore_error'));
    }

}
