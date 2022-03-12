<?php

namespace App\Repositories;

use Spatie\Permission\Models\Permission;
use DB;

class PermissionRepository
{
    public function all()
    {
        return Permission::all();
    }

    public function hasPermissions($role)
    {
        return Permission::join("role_has_permissions","role_has_permissions.permission_id","=","permissions.id")
            ->where("role_has_permissions.role_id",$role->id)
            ->get();
    }
    public function hasRolePermissions($role)
    {
        return DB::table("role_has_permissions")->where("role_has_permissions.role_id",$role->id)
            ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
            ->all();
    }
}
