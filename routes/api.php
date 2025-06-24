<?php

use App\Http\Controllers\Api\ApiHomeController;
use App\Http\Middleware\Cors;
Route::get("/", [ApiHomeController::class, "index"])->middleware(Cors::class);

Route::get("/hello/{name}", [ApiHomeController::class, "sayHello"]);
Route::post("/multiply", [ApiHomeController::class, "multiply"]);
Route::post("/calculate-tax", [ApiHomeController::class, "calculateTax"]);
Route::post("/simpleInt", [ApiHomeController::class, "simpleInterest"]);
