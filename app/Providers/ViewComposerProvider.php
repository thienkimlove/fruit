<?php namespace App\Providers;
use App\Category;
use App\Post;
use Illuminate\Support\ServiceProvider;
class ViewComposerProvider extends ServiceProvider {

	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot()
	{
        view()->composer('partials.menu', function ($view) {
            $view->with([
                'newProducts' => Post::latest()->take(5)->get(),
                'bestSellerProducts' => Post::latest()->take(5)->get()
            ]);
        });

        view()->composer('partials.best', function ($view) {
            $view->with([
                'bestSeller' => Post::latest()->take(5)->get()
            ]);
        });
	}

	/**
	 * Register the application services.
	 *
	 * @return void
	 */
	public function register()
	{
		//
	}

}
