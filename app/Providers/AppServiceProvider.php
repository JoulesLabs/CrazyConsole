<?php

namespace App\Providers;

use App\Enums\NoticeType;
use HotwiredLaravel\TurboLaravel\Facades\Turbo;
use HotwiredLaravel\TurboLaravel\Http\PendingTurboStreamResponse;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Turbo::usePartialsSubfolderPattern();
        PendingTurboStreamResponse::macro('notice', function (NoticeType $type, string $message) {
            return turbo_stream()->prepend('notification', view('partials.notice', [
                'type' => $type,
                'message' => $message,
            ]));
        });

        Blade::directive('frameid', function ($expression) {

            return "<?php echo frameid($expression); ?>";
        });
    }
}
