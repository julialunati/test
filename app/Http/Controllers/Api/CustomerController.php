<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CustomerResource;
use Illuminate\Support\Facades\Auth;
use App\Models\Customer;
use App\Models\Address;
use App\Models\Company;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return CustomerResource::collection(
            Customer::select(['customers.*', 'addresses.street', 'addresses.zip', 'addresses.city', 'addresses.country', 'companies.company_name', 'companies.description'])
                ->join('addresses', 'addresses.id', '=', 'address_id')
                ->leftjoin('companies', 'companies.id', '=', 'customers.company_id')
                ->get()
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'firstname' => 'regex:/^[a-zA-Z]+$/',
            'lastname' => 'regex:/^[a-zA-Z]+$/',
            'username' => 'regex:/^(?=.*?\d)(?=.*?[a-zA-Z])[a-zA-Z\d]{8,20}$/',
            'email' => ['required', 'email:rfc,dns'],
            //validates by means of country table
            'country' => 'exists:country,country_name'
        ]);

        $address = Address::create(
            $request->only(['street', 'city', 'country', 'zip'])
        );

        if (empty($request->company_name) && empty($request->description)) {
            Customer::create([
                'firstname' => $request->post('firstname'),
                'lastname' => $request->post('lastname'),
                'username' => $request->post('username'),
                'email' => $request->post('email'),
                'address_id' => $address->id,
            ]);
        } else {
            $company = Company::create(
                $request->only(['company_name', 'description'])
            );
            Customer::create([
                'firstname' => $request->post('firstname'),
                'lastname' => $request->post('lastname'),
                'username' => $request->post('username'),
                'email' => $request->post('email'),
                'address_id' => $address->id,
                'company_id' => $company->id,
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return CustomerResource::collection(Customer::select(['customers.*', 'addresses.street', 'addresses.zip', 'addresses.city', 'addresses.country', 'companies.company_name', 'companies.description'])
            ->join('addresses', 'addresses.id', '=', 'address_id')
            ->leftjoin('companies', 'companies.id', '=', 'customers.company_id')
            ->where('customers.id', '=', $id)
            ->get());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        //
    }

    public function returnCustomersAssociated($company)
    {
        return CustomerResource::collection(
            Customer::select(['customers.*', 'companies.company_name', 'companies.description'])
                ->leftjoin('companies', 'companies.id', '=', 'customers.company_id')
                ->where('company_name', '=', $company)
                ->get()
        );
    }
}
