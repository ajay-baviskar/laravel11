<?php

use App\Http\Controllers\Employee\EmployeeController;
use App\Http\Controllers\googleAuthController;
use App\Http\Controllers\Payment\PaymentController;
use App\Http\Controllers\PostController;
use Illuminate\Http\Request;
use Illuminate\Routing\RouteRegistrar;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::apiResource('posts', PostController::class);


Route::get('get_all_data', [PaymentController::class, "getAllData"]);
Route::get('get_data_by_id/{id}', [PaymentController::class, "GetById"]);
Route::post('insert_payement_data', action: [PaymentController::class, 'insertPaymentData']);

Route::post('update_data/{id}', [PaymentController::class, 'dataUpdate']);

Route::post('delete_data/{id}', [PaymentController::class, "deleteData"]);


Route::get('get-ips', [PaymentController::class, "getIPv4AddressWithGeo"]);


Route::get('/debug-ip', function () {
    $output = shell_exec('ipconfig');
    return response()->json(data: ['output' => nl2br($output)]);
});



Route::post('insert-data', [EmployeeController::class, "insertEmp"]);

Route::get("get-all-data", [EmployeeController::class, "getData"]);


ROute::get('collection', function () {
    $collection = collect(['taylor', 'abigail', null])->map(function (?string $name) {
        return strtoupper($name);
    })->reject(function (string $name) {
        return empty($name);
    });
});


Route::get('/sendMail', function () {
    $data = ["name" => "Ajay Baviskar"];

    Mail::send('email', $data, function ($msg) {
        $msg->to('ajay.baviskar88@gmail.com', "Advance Laravel")
            ->subject("Advance Laravel");
            // ->setBody("Hi, I am Software Enginner");
    });

    echo "mail sent";
});
