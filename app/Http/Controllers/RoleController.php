<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function role()
    {
        $permissions = Permission::all();
        $roles = Role::all();
        return view('role_permissions.role', compact('permissions', 'roles'));
    }

    public function role_permissions(Request $request)
    {

        try {
            $request->validate([
                'modalRoleName' => 'required',
            ]);

            $roleId = $request->roleId;

            Role::updateOrCreate(
                ['id' => $roleId], // Conditions to check if the role with this ID exists
                ['name' => $request->modalRoleName]// Data to update or create the role
            )->syncPermissions($request->permission);

            if ($roleId) {
                return redirect()->back()->with('success', 'Role Updated Successfully!');
            } else {
                return redirect()->back()->with('success', 'Role Created Successfully!');
            }
        } catch (ValidationException $e) {
            return redirect()->back()->with('error', $e->validator->errors());
        }
    }

}
