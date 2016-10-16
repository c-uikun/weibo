<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Intervention\Image\ImageManagerStatic as Image;
use DB;

use Session;
class SetInfoController extends Controller
{
    // 将 账户设置-个人信息 放到表单中
        public function index()
        {
            $id = session::get('userInfo')->id;
            // 获取数据
            $data = DB::table('user_info')->where('id',$id)->first();
            $pwd = DB::table('user_login')->where('id',$data->login_id)->value('password');
            
            return view("home.centerset", ['vo'=>$data]);
        }

        public function update(Request $request)
        {
            $id = session::get('userInfo')->id;
            $dat = DB::table('user_info')->where('id',$id)->first();
            /* 将 账户设置-个人信息 放到数据库 */
            $data = $request->only('nickname', 'sex', 'age', 'intro');
            if ($data['age'] < 0 || $data['age'] >150 ) {
                // echo "输入的年龄不合法,请重新输入";
                // return view("home.centerset", ['vo'=>$dat]);
                return back()->with('error','输入的年龄不合法,请重新输入');
            }else{
                // 执行修改
                $info = DB::table('user_info')->where('id', $id)->update($data);
                if ($info > 0) {
                    // echo '修改成功';
                    // return view("home.centerset", ['vo'=>$dat]);
                    return redirect('/centerset')->with('success','修改成功');
                }else{
                    // echo '修改失败';
                    // return view("home.centerset", ['vo'=>$dat]);
                    return back()->with('error','修改失败');
                }
            }
        }

        public function pwdupdate(Request $request)
        {
            $id = session::get('userInfo')->id;
            // 获得user_login中的password值
            $data_pwd = DB::table('user_info')->where('id',$id)->first();
            $pwd['password'] = DB::table('user_login')->where('id',$data_pwd->login_id)->value('password');

            // 对密码进行判断
            $data = $request->only('pwd1', 'pwd2', 'pwd3');
            $data['pwd1'] = md5($data['pwd1']);
            if ($pwd['password'] !== $data['pwd1']) {
                return back()->with('error','输入的原密码不正确,请重新输入');
            }

            if (!preg_match_all("/^\w{6,}$/", $data['pwd2']) && !preg_match_all("/^\w{6,}$/", $data['pwd3'])) {
                return back()->with('error','密码至少为6位数!');
            }
            if ($data['pwd2'] !== $data['pwd3']) {
                return back()->with('error','俩次输入的新密码不匹配,请重新输入');
            }else{
                $pwd['password'] = md5($data['pwd2']);
                unset($data['pwd2']);
                unset($data['pwd3']);
            }

            // 执行修改
            $id = $data_pwd->login_id;
            $info = DB::table('user_login')->where('id',$id)->update($pwd);
            if ($info > 0) {
                return redirect('/centerset')->with('success','修改成功');
            }else{
                return back()->with('error','修改失败');
            }
        }

    public function face(Request $request)
    {
        // dd($request);
        $id = session::get('userInfo')->id;
        //判断是否有上传
            // 文件上传 hasfile的方法 
        if($request->hasFile("face")){
            //获取上传信息
                //$file是一个uploadfile的对象 
            $file = $request->file("face");
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
                $img->save("./uploads/100_".$filename); //另存为

                $img = Image::make("./uploads/".$filename)->resize(50,50,function($constraint) {
                                    $constraint->aspectRatio();
                                    $constraint->upsize();
                                });
                $img->save("./uploads/50_".$filename); //另存为
                // return $img->response("jpg"); //输出
                $face_50 = "50_".$filename;
                $face_100 = "100_".$filename;
                $info = DB::table('user_info')->where('id', $id)->update(['face50'=>$face_50, 'face100'=>$face_100]);
                if($info > 0){
                    session::set('photo', $face_100);
                    return redirect('/centerset')->with('success','修改成功');
                }else{
                    return back()->with('error','修改失败');
                }
            }
        }
    }
}
