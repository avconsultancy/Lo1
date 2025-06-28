<?php 

namespace App\Repo;

use App\Models\Student;

class StudentRepoImpl implements StudentRepo


{
    public function create($name, $email)
    {
        $record = new Student();
        $record->name = $name;
        $record->email = $email;
        $record->save();
        return $record;
    }

    public function findByEmail($email){
        return Student::where("email", $email)->first();
    }

}