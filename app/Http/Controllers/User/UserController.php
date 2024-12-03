<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Response;
use Validator;
use Illuminate\Http\JsonResponse;

class UserController extends BaseController
{
    //

    function login(Request $request)
    {
        $request->session()->put('email', $request->input('email'));
        return redirect(to: 'profiles');
    }


    function logout()
    {
        session()->pull('email');
        return redirect('profiles');
    }


    function Registration(Request $request)
    {
        // dd(vars: $request);
        try {
            $request->validate(
                [
                    "name" => "required|max:56|string",
                    "email" => "required|email",
                    'role' => 'required|string',
                    'password'  =>  'required|min:6|confirmed'

                ]
            );

            $isExistUser = User::where('email', $request->email)->first();

            if ($isExistUser) {
                return response()->json(["code" => 401, 'status' => true, 'msg' => 'This user record alredy exist.']);
            }

            $userData = User::create(
                [
                    "name" => $request->name,
                    "email" => $request->email,
                    "password" => Hash::make($request->password),
                    "role" => $request->role
                ]
            );

            $token = $userData->createToken('MyApp')->plainTextToken;

            return response()->json(["code" => 200, 'status' => true, 'data' => $userData, "token" =>  $token]);
            // $password = Hash::make($request->password);
        } catch (ValidationException $error) {
            return response()->json(['code' => 422, 'status' => false, 'msg' => 'Validation failed', 'errors' => $error->errors()]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    function userLogin(Request $request)
    {
        try {
            $email = $request->email;
            $password = $request->password;

            if (Auth::attempt(['email' => $email, 'password' => $password])) {
                $user = Auth::user();
                $token = $user->createToken('app')->plainTextToken;
                $userName = $user->name;

                return Response()->json(["code" => 200, "status" => true, "data" => ["token" => $token, "user_name" => $userName]]);
            } else {
                return Response()->json(["code" => 401, "status" => false, "msg" => "Unauthorized preson"]);
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }


    function getAllUsers()
    {
        try {
            if (!Auth::user()) {
                return Response()->json(["code" => 200, "status" => true, "msg" => "Unauthorized person"]);
            }
            $data = User::all();
            return Response()->json(["code" => 200, "status" => true, "data" => $data]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
