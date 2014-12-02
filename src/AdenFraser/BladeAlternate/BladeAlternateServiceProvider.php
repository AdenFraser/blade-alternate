<?php namespace AdenFraser\BladeAlternate;

use Illuminate\Support\ServiceProvider;

class BladeAlternateServiceProvider extends ServiceProvider {

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
	public function register()
	{
		$this->registerAlternate();

		$this->registerBladeExtension();
	}

	public function registerAlternate()
	{
		$this->app->singleton('blade.alternate', 'AdenFraser\BladeAlternate\BladeAlternate');
	}

	public function registerBladeExtension()
	{
		$compiler = $this->app['view.engine.resolver']->resolve('blade')->getCompiler();
		$compiler->extend(function($value, $blade){

			$pattern = $blade->createMatcher('alternate');
			return preg_replace($pattern, "$1<?php echo app('blade.alternate')->choose$2; ?>", $value);
		});

	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array('blade.alternate');
	}

}