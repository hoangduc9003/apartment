<?php

namespace App\Repositories\Backend\Location;

use App\Models\Location\Country;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 * Class UserRepository.
 */
class CountryRepository extends BaseRepository
{
    /**
     * @return string
     */
    public function model()
    {
        return Country::class;
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
     * @return Country
     */
    public function create(array $data) : Country
    {
        return DB::transaction(function () use ($data) {
            $country = parent::create([
                'name' => $data['name'],
                'code' => $data['code'],
                'two_letter_iso_code' => $data['two_letter_iso_code'],
                'three_letter_iso_code' => $data['three_letter_iso_code'],
                'nationality' => $data['nationality'],
            ]);

            if ($country) {
                return $country;
            }

            throw new GeneralException(__('exceptions.backend.access.users.create_error'));
        });
    }

    /**
     * @param Country $country
     * @param array $data
     *
     * @throws GeneralException
     * @throws \Exception
     * @throws \Throwable
     * @return Country
     */
    public function update(Country $country, array $data) : Country
    {

        return DB::transaction(function () use ($apartment, $data) {
            if ($country->update([
                'name' => $data['name'],
                'code' => $data['code'],
                'two_letter_iso_code' => $data['two_letter_iso_code'],
                'three_letter_iso_code' => $data['three_letter_iso_code'],
                'nationality' => $data['nationality'],
            ])) {

                return $country;
            }

            throw new GeneralException(__('exceptions.backend.access.users.update_error'));
        });
    }


    /**
     * @param Country $country
     *
     * @throws GeneralException
     * @throws \Exception
     * @throws \Throwable
     * @return Country
     */
    public function forceDelete(Country $country) : Apartment
    {
        if ($country->deleted_at === null) {
            throw new GeneralException(__('exceptions.backend.access.users.delete_first'));
        }

        return DB::transaction(function () use ($apartment) {
            // Delete associated relationships

            if ($country->forceDelete()) {
                return $country;
            }

            throw new GeneralException(__('exceptions.backend.access.users.delete_error'));
        });
    }

    /**
     * @param Country $country
     *
     * @throws GeneralException
     * @return Country
     */
    public function restore(Country $country) : Country
    {
        if ($country->deleted_at === null) {
            throw new GeneralException(__('exceptions.backend.access.users.cant_restore'));
        }

        if ($country->restore()) {
            return $country;
        }

        throw new GeneralException(__('exceptions.backend.access.users.restore_error'));
    }

    /**
    * @param array $data
    *
    */
    public function import($data) : Country
    {
        throw new GeneralException(__('exceptions.backend.access.users.restore_error'));
    }

}
