<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Throwable;

class UserController extends Controller
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        try {
            if ($request->hasFile('photo'))
                $user->photo = $request->file('photo')->storeAs('users', $user->id);

            if ($request->email)
                $user->email = $request->email;

            if ($request->password)
                $user->password = Hash::make($request->password);

            if ($request->username)
                $user->userName = $request->username;

            if ($request->name)
                $user->name = $request->name;

            if ($request->surname)
                $user->surname = $request->surname;

            if ($request->cpf)
                $user->cpf = $request->cpf;

            if ($request->phone)
                $user->phone = $request->phone;

            $user->save();
        } catch (Throwable $th) {
            return redirect()->back()->withErrors(['error' => 'Erro ao atualizar, tente novamente.']);
        }

        return redirect()->back(201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
