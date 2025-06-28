<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmpCreateRequest;
use App\Http\Requests\MultiplyTwoNumbersRequest;
use App\Http\Requests\TaxCalculatorRequest;
use App\Http\Requests\SimpleInterestRequest;
use App\Repo\EmpRepo;
use App\Services\TaxCalculatorService;
use App\Services\SimpleInterestService;


use stdClass;
class ApiEmpController extends Controller
{
    private $empRepo;
    public function __construct(
        EmpRepo $empRepo
    ) {
        $this->empRepo = $empRepo;
    }


    public function store(EmpCreateRequest $request)
    {
        $data = $request->validated();
        $name = $data["name"];
        $email = $data["email"];
        $existingRecord = $this->empRepo->findByEmail($email);
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
        $record = $this->empRepo->create($name, $email);
        return response()->json($record);
    }


    public function getUserList()
    {
        $getRecords = $this->empRepo->find();
        return response()->json($getRecords);
    }


    public function deleteUser($email)
    {
        // $data = $request->validated();
        // // $name = $data["name"];
        // $email = $data["email"];
        $existingRecord = $this->empRepo->findByEmail($email);
        if (!$existingRecord) {
            $errorObject = new stdClass();
            $errorObject->message = "Validation Error";
            $errorObject->errors =
            [

                "email" => ['User Is Not Found']
            ];

            return response()->json(

                $errorObject

                ,
                404

            );
        }
        $record = $this->empRepo->delete($existingRecord->id);
        return response()->json($record);
    }

}
