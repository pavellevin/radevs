<?php

namespace App\Http\ViewComposers;

use App\Repositories\NewsRepository;
use App\Repositories\PermissionRepository;
use Illuminate\View\View;

class RoleComposer
{
    private $permissionRepository;

    public function __construct(PermissionRepository $permissionRepository)
    {
        $this->permissionRepository = $permissionRepository;
    }

    public function compose(View $view)
    {
        $permission = $this->permissionRepository->all();

        $view->with(compact('permission'));
    }
}
