<?php
include 'vendor\autoload.php';

use App\Entity\JobCandidate;
use App\Utility\Employer;

$employer = new Employer();
$candidates = [
    new JobCandidate('Rokas la', 0),
    new JobCandidate('Rokas X', 3),
    new JobCandidate('Rokas X', 3),
    new JobCandidate('Rokas Xa', 3),
    new JobCandidate('Rokas la', 0),
];

foreach ($candidates as $candidate) {
    $employer->employ($candidate);
}