<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ServiceProvider;

class ServiceProviderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $status = 200;
    
    public function index()
    {
        $sprovider = ServiceProvider::all();
        return response()->json($sprovider);
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
        // $newProvider = new ServiceProvider();
        // $newProvider->providerName = $request->providerName;
        // $newProvider->email = $request->email;
        // $newProvider->password = $request->password;
        // $newProvider->description = $request->description;

        // $newProvider -> save();
        // return response('Service requester added successfully', 200);

        $employerData = array(
            "providerName" => $request->providerName,
            "email" => $request->email,
            "password" => md5($request->password),
            "description" => $request->description
        );

        $employer = ServiceProvider::where("email", $request->email)->first();

        if (!is_null($employer)) {
            return response()->json(["status" => "failed", "success" => false, "message" => "Whoops! email already registered"]);
        }

        $user = ServiceProvider::create($employerData);

        if(!is_null($user)) {
            return response()->json(["status" => $this->status, "success" => true, "message" => "Account created successfully", "data" => $user]);
        }

        else {
            return response()->json(["status" => "failed", "success" => false, "message" => "Registration failed"]);
        }
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
