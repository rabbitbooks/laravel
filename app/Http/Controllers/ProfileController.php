<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function update(Request $request)
    {
        $errors = [];
        $user = Auth::user();


        if ($request->isMethod('post')) {
            $this->validate($request, $this->validateRules(), [], $this->attributeNames());
            dump($request->isMethod);
            if (Hash::check($request->post('password'), $user->password)) {
                $var = $user->fill([
                    'name' => $request->post('name'),
//                    $user->is_admin ?? 'password' => Hash::make($request->post('newPassword')),
                    'email' => $request->post('email')
                ])->save();
dd($var);
                return redirect()->route('updateProfile')->withSuccess('Профиль успешно изменен!');
            } else {
                $errors['password'][] = 'Неверно введен текущий пароль';
//                dd('$var');
                return redirect()->route('updateProfile')->withErrors($errors);
            }
        }

        return view('profile', [
            'user' => $user
        ]);
    }

    protected function validateRules()
    {
        return [
            'name' => 'required|string|max:15',
            'email' => 'required|email|unique:users,email,' . Auth::id(),
            'password' => 'required',
            'newPassword' => 'required|string|min:3'
        ];
    }

    protected function attributeNames()
    {
        return [
            'newPassword' => 'Новый пароль'
        ];
    }
}
