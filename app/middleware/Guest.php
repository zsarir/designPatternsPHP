<?php

namespace Mobin\DesignPatterns\App\Middleware;

use Mobin\DesignPatterns\App\Login;



class Guest
{
    public function handle()
    {
        if (Login::userRole() !== 'guest') {
            header("Location: /");
            exit();
        }
    }
}
