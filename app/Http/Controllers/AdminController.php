<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\Rule;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $admins = User::all();
        return view('admin.AdminCrud.index')->with('admins' , $admins);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.AdminCrud.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users|email',
            'age' => 'required|before:01/01/2005',
            'address' => 'required',
            'phone' => 'required',
            'password' =>'required|min:8',
        ]);

        $admin = new User();
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->age = $request->age;
        $admin->address = $request->address;
        $admin->phone = $request->phone;
        $admin->password = $request->password;
        $admin->role_as = '1';
        $admin->save();
        return redirect('admins')->with('message' , 'New Admin has been added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //no profile needed, breeze has built in profiles
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $admin = User::find($id);
        return view('admin.AdminCrud.edit')->with('admin' , $admin);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $email_rule = $id ? ',' . $id . ',id' : '';
        $request->validate([
            'name' => 'required',
            'email' => 'required|string|email|max:255|unique:users,email' . $email_rule,
            'age' => 'required|before:01/01/2005',
            'address' => 'required',
            'phone' => 'required',
            'password' =>'required|min:8',
        ]);

        $admin = new User();
        $admin = User::find($id);
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password = Hash::make($request->password);
        $admin->age = $request->age;
        $admin->address = $request->address;
        $admin->phone = $request->phone;
        $admin->update();
        return redirect('admins')->with('message' , 'Admin has been updated successfully!');;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::destroy($id);
        return redirect()->back()->with('message' , 'Admin has been deleted successfully!');;
    }

    public function deleting(string $id){
        $admin = User::find($id);
        $admin->forcedelete();
        return redirect()->back()->with('message' , 'Admin has been deleted successfully!');;
    }

    public function trashedAdmins()
    {
        $admins = User::onlyTrashed()->get();
        return view('admin.AdminCrud.trashedAdmins')->with('admins',$admins);
    }

    public function restoreAdmin(string $id)
    {
        User::whereId($id)->restore();
        return redirect()->back()->with('message' , 'Admin has been restored successfully!');;
    }

    public function restoreAllAdmins()
    {
        User::onlyTrashed()->restore();
        return redirect()->back()->with('message' , 'All Admins have been restored successfully!');;
    }

}
