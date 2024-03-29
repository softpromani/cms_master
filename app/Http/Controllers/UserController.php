<?php

namespace App\Http\Controllers;

use App\Events\UserRegistered;
use App\Models\Portal;
use App\Models\User;
use App\Models\UserHasPortalAccess;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Spatie\Permission\Models\Role;
use App\Models\Portals\User as PortalsUser;
use Illuminate\Support\Facades\Config;
use Illuminate\Validation\Rule;


class UserController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        $portals = Portal::get();
        return view('users.index', compact('roles', 'portals'));
    }

    public function user_list(){
        $users = User::paginate(10);
        return view('users.user_list',compact('users'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                "role" => 'required|array',
                "portals" => 'required|array',
                "fname" => 'required|string',
                "mname" => 'nullable|string',
                "lname" => 'nullable|string',
                "email" => 'required|email|unique:users,email',
                "phone" => 'required|unique:users,phone',
                "aphone" => 'nullable|unique:users,aphone',
                "dob" => 'nullable',
                "country" => 'nullable',
                "state" => 'nullable',
                "city" => 'nullable',
                "pincode" => 'nullable',
                "address1" => 'nullable',
                "address2" => 'nullable',
            ]);

            $user = User::create([
                "fname" => $request->fname,
                "mname" => $request->mname,
                "lname" => $request->lname,
                "email" => $request->email,
                "phone" => $request->phone,
                "aphone" => $request->aphone,
                "dob" => $request->dob,
                "country" => $request->country,
                "state" => $request->state,
                "city" => $request->city,
                "pincode" => $request->pincode,
                "address1" => $request->address1,
                "address2" => $request->address2,
                'password'=>Hash::make('123456789'),
            ])->syncRoles($request->role);

            foreach ($request->portals as $portal) {
                UserHasPortalAccess::create([
                    'user_id' => $user->id,
                    'portal_id' => $portal,
                ]);
            }
            event(new UserRegistered($user));

            return redirect()->back()->with("success", "User Created Successfully!");
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (QueryException $e) {
            return redirect()->back()->with("error", "User Not Created!")->withInput();
        } catch (\Exception $e) {
            return redirect()->back()->with("error", "Something went wrong!")->withInput();
        }
    }

    public function create_password(Request $request)
    {
        $data = User::where('email', $request->email)->first();
        if ($data) {
            return view('create_password', compact('data'));
        }
        abort(404);
    }

    public function update_password(Request $request)
    {
        $request->validate([
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required|min:8',
            'email' => 'required|email|exists:users,email',
        ]);
        $data = User::where('email', $request->email)->first();
        User::find($data->id)->update([
            'password' => Hash::make($request->password),
        ]);

        foreach ($data->portals() as $portal)
        {
            Config::set('database.connections.dynamic', [
                'driver' => 'mysql',
                'host' => $portal->host,
                'database' => $portal->dynamic_database,
                'username' => $portal->dynamic_username,
                'password' => $portal->dynamic_password,
            ]);
            $portal_user = PortalsUser::on('dynamic')->where('email', $request->email)->first();
            PortalsUser::on('dynamic')->find($portal_user->id)->update([
                'password'=>Hash::make($request->password),
            ]);
        }

        return redirect()->route('login')->with('success', 'Your Password Created Successfully Please Login!');
    }

    public function auth_user(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // Authentication successful
            if (Auth::user()->hasRole('User')) {
               $portalsArray = Auth::user()->portals()->pluck('name')->toArray();
            // Add portal names as abilities to the user
            Auth::user()->abilities = $portalsArray;

            $token = Auth::user()->createToken('token-name', $portalsArray)->plainTextToken;
            session(['access_token' => $token]);
                return redirect()->route('user.dashboard')->with('success','Login successful!');
            }else {
                return redirect()->route('admin.dashboard')->with('success', 'Login successful!');
            }
        } else {
            // Authentication failed
            return redirect()->back()->with('error', 'Invalid credentials. Please try again.');
        }
    }


    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success','User Logout Successfully!');
    }
    public function user_dashboard()
    {
        return view('user_dashboard');
    }
}
