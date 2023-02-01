<?php

namespace App\Http\Controllers;

use App\Enums\UserRoleEnum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function callback($provider)
    {
        $data = Socialite::driver($provider)->user();
        $user = User::query()
            ->where('email', $data->getEmail())
            ->first();
        $checkExist = true;
        // neu user chua co thi tao moi
        if (is_null($user)) {
            $user = User::create(
                [
                    'email' => $data->getEmail(),
                ],
                [
                    'name' => $data->getName(),
                    'avatar' => $data->getAvatar(),
                ],
            );
        } else {
            $user->update([
                'email' => $data->getEmail(),
                'name' => $data->getName(),
                'avatar' => $data->getAvatar(),
            ]);
        }
        Auth::login($user);
        if ($checkExist) {
            $role = strtolower(UserRoleEnum::getKeys($user->role)[0]);
            return redirect()->route("admin.welcome");
        }
        // điều hướng
        return redirect()->route('home');
    }

    public function registering(Request $request)
    {
        $password = Hash::make($request->password);
        $role = $request->role;
        if (auth()->check()) {
            User::where('id', auth()->user()->id)->update([
                'password' => $password,
                'role' => $role,
            ]);
        } else {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $password,
            ]);

            Auth::login($user);
        }
    }
}
