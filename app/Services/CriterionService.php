<?php

namespace App\Services;

class CriterionService
{
    public function getCriterion($grade)
    {
        return $this->setCriterion($grade);
    }

    private function setCriterion($grade)
    {
        switch ($grade) {
            case $grade < 60:
                return 100;
            case $grade < 80:
                return 200;
            case $grade < 91:
                return 300;
            default:
                return 500;
        }
    }
}
