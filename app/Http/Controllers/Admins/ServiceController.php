<?php

namespace App\Http\Controllers\Admins;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ServiceController extends Controller
{
    //客服管理
    public function index(Request $request)
    {
        $db = \DB::table("service");
        //判断并封装搜索条件
        $where = [];
        if($request->has("keyword")){
            $kw = $request->input("keyword");
            $db->where("content","like","%{$kw}%")->orwhere("content","like","%{$kw}%");
            $where['keyword'] = $kw;
        }
       	$list = $db->paginate(3); //获取所有信息
        return view("admins.service.service",["list"=>$list,"where"=>$where]);
    }

    //添加表单
    public function create()
    {
        return view("admins.service.add");
    }

    //执行添加
    public function store(Request $request)
    {
        //获取指定的部分数据
        $data = $request->only("content");
        $data['time'] = time();
        $id = \DB::table("service")->insertGetId($data);
        
        if($id>0){
            return redirect('admins/service');
        }else{
           return back()->with("err","添加失败!");
        }
    }

    //加载修改表单
    public function edit($id)
    {
        //获取要编辑的信息
        $service = \DB::table("service")->where("id",$id)->first(); 
        // dd($service);
        return view("admins.service.edit",["vo"=>$service]);
    }
    
    //执行修改
    public function update($id,Request $request)
    {
        $data = $request->only("content");
        $data['time'] = time();

        // dd($data);
        $id = \DB::table("service")->where("id",$id)->update($data);
        // dd($id);    
        
        if($id>0){

            return redirect('admins/service');
        }else{
            return back()->with("err","修改失败!");
        }
    }

    //执行删除
    public function destroy($id)
    {
        
            \DB::table("service")->where("id",$id)->delete();
            return redirect('admins/service');
    }
}
