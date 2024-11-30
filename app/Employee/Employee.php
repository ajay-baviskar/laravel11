<?php
namespace App\Employee;

use App\Models\Employee as ModelsEmployee;

class Employee
{

    function getAllEmps()
    {
        $getAllEmp = ModelsEmployee::all();
        return $getAllEmp;
    }

    function insertEmpData(array $data)
    {
        $dataInsert = ModelsEmployee::create($data);
        return $dataInsert;
    }

    function getDataById($id)
    {
        $getDataById = ModelsEmployee::find($id);
        return $getDataById;
    }

    function updateDataById($id, array $data)
    {
        $updateDataByid = ModelsEmployee::find($id);
        $updateDataByid->update($data);
    }

    function deleteDataById($id)
    {
        $deleteDataById = ModelsEmployee::findOrFail($id);
        $deleteDataById->delete($id);

    }

}
