<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Yajra\Datatables\Datatables;

use App\User;

use Illuminate\Support\Str;

class DatatablesController extends Controller
{
    public function index(){
        return view('datatables/users');
    }

    public function data(Request $request){
        $user = User::select(['id','name', 'email','status']);


        return Datatables::of($user)
        ->filter(function ($query) use ($request) {
            
            if ($request->has('name')) {
                $query->where('name', 'like', "%{$request->get('name')}%")
                    ->orWhere('email', 'like', "%{$request->get('email')}%");
            }
        })
        ->addColumn('action', function($item){
            return '
            <a href="'.route('users.edit', ['id' => $item->id]).'" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a> 
            <form onsubmit="return confirm(\'Delete this user permanently?\')" class="d-inline" action="'.route('users.destroy', ['id' => $item->id ]) . '" method="POST">
                <input type="hidden" name="_token" value="'.csrf_token().'"/>
                <input type="hidden" name="_method" value="DELETE">
                
                <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
            </form>
        ';
        })
        ->make(true);
    }
}
