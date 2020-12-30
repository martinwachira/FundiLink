<?php

namespace App\Http\Controllers;


use App\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

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

    public function loginEmp(Request $req)
    {
        $emp = Employee::all();

        $this->validate($req, [
                'email' => ['required', 'string', 'email'],
                'password' => ['required'],
            ]);

        if(Auth::attempt(['email'=>$req->email,'password'=>$req->password])){
            return 'logged in';
        }
        return 'error';



        // $credentials = [
        //     'email' => $req->email,
        //     'password' => $req->password
        // ];
 
        // if (Auth::attempt($credentials)) {
        //     // $token = auth()->user()->createToken('TutsForWeb')->accessToken;
        //     $token = $emp->createToken('FundiLink');
        //     return response()->json(['token' => $token], 200);
        // } else {
        //     return response()->json(['error' => 'Unauthorised'], 401);
        // }

        // $this->validate($req, [
        //     'email' => ['required', 'string', 'email'],
        //     'password' => ['required'],
        // ]);
        // $cred = request(['email','password']);
        // if(!Auth::attempt($cred)){
        //     return response()->json([
        //         'errors' => [
        //             'email'=>['error']
        //         ]
        //         ], 422);
        // }
        // $emp = $req->Employee::all();
        // $tokenResult = $emp->createToken('Personal Access Token');
        // $token = $tokenResult->token;
        // if ($req->remember_me){
        //     $token->expires_at = Carbon::now()->addWeeks(1);
        // }
        // $token->save();
        // return response()->json([
        //     'data' => $emp,
        //     'access_token' => $tokenResult->accessToken,
        //     'token_type' => 'Bearer',
        //     'expires_at' => Carbon::parse(
        //         $tokenResult->token->expires_at
        //     )->toDateTimeString()
        // ]);
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
            "password" => bcrypt($request->password),
            "description" => $request->description,
            "designation" => $request->designation
        );

        $user_status = Employee::where("email", $request->email)->first();

        if (!is_null($user_status)) {
            return response()->json(["status" => "failed", "success" => false, "message" => "Sorry! email is already registered"]);
        }

        $user = Employee::create($employeeData);

        // $token = $user->createToken('FundiLink')->accessToken;

        if(!is_null($user)) {
            // return response()->json(['token'=>$token, "status" => $this->status, "success" => true, "message" => "Account created successfully", "data" => $user], 200);
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
