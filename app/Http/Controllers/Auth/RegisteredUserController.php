<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\View;
use Illuminate\Validation\Rules;
use App\Models\backend\CompanyInformation;
use Illuminate\Support\Facades\Log; 



class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $contacts=CompanyInformation::all();
        return view('auth.register', compact('contacts'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'mobile' => ['required'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'nid' => ['required', 'string', 'unique:users'],
            'address' => ['required', 'string'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'nid' => $request ->nid,
            'address' => $request->address,
            'role' => 2,
            'mobile' => $request->mobile,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        // Auth::login($user);

        return redirect('login');
    }


    // public function personalInfo()
    // {
    //     $user = Auth::user();
    //     return View::make('frontend.auth.user.personal_info', compact('user'));
    // }

    // public function registerApi(Request $request)
    //     {
    //         $validatedData = $request->validate([
    //             'name' => ['required', 'string', 'max:255'],
    //             'mobile' => ['required', 'numeric'],
    //             'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
    //             'password' => ['required', 'confirmed', Rules\Password::defaults()],
    //         ]);

    //         $emailExists = User::where('email', $request->email)->exists();

    //         if ($emailExists) {
    //             return response()->json(['message' => 'Email already used'], 422);
    //         }

    //         $user = User::create([
    //             'name' => $request->name,
    //             'email' => $request->email,
    //             'role' => 2,
    //             'mobile' => $request->mobile,
    //             'password' => Hash::make($request->password),
    //         ]);

    //         $token = $user->createToken('my-app-token')->plainTextToken;

    //         $response = [
    //             'user' => $user,
    //             'token' => $token,
    //         ];

    //         return response($response, 201);
    //     }


    // }


    public function registerApi(Request $request)
    {
        // Log::info($request->all());
        try {
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'mobile' => ['required'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'nid' => ['required', 'string', 'unique:users'],
                'address' => ['required', 'string'],
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
            ]);

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'nid' => $request->nid,
                'address' => $request->address,
                'role' => 2,
                'mobile' => $request->mobile,
                'password' => Hash::make($request->password),
            ]);

            event(new Registered($user));

            // $token = $user->createToken('my-app-token')->plainTextToken;

            return response()->json([
                'message' => 'User created successfully',
                'user' => $user,
                // 'token' => $token,
            ], 201);
        } catch (\Exception $e) {

            return response()->json(['message' => 'Failed to register user', 'error' => $e->getMessage()], 500);
        }
    }
}
