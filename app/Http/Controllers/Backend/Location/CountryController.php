<?php

namespace App\Http\Controllers\Backend\Location;

use App\Models\Location\Country;
use App\Repositories\Backend\Location\CountryRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\CountryImport;

class CountryController extends Controller
{
    /**
     * @var CountryRepository
     */
    protected $countryRepository;

    /**
     * CountryController constructor.
     *
     * @param UserRepository $userRepository
     */
    public function __construct(CountryRepository $countryRepository)
    {
        $this->countryRepository = $countryRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return View('backend.country.index')
        ->withCountries($this->countryRepository->getPaginated(25, 'id', 'asc'));;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('backend.country.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->countryRepository->create($request->only(
            'name',
            'code',
            'two_iso_letter_code',
            'three_iso_letter_code',
            'nationality'  
        ));

        return redirect()->route('admin.country.index')->withFlashSuccess(__('alerts.backend.country.created'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Country\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function show(Country $country)
    {
        return view('backend.country.show')
            ->withCountry($country);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Country\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function edit(Country $country)
    {
        return view('backend.country.edit')
            ->withCountry($country);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Country\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Country $country)
    {
        $this->countryRepository->update($country, $request->only(
            'name',
            'code',
            'two_iso_letter_code',
            'three_iso_letter_code',
            'nationality'     
        ));

        return redirect()->route('admin.country.index')->withFlashSuccess(__('alerts.backend.country.updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Country\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function destroy(Country $country)
    {
        $this->countryRepository->deleteById($country->id);


        return redirect()->route('admin.country.deleted')->withFlashSuccess(__('alerts.country.deleted'));
    }

    /**
     * @param Request $request
     *
     * @return mixed
     */
    public function getDeleted(Request $request)
    {
        return view('backend.country.deleted')
            ->withCountries($this->countryRepository->getDeletedPaginated(25, 'id', 'asc'));
    }


    /**
     * @param Request $request
     * @param Country              $deletedCountry
     *
     * @throws \App\Exceptions\GeneralException
     * @throws \Throwable
     * @return mixed
     */
    public function delete(Request $request, Country $deletedCountry)
    {
        $this->countryRepository->forceDelete($deletedCountry);

        return redirect()->route('admin.country.deleted')->withFlashSuccess(__('alerts.backend.country.deleted_permanently'));
    }

    /**
     * @param Request $request
     * @param Country              $deletedCountry
     *
     * @throws \App\Exceptions\GeneralException
     * @return mixed
     */
    public function restore(Request $request, Country $deletedCountry)
    {
        // $deletedCountry = Country::find($request->get('id'))
        $this->countryRepository->restore($deletedCountry);

        return redirect()->route('admin.country.index')->withFlashSuccess(__('alerts.backend.country.restored'));
    }

    /**
     * @param Request $request
     * @param Country              $country
     *
     * @throws \App\Exceptions\GeneralException
     * @return mixed
     */
    public function import()
    {
        return View('backend.country.import');
    }

    /**
     * @param Request $request
     * @param Country              $country
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

        $data = Excel::import(new CountryImport, $file_import);

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

//         $this->countryRepository->import($data->toArray());

        return back()->withFlashSuccess('Import success');
    }
}
