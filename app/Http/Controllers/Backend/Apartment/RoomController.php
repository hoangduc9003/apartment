<?php

namespace App\Http\Controllers\Backend\Apartment;

use App\Models\Apartment\Room;
use App\Repositories\Backend\Apartment\RoomRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoomController extends Controller
{
    /**
     * @var RoomRepository
     */
    protected $roomRepository;

    /**
     * ApartmentController constructor.
     *
     * @param RoomRepository $roomRepository
     */
    public function __construct(RoomRepository $roomRepository)
    {
        $this->roomRepository = $roomRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return View('backend.room.index')
            ->withRooms($this->roomRepository->getPaginated(25, 'id', 'asc'));;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('backend.room.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->roomRepository->create($request->only(
            'bed',
            'cabinet',
            'apartment_id',
            'chair',
            'bathroom',
            'air_conditional',
            'electric_water_heater',
            'feature',
            'floor',
            'way',
            'width',
            'name'
        ));

        return redirect()->route('admin.room.index')->withFlashSuccess(__('alerts.backend.room.created'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Room $room)
    {
        return view('backend.room.show')
            ->withRoom($room);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Room $room)
    {
        return view('backend.room.edit')
            ->withRoom($room);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Room $room)
    {
        $this->roomRepository->update($room, $request->only(
            'bed',
            'cabinet',
            'apartment_id',
            'chair',
            'bathroom',
            'air_conditional',
            'electric_water_heater',
            'feature',
            'floor',
            'way',
            'width',
            'name'
        ));

        return redirect()->route('admin.room.index')->withFlashSuccess(__('alerts.backend.room.updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Room  $room
     * @return \Illuminate\Http\Response
     */
    public function destroy(Room $room)
    {
        $this->roomRepository->deleteById($room->id);
        return redirect()->route('admin.room.deleted')->withFlashSuccess(__('alerts.room.deleted'));
    }

    /**
     * @param Request $request
     * @throws \App\Exceptions\GeneralException
     * @throws \Throwable
     * @return mixed
     */
    public function delete(Request $request)
    {
        $room = Room::withTrashed()->find($request->route('id'));
        $this->roomRepository->restore($room);
        return redirect()->route('admin.room.deleted')->withFlashSuccess(__('alerts.backend.room.deleted_permanently'));
    }

    /**
     * @param Request $request
     * @throws \App\Exceptions\GeneralException
     * @return mixed
     */
    public function restore(Request $request)
    {
        $room = Room::withTrashed()->find($request->route('id'));
        $this->roomRepository->restore($room);

        return redirect()->route('admin.room.index')->withFlashSuccess(__('alerts.backend.room.restored'));
    }
}
