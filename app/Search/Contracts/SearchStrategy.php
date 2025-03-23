<?php

namespace App\Search\Contracts;

interface SearchStrategy
{
    public function search(array $input);
}
