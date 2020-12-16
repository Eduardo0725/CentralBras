<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Address $id)
    {
        return response('', 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            Address::create([
                'idUser' => Auth::user()->id,
                'cep' => $request->cep,
                'state' => $request->state,
                'city' => $request->city,
                'street' => $request->street,
                'houseNumber' => $request->houseNumber,
                'complement' => $request->complement,
                'phone' => $request->phone
            ]);
        } catch (\Throwable $th) {}

        return redirect()->back(201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function show(Address $address)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function edit(Address $address)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Address $address)
    {
        try {
            $address->cep = $request->cep;
            $address->state = $request->state;
            $address->city = $request->city;
            $address->street = $request->street;
            $address->houseNumber = $request->houseNumber;
            $address->complement = $request->complement;
            $address->phone = $request->phone;
            $address->save();
        } catch (\Throwable $th) {}

        return redirect()->back(201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function destroy(Address $address)
    {
        $address->delete();

        return redirect()->back(201);
    }
}
