<?php

use App\Http\Controllers\refrescoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get("/refresco", [refrescoController::class,"index"]);
Route::get("/refresco/{id}", [refrescoController::class, "show"]);

Route::post("/refresco", [refrescoController::class,"store"]);
Route::patch("/refresco/{id}", [refrescoController::class,"update"]);

Route::delete("/refresco/{id}", [refrescoController::class, "destroy"]);


