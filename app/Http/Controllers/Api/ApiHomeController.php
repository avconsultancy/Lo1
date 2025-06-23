<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\MultiplyTwoNumbersRequest;
use App\Http\Requests\TaxCalculatorRequest;
use App\Http\Requests\SimpleInterestRequest;
use App\Services\TaxCalculatorService;
use App\Services\SimpleInterestService;


use stdClass;
class ApiHomeController extends Controller
{
    private $taxCalculatorService;
    private $simpleInterestService;

    public function __construct(
        SimpleInterestService $simpleInterestService,
        TaxCalculatorService $taxCalculatorService
    ) {
        $this->simpleInterestService = $simpleInterestService;
        $this->taxCalculatorService = $taxCalculatorService;
    }

    public function index()
    {
        $obj = new stdClass();
        $obj->message = "Hello World";
        return response()->json($obj);
    }
    public function sayHello($name)
    {
        $obj = new stdClass();
        if ($name == "pankaj") {
            $obj->message = "Hello Backend Developer: " . $name;
        } else {
            $obj->message = "Hello Frontend Developer: " . $name;
        }
        return response()->json($obj);
    }
    public function multiply(MultiplyTwoNumbersRequest $request)
    {
        $data = $request->validated();
        $n1 = $data["n1"];
        $n2 = $data["n2"];

        $obj = new stdClass();
        $obj->message = "Result: " . ($n1 * $n2);
        return response()->json($obj);
    }
    public function calculateTax(TaxCalculatorRequest $request)
    {
        $data = $request->validated();
        $income = $data["income"];

        $obj = new stdClass();
        $obj->message = "Tax is : " . $this->taxCalculatorService->calculateTax($income);
        return response()->json($obj);
    }


    public function simpleInterest(SimpleInterestRequest $request)
    {
        $data = $request->validated();

        $principal = $data['principal'];
        $rate = $data['rate'];
        $time = $data['time'];

        $interest = $this->simpleInterestService->calculateInt($principal, $rate, $time);

        $obj = new stdClass();
        $obj->message = "Simple Interest is: " . $interest;

        return response()->json($obj);
    }




}
