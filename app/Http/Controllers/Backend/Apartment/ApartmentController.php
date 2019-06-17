<?php

namespace App\Http\Controllers\Backend\Apartment;

use App\Models\Apartment\Apartment;
use App\Repositories\Backend\Apartment\ApartmentRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApartmentController extends Controller
{
    /**
     * @var ApartmentRepository
     */
    protected $apartmentRepository;

    /**
     * ApartmentController constructor.
     *
     * @param ApartmentRepository $apartmentRepository
     */
    public function __construct(ApartmentRepository $apartmentRepository)
    {
        $this->apartmentRepository = $apartmentRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return View('backend.apartment.index')
            ->withApartments($this->apartmentRepository->getPaginated(25, 'id', 'asc'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('backend.apartment.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->apartmentRepository->create($request->only(
//            'address',
            'apartment_name',
            'color',
            'full_address',
            'number_of_floors',
            'number_of_rooms',
//            'country_id',
//            'city_id',
//            'district_id',
//            'commune_id'
        ));

        return redirect()->route('admin.apartment.index')->withFlashSuccess(__('alerts.backend.apartment.created'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Apartment\Apartment  $apartment
     * @return \Illuminate\Http\Response
     */
    public function show(Apartment $apartment)
    {
        return view('backend.apartment.show')
            ->withApartment($apartment);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Apartment\Apartment  $apartment
     * @return \Illuminate\Http\Response
     */
    public function edit(Apartment $apartment)
    {
        return view('backend.apartment.edit')
            ->withApartment($apartment);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Apartment\Apartment $apartment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Apartment $apartment)
    {
        $this->apartmentRepository->update($apartment, $request->only(
//            'address',
            'apartment_name',
            'color',
            'full_address',
            'number_of_floors',
            'number_of_rooms'
//            'country_id',
//            'city_id',
//            'district_id',
//            'commune_id'
        ));

        return redirect()->route('admin.apartment.index')->withFlashSuccess(__('alerts.backend.apartment.updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Apartment\Apartment $apartment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Apartment $apartment)
    {
        $this->apartmentRepository->deleteById($apartment->id);
        return redirect()->route('admin.apartment.deleted')->withFlashSuccess(__('alerts.apartment.deleted'));
    }

    /**
     * @param Request $request
     *
     * @return mixed
     */
    public function getDeleted(Request $request)
    {
        return view('backend.apartment.deleted')
            ->withApartments($this->apartmentRepository->getDeletedPaginated(25, 'id', 'asc'));
    }


    /**
     * @param Request $request
     * @param Apartment              $deletedApartment
     *
     * @throws \App\Exceptions\GeneralException
     * @throws \Throwable
     * @return mixed
     */
    public function delete(Request $request)
    {
        $apartment = Apartment::withTrashed()->find($request->route('id'));
        $this->apartmentRepository->forceDelete($apartment);

        return redirect()->route('admin.apartment.deleted')->withFlashSuccess(__('alerts.backend.apartment.deleted_permanently'));
    }

    /**
     * @param Request $request
     * @param Apartment              $deletedApartment
     *
     * @throws \App\Exceptions\GeneralException
     * @return mixed
     */
    public function restore(Request $request)
    {
        $apartment = Apartment::withTrashed()->find($request->route('id'));
        $this->apartmentRepository->restore($apartment);

        return redirect()->route('admin.apartment.index')->withFlashSuccess(__('alerts.backend.apartment.restored'));
    }
}
