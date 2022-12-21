<?php

namespace App\Http\Controllers;

use App\Models\District;
use Flasher\Prime\FlasherInterface;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function index (){
        $users = DB::table('users')
                    ->join('districts', 'users.district', '=', 'districts.id')
                    ->select('users.*', 'districts.name as district',)
                    ->whereNot('users.id', Auth::user()->id)
                    ->get();
        return view('admin.users.index', compact('users'));
    }

    public function create (){
        $districts = District::get();
        return view('admin.users.create', compact('districts'));
    }

    public function store (Request $request, FlasherInterface $flasherInterface) {

        $this->validate($request, [
            'first_name'    =>  'required',
            'last_name'     =>  'required',
            'email'         =>  'required|unique:users,email',
            'phone_number'  =>  'required|min:10',
            'district'      =>  'required'
        ]);

        $password = Str::random(10);
        $user = new User();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->phone_number = $request->phone_number;
        $user->district = $request->district;
        $user->role = 'data-clerk';
        $user->password = Hash::make($password);

        $save = $user->save();

        if($save) {
            // alert
            $flasherInterface->addSuccess('User saved successfully');

            //send email with password to user
            return redirect()->back();
        }
    }

    public function edit ($id) {
        $user = User::find($id);
        $districts = District::get();
        return view('admin.users.edit', compact('user', 'districts'));
    }

    public function update (Request $request, $id, FlasherInterface $flasherInterface) {

        $this->validate($request, [
            'first_name'    =>  'required',
            'last_name'     =>  'required',
            'email'         =>  'required',
            'phone_number'  =>  'required|min:10',
            'district'      =>  'required'
        ]);

        $user = User::find($id);
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->phone_number = $request->phone_number;
        $user->district = $request->district;
        $user->role = 'data-clerk';

        $save = $user->save();

        if($save) {
            // alert
            $flasherInterface->addSuccess('User updated successfully');

            //send email with password to user
            return redirect()->route('users.index');
        }
    }

    public function destroy (Request $request, FlasherInterface $flasherInterface) {

        $delete = User::find($request->id)->delete();

        if($delete) {
            // alert
            $flasherInterface->addSuccess('User deleted successfully');

            return redirect()->back();
        }
    }

}
