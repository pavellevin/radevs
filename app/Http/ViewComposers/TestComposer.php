<?php

namespace App\Http\ViewComposers;

use App\Repositories\UserRepository;
use Illuminate\View\View;

class TestComposer
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function compose(View $view)
    {
        $managers = $this->userRepository->getManagers();

        $view->with(compact('managers'));
    }
}
