<?php

namespace App\Repo;

use App\Models\Emp;
class EmpRepoImpl implements EmpRepo
{
    public function create($name, $email)
    {
        $record = new Emp();
        $record->name = $name;
        $record->email = $email;
        $record->save();
        return $record;
    }
    public function findByEmail($email)
    {
        return Emp::where(
            [
                ['email', '=', $email]
            ]
        )->first();
    }


    public function delete($id)
    {
        $record = Emp::find($id);
        $record->delete();
        return $record;
    }

    public function find() {
        return Emp::all();
    }



}