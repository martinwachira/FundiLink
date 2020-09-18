<?php

namespace App\Http\Controllers;


use App\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $status = 200;

    public function index()
    {
        $emp = Employee::all();
        return response()->json($emp);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $newEmployee = new Employee();
        // $newEmployee->employeeName = $request->employeeName;
        // $newEmployee->email = $request->email;
        // $newEmployee->password = $request->password;
        // $newEmployee->description = $request->description;
        // $newEmployee->designation = $request->designation;

        $employeeData = array(
            "employeeName" => $request->employeeName,
            "email" => $request->email,
            "password" => md5($request->password),
            "description" => $request->description,
            "designation" => $request->designation
        );

        $user_status = Employee::where("email", $request->email)->first();

        if (!is_null($user_status)) {
            return response()->json(["status" => "failed", "success" => false, "message" => "Sorry! email is already registered"]);
        }

        $user = Employee::create($employeeData);

        if(!is_null($user)) {
            return response()->json(["status" => $this->status, "success" => true, "message" => "Account created successfully", "data" => $user]);
        }

        else {
            return response()->json(["status" => "failed", "success" => false, "message" => "Registration failed"]);
        }

        // $newEmployee->save();
        // return response('Employee added successfully', 200);

        // return ('Employee created, please update contact now');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
