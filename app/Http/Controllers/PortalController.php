<?php

namespace App\Http\Controllers;

use App\Models\Portal;
use App\Models\User;
use App\Models\Portals\User as PortalsUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
class PortalController extends Controller
{
    public function index()
    {
        return view("portal.create_portal");
    }

    public function manage_portal()
    {
        $portals = Portal::all();
        return view('portal.manage_portal',compact('portals'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'portal_name' => 'required|string',
            'url' => 'required|url',
            'portal_password' => 'required',
            'portal_username' => 'required',
            'portal_database' => 'required',
            'portal_host' => 'required',
            'portal_desc' => 'required|string',
            'portal_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:1024', // Adjust mime types and max size as needed
        ]);

        // Handle file upload
        if ($request->hasFile('portal_image')) {
            $uploadedFile = $request->file('portal_image');
            $imagePath = $uploadedFile->store('portal_images', 'public'); // 'portal_images' is the directory where the image will be stored
        }

        // Create a new Portal instance and save data to the database
        $portal = Portal::create([
            'name' => $request->portal_name,
            'description' => $request->portal_desc,
            'image' => $imagePath,
            'website_url' => $request->url,
            'dynamic_password' => $request->portal_password,
            'dynamic_username' => $request->portal_username,
            'host' => $request->portal_host,
            'dynamic_database' => $request->portal_database,
        ]);

        // Redirect or respond as needed
        return redirect()->back()->with('success', 'portal creaed successfully!');
    }

    public function portal_role($portal_id, $user_id)
    {
        $user = User::find($user_id);
        $portal = Portal::find($portal_id); // Corrected variable name
    
        Config::set('database.connections.dynamic', [
            'driver' => 'mysql',
            'host' => $portal->host,
            'database' => $portal->dynamic_database,
            'username' => $portal->dynamic_username,
            'password' => $portal->dynamic_password,
        ]);
    
        $portal_user = PortalsUser::on('dynamic')->where('email', $user->email)->first(); 
        $roles = DB::connection('dynamic')->table('model_has_roles')
    ->join('roles', 'model_has_roles.role_id', '=', 'roles.id')
    ->where('model_has_roles.model_id', $portal_user->id)
    ->where('model_has_roles.model_type', 'App\\Models\\User')
    ->pluck('roles.name')
    ->toArray();

dd($roles);
        
        // Corrected variable name in the return statement
        return view('portal_roles_permissions.role', compact('portal_user', 'portal', 'user_role', 'user_permissions'));
    }
    

}
