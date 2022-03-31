<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles=Role::all();
        return view('Admin.User.AddUser',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //store the users data
    public function store(Request $request)
    {
        $validateData=$request->validate([
            'firstname'=>'required',
            'lastname'=>'required',
            'email'=>'required|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix|unique:users',
            'password'=>'required||min:5|regex:/^(?=.*\d)(?=.*[!@#$%^&*])(?=.*[a-z])(?=.*[A-Z]).{8,}$/',
            'status'=>'required'
            
        ],[
            'firstname.required'=>'FirstName is Required',
            'lastname.required'=>'LastName  is Required',
            'email.required'=>'Email is Required',
            'email.regex'=>'Enter email in correct order',
            'password.required'=>'Password is Required',
            'password.regex'=>"Password must contain atleast one symbol, one capital letter, one integer and Maximum length must be 5 character",
            'status.required'=>'Status is Required'
            
        ]);
        if($validateData)
        {
            $fname=$request->firstname;
            $lname=$request->lastname;
            $email=$request->email;
            $password=$request->password;
            $status=$request->status;
            $role=$request->role;

            $usermanage=new User();
            $usermanage->firstname=$fname;
            $usermanage->lastname=$lname;
            $usermanage->email=$email;
            $usermanage->password=Hash::make($request->password);
            $usermanage->status=$status;
            $usermanage->role=$role;
            // define veriable for data to display in mail.
            $data = ['fname' => $request->firstname,'lname' => $request->lastname,'email' => $request->email,'password' => $request->password];
            $user['to'] = $request->email;      // assign mail id to be send.

            // Mail function to send mail after successful registration .
            Mail::send('email.register',$data,function($message) use ($user){
            $message->to($user['to']);
            $message->subject('Registration Confirmed !');  // mail subject
            });
            if($usermanage->save())
            {
                return back()->with('success','User Data Added!!');
            }
            else {
                
                return back()->with('errMesg','Data not Added');
            }
        

        }
        else {
            
            return back()->with('errMsg','Uploading Error');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        
        $users=User::all();
        return view('Admin.User.UserList',['users'=>$users]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users=User::where('id',$id)->first();
        $selectedtype=Role::where('role-name',$users->role)->first();
        $roles = Role::all();
        return view('Admin.User.EditUser',compact('users','roles','selectedtype'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validateData=$request->validate([
            'firstname'=>'required',
            'lastname'=>'required',
            'email'=>'required|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix|unique:users,email'
        ],[
            'firstname.required'=>'FirstName is Required',
            'lastname.required'=>'LastName  is Required',
            'email.required'=>'Email is Required',
            'email.regex'=>'Enter email in correct order'
        ]);

        if($validateData){
            $fname=$request->firstname;
            $lname=$request->lastname;
            $email=$request->email;
            $role=$request->role;
            $status=$request->status;
            $userid=$request->userid;
            User::where('id',$userid)->update([
                'firstname'=>$request->firstname,
                'lastname'=>$request->lastname,
                'email'=>$request->email,
                'status'=>$request->status,
                'role'=>$request->role
            ]);
            //mail update
            $data = ['fname' => $request->firstname,'lname' => $request->lastname,'email' => $request->email,'password' => $request->password, 'role' =>$role , 'status' =>$status];
                $user['to'] = $request->email;

                Mail::send('email.update',$data,function($message) use ($user){
                $message->to($user['to']);
                $message->subject('Details Updated !');
                });
            return back()->with('success',"Details Added !");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        User::where('id',$request->aid)->delete();
        return back();
    }
}
