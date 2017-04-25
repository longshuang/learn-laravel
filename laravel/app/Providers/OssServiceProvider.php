<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class OssServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //将OSS配置文件拷贝至config下
        $this->publishes([
            __DIR__ . '/../../vendor/johnlui/aliyun-oss/OSS.php' => config_path('OSS.php'),
        ]);
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
