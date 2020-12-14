<?php

namespace App\Http\Controllers;

use App\Models\Pagseguro;
use App\Models\WaysToReceivePayment;
use Error;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class WaysToReceivePaymentController extends Controller
{
    public function check($type)
    {
        $waysToReceivePayment = Auth::user()->waysToReceivePayments()->where('type', $type)->get()->first();

        if ($waysToReceivePayment)
            return response()->json([$type => true], 200);
        return response()->json([$type => false], 200);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $types = [
            'pagseguro' => true
        ];


        $waysToReceivePayment = Auth::user()->waysToReceivePayments()->where('type', $types[$request->type])->get()->first();

        if($waysToReceivePayment)
            return response('Já existe', 200);

        $waysToReceivePayment = new WaysToReceivePayment();

        try {
            if(!$types[$request->type])
                throw new Error();

            $waysToReceivePayment->idUser = Auth::user()->id;
            $waysToReceivePayment->type = $request->type;
            $waysToReceivePayment->save();

            if ($request->type === 'pagseguro') {
                $pagseguro = new Pagseguro;
                $pagseguro->idHowToGetPaid = $waysToReceivePayment->id;
                $pagseguro->email = $request->email;
                $pagseguro->token = $request->token;
                $pagseguro->save();
            }

            return response('', 201);
        } catch (\Throwable $th) {
            $waysToReceivePayment->delete();

            return response('', 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WaysToReceivePayment  $waysToReceivePayment
     * @return \Illuminate\Http\Response
     */
    public function show(WaysToReceivePayment $waysToReceivePayment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\WaysToReceivePayment  $waysToReceivePayment
     * @return \Illuminate\Http\Response
     */
    public function edit(WaysToReceivePayment $waysToReceivePayment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\WaysToReceivePayment  $waysToReceivePayment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WaysToReceivePayment $waysToReceivePayment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WaysToReceivePayment  $waysToReceivePayment
     * @return \Illuminate\Http\Response
     */
    public function destroy(WaysToReceivePayment $waysToReceivePayment)
    {
        //
    }
}
