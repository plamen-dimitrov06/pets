<?php

namespace App\Search\Strategy;

use App\Models\Pet;
use App\Search\Contracts\SearchStrategy;

class FindByType implements SearchStrategy
{
    public function search(array $input)
    {
        if (empty($input["type"])) {
            return array();
        }
        $value = $input['type'];
        return Pet::with('type')
            ->whereHas('type', function ($query) use ($value) {
                $query->where('type', $value);
            })->get();
    }
}
