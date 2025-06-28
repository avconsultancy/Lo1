<?php

namespace App\Repo;
interface EmpRepo{
    public function create($name,$email);
    public function findByEmail($email);
    public function find();
    public function delete($id);

    
}