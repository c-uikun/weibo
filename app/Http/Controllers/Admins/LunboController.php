<?php

namespace App\Http\Controllers\Admins;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Intervention\Image\ImageManagerStatic as Image;

use DB;

class LunboController extends Controller
{
    public function index()
    {
    	$data = DB::table('lunbo')->get();
    	// dd($data);
    	return view('admins.lunbo.lunbo', ['data'=>$data]);
    }

    public function edit($id,$lock)
    {
        if($lock == '0'){
            $res = DB::table('lunbo')->where('id', $id)->update(['lock' => 1]);
            return $res;
        }elseif($lock == '1'){
            $res = DB::table('lunbo')->where('id', $id)->update(['lock' => 0]);
            return $res;
        }
    }

    public function load()
    {
    	return view('admins.lunbo.load');
    }

    public function doLoad(Request $request)
    {
    	//判断是否有上传
            // 文件上传 hasfile的方法 
        if($request->hasFile("mypic")){
            //获取上传信息
                //$file是一个uploadfile的对象 
            $file = $request->file("mypic");
            //确认上传的文件是否成功
            if($file->isValid()){
                $picname = $file->getClientOriginalName(); //获取上传原文件名
                $ext = $file->getClientOriginalExtension(); //获取上传文件名的后缀名
                //执行移动上传文件
                $filename = time().rand(1000,9999).".".$ext;
                $file->move("./uploads/",$filename);
                
                //使用第三插件执行图片缩放
                $img = Image::make("./uploads/".$filename)->resize(100,100,function($constraint) {
                                    $constraint->aspectRatio();
                                    $constraint->upsize();
                                });
                $img->save("./uploads/s_".$filename); //另存为
                return $img->response("jpg"); //输出
            }
        }
    }
}
