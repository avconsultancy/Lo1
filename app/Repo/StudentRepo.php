<?php

namespace App\Repo;

use PhpParser\Builder\Interface_;

interface StudentRepo
{
    public function create($name, $email);
    public function findByEmail($email);

}