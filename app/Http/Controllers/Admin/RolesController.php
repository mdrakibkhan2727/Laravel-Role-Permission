<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesController extends Controller
{

    public function index()
    {
        $roles = Role::all();
        return  view('admin.role.index',compact('roles'));
    }


    public function create()
    {
      $permissions = Permission::all();
      $permission_groups = User::getpermissionByGroupName();
     return view('admin.role.create',compact('permissions','permission_groups'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|max:100|unique:roles'
        ],[
            'name.required'=>'Please give a Role Name'
        ]);

        $role = Role::create(['name' =>$request->name ]);
        $permissions = $request->input('permissions');
        if(!empty($permissions))
        {
            $role->syncPermissions($permissions);
        }
        return back();
    }

    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $role = Role::findById($id);
        $all_permissions = Permission::all();
        $permission_groups = User::getpermissionByGroupName();
        return view('admin.role.edit',compact('role','all_permissions','permission_groups'));
    }


    public function update(Request $request, $id)
    {

        $request->validate([
            'name'=>'required|max:100|unique:roles,name,'.$id
        ],[
            'name.required'=>'Please give a Role Name'
        ]);

        $role = Role::findById($id);
        $permissions = $request->input('permissions');
        if(!empty($permissions))
        {
            $role->syncPermissions($permissions);
        }
        return back();
    }

    public function destroy($id)
    {
        $role = Role::findById($id);
        if(!is_null($role))
        {
            $role->delete();
        }
        return back();
    }
}
