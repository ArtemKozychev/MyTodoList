<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{

    use RegistersUsers;

    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function confirmEmail(Request $request)
    {
        if (! $request->hasValidSignature()) {
            User::where('verified', 0)->findOrFail($request->user)->delete();
            $request->session()->flash('message', 'Срок жизни ссылки истек, пожалуйста повторите регистрацию');
//            abort(401);
        }
        User::where('verified', 0)->findOrFail($request->user)->confirm();
        $request->session()->flash('message', 'Ваща учетная запись подтверждена. Войдите под своим именем.');
        return redirect('login');
    }
}
