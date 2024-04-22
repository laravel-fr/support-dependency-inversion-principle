<?php

namespace App\Infrastructure\DataTransferObjects;

use App\Application\Interfaces\DataTransferObjects\ItemInterface;
 
readonly class ReaderItem implements ItemInterface
{
    public function __construct(
        private string $url,
        private string $title,
    ) {}
 
    public function getUrl(): string
    {
        return $this->url;
    }
 
    public function getTitle(): string
    {
        return $this->title;
    }
}
