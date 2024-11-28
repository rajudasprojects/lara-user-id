<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CreateUser;

class CreateUserController extends Controller
{
    // Show all customers
    public function userdetails()
    {
        //$customers = CreateUser::all();
        return view('createusers.userdt',['users'=>CreateUser::get()]);
    }

    public function create()
    {
        //$customers = CreateUser::all();
        return view('createusers.create');
    }

    public function createUser(Request $request){
        //dd($request->all());
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'image' => 'required|mimes:jpeg,jpg,png,gif|max:10000'
        ]);

        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('userimages'),$imageName);

        $userCreate = new CreateUser;
        $userCreate->image = $imageName;
        $userCreate->name = $request->name;
        $userCreate->email = $request->email;
        $userCreate->phone = $request->phone;
        $userCreate->address = $request->address;

        $userCreate->save();
        //return back()->withSuccess('User created successfully!!');
        return redirect()->route('user.detail')->withSuccess('User Updated successfully!!');
    }

    public function useredit($id){
        $useredit = CreateUser::where('id',$id)->first();
        return view('createusers.useredit',['useredit'=>$useredit]);
    }

    public function userupdate(Request $request, $id){
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'image' => 'nullable|mimes:jpeg,jpg,png,gif|max:10000'
        ]);
        $userEdit = CreateUser::where('id',$id)->first();
        if(isset($request->image)){
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('userimages'),$imageName);
            $userEdit->image = $imageName;
        }

        $userEdit->name = $request->name;
        $userEdit->email = $request->email;
        $userEdit->phone = $request->phone;
        $userEdit->address = $request->address;

        $userEdit->save();
        //return back()->withSuccess('User Updated successfully!!');
        return redirect()->route('user.detail')->withSuccess('User Updated successfully!!');
    }

    public function destroy($id){
        $userdelete = CreateUser::where('id',$id)->first();
        $userdelete->delete();
        return back()->withSuccess('User deleted successfully!!');
    }

}
