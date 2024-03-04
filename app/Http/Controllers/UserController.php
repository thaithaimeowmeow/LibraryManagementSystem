<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Tables\Users;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rules\Password;
use ProtoneMedia\Splade\Facades\Toast;
use ProtoneMedia\Splade\SpladeTable;
use Spatie\QueryBuilder\QueryBuilder;

class UserController extends Controller
{
    //
    public function index()
    {
        return view('user.index',[
            'user' => Users::class,
        ]);
    }
    //
    public function show($user)
    {
        $user = User::findOrFail($user);
        return view('user.show',[
            'user' => $user,
        ]);
    }
    public function create()
    {
        return view('user.add',[
            
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        Toast::title('Thêm thành công!');
        return redirect()->route('users');
    }

    public function edit($user)
    {
        $user = User::findOrFail($user);
        return view('user.edit',[
            'user' => $user,
        ]);
    }

    public function update(Request $request, User $user)
    {
        $data = $request->validate([
            'name' => ['required','string','max:20'],
            'email' => ['required', 'string', 'email', 'max:255'],
        ]);

        $user->update($data);
        Toast::title('Chỉnh sửa thành công');
        return redirect()->route('users');
    }

    public function destroy(User $user )
    {
        $user->delete();
        Toast::title('Xóa thành công');
        return redirect()->route('users');
    }

}
