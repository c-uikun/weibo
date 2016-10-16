<?php

namespace App\Http\Controllers\Admins;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use DB;

class AdController extends Controller
{
    public function index()
    {
    	$data = DB::table('advertising')->get();
    	return view('admins.ad.ad', ['data'=>$data]);
    }

    public function edit($id,$lock)
    {
        if($lock == '0'){
            $res = DB::table('advertising')->where('id', $id)->update(['lock' => 1]);
            return $res;
        }elseif($lock == '1'){
            $res = DB::table('advertising')->where('id', $id)->update(['lock' => 0]);
            return $res;
        }
    }
}
