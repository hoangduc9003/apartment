<?php

namespace App\Http\Controllers\Backend\Location;

use App\Models\Location\City;
use App\Repositories\Backend\Location\CityRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Maatwebsite\Excel\Facades\Excel;

class CityController extends Controller
{
    /**
     * @var CityRepository
     */
    protected $cityRepository;

    /**
     * CityController constructor.
     *
     * @param UserRepository $userRepository
     */
    public function __construct(CityRepository $cityRepository)
    {
        $this->cityRepository = $cityRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return View('backend.city.index')
        ->withCountries($this->cityRepository->getPaginated(25, 'id', 'asc'));;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('backend.city.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->cityRepository->create($request->only(
        	'country_id'
            'name',
            'code'
        ));

        return redirect()->route('admin.city.index')->withFlashSuccess(__('alerts.backend.city.created'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\City\City  $city
     * @return \Illuminate\Http\Response
     */
    public function show(City $city)
    {
        return view('backend.city.show')
            ->withCity($city);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\City\City  $city
     * @return \Illuminate\Http\Response
     */
    public function edit(City $city)
    {
        return view('backend.city.edit')
            ->withCity($city);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\City\City  $city
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, City $city)
    {
        $this->cityRepository->update($city, $request->only(
        	'country_id'
            'name',
            'code',   
        ));

        return redirect()->route('admin.city.index')->withFlashSuccess(__('alerts.backend.city.updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\City\City  $city
     * @return \Illuminate\Http\Response
     */
    public function destroy(City $city)
    {
        $this->cityRepository->deleteById($city->id);


        return redirect()->route('admin.city.deleted')->withFlashSuccess(__('alerts.city.deleted'));
    }

    /**
     * @param Request $request
     *
     * @return mixed
     */
    public function getDeleted(Request $request)
    {
        return view('backend.city.deleted')
            ->withCountries($this->cityRepository->getDeletedPaginated(25, 'id', 'asc'));
    }


    /**
     * @param Request $request
     * @param City              $deletedCity
     *
     * @throws \App\Exceptions\GeneralException
     * @throws \Throwable
     * @return mixed
     */
    public function delete(Request $request, City $deletedCity)
    {
        $this->cityRepository->forceDelete($deletedCity);

        return redirect()->route('admin.city.deleted')->withFlashSuccess(__('alerts.backend.city.deleted_permanently'));
    }

    /**
     * @param Request $request
     * @param City              $deletedCity
     *
     * @throws \App\Exceptions\GeneralException
     * @return mixed
     */
    public function restore(Request $request, City $deletedCity)
    {
        // $deletedCity = City::find($request->get('id'))
        $this->cityRepository->restore($deletedCity);

        return redirect()->route('admin.city.index')->withFlashSuccess(__('alerts.backend.city.restored'));
    }

    /**
     * @param Request $request
     * @param City              $city
     *
     * @throws \App\Exceptions\GeneralException
     * @return mixed
     */
    public function import()
    {
        return View('backend.city.import');
    }

    /**
     * @param Request $request
     * @param City              $city
     *
     * @throws \App\Exceptions\GeneralException
     * @return mixed
     */
    public function postImport()
    {
        set_time_limit (0);
        if (!Input::hasFile('file-upload')){
//            SweetAlert::warning("File does not exist!", "Warning");
             return back()->withFlashDanger('File does not exist!');
        }
        $file_import = Input::file('file-upload');
        $extension_upload = ['csv', 'xls', 'xlsx'];

        if (!in_array($file_import->getClientOriginalExtension(), $extension_upload)){
//            SweetAlert::error("Invalid file!", "Error");
            return back()->withFlashDanger('Invalid file!');;
        }

        $data = Excel::import(new CityImport, $file_import);

//         //Get Real Path
//         $real_path = $file_import->getRealPath();

//         //Store import file in storage path
// //        $file = $this->moveFile($file_import);
// //        $path = storage_path('app/public/imports/tmp/' . basename($file));

//         $data = Excel::load($real_path, function($reader){
//             $results = $reader->skipRows(1)->get();
//             return $results;
//         })->get();

//         dd($data);

//         $this->cityRepository->import($data->toArray());

        return back()->withFlashSuccess('Import success');
}
