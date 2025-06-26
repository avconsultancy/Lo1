<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiEmpController;
use App\Http\Controllers\Api\ApiHomeController;
use App\Http\Middleware\Cors;

Route::get("/", [ApiHomeController::class, "index"])->middleware(Cors::class);

Route::get("/hello/{name}", [ApiHomeController::class, "sayHello"]);
Route::post("/multiply", [ApiHomeController::class, "multiply"]);
Route::post("/calculate-tax", [ApiHomeController::class, "calculateTax"]);
Route::post("/simpleInt", [ApiHomeController::class, "simpleInterest"]);
//
Route::post("/emp", [ApiEmpController::class, "store"]);

Route::get("/empList", [ApiEmpController::class, "getUserList"]);
Route::delete("/removeEmp/{email}", [ApiEmpController::class, "deleteUser"]);
