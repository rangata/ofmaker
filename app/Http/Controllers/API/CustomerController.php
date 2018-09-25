<?php

namespace App\Http\Controllers\API;

use App\Http\Resources\CustomerCollection;
use App\Http\Resources\CustomerResource;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Customer;
class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $customers = Customer::paginate(10);

        return new CustomerCollection($customers);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $customer = new Customer();
            $customer->firstname = $request->firstname;
            $customer->middlename = $request->middlename;
            $customer->lastname = $request->lastname;
            $customer->mobile = $request->mobile;
            $customer->email = $request->email;
            $customer->city = $request->city;

            $customer->saveOrFail();

            return response()->json(['message' => 'Клиентът е запазен успешно!']);
        }
        catch (\Exception $e) {
            return response()->json("json-- ". $e);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $customer = Customer::find($id);

        $customer->delete();

        return response()->json(['mesg','ok']);
    }
}
