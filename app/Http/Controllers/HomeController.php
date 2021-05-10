<?php

namespace App\Http\Controllers;
use App\Models\User;
use Hash;
use Auth;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::user()->userrole_id == '2') {
            return view('home');
        }else{

        return view('home');
        }
    }

    public function profiledata()
    {
        if (Auth::user()->userrole_id == '2') {
            return view('home');
        }else{
        return view('profile');
        }
        
    }

    public function userindex(Request $request)
    {
        $userdata = User::select('*')->orderby('id','DESC')->get();

        if (Auth::user()->userrole_id == '2') {
            return view('home');
        }else{

        return view('user',compact('userdata'));
        }

    }

    public function usercreate()
    {
        return view('usercreate');
    }

    public function edit($id){

        
            $item = User::find($id);
            $title='Admin Portal';
            return view('edit-users',compact('item','title'));
    }

    public function store(Request $request){
        //dd('Hello register user');
        $items = new User;
        
        $items->name = $request->name;
        $items->email = $request->email;
        $items->mobile = $request->mobile;
        $items->email_verified_at = date('Y-m-d h:i:s');
        // $file = $request->file('profile_image');
        // if ($file) {
        //     $filename = $file->getClientOriginalName();
        //     $directory = 'public/images/';
        //     $splitName = explode('.', $filename, 2);
        //     $date = new DateTime("now");
        //     $strip = $date->format('YmdHis');
        //     $path = $directory.$splitName[0].$strip.'.'.$splitName[1];
        //     $storename = $splitName[0].$strip.'.'.$splitName[1];
        //     $file->storeAs($directory,  $storename ,'local');
        //     //dd($name);
        //     $items->profile_image = $storename; 
        // }
        $items->password = Hash::make($request->password);
        // if ($request->password == $request->password_confirmation) {
        //     $items->email = $request->email;
        // }else{
        //     return back();
        // };
        $items->save();
        return redirect('user/index');
    }

    public function update(Request $request, $id){
        //dd('Hello register user');
        $items = User::find($id);
        
        $items->name = $request->name;
        $items->email = $request->email;
        $items->mobile = $request->mobile;
        // $file = $request->file('profile_image');
        // if ($file) {
        //     $filename = $file->getClientOriginalName();
        //     $directory = 'public/images/';
        //     $splitName = explode('.', $filename, 2);
        //     $date = new DateTime("now");
        //     $strip = $date->format('YmdHis');
        //     $path = $directory.$splitName[0].$strip.'.'.$splitName[1];
        //     $storename = $splitName[0].$strip.'.'.$splitName[1];
        //     $file->storeAs($directory,  $storename ,'local');
        //     //dd($name);
        //     $items->profile_image = $storename; 
        // }
        if ($items->email != $request->email) {
            $this->validate($request,[
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            ]);
            $items->email = $request->email;
        }
        $items->save();
        return redirect('user/index');
        //return redirect('/edit-users/$id');
    }

    public function profileupdate(Request $request,$id)
    {
        $items = User::find($id);

        $items->name = $request->name;
        $items->email = $request->email;
        $items->mobile = $request->mobile;

        $file = $request->file('profile');
        if ($file) {
            $filename = $file->getClientOriginalName();
            $directory = 'public/images/';
            $splitName = explode('.', $filename, 2);
            $date = new DateTime("now");
            $strip = $date->format('YmdHis');
            $path = $directory.$splitName[0].$strip.'.'.$splitName[1];
            $storename = $splitName[0].$strip.'.'.$splitName[1];
            $file->storeAs($directory,  $storename ,'local');
            //dd($name);
            $items->profile = $storename; 
        }

        $items->save();
        return back();
    }

    public function delete(Request $request,$id)
    {
        $user = User::find($id)->delete();

        if ($user == true) {
            return redirect('user/index');
        }


    }
}
