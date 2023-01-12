<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class UserController extends Controller
{
    protected $validasi = [
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'password' => ['required', 'string', 'confirmed'],
        'img' => 'file|image|mimes:jpeg,png,jpg',
    ];

    protected $validasiEdit = [
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255',],
        'password' => ['confirmed'],
        'img' => 'file|image|mimes:jpeg,png,jpg',
    ];

    public function index()
    {
        $data = [
            'user' => User::all(),
        ];

        return view('user.table', $data);
    }

    public function create()
    {

        return view('user.tambah');
    }

    public function store(Request $request)
    {
        // dd($request->img);
        $user = new User($request->all());

        $user->img = 'default.png';

        $request->validate($this->validasi, $this->messages);

        if ($request->img) {
            $request->img->originalName =
                time() . '_' . $request->img->getClientOriginalName();

            $request->img->move(
                'img/profile',
                $request->img->originalName
            );

            $user->img =
                $request->img->originalName;
        }

        // dd($user);
        $user->save();

        return redirect('user')->with('status', 'user berhasil ditambahkan.');
    }

    public function show(User $user)
    {
        $data = [
            'user' => $user,
        ];

        return view('user.detail', $data);
    }

    public function edit(User $user)
    {
        $data = [
            'user' => $user,
        ];

        return view('user.edit', $data);
    }

    public function update(Request $request, User $user)
    {
        // dd($user);
        $request->validate(
            $this->validasiEdit,
            $this->messages
        );

        if ($request->img) {

            if ($request->img->originalName = 'default.png') {
                $request->img->originalName =
                    time() . '_' . $request->img->getClientOriginalName();
            } else {
                $request->img->originalName =
                    time() . '_' . $request->img->getClientOriginalName();
                File::delete('img/profile/' . $user->img);
            }
        }

        User::where('id', $user->id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' =>  app('hash')->make(
                $request->password
            ) ?? $user->password,
            'img' => $request->img->originalName ?? $user->img,
        ]);

        return redirect('/user')->with('status', 'user berhasil diubah.');
    }

    public function destroy(User $user)
    {
        if (!($user->foto = 'default.png')) {
            File::delete('img/profile/' . $user->foto);
        }

        // event(new UserDeleted($user));

        User::destroy($user->id);
        return redirect('user')->with('status', 'user berhasil dihapus.');
    }
}
