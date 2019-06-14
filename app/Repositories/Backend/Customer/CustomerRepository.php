<?php

namespace App\Repositories\Backend\Customer;

use App\Models\Customer\Customer;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 * Class UserRepository.
 */
class CustomerRepository extends BaseRepository
{
    /**
     * @return string
     */
    public function model()
    {
        return Customer::class;
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
     * @return Customer
     */
    public function create(array $data) : Customer
    {
        return DB::transaction(function () use ($data) {
            $customer = parent::create([
                'first_name' => $data['first_name'],
                'last_name' => $data['last_name'],
                'email' => $data['email'],
                'age' => $data['age'],
                'gender' => $data['gender'],
                'phone' => $data['phone'],
                // 'nationality_id' => $data['nationality_id'],
                // 'marital_status' => $data['marital_status'],
                // 'ethnic_group' => $data['ethnic_group'],
            ]);

            if ($customer) {
                return $customer;
            }

            throw new GeneralException(__('exceptions.backend.access.users.create_error'));
        });
    }

    /**
     * @param Customer $customer
     * @param array $data
     *
     * @throws GeneralException
     * @throws \Exception
     * @throws \Throwable
     * @return Customer
     */
    public function update(Customer $customer, array $data) : Customer
    {
        $this->checkCustomerByEmail($customer, $data['email']);

        return DB::transaction(function () use ($customer, $data) {
            if ($customer->update([
                'first_name' => $data['first_name'],
                'last_name' => $data['last_name'],
                'email' => $data['email'],
                'phone' => $data['phone'],
                'age' => $data['age'],
                'gender' => $data['gender'],
                // 'marital_status' => $data['marital_status'],
                // 'ethnic_group' => $data['ethnic_group'],
                // 'nationality_id' => $data['nationality_id'],
            ])) {

                return $customer;
            }

            throw new GeneralException(__('exceptions.backend.access.users.update_error'));
        });
    }


    /**
     * @param Customer $customer
     *
     * @throws GeneralException
     * @throws \Exception
     * @throws \Throwable
     * @return Customer
     */
    public function forceDelete(Customer $customer) : Customer
    {
        if ($customer->deleted_at === null) {
            throw new GeneralException(__('exceptions.backend.access.users.delete_first'));
        }

        return DB::transaction(function () use ($customer) {
            // Delete associated relationships

            if ($customer->forceDelete()) {
                return $customer;
            }

            throw new GeneralException(__('exceptions.backend.access.users.delete_error'));
        });
    }

    /**
     * @param Customer $customer
     *
     * @throws GeneralException
     * @return Customer
     */
    public function restore(Customer $customer) : Customer
    {
        dd($customer->first_name);
        if ($customer->deleted_at === null) {
            throw new GeneralException(__('exceptions.backend.access.users.cant_restore'));
        }

        if ($customer->restore()) {
            return $customer;
        }

        throw new GeneralException(__('exceptions.backend.access.users.restore_error'));
    }

    /**
     * @param User $user
     * @param      $email
     *
     * @throws GeneralException
     */
    protected function checkCustomerByEmail(Customer $customer, $email)
    {
        // Figure out if email is not the same and check to see if email exists
        if ($customer->email !== $email && $this->model->where('email', '=', $email)->first()) {
            throw new GeneralException(trans('exceptions.backend.access.users.email_error'));
        }
    }
}
