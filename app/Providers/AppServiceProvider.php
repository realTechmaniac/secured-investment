<?php

namespace App\Providers;

use App\Information;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
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
        Schema::defaultStringLength(191);

        if (!Collection::hasMacro('paginate')) {

            Collection::macro('paginate',
                function ($perPage = 15, $page = null, $options = []) {
                    $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
                    return (new LengthAwarePaginator(
                        $this->forPage($page, $perPage), $this->count(), $perPage, $page, $options))
                        ->withPath('');
                });
        }

        /*
         * Share view this way if you need to get the user id
         * */
        view()->composer('includes.header-include', function($view) {
            $news_count = Information::all()->count();
            $news_read = Auth::user()->read_news;
            $news_unread = $news_count - $news_read;

            $view->with('news_unread', $news_unread);
        });

        view()->composer('includes.left-sidebar-include', function($view) {
            $user_sent = Auth::user()->senderChats->count();
            $user_received = Auth::user()->receiverChats->count();
            $chats = $user_sent + $user_received;
            $read_messages = Auth::user()->read_messages;
            $unread_messages = $chats - $read_messages;

            $view->with('unread_messages', $unread_messages);
        });
    }
}
