<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Http\Requests\CustomerRequest;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Symfony\Component\HttpFoundation\Response;
use PHPUnit\Framework\MockObject\Stub\ReturnReference;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::all();
        return view('customers.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CustomerRequest $request)
    {
        $customer = new Customer();

        $customer->name    = $request->name;
        $customer->mail    = $request->mail;
        $customer->zipcode = $request->zipcode;
        $customer->address = $request->address;
        $customer->tel     = $request->tel;
        
        $customer->save();
        return redirect()->route('customers.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        return view('customers.show', compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        return view('customers.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(CustomerRequest $request, Customer $customer)
    {
        $customer->name    = $request->name;
        $customer->mail    = $request->mail;
        $customer->zipcode = $request->zipcode;
        $customer->address = $request->address;
        $customer->tel     = $request->tel;
        
        $customer->save();
        return redirect()->route('customers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();
        return redirect()->route('customers.index');
    }

    public function search(Request $request)  
    {
        $request->validate([
            'zipcode' => 'required'
        ]);
        $method = 'get';
        $zipcode = $request->input('zipcode');
        $url = config('zipcloud.url') . '/api/search?zipcode=' . $zipcode;

        $client = new Client();
        try {
            $response = $client->request($method, $url);
            $statuCode = $response->getStatusCode();

        if ($statuCode == Response::HTTP_OK) {
            $body = $response->getBody();
            $results = json_decode($body, false);
            }
        } catch (\Throwable $th) {
            return null;
        }
        $address =  $results->results[0]->address1 .
                    $results->results[0]->address2 .
                    $results->results[0]->address3;
        return view('customers.search')->with(compact('results', 'address'));
    }
}
