<?php

namespace App\Search\Strategy;

use App\Models\Pet;
use App\Search\Contracts\SearchStrategy;

class FindByName implements SearchStrategy
{
    public function search(array $input)
    {
        if (empty($input["name"])) {
            return array();
        }
        $value = $input['name'];
        return Pet::with('type')
            ->where('name', 'like', '%'.$value.'%')
            ->get();
    }
}
