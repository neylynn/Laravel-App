<?php

namespace App\Http\Traits;
use App\Model\Qualify;

trait QualifyTrait {
    public function getQualify() {
        // Get all the qualifies from the Qualify Table.
        $qualifies = Qualify::all();
        return $qualifies;
    }
}