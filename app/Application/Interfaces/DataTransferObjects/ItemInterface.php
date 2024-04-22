<?php

namespace App\Application\Interfaces\DataTransferObjects;

interface ItemInterface
{
    public function getTitle(): string;
    public function getUrl(): string;
}