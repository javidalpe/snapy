<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Blade;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
      Blade::directive('money', function ($amount) {
          return "<?php echo('$' . $amount); ?>";
      });

      Blade::directive('stripe', function ($amount) {
          return "<?php echo('$' . $amount / 100.0); ?>";
      });

      Blade::directive('date', function ($epoch) {
          return '<?php $dt=new DateTime("@' . $epoch . '");echo($dt->format("Y-m-d")); ?>';
      });

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
