<?php

namespace App\Repositories\Backend\Apartment;

use App\Models\Apartment\Apartment;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 * Class UserRepository.
 */
class ApartmentRepository extends BaseRepository
{
    /**
     * @return string
     */
    public function model()
    {
        return Apartment::class;
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
     * @return Apartment
     */
    public function create(array $data) : Apartment
    {
        return DB::transaction(function () use ($data) {
            $apartment = parent::create([
//                'address' => $data['address'],
                'full_address' => $data['full_address'],
                'apartment_name' => $data['apartment_name'],
                'color' => $data['color'],
                'number_of_floors' => $data['number_of_floors'],
                'number_of_rooms' => $data['number_of_rooms'],
//                 'country_id' => $data['country_id'],
//                 'city_id' => $data['city_id'],
//                 'district_id' => $data['district_id'],
//                 'commune_id' => $data['commune_id'],
            ]);

            if ($apartment) {
                return $apartment;
            }

            throw new GeneralException(__('exceptions.backend.access.users.create_error'));
        });
    }

    /**
     * @param Apartment $apartment
     * @param array $data
     *
     * @throws GeneralException
     * @throws \Exception
     * @throws \Throwable
     * @return Apartment
     */
    public function update(Apartment $apartment, array $data) : Apartment
    {

        return DB::transaction(function () use ($apartment, $data) {
            if ($apartment->update([
//                'address' => $data['address'],
//                'full_address' => $data['full_address'],
                'apartment_name' => $data['apartment_name'],
                'color' => $data['color'],
                'number_of_floors' => $data['number_of_floors'],
                'number_of_rooms' => $data['number_of_rooms'],
//                'country_id' => $data['country_id'],
//                'city_id' => $data['city_id'],
//                'district_id' => $data['district_id'],
//                'commune_id' => $data['commune_id'],
            ])) {

                return $apartment;
            }

            throw new GeneralException(__('exceptions.backend.access.users.update_error'));
        });
    }


    /**
     * @param Apartment $apartment
     *
     * @throws GeneralException
     * @throws \Exception
     * @throws \Throwable
     * @return Apartment
     */
    public function forceDelete(Apartment $apartment) : Apartment
    {
        if ($apartment->deleted_at === null) {
            throw new GeneralException(__('exceptions.backend.access.users.delete_first'));
        }

        return DB::transaction(function () use ($apartment) {
            // Delete associated relationships

            if ($apartment->forceDelete()) {
                return $apartment;
            }

            throw new GeneralException(__('exceptions.backend.access.users.delete_error'));
        });
    }

    /**
     * @param Apartment $apartment
     *
     * @throws GeneralException
     * @return Apartment
     */
    public function restore(Apartment $apartment) : Apartment
    {
        if ($apartment->deleted_at === null) {
            throw new GeneralException(__('exceptions.backend.access.users.cant_restore'));
        }

        if ($apartment->restore()) {
            return $apartment;
        }

        throw new GeneralException(__('exceptions.backend.access.users.restore_error'));
    }

}
