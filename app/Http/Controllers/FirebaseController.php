<?php

namespace App\Http\Controllers;

use Kreait\Laravel\Firebase\Facades\Firebase;
use Illuminate\Http\Request;

class FirebaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $auth = Firebase::auth();

        $users = $auth->listUsers();

        return view('home', compact('users'));
        dd($users);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('createUser');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $auth = Firebase::auth();

        $email = $request->input('email');
        $password = $request->input('password');

        $createdUser = $auth->createUser([
            'email' => $email,
            'password' => $password
        ]);

        return redirect()->route('home')->with('success', 'Usuario creado exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Firebase $firebase)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $auth = Firebase::auth();

        $user = $auth->getUser($id);

        return view('editUser', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $auth = Firebase::auth();

        $user = $auth->getUser($id);

        $auth->updateUser($user->uid, [
            'email' => $request->input('email'),
        ]);

        return redirect()->route('home')->with('success', 'Usuario actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $auth = Firebase::auth();

        $auth->deleteUser($id);

        return redirect()->route('home')->with('success', 'Usuario eliminado exitosamente');
    }
}
