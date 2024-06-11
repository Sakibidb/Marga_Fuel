<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function login(Request $request)
    {
        $email = $request->input('Email');
        $password = $request->input('Password');

        $user = UserModel::where('email', $email)->first();

        if (!$user) {
            return response()->json(['error' => 'Invalid credentials'], 401);
        }

        if (!Hash::check($password, $user->password)) {
            return response()->json(['error' => 'Invalid credentials'], 401);
        }

        $request->session()->put('AdminLoginSession', $user->name);
        $request->session()->put('AdminLoginSessionId', $user->id);

        return response()->json(['success' => true, 'user' => $user], 200);
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect("/login");
    }

    public function user()
    {
        $allUser = UserModel::paginate(10);
        return view('backend.page.user.user', compact('allUser'));
    }

    public function createUserForm()
    {
        return view('backend.page.user.createUser');
    }

    public function createUser(Request $request)
    {
        // dd('ok');
        $request->validate([
            'name' => 'required',
            'mobile' => 'required',
            'role' => 'required',
            'address' => 'required',
            'nid' => 'required',
            'password' => 'required',
            'email' => 'required|unique:users,email',
        ]);

        $fileName = null;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('image', $fileName);
        }

        UserModel::create([
            'name' => $request->name,
            'mobile' => $request->mobile,
            'email' => $request->email,
            'address' => $request->address,
            'nid' => $request->nid,
            'role' => $request->role,
            'password' => Hash::make($request->password),
            'image' => $fileName,
        ]);

        return redirect()->route('user');
    }

    public function editUserForm($id)
    {
        $user = UserModel::findOrFail($id);
        return view('backend.page.user.editUser', compact('user'));
    }

    public function userUpdate(Request $request)
    {
        // return $request->all();
        $request->validate([
            'name' => 'required',
            'mobile' => 'required',
            'address' => 'required',
            'nid' => 'required',
            'email' => 'required|email|unique:users,email,' . $request->id,
            'new_password' => 'nullable|min:6|confirmed',
            'confirm_new_password' => 'nullable|min:6|same:new_password',

        ]);

        $user = UserModel::findOrFail($request->id);

        $data = [
            'name' => $request->name,
            'mobile' => $request->mobile,
            'email' => $request->email,
            'address' => $request->address,
            'nid' => $request->nid,
        ];

        if ($request->filled('new_password')) {
            if (!Hash::check($request->old_password, $user->password)) {
                return redirect()->back()->withErrors(['old_password' => 'The old password does not match our records.']);
            }
            $data['password'] = Hash::make($request->new_password);
        }

        $user->update($data);

        return redirect()->route('user')->with('success', 'User updated successfully.');
    }


    public function userDelete($id)
    {
        UserModel::findOrFail($id)->delete();
        return redirect()->route('user');
    }


    public function updatePersonalInfo(Request $request)
    {
        $user = Auth::user();

        $user->name = $request->name;
        $user->mobile = $request->mobile;
        $user->address = $request->address;
        $user->email = $request->email;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->back()->with('success', 'Personal information updated successfully.');
    }


    public function userApi()
    {
        $user = UserModel::all();

        return response()->json(['user' => $user]);
    }
}
