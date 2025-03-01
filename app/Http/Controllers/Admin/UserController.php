<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserCreateRequest;
use App\Imports\UserImport;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return view('pages.admin.user.index', [
            'data' => \App\Models\User::orderBy('username')->when($request->search, function ($q) use ($request) {
                $q->where('username', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('role', 'LIKE', '%' . $request->search . '%');
            })->paginate(20),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserCreateRequest $request)
    {
        \App\Models\User::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        notify()->success("User telah berhasil dibuat");

        return redirect()->route('user.index');
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
    public function edit(User $user)
    {
        return view('pages.admin.user.edit', [
            'data' => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        if (!empty($request->password)) {
            $user->update([
                'username' => $request->username,
                'password' => Hash::make($request->password),
                'role' => $request->role,
            ]);
        } else {
            $user->update([
                'username' => $request->username,
                'role' => $request->role,
            ]);
        }

        notify()->success("User telah berhasil diubah");

        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, User $user)
    {
        $user->delete();

        notify()->success("User telah berhasil dihapus");

        return redirect()->route('user.index');
    }

    public function import(Request $request)
    {
        $user = new UserImport();

        $user->import($request->excel);

        if ($user->failures()->isNotEmpty()) {
            return back()->withFailures($user->failures());
        }

        notify()->success('User telah berhasil diimpor');

        return back();
    }
}
