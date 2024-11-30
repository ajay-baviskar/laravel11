<?php
namespace App\Payment;

use App\Models\Payment as ModelsPayment;
use Illuminate\Http\Request;

class Payment
{
 function getAllPaymentData()
 {
    $getPaymentData = ModelsPayment::all();
    return $getPaymentData;

 }

 function getDataById($id)
 {
    $getDataById = ModelsPayment::findOrfail($id);
    return $getDataById;

 }

 function storePaymentData(array $data)
 {
    $storePaymentData = ModelsPayment::create($data);
    return $storePaymentData;
 }


 function UpdateDataById($id, array $data)
 {
    $updateData = ModelsPayment::findOrFail($id);
    $updateData->update($data);
    return $updateData;
 }


 function deleteDataById($id)
 {
    $deletedById = ModelsPayment::findOrFail($id);
    $deletedById->delete($id);
    return $deletedById;
 }
}
