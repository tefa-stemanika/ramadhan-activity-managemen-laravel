<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.auth.login');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function signin(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);


        $remember_me = $request->remember === "on" ? true : false;

        if (auth()->attempt($credentials, $remember_me)) {
            switch (auth()->user()->role) {
                case 'admin':
                    return redirect()->route('admin.home');

                case 'siswa':
                    return redirect()->route('siswa.home');

                case 'walikelas':
                    return redirect()->route('walikelas.home');
            }
        } else {
            $request->flashOnly('username');

            notify()->error('username atau password yang anda masukan tidak sesuai', 'Login failed');

            return back();
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
