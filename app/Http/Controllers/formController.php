<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Session;

class formController extends Controller
{
    function index()
    {
        $usuarios = session('usuarios');
        $usersDecrypt = [];

        //dd($usuarios);

        if (isset($usuarios)) {
            foreach ($usuarios as $key => $value) {
                $usersDecrypt[] = [
                    'name' => Crypt::decryptString($value['name']),
                    'lastName' => Crypt::decryptString($value['lastName']),
                    'libro' => Crypt::decryptString($value['libro']),
                ];
            }

            return view('form_table/view_form')->with([
                'usuarios' => $usuarios,
                'usuariosEncriptados' => $usersDecrypt
            ]);
        }


        return view('form_table/view_form')->with([
            'usuarios' => null,
            'usuariosEncriptados' => null
        ]);
    }

    function create()
    {
        return view('form');
    }

    function store(Request $request)
    {

        if (!session()->has('usuarios')) {
            $usuario = [
                'name' => Crypt::encryptString($request->name),
                'lastName' => Crypt::encryptString($request->lastName),
                'libro' => Crypt::encryptString($request->libro)
            ];

            $usuarios = [
                $usuario
            ];

            session(['usuarios' => $usuarios]);
        } else {

            $usuario = [
                'name' => Crypt::encryptString($request->name),
                'lastName' => Crypt::encryptString($request->lastName),
                'libro' => Crypt::encryptString($request->libro)
            ];

            session()->push('usuarios', $usuario);
        }

        //dd($request);

        return redirect('/view');
    }

    function edit($pos)
    {
        $usuarios = session('usuarios');

        foreach ($usuarios as $key => $value) {
            $usersDecrypt[] = [
                'name' => Crypt::decryptString($value['name']),
                'lastName' => Crypt::decryptString($value['lastName']),
                'libro' => Crypt::decryptString($value['libro']),
            ];
        }

        return view('form_table/edit')->with(['usuarios' => $usersDecrypt[$pos]])->with('pos', $pos);
    }

    function update(Request $request, $pos)
    {

        $usuarios = session('usuarios');


        $usuarios[$pos]['name'] = Crypt::encryptString($request->name);
        $usuarios[$pos]['lastName'] = Crypt::encryptString($request->lastName);
        $usuarios[$pos]['libro'] = Crypt::encryptString($request->libro);

        session(['usuarios' => $usuarios]);

        return redirect()->to('/view');
    }

    function delete($pos)
    {

        $usuarios = session('usuarios');

        unset($usuarios[$pos]);

        $usuarios = array_values($usuarios);

        session(['usuarios' => $usuarios]);

        return redirect()->to('/view');
    }

    function destroy()
    {

        $usuarios = null;
        session()->flush();

        return redirect()->to('/view');
    }
}
