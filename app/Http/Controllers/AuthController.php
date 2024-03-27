<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserSkill;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(AuthRequest $request)
    {
        DB::beginTransaction();

        try {
            $user = new User();
            $user->name = $request->name;
            $user->phone = $request->phone;
            $user->address = $request->address;
            $user->gender = $request->gender;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->save();

            DB::commit();

            Auth::logout();
            return redirect()->route('login')->with('SUCCESS_MESSAGE', 'Register successfully');

        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withInput()->with('ERROR_MESSAGE', 'Something went wrong!');
        }
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            return redirect()->route('profile')->with('SUCCESS_MESSAGE', 'Login successfully');
        } else {
            return redirect()->back()->withInput()->with('ERROR_MESSAGE', 'Something went wrong!');
        }
    }

    public function profile()
    {
        $myData = User::with('userSkill')->find(Auth::id());
        return view('profile', compact('myData'));
    }

    public function edit($id)
    {
        $editData = User::with('userSkill')->find(decrypt($id));
        return view('edit', compact('editData'));
    }

    public function updateProfile(Request $request)
    {
        DB::beginTransaction();

        try {
            $user = User::find(Auth::id());
            $user->name = $request->name;
            $user->phone = $request->phone;
            $user->address = $request->address;
            $user->gender = $request->gender;
            $user->email = $request->email;
            $user->save();

                $skill = UserSkill::where('user_id', $user->id)->first();

                if ($skill) {
                    $skill->skill = json_encode($request->skill);
                    $skill->save();
                } else {
                    $skill = new UserSkill();
                    $skill->user_id = $user->id;
                    $skill->skill = json_encode($request->skill);
                    $skill->save();
                }

            DB::commit();

            return redirect()->route('profile')->with('SUCCESS_MESSAGE', 'profile updated successfully');

        } catch (\Exception $e) {
            dd($e);
            DB::rollback();
            return redirect()->back()->withInput()->with('ERROR_MESSAGE', 'Something went wrong!');
        }
    }
}
