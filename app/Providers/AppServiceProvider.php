<?php

namespace App\Providers;

use Schema;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot()
	{
			Schema::defaultStringLength(191);
      Paginator::defaultView('pagination::default');
	}

	/**
	 * Register any application services.
	 *
	 * @return void
	 */
	public function register()
	{
			//
	}
}