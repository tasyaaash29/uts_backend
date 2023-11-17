<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employees;                                                                                                                 

class EmployeesController extends Controller
{
    // index method
    public function index(){
        $employees = Employees::all();

        // jika data kosong
        if($employees->isEmpty()){
            $data =[
                'message' => 'resource not found',
            ];

            return response()->json($data, 200);
        }
        $data = [
            'message' => 'Gett all resources',
            'data' => $employees
        ];

        return response()->json($data, 200);
    }

    public function store(Request $request){
        $validateddata = $request->validate([
            'name' => 'required',
            'gender' => 'required',
            'phone' => 'required|numeric',
            'address' => 'required',
            'email' => 'required|email',
            'status' => 'required',
            'hired_on' => 'required|date',
        ]);

        $employees = Employees::create($validateddata);

        $data = [
            'message' => 'Resource Is Added Succesfully',
            'data' => $employees,
        ];

        return response()->json($data, 201);
    }
    
    public function show($id){
        $employee = Employees::find($id);

        // jika data kosong
        if(!$employee){
            $data =[
                'message' => 'Resource not found',
            ];

            return response()->json($data, 200);
        }
        $data = [
            'message' => 'Get detail resource',
            'data' => $employee,
        ];

        return response()->json($data, 200);
    }

    // update method
    public function update(Request $request, $id){
        $employees = Employees::find($id);

        // jika data kosong
        if(!$employees){
            $data =[
                'message' => 'Resource not found',
            ];

            return response()->json($data, 404);
        }


        // jika data ada
        $employees->update([
            'name' => $request->name ?? $employees->name,
            'gender' => $request->gender ?? $employees->gender,
            'phone' => $request->phone ?? $employees->phone,
            'address' => $request->address ?? $employees->address,
            'email' => $request->email ?? $employees->email,
            'status' => $request->status ?? $employees->status,
            'hired_on' => $request->hired_on ?? $employees->hired_on,
        ]);

        $data = [
            'message' => 'Resource Is Updated Succesfully',
            'data' => $employees,
        ];

        return response()->json($data, 200);
    }

    // delete method
    public function destroy($id){
        $employees = Employees::find($id);

        // jika data kosong
        if(!$employees){
            $data =[
                'message' => 'Resource not found',
            ];

            return response()->json($data, 404);
        }

        $employees->delete();

        $data = [
            'message' => 'Resource Is Deleted Succesfully',
            'data' => $employees,
        ];

        return response()->json($data, 200);
    }

    // search method
    public function search($name){
        $employees = Employees::where('name', 'like', '%'.$name.'%')->get();

        // jika data kosong
        if($employees->isEmpty()){
            $data =[
                'message' => 'Resource not found',
            ];

            return response()->json($data, 404);
        }

        $data = [
            'message' => 'Get search resource',
            'data' => $employees,
        ];

        return response()->json($data, 200);
    }

    // active method
    public function active(){
        $employees = Employees::where('status', 'active')->get();

        // jika data kosong
        if($employees->isEmpty()){
            $data =[
                'message' => 'Resource not found',
            ];

            return response()->json($data, 404);
        }

        $data = [
            'message' => 'Get active resource',
            'data' => $employees,
        ];

        return response()->json($data, 200);
    }

    // inactive method
    public function inactive(){
        $employees = Employees::where('status', 'inactive')->get();

        // jika data kosong
        if($employees->isEmpty()){
            $data =[
                'message' => 'Resource not found',
            ];

            return response()->json($data, 404);
        }

        $data = [
            'message' => 'Get inactive resource',
            'data' => $employees,
        ];

        return response()->json($data, 200);
    }

    // terminated method
    public function terminated(){
        $employees = Employees::where('status', 'terminated')->get();

        // jika data kosong
        if($employees->isEmpty()){
            $data =[
                'message' => 'Resource not found',
            ];

            return response()->json($data, 404);
        }

        $data = [
            'message' => 'Get terminated resource',
            'data' => $employees,
        ];

        return response()->json($data, 200);
    }
}