<?php

namespace App\Observers;

use App\Models\Test;
use App\Services\CriterionService;

class TestObserver
{
    private $criterionService;

    public function __construct(CriterionService $criterionService)
    {
        $this->criterionService = $criterionService;
    }

    /**
     * Handle the Test "created" event.
     *
     * @param \App\Models\Test $test
     * @return void
     */
    public function creating(Test $test)
    {
        $test->criterion = $this->criterionService->getCriterion($test->grade);
    }

    /**
     * Handle the Test "updated" event.
     *
     * @param \App\Models\Test $test
     * @return void
     */
    public function updating(Test $test)
    {
        if ($test->isDirty('grade')) {
            $test->criterion = $this->criterionService->getCriterion($test->grade);
        }
    }

}
