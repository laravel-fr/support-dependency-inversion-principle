<?php

namespace App\Application\Interfaces\Services;

use App\Application\Interfaces\DataTransferObjects\ItemInterface;

interface ReaderInterface
{
    /**
     * @return array<ItemInterface>
     */
    public function fetch(string $url): array;
}
