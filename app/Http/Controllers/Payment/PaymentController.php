<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use App\Payment\Payment;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

use function Illuminate\Log\log;

class PaymentController extends Controller
{
    //
    protected Payment $Payment;
    function __construct(Payment $Payment)
    {
        $this->Payment = $Payment;
    }



    function getAllData()
    {
        $getAllData = $this->Payment->getAllPaymentData();
        return Response()->json(["code" => 200, "status" => true, "data" => $getAllData]);
    }

    function GetById($id)
    {
        $getDataById = $this->Payment->getDataById($id);
        return $getDataById;
    }


    function insertPaymentData(Request $request)
    {
        try {
            $data = $request->validate([
                "payment_name" => "string|required|max:256",
                "payment_method" => "required|string|max:256",
                'dt' => "required",
                'amount' => 'required'
            ]);
            $insertedData = $this->Payment->storePaymentData($data);
            return Response()->json(["code" => 201, "status" => true, "data" => $insertedData]);
        } catch (ValidationException $error) {
            return Response()->json([
                "code" => 404,
                "msg" => "",
                "error" => $error->errors()
            ]);
        } catch (\Exception $error) {
            return Response()->json(["code" => 500, "status" => false, 'error' => $error]);
        }
    }

    function dataUpdate($id, Request $request)
    {
        $data = $request->validate([
            "payment_name" => "string|required|max:256",
            "payment_method" => "required|string|max:256",
            'dt' => "required",
            'amount' => 'required'
        ]);
        $updateData = $this->Payment->UpdateDataById($id, $data);
        return Response()->json(["code" => 200, "status" => true, "data" => $updateData]);
    }


    function deleteData($id)
    {
        $deletedData = $this->Payment->deleteDataById($id);
        return Response()->json(["code" => 200, "status" => true, "data" => $deletedData]);
    }


    function getSystemIp()
    {
        // Try to get the server's public IP
        $serverIp = gethostbyname(gethostname());

        // Fallback to server IP environment variable
        if (!$serverIp || $serverIp === '127.0.0.1') {
            $serverIp = $_SERVER['SERVER_ADDR'] ?? '127.0.0.1';
        }

        return $serverIp;
    }


    // function getIPv4Address()
    // {
    //     // Execute `ipconfig` command and get the output
    //     $output = shell_exec('ipconfig');

    //     // Check if the output is not empty
    //     if ($output) {
    //         // Use regex to find the IPv4 Address
    //         if (preg_match_all('/IPv4 Address[^\:]*:\s*([\d\.]+)/', $output, $matches)) {
    //             // Return the first IPv4 address found
    //             return ["ip_address"=>$matches[1][1] ?? null];
    //         }
    //     }

    //     // Return null if no IPv4 address is found
    //     return null;
    // }


    // function getIPv4AddressWithGeo()
    // {
    //     // Execute `ipconfig` command and get the output
    //     $output = shell_exec('ipconfig');

    //     // Check if the output is not empty
    //     if ($output) {
    //         // Use regex to find the IPv4 Address
    //         if (preg_match_all('/IPv4 Address[^\:]*:\s*([\d\.]+)/', $output, $matches)) {
    //             // Get the first valid IPv4 address
    //             $ipv4Address = $matches[1][1] ?? null;

    //             if ($ipv4Address) {
    //                 // Fetch geolocation details for the IP address
    //                 $geoInfo = $this->getGeolocationForIP($ipv4Address);
    //                 return [
    //                     "ip_address" => $ipv4Address,
    //                     "geo_location" => $geoInfo
    //                 ];
    //             }
    //         }
    //     }

    //     // Return null if no IPv4 address is found
    //     return null;
    // }

    // function getGeolocationForIP($ipAddress)
    // {
    //     // Use a geolocation API to fetch details
    //     $apiUrl = "http://ip-api.com/json/$ipAddress";
    //     $response = @file_get_contents($apiUrl);

    //     if ($response) {
    //         $geoData = json_decode($response, true);
    //         return [
    //             "country" => $geoData['country'] ?? null,
    //             "region" => $geoData['regionName'] ?? null,
    //             "city" => $geoData['city'] ?? null,
    //             "latitude" => $geoData['lat'] ?? null,
    //             "longitude" => $geoData['lon'] ?? null,
    //             "isp" => $geoData['isp'] ?? null
    //         ];
    //     }

    //     return null;
    // }
}
