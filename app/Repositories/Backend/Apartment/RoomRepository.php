<?php

namespace App\Repositories\Backend\Apartment;

use App\Models\Apartment\Room;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 * Class UserRepository.
 */
class RoomRepository extends BaseRepository
{
    /**
     * @return string
     */
    public function model()
    {
        return Room::class;
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
     * @return Room
     */
    public function create(array $data) : Room
    {
        return DB::transaction(function () use ($data) {
            $room = parent::create([
                'bed' => $data['bed'],
                'cabinet' => $data['cabinet'],
                'apartment_id' => $data['apartment_id'],
                'chair' => $data['chair'],
                'bathroom' => $data['bathroom'],
                'air_conditional' => $data['air_conditional'],
                'electric_water_heater' => $data['electric_water_heater'],
                'feature' => $data['feature'],
                'floor' => $data['floor'],
                'way' => $data['way'],
                'width' => $data['width'],
                'name' => $data['name'],
            ]);

            if ($room) {
                return $room;
            }

            throw new GeneralException(__('exceptions.backend.access.users.create_error'));
        });
    }

    /**
     * @param Room $room
     * @param array $data
     *
     * @throws GeneralException
     * @throws \Exception
     * @throws \Throwable
     * @return Room
     */
    public function update(Room $room, array $data) : Room
    {

        return DB::transaction(function () use ($room, $data) {
            if ($room->update([
                'bed' => $data['bed'],
                'cabinet' => $data['cabinet'],
                'apartment_id' => $data['apartment_id'],
                'chair' => $data['chair'],
                'bathroom' => $data['bathroom'],
                'air_conditional' => $data['air_conditional'],
                'electric_water_heater' => $data['electric_water_heater'],
                'feature' => $data['feature'],
                'floor' => $data['floor'],
                'way' => $data['way'],
                'width' => $data['width'],
                'name' => $data['name'],
            ])) {

                return $room;
            }

            throw new GeneralException(__('exceptions.backend.access.users.update_error'));
        });
    }


    /**
     * @param Room $room
     *
     * @throws GeneralException
     * @throws \Exception
     * @throws \Throwable
     * @return Room
     */
    public function forceDelete(Room $room) : Room
    {
        if ($room->deleted_at === null) {
            throw new GeneralException(__('exceptions.backend.access.users.delete_first'));
        }

        return DB::transaction(function () use ($room) {
            // Delete associated relationships

            if ($room->forceDelete()) {
                return $room;
            }

            throw new GeneralException(__('exceptions.backend.access.users.delete_error'));
        });
    }

    /**
     * @param Room $room
     *
     * @throws GeneralException
     * @return Room
     */
    public function restore(Room $room) : Room
    {
        if ($room->deleted_at === null) {
            throw new GeneralException(__('exceptions.backend.access.users.cant_restore'));
        }

        if ($room->restore()) {
            return $room;
        }

        throw new GeneralException(__('exceptions.backend.access.users.restore_error'));
    }

}
