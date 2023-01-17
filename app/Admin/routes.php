<?php

use Illuminate\Routing\Router;
use Encore\Admin\Facades\Admin;
use Illuminate\Support\Facades\Route;
use App\Admin\Controllers\UserController;
use App\Admin\Controllers\HomeController;

Admin::routes();

Route::group([
                 'prefix' => config('admin.route.prefix'),
                 'middleware' => config('admin.route.middleware'),
                 'as' => config('admin.route.prefix') . '.',
             ], function (Router $router) {
    $router->get('/', [HomeController::class, 'index'])->name('home');
    $router->resource('users', UserController::class);
    $router->get('send/mail', [UserController::class, 'sendMail'])->name('send.mail');
});
