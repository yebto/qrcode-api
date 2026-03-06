<?php

namespace Yebto\QRCodeAPI;

use Illuminate\Support\ServiceProvider;

class QRCodeAPIServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/yebto-qrcode.php', 'yebto-qrcode');

        $this->app->singleton('yebto-qrcode', function () {
            return new QRCodeAPI(config('yebto-qrcode'));
        });
    }

    public function boot(): void
    {
        $this->publishes([
            __DIR__ . '/../config/yebto-qrcode.php' => config_path('yebto-qrcode.php'),
        ], 'yebto-qrcode-config');
    }
}
