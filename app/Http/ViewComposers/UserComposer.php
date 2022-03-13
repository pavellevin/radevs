<?php

namespace App\Http\ViewComposers;

use App\Repositories\UserRepository;
use Illuminate\View\View;

class UserComposer
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function compose(View $view)
    {
        $roles = $this->userRepository->getRoles();

        $view->with(compact('roles'));
    }
}
