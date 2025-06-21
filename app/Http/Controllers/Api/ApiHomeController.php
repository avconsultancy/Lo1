<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\MultiplyTwoNumbersRequest;
use App\Http\Requests\TaxCalculatorRequest;
use App\Services\TaxCalculatorService;
use stdClass;
class ApiHomeController extends Controller
{
    private $taxCalculatorService;
    public function __construct(TaxCalculatorService $taxCalculatorService) {
        $this->taxCalculatorService = $taxCalculatorService;    
    }
    public function index()
    {
        $obj = new stdClass();
        $obj->message = "Hello2 World";
        return response()->json($obj);
    }
    public function sayHello($name)
    {
        $obj = new stdClass();
        $obj->message = "Hello1 " . $name;
        return response()->json($obj);
    }
    public function multiply(MultiplyTwoNumbersRequest $request)
    {
        $data=$request->validated();
        $n1=$data["n1"];
        $n2=$data["n2"];
        
        $obj = new stdClass();
        $obj->message = "Result: " . ($n1*$n2);
        return response()->json($obj);
    }
    public function calculateTax(TaxCalculatorRequest $request)
    {
        $data=$request->validated();
        $income=$data["income"];
        
        $obj = new stdClass();
        $obj->message = "Tax is : " .$this->taxCalculatorService->calculateTax($income);
        return response()->json($obj);
    }
    

}
