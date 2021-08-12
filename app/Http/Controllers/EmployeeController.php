<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Designation;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use App\Mail\UserRegistration;
use Illuminate\Validation\Rule;

use DataTables;


class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if ($request->ajax()) {

    
            $data = User::join('designations','designations.id','=','users.designation_id')->select('users.id','users.name','users.email','designations.name as designation')->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('view', function($row){     
                        $btn1 = '<a href="/users/'.$row->id.'" class="btn btn-primary btn-sm">View</a>';    
                        return $btn1;
                    })
                    ->addColumn('edit', function($row){     
                        $btn2 = '<a href="/users/'.$row->id.'/edit" class="btn btn-info btn-sm">Edit</a>'; 
                        return $btn2;
                    })
                    ->addColumn('delete', function($row){     
                        $btn3 = '<a class="btn btn-danger btn-sm" onClick="deleteUser('.$row->id.')">Delete</a> ';
                        return $btn3;
                    })
                    ->rawColumns(['view','edit','delete'])                  
                    ->make(true);
         }
      
        return view('employee.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $designations=Designation::all();
        return view('employee.create',compact('designations'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // dd($request->all());
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'image' => 'nullable|file|mimes:jpg,bmp,png|max:5000',
            'designation' => 'required|exists:designations,id',
        ]);

        if($request->file('image'))
            $path = Storage::putFile('user', $request->file('image'));

        $random = str_shuffle('abcdefghjklmnopqrstuvwxyzABCDEFGHJKLMNOPQRSTUVWXYZ234567890!$%^&!$%^&');
        $password = substr($random, 0, 8);
        $user = new User();
        $user->name = $request->name;
        $user->email =$request->email;
        $user->password =Hash::make($password);
        $user->designation_id=$request->designation;
        $user->image =isset($request->image)?$path:'';
        $user->save();

        Mail::to($user->email)->send(new UserRegistration($user->name,$user->email,$password));



        return redirect()->back()->with('success', 'Successfully Saved');  
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user=User::with('designation')->find($id);

        return view('employee.view',compact('user'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user=User::find($id);
        $designations=Designation::all();


        return view('employee.editemployee',compact('user','designations'));

        
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
        
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'.$id,
            'image' => 'nullable|file|mimes:jpg,bmp,png|max:5000',
            'designation' => 'required|exists:designations,id',
        ]);

        if($request->file('image'))
            $path = Storage::putFile('user', $request->file('image'));

        $user = User::find($id);
        $user->name = $request->name;
        $user->email =$request->email;
        $user->designation_id=$request->designation;
        $user->image =isset($request->image)?$path:'';
        $user->save();

        return redirect('users')->with('success', 'Successfully Updated');  

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }

    public function deleteUser($id){
        
        $user=User::find($id);
        $user->delete();
        return response()->json(["message" => 'Success']);
    }


   
}
