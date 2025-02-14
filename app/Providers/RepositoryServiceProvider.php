<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public $bindings = [
        \App\Repositories\Show\ShowRepositoryInterface::class => \App\Repositories\Show\ShowRepository::class,
        \App\Repositories\Ticket\TicketRepositoryInterface::class => \App\Repositories\Ticket\TicketRepository::class,
    ];
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
