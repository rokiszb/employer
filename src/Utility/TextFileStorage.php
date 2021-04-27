<?php
declare(strict_types=1);

namespace App\Utility;

class TextFileStorage
{
    const FILE_PATH = __DIR__ . '\\..\\names.txt';

    public function insert(string $name): void
    {
        if (!file_exists(self::FILE_PATH)) {
            file_put_contents(self::FILE_PATH, $name . PHP_EOL, FILE_APPEND);
        }

        if ($this->isUnique($name)) {
            file_put_contents(self::FILE_PATH, $name . PHP_EOL, FILE_APPEND);
        }
    }

    public function isUnique(string $name): bool
    {
        $names = $this->select($name);

        return !in_array($name, $names);
    }

    public function select(string $name): array
    {
        $result = [];
        $file = file_get_contents(self::FILE_PATH);
        $names = explode(PHP_EOL, $file);
        array_pop($names);
        foreach ($names as $value) {
            if ($name == $value) {
                $result[] = $name;
            }
        }

        return $result;
    }
}