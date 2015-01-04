<?php namespace Marlon\Yuntongxun;

use Illuminate\Support\ServiceProvider;

class YuntongxunServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function boot()
	{
	    $this->package('Marlon/Yuntongxun');
	}

	public function register()
	{
		$this->app->bind('Yuntongxun');
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array();
	}

}
