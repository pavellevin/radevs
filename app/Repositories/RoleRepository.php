<?php

namespace App\Repositories;

use Spatie\Permission\Models\Role;

class RoleRepository
{
    public function all()
    {
        return Role::orderBy('id','DESC')->paginate(5);
    }
    public function getRoles()
    {
        return Role::pluck('name','name')->all();
    }

    public function create($request)
    {
        return Role::create(['name' => $request->input('name')]);
    }

    public function delete($role)
    {
        return $role->delete();
    }

    public function update($role, $request)
    {
        $role->name = $request->input('name');
        $role->syncPermissions($request->input('permission'));

        return $role->save();
    }
}
