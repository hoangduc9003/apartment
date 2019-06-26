<?php

namespace App\Repositories\Backend\Apartment;

use App\Models\Apartment\Contract;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 * Class UserRepository.
 */
class ContractRepository extends BaseRepository
{
    /**
     * @return string
     */
    public function model()
    {
        return Contract::class;
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
     * @return Contract
     */
    public function create(array $data) : Contract
    {
        return DB::transaction(function () use ($data) {
            $contract = parent::create([
                'apartment_id' => $data['apartment_id'],
                'room_id' => $data['room_id'],
                'checkin' => $data['checkin'],
                'checkout' => $data['checkout'],
                'is_checkout' => $data['is_checkout'],
                'description' => $data['description'],
                'total_price' => $data['total_price'],
                'service_list' => $data['service_list'],
            ]);

            if ($contract) {
                return $contract;
            }

            throw new GeneralException(__('exceptions.backend.access.users.create_error'));
        });
    }

    /**
     * @param Contract $contract
     * @param array $data
     *
     * @throws GeneralException
     * @throws \Exception
     * @throws \Throwable
     * @return Contract
     */
    public function update(Contract $contract, array $data) : Contract
    {

        return DB::transaction(function () use ($contract, $data) {
            if ($contract->update([
                'apartment_id' => $data['apartment_id'],
                'room_id' => $data['room_id'],
                'checkin' => $data['checkin'],
                'checkout' => $data['checkout'],
                'is_checkout' => $data['is_checkout'],
                'description' => $data['description'],
                'total_price' => $data['total_price'],
                'service_list' => $data['service_list'],
            ])) {

                return $contract;
            }

            throw new GeneralException(__('exceptions.backend.access.users.update_error'));
        });
    }


    /**
     * @param Contract $contract
     *
     * @throws GeneralException
     * @throws \Exception
     * @throws \Throwable
     * @return Contract
     */
    public function forceDelete(Contract $contract) : Contract
    {
        if ($contract->deleted_at === null) {
            throw new GeneralException(__('exceptions.backend.access.users.delete_first'));
        }

        return DB::transaction(function () use ($contract) {
            // Delete associated relationships

            if ($contract->forceDelete()) {
                return $contract;
            }

            throw new GeneralException(__('exceptions.backend.access.users.delete_error'));
        });
    }

    /**
     * @param Contract $contract
     *
     * @throws GeneralException
     * @return Contract
     */
    public function restore(Contract $contract) : Contract
    {
        if ($contract->deleted_at === null) {
            throw new GeneralException(__('exceptions.backend.access.users.cant_restore'));
        }

        if ($contract->restore()) {
            return $contract;
        }

        throw new GeneralException(__('exceptions.backend.access.users.restore_error'));
    }

}
