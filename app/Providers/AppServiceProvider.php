<?php

namespace App\Providers;

use Schema;
use DB;
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
			DB::statement("SET lc_time_names = 'es_ES'");
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