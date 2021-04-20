<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ProfileRequest;

class AdminController extends Controller
{
    protected $title = 'данные профиля';

    public function index()
    {      
        $user = Auth::user(); 
        return view('admin.index')
            ->with('user', $user)
            ->with('title', $this->title);
    }

    public function update(ProfileRequest $request)
    {       
        $errors = [];
        $user = Auth::user();

        if ($request->isMethod('post')) {

            $request->validated();

            if (Hash::check($request->post('password'), $user->password)) {
                $user->fill([
                    'name' => $request->post('name'),
                    'password' => Hash::make($request->post('newPassword')),
                    'email' => $request->post('email')
                ])->save();

                return redirect()->route('admin.index')
                                 ->with('success', 'Профиль успешно изменен!');
            } else {
                $errors['password'][] = 'Неверно введен текущий пароль';

                return redirect()->route('admin.index')
                                 ->withErrors($errors);
            }
        }

        return view('admin.index', [
            'user' => $user
        ]);
    }
}
