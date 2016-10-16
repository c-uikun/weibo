<?php

namespace App\Http\Controllers\Admins;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use DB;

class WeiboController extends Controller
{
    public function index()
    {
    	$db = DB::table('user_info')
    		// 俩表查询
            ->join('weibo', 'user_info.id', '=', 'weibo.user_id')
            ->select('user_info.nickname', 'weibo.*')
            // 分页
            ->orderBy('time', 'desc')
            ->paginate(10);
    	return view("admins.message.message", ["list"=>$db]);
    }

    public function doDel($id)
    {

        $res = DB::table('weibo_comment')->where('weibo_id', $id)->delete();

        $res = DB::table('keep')->where('weibo_id', $id)->delete();

        $res = DB::table('praise')->where('weibo_id', $id)->delete();

    	$uid = DB::table('weibo')
    		->where('id', $id)
    		->select('user_id')
            ->take(1)
            ->get();

        $res = DB::table('weibo')->where('id', $id)->delete();
		DB::table('user_info')->where('id', $uid[0]->user_id)->decrement('weibo');

    	return $res;

    }

    public function edit($id,$lock)
    {
    	if($lock == '0'){
    		$res = DB::table('weibo')->where('id', $id)->update(['lock' => 1]);
    		return $res;
    	}elseif($lock == '1'){
            $res = DB::table('weibo')->where('id', $id)->update(['lock' => 0]);
            return $res;
        }
    }

    public function show($id)
    {
        // weibo表内容
        $data = DB::table('weibo')->where('id', $id)->first();
        // dd($data);

        // weibo_comment内容 用户昵称
        $list = DB::table('weibo')
            ->where('weibo.id', $id)
            // 俩表查询
            ->join('weibo_comment', 'weibo_comment.weibo_id', '=', 'weibo.id')
            ->join('user_info', 'user_info.id', '=', 'weibo.user_id')
            ->select('weibo_comment.*', 'user_info.nickname')
            ->orderBy('time', 'desc')
            ->get();

        return view("admins.message.show", ["vo"=>$data, "list"=>$list]);
    }
}
