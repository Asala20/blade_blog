<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.UserCrud.index')->with('users' , $users);
    }

    public function create()
    {
        return view('admin.UserCrud.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users|email',
            'password' =>'required|min:8',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->age = $request->age;
        $user->address = $request->address;
        $user->phone = $request->phone;
        $user->password = Hash::make($request->password);
        $user->role_as = '0'; //its default value is 0, but just to make sure :)
        $user->save();
        return redirect('users')->with('message' , 'New user has been added successfully!');
    }

    public function destroy(string $id)
    {
        User::destroy($id);
        return redirect()->back()->with('message' , 'user has been moved to recycle bin successfully!');
    }

    public function deleting(string $id){
        $user = User::find($id);
        $user->forcedelete();
        return redirect()->back()->with('message' , 'user has been deleted successfully!');
    }

    public function trashedUsers()
    {
        $users = User::onlyTrashed()->get();
        return view('admin.UserCrud.trashedUsers')->with('users',$users);
    }

    public function restoreUser(string $id)
    {
        User::whereId($id)->restore();
        return redirect()->back()->with('message' , 'user has been restored successfully!');
    }

    public function restoreAllUsers()
    {
        User::onlyTrashed()->restore();
        return redirect()->back()->with('message' , 'all users have been restored successfully!');
    }
}
