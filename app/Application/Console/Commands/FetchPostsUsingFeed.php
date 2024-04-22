<?php

namespace App\Application\Console\Commands;

use Illuminate\Console\Command;
use App\Application\Models\Post;
use App\Application\Interfaces\Services\ReaderInterface;
use App\Application\Interfaces\DataTransferObjects\ItemInterface;

class FetchPostsUsingFeed extends Command
{
    protected $signature = 'app:fetch-posts-using-feed';

    public function handle(ReaderInterface $reader)
    {
        $items = $reader->fetch('https://laravel-france.com/rss');

        foreach ($items as $item) {
            $this->createOrUpdatePost($item);
        }
    }

    private function createOrUpdatePost(ItemInterface $item): void
    {
        Post::updateOrCreate(
            [
                'url' => $item->getUrl(),
            ],
            [
                'title' => $item->getTitle(),
            ],
        );
    }
}
