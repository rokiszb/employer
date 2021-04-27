<?php

namespace App\Entity;

class JobCandidate
{
    private string $name;
    private int $experience;

    public function __construct(string $name, int $experience = 0)
    {
        $this->name = $name;
        $this->experience = $experience;
    }

    public function isExperienced(): bool
    {
        return $this->experience > 2;
    }

    public function getName(): string
    {
        return $this->name;
    }
}