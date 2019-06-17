<?php

namespace App\Repositories\Backend\Apartment;

use App\Models\Apartment\Renter;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 * Class UserRepository.
 */
class RenterRepository extends BaseRepository
{
    /**
     * @return string
     */
    public function model()
    {
        return Renter::class;
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
     * @return Renter
     */
    public function create(array $data) : Renter
    {
        return DB::transaction(function () use ($data) {
            $renter = parent::create([
                'apartment_id' => $data['apartment_id'],
                'room_id' => $data['room_id'],
                'checkin' => $data['checkin'],
                'checkout' => $data['checkout'],
                'is_checkout' => $data['is_checkout'],
                'description' => $data['description'],
                'total_price' => $data['total_price'],
                'customer_list' => $data['customer_list'],
                'service_list' => $data['service_list'],
            ]);

            if ($renter) {
                return $renter;
            }

            throw new GeneralException(__('exceptions.backend.access.users.create_error'));
        });
    }

    /**
     * @param Renter $renter
     * @param array $data
     *
     * @throws GeneralException
     * @throws \Exception
     * @throws \Throwable
     * @return Renter
     */
    public function update(Renter $renter, array $data) : Renter
    {

        return DB::transaction(function () use ($renter, $data) {
            if ($renter->update([
                'apartment_id' => $data['apartment_id'],
                'room_id' => $data['room_id'],
                'checkin' => $data['checkin'],
                'checkout' => $data['checkout'],
                'is_checkout' => $data['is_checkout'],
                'description' => $data['description'],
                'total_price' => $data['total_price'],
                'customer_list' => $data['customer_list'],
                'service_list' => $data['service_list'],
            ])) {

                return $renter;
            }

            throw new GeneralException(__('exceptions.backend.access.users.update_error'));
        });
    }


    /**
     * @param Renter $renter
     *
     * @throws GeneralException
     * @throws \Exception
     * @throws \Throwable
     * @return Renter
     */
    public function forceDelete(Renter $renter) : Renter
    {
        if ($renter->deleted_at === null) {
            throw new GeneralException(__('exceptions.backend.access.users.delete_first'));
        }

        return DB::transaction(function () use ($renter) {
            // Delete associated relationships

            if ($renter->forceDelete()) {
                return $renter;
            }

            throw new GeneralException(__('exceptions.backend.access.users.delete_error'));
        });
    }

    /**
     * @param Renter $renter
     *
     * @throws GeneralException
     * @return Renter
     */
    public function restore(Renter $renter) : Renter
    {
        if ($renter->deleted_at === null) {
            throw new GeneralException(__('exceptions.backend.access.users.cant_restore'));
        }

        if ($renter->restore()) {
            return $renter;
        }

        throw new GeneralException(__('exceptions.backend.access.users.restore_error'));
    }

}
