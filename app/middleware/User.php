<?php

namespace Mobin\DesignPatterns\App\Middleware;

use Mobin\DesignPatterns\App\Login;


class User
{

    public function handle()
    {
        if (Login::userRole() !== 'user') {
            header("Location: /");
            exit();
        }
    }
}
