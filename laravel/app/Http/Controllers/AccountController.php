<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    /**
     * Checks if the user is authenticated
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check()) {
            return redirect()->route('myaccount');
        }

        return view('pages.login');
    }

    /**
     * Show the form for creating a new user.
     *
     * @return \Illuminate\Http\Response
     */
    function formRegister()
    {
        return view('pages.register');
    }

    /**
     * Store a newly created user in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    function register(Request $request)
    {
        $request->validate([
            "name" => "required",
            "surname" => "required",
            "cpf" => "required|string|min:11|max:14|regex:/[0-9]{9}/",
            "phone" => "required|string|min:10|max:11|regex:/[0-9]{9}/",
            "email" => "required|email",
            "password" => "required|min:8"
        ], [
            "name.required" => "Digite o seu nome",
            "surname.required" => "Digite o seu sobrenome",
            "cpf.required" => "Digite o seu CPF/CNPJ",
            "cpf.regex" => "Não pode ter letras",
            "cpf.min" => "Não pode ser menor que 11 caracteres",
            "cpf.max" => "Não pode ser maior que 14 caracteres",
            "phone.required" => "Digite o seu telefone",
            "phone.regex" => "Não pode ter letras",
            "phone.min" => "Não pode ser menor que 10 caracteres",
            "phone.max" => "Não pode ser maior que 11 caracteres",
            "email.required" => "Digite o seu email",
            "password.required" => "Digite sua senha"
        ]);

        $database1 = DB::table('users')->where('cpf', $request->cpf);
        if (isset($database1->get()->first()->cpf)) {
            return redirect()->back()->withErrors(['errorCreate' => 'Esse CPF/CNPJ já existe.']);
        }

        $database2 = DB::table('users')->where('email', $request->email);
        if (isset($database2->get()->first()->email)) {
            return redirect()->back()->withErrors(['errorCreate' => 'Esse email já existe.']);
        }

        $user = new User();
        $user->userName = "$request->name $request->surname";
        $user->name = $request->name;
        $user->surname = $request->surname;
        $user->cpf = $request->cpf;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        if (!$user->save()) {
            return redirect()->back()->withErrors(['errorCreate' => 'Erro ao criar a conta, tente novamente mais tarde']);
        }

        return redirect()->route('account.index');
    }

    /**
     * Checks if the user is stored
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8'
        ], [
            'email.required' => 'Email não digitado',
            'email.email' => 'Email não válido',
            'password.required' => 'Senha não digitado',
            'password.min' => 'No mínimo 8 caracteres'
        ]);

        // If true, redirect to the main page
        Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ]);

        return redirect()->back()->withInput()->withErrors(['notFound' => 'Email ou senha incorreto']);
    }

    /**
     * Remove the authenticated user from the session
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    function logout()
    {
        Auth::logout();

        return redirect()->route('account.index');
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
        //
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
