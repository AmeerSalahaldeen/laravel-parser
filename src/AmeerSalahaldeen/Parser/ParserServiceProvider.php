<?php namespace AmeerSalahaldeen\Parser;

use Illuminate\Support\ServiceProvider;

class ParserServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->package('AmeerSalahaldeen/parser');
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app['parser'] = $this->app->share(function($app) {
		    return new Parser;
		});

		$this->app->booting(function() {
			$loader = \Illuminate\Foundation\AliasLoader::getInstance();
			$loader->alias('Parse', 'AmeerSalahaldeen\Parser\Facades\Parser');
		});
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array('parser');
	}

}
