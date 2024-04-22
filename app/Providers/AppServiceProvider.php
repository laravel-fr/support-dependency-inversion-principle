<?php

namespace App\Providers;

use GuzzleHttp\Client as GuzzleHttp;
use FeedIo\FeedIo;
use FeedIo\Adapter\Http\Client as FeedIoClient;
use Illuminate\Foundation\Application;
use App\Infrastructure\Services\Reader;
use Illuminate\Support\ServiceProvider;
use App\Application\Interfaces\Services\ReaderInterface;

class AppServiceProvider extends ServiceProvider
{
    public $bindings = [
        ReaderInterface::class => Reader::class,
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

        $this->app->bind(ReaderInterface::class, Reader::class);
    }
}
