<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StudentCreateRequest;
use App\Repo\StudentRepo;
use Illuminate\Http\Request;
use stdClass;
class ApiStudentController extends Controller
{
    private $studentRepo;
    public function __construct(StudentRepo $studentRepo)
    {
        $this->studentRepo = $studentRepo;
    }

    public function store(StudentCreateRequest $request)
    {

        $data = $request->validated();
        $name = $data["name"];
        $email = $data["email"];
        $existingRecord = $this->studentRepo->findByEmail( $email );
        if ($existingRecord) {
            $errorObject = new stdClass();
            $errorObject->message = "Validation Error";
            $errorObject->errors = [
                "email" => ['Email Already exist']
            ];

            return response()->json(

                $errorObject

                ,
                422

            );
        }
        $record = $this->studentRepo->create($name, $email);
        return response()->json($record);

    }
}