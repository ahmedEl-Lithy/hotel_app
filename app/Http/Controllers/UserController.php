<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User as User;
use App\Reservation as Reservation;

class UserController extends Controller
{
    public function __construct( User $user )
    {
        $this->user = $user;
    }

    public function index()
    {
        $data = [];
        $data['users'] = $this->user->all();
        return view('client/index', $data);
    }

    public function export()
    {
        $data = [];
        $data['users'] = $this->user->all();
        header('Content-Disposition: attachment;filename=export.xls');
        return view('client/export', $data);
    }

    public function create()
    {
        return view('client/create');
    }

    public function newClient( Request $request, User $user )
    {
        $data = [];
        $data['first_name'] = $request->input('first_name');
        $data['last_name'] = $request->input('last_name');
        $data['address'] = $request->input('address');
        $data['city'] = $request->input('city');
        $data['email'] = $request->input('email');
        $data['password'] = $request->input('password');

        if( $request->isMethod('post') )
        {
            $this->validate(
                $request,
                [
                    'first_name' => 'required',
                    'last_name' => 'required',
                    'address' => 'required',
                    'city' => 'required',
                    'email' => 'required',
                    'password' => 'required',
                ]
            );

            $user->insert($data);
            return redirect('clients');
        }
        $data['modify'] = 0;
        return view('client/form', $data);
    }

    public function show($client_id, Request $request)
    {
        $data = []; $data['client_id'] = $client_id;
        $data['modify'] = 1;
        $user_data = $this->user->find($client_id);
        $data['first_name'] = $user_data->first_name;
        $data['last_name'] = $user_data->last_name;
        $data['address'] = $user_data->address;
        $data['city'] = $user_data->city;
        $data['email'] = $user_data->email;
        $data['password'] = $user_data->password;

        return view('client/form', $data);
    }

    public function modify( Request $request, $client_id, User $user )
    {
        $data = [];
        $data['first_name'] = $request->input('first_name');
        $data['last_name'] = $request->input('last_name');
        $data['address'] = $request->input('address');
        $data['city'] = $request->input('city');
        $data['email'] = $request->input('email');
        $data['password'] = $request->input('password');

        if( $request->isMethod('post') )
        {
            $this->validate(
                $request,
                [
                    'first_name' => 'required',
                    'last_name' => 'required',
                    'address' => 'required',
                    'city' => 'required',
                    'email' => 'required',
                    'password' => 'required',
                ]
            );

            $user_data = $this->user->find($client_id);
            $user_data->first_name = $request->input('first_name');
            $user_data->last_name = $request->input('last_name');
            $user_data->address = $request->input('address');
            $user_data->city = $request->input('city');
            $user_data->email = $request->input('email');
            $user_data->password = $request->input('password');
            $user_data->save();

            return redirect('clients');
        }
        return view('client/form', $data);
    }

    public function viewUsers()
    {
        $data = [];
        $data['users'] = $this->user->all();
        return view('admin/clients', $data);
    }

    public function dashboard()
    {
        $data = [];
        $data['users'] = $this->user->all();
        $data['reservations'] = Reservation::all();
        return view('admin/dashboard', $data);
    }

    public function deleteClient($id){
        $data = $this->user->where('id',$id)->delete();
        return back();
    }

    public function profile($id)
    {
        $data = [];
        $user_data = $this->user->find($id);
        $data['id'] = $id;
        $data['first_name'] = $user_data->first_name;
        $data['last_name'] = $user_data->last_name;
        $data['address'] = $user_data->address;
        $data['city'] = $user_data->city;
        $data['email'] = $user_data->email;
        $data['password'] = $user_data->password;
        return view('client/profile', $data);
    }

}
