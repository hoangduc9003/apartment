<?php

namespace App\Http\Controllers\Backend\Customer;

use App\Models\Customer\Customer;
use App\Repositories\Backend\Customer\CustomerRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CustomerController extends Controller
{
    /**
     * @var CustomerRepository
     */
    protected $customerRepository;

    /**
     * UserController constructor.
     *
     * @param UserRepository $userRepository
     */
    public function __construct(CustomerRepository $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return View('backend.customer.index')
        ->withCustomers($this->customerRepository->getPaginated(25, 'id', 'asc'));;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('backend.customer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->customerRepository->create($request->only(
            'first_name',
            'last_name',
            'email',
            'gender',
            'age',
            'phone'
            // 'nationality_id',
            // 'marital_status',
            // 'ethnic_group',      
        ));

        return redirect()->route('admin.customer.index')->withFlashSuccess(__('alerts.backend.customer.created'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        return view('backend.customer.show')
            ->withCustomer($customer);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        return view('backend.customer.edit')
            ->withCustomer($customer);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        $this->customerRepository->update($customer, $request->only(
            'first_name',
            'last_name',
            'email',
            'gender',
            'age',
            'phone'
            // 'nationality_id',
            // 'marital_status',
            // 'ethnic_group',         
        ));

        return redirect()->route('admin.customer.index')->withFlashSuccess(__('alerts.backend.customer.updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        $this->customerRepository->deleteById($customer->id);


        return redirect()->route('admin.customer.deleted')->withFlashSuccess(__('alerts.customer.deleted'));
    }

    /**
     * @param Request $request
     *
     * @return mixed
     */
    public function getDeleted(Request $request)
    {
        return view('backend.customer.deleted')
            ->withCustomers($this->customerRepository->getDeletedPaginated(25, 'id', 'asc'));
    }


    /**
     * @param Request $request
     * @param Customer              $deletedCustomer
     *
     * @throws \App\Exceptions\GeneralException
     * @throws \Throwable
     * @return mixed
     */
    public function delete(Request $request, Customer $deletedCustomer)
    {
        $this->customerRepository->forceDelete($deletedCustomer);

        return redirect()->route('admin.customer.deleted')->withFlashSuccess(__('alerts.backend.customer.deleted_permanently'));
    }

    /**
     * @param Request $request
     * @param Customer              $deletedCustomer
     *
     * @throws \App\Exceptions\GeneralException
     * @return mixed
     */
    public function restore(Request $request, Customer $deletedCustomer)
    {
        dd($deletedCustomer);
        // $deletedCustomer = Customer::find($request->get('id'))
        $this->customerRepository->restore($deletedCustomer);

        return redirect()->route('admin.customer.index')->withFlashSuccess(__('alerts.backend.customer.restored'));
    }
}
