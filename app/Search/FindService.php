<?php

namespace App\Search;

class FindService
{
    public function __construct(public array $strategies = array())
    {
    }

    public function __invoke(array $input)
    {
        $pets = collect();
        foreach ($this->strategies as $strategy) {
            $pets = $pets->merge($strategy->search($input));
        }
        return $pets;
    }
}
