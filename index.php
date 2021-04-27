<?php
include 'vendor/autoload.php';

use App\Entity\JobCandidate;
use App\Utility\Employer;

$employer = new Employer();
$candidates = [
    new JobCandidate('Rolandas Rok', 0),
    new JobCandidate('Oliver Stone', 3),
    new JobCandidate('Oliver Stone', 3),
    new JobCandidate('James Oliver', 3),
    new JobCandidate('Oliver Stones', 0),
];

foreach ($candidates as $candidate) {
    $employer->employ($candidate);
}