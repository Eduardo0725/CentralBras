<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\CardAddress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CardController extends Controller
{
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
        try {
            DB::beginTransaction();

            $card = new Card;
            $card->idUser = Auth::user()->id;
            $card->cardNumber = $request->cardNumber;
            $card->cardHouder = $request->cardHouder;
            $card->monthOfValidity = $request->monthOfValidity;
            $card->yearOfValidity = $request->yearOfValidity;
            $card->cvv = $request->cvv;
            $card->cardHolderCPF = $request->cardHolderCPF;
            $card->cardHolderDateOfBirth = date('Y-m-d H:i:s', strtotime($request->cardHolderDateOfBirth));
            $card->save();

            $cardAddress = new CardAddress;
            $cardAddress->idCard = $card->id;
            $cardAddress->cep = $request->cep;
            $cardAddress->state = $request->state;
            $cardAddress->city = $request->city;
            $cardAddress->street = $request->street;
            $cardAddress->houseNumber = $request->houseNumber;
            $cardAddress->complement = $request->complement;
            $cardAddress->save();

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();

            return redirect()->back()->withErrors(['error' => 'Erro ao cadastrar o cartão, tente novamente mais tarde.']);
        }

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Card  $card
     * @return \Illuminate\Http\Response
     */
    public function show(card $card)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Card  $card
     * @return \Illuminate\Http\Response
     */
    public function edit(card $card)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Card  $card
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, card $card)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Card  $card
     * @return \Illuminate\Http\Response
     */
    public function destroy(card $card)
    {
        try {
            DB::beginTransaction();

            $card->cardAddresses()->get()->first()->delete();
            $card->delete();

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();

            return redirect()->back()->withErrors(['error' => 'Erro ao excluir o cartão, tente novamente.']);
        }

        return redirect()->back();
    }
}
