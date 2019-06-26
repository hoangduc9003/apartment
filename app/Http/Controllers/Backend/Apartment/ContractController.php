<?php

namespace App\Http\Controllers\Backend\Apartment;

use App\Models\Apartment\Contract;
use App\Repositories\Backend\Apartment\ContractRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class ContractController extends Controller
{

    /**
     * @var ContractRepository
     */
    protected $contractRepository;

    /**
     * ContractRepository constructor.
     *
     * @param ApartmentRepository $contractRepository
     */
    public function __construct(ContractRepository $contractRepository)
    {
        $this->contractRepository = $contractRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return View('backend.contract.index')
            ->withContracts($this->contractRepository->getPaginated(25, 'id', 'asc'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('backend.contract.create');
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
            'apartment_id',
            'room_id',
            'checkin',
            'checkout',
            'is_checkout',
            'description',
            'total_price',
            'service_list'
        ));

        return redirect()->route('admin.contract.index')->withFlashSuccess(__('alerts.backend.contract.created'));
    }

    /**
     * Display the specified resource.
     *
     * @param  Contract  $contract
     * @return \Illuminate\Http\Response
     */
    public function show(Contract $contract)
    {
        return view('backend.contract.show')
            ->withContract($contract);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Contract  $contract
     * @return \Illuminate\Http\Response
     */
    public function edit(Contract $contract)
    {
        return view('backend.contract.edit')
            ->withContract($contract);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Contract  $contract
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contract $contract)
    {
        $this->contractRepository->update($contract, $request->only(
            'apartment_id',
            'room_id',
            'checkin',
            'checkout',
            'is_checkout',
            'description',
            'total_price',
            'service_list'
        ));

        return redirect()->route('admin.contract.index')->withFlashSuccess(__('alerts.backend.contract.updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Contract  $contract
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contract $contract)
    {
        $this->contractRepository->deleteById($contract->id);
        return redirect()->route('admin.contract.deleted')->withFlashSuccess(__('alerts.contract.deleted'));
    }

    /**
     * @param Request $request
     * @throws \App\Exceptions\GeneralException
     * @throws \Throwable
     * @return mixed
     */
    public function delete(Request $request)
    {
        $contract = Contract::withTrashed()->find($request->route('id'));
        $this->contractRepository->restore($contract);
        return redirect()->route('admin.contract.deleted')->withFlashSuccess(__('alerts.backend.contract.deleted_permanently'));
    }

    /**
     * @param Request $request
     * @throws \App\Exceptions\GeneralException
     * @return mixed
     */
    public function restore(Request $request)
    {
        $contract = Contract::withTrashed()->find($request->route('id'));
        $this->contractRepository->restore($contract);

        return redirect()->route('admin.contract.index')->withFlashSuccess(__('alerts.backend.contract.restored'));
    }
}
