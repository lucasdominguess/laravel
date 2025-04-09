<?php
namespace App\Interface;

interface SanitizerInterface
{
    public function clean(string $value ): string;
    public function cleanArray(array $data): array;
}
