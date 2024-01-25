<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionsController extends Controller
{
    public function permission()
    {
        $permissions = Permission::get();
        return view('role_permissions.permissions',compact('permissions'));
    }

    public function create_permission(Request $request)
    {
        $request->validate([
            'PermissionName' => 'required',
        ]);

        $permission = Permission::create([
            'name'=> $request->PermissionName,
         ]);

         if($permission){
            return redirect()->back()->with('success','Permission Created Successfully!');
         }else{
            return redirect()->back()->with('error','Permission Not Created!');
         }
    }
}
