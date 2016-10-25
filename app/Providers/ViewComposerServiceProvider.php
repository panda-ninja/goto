<?php
namespace GotoPeru\Providers;


use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\View\Factory;
use GotoPeru\Composers\CurrentUserComposer;

class ViewComposerServiceProvider extends ServiceProvider{

    public function boot(Factory $factory){
        $factory->composer('*',CurrentUserComposer::class);//-- *=compartir en todas las vistas
    }

}