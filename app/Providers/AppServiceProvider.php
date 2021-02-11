<?php

namespace App\Providers;

use ConsoleTVs\Charts\Registrar as Charts; 
/* use ConsoleTVs\Charts\ChartsServiceProvider as Charts; */
/* C:\laragon\www\laravel\vendor\consoletvs\charts\src */
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
    //public function boot(Charts $charts)
	//public function boot()
	public function boot(Charts $charts)
    {
        //
		
		$charts->register([
            \App\Charts\MilbrnchChart::class,
			\App\Charts\SampleChart::class,
			\App\Charts\ReligionChart::class,
			\App\Charts\RankChart::class,
			\App\Charts\LocationChart::class,
			\App\Charts\MilitarybranchesChart::class,
        ]); 
    }
}
