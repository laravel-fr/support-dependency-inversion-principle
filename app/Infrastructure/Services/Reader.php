<?php

namespace App\Infrastructure\Services;

use FeedIo\FeedIo;
use App\Infrastructure\DataTransferObjects\ReaderItem;
use App\Application\Interfaces\Services\ReaderInterface;
use App\Application\Interfaces\DataTransferObjects\ItemInterface;

class Reader implements ReaderInterface
{
    public function __construct(
        protected FeedIo $feedIo,
    ) {}

    /**
     * @return array<ItemInterface>
     */
    public function fetch(string $url): array
    {
        $result = $this->feedIo->read($url);

        $items = [];

        foreach ($result->getFeed() as $item) {

            $items[] = new ReaderItem(
                title: $item->getTitle(),
                url: $item->getLink(),
            );
        }

        return $items;
    }
}
