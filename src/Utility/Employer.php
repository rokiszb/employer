<?php


namespace App\Utility;

use App\Entity\JobCandidate;

class Employer
{
    public function employ(JobCandidate $candidate)
    {
        if ($candidate->isExperienced()) {
            $dbStorage = Storage::getInstance();
            /** @var Storage $dbStorage */
            $dbStorage->insert($candidate->getName());
        } else {
            $textFileStorage = new TextFileStorage();
            $textFileStorage->insert($candidate->getName());
        }
    }
}