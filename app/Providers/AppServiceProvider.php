<?php

namespace App\Providers;

use FeedIo\FeedIo;
use GuzzleHttp\Client as GuzzleHttp;
use Illuminate\Foundation\Application;
use Illuminate\Support\ServiceProvider;
use App\Infrastructure\Services\FeedIoReader;
use FeedIo\Adapter\Http\Client as FeedIoClient;
use App\Application\Interfaces\Services\ReaderInterface;

class AppServiceProvider extends ServiceProvider
{
    public $bindings = [
        ReaderInterface::class => FeedIoReader::class,
    ];

    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(FeedIo::class, function (Application $app) {

            $client = new FeedIoClient(new GuzzleHttp());

            return new FeedIo($client);
        });
    }
}
