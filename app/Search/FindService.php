<?php

namespace App\Search;

class FindService
{
    public array $strategies;

    public function __construct(array $strategies = array())
    {
        $this->strategies = $strategies;
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
