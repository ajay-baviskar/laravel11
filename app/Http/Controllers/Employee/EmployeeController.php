<?php

namespace App\Http\Controllers\Employee;

use App\Employee\Employee;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

class EmployeeController extends Controller
{
    //
    protected Employee $employee;
    function __construct(Employee $employee)
    {
        $this->employee = $employee;
    }

    function getData()
    {
      $data =  $this->employee->getAllEmps();
      return Response()->json(["code"=>200,"status"=>true,"data"=>$data]);

    }

    function insertEmp(Request $request)
    {
        try {
            $data = $request->validate([
                "emp_id"=>"required|integer",
                "name"=>"required|string",
                "address"=>"required|string",
                "mob_no"=>"required|string"

            ]);
          $inseredData =  $this->employee->insertEmpData( $data);

          return Response()->json(["code"=>200,"status"=>true,"data"=>$inseredData]);
        } catch (ValidationException $error) {
            return Response()->json(["code"=>401,"status"=>false,"msg"=>$error->errors()]);

        }

    }
}
