<?php

declare(strict_types=1);

use App\Entity\JobCandidate;
use App\Utility\Employer;
use App\Utility\Storage;
use App\Utility\TextFileStorage;
use PHPUnit\Framework\TestCase;

class EmployerTest extends TestCase
{
    public function testStorage()
    {
        $employer = new Employer();
        $candidates = [
            new JobCandidate('Peter Stonks', 3),
            new JobCandidate('Peter Stonks', 3),
            new JobCandidate('John Jones', 3),
        ];

        foreach ($candidates as $candidate) {
            $employer->employ($candidate);
        }
        /** @var Storage $db */
        $db = Storage::getInstance();
        $result = $db->select('Peter Stonks');

        $this->assertCount(1, $result);

        $result = $db->select('John Jones');
        $this->assertCount(1, $result);
    }

    public function testFileStorage()
    {
        $employer = new Employer();
        $candidates = [
            new JobCandidate('Peter Stonks'),
            new JobCandidate('Peter Stonks'),
            new JobCandidate('John Jones'),
        ];

        foreach ($candidates as $candidate) {
            $employer->employ($candidate);
        }

        $txtStorage = new TextFileStorage();
        $result = $txtStorage->select('Peter Stonks');
        $this->assertCount(1, $result);

        $result = $txtStorage->select('John Jones');
        $this->assertCount(1, $result);
    }
}