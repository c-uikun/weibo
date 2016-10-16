<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;

use Session;

class ZoneController extends Controller
{
    public function index($id)
    {   
        $data = DB::table('user_info')->where('id',$id)->first();

        $weibos = DB::table('weibo')
                ->where('user_id','=', $id)
                ->where('lock', 0)
                ->join('user_info', function($join){
                    $join->on('weibo.user_id', '=', 'user_info.id');
                })
                ->select('user_info.*', 'weibo.*')
                ->orderBy('time', 'desc')
                ->orderBy('comment', 'desc')
                ->get();

                //处理时间
                foreach ($weibos as $k => $v) {
                    $time = $weibos[$k]->time;
                    if (date('Yjn') == date('Yjn',$time)) {
                        $weibos[$k]->time = ' 今天 '.date(' H:i ', $weibos[$k]->time);
                    }elseif(date('Y') == date('Y',$weibos[$k]->time)){
                        $weibos[$k]->time = date(' n月j日 H:i ', $weibos[$k]->time);
                    }else{
                        $weibos[$k]->time = date(' Y年n月j日 ', $weibos[$k]->time);
                    }
                }
        // dd($data);
        return view('home.centerone', ['vo'=>$data, 'weibos'=>$weibos]);

    }

    public function chongzhi()
    {
        $src = DB::table('lunbo')->where('lock', 0)->get();
        session::set('lunbo', $src);
        $id = session::get('userInfo')->id;
        $data = DB::table('user_info')->where('id',$id)->first();

        $info = DB::table('user_vip')->where('user_id', $id)->first();
        $date['creattime'] = $info->creattime;
        $date['endtime'] = $info->endtime;
        // var_dump(empty($data['creattime']));
        // var_dump(is_bool($data['creattime']));
    	return view('home.chongzhi', ['vo'=>$date, 'data'=>$data]);
    }

    public function buy(Request $request)
    {
        $id = session::get('userInfo')->id;
        $month = $request->only('month');
        $month = $month['month'];
        $creattime = time();
        $endtime = strtotime(' +'.$month.' month');
        $data['creattime'] = $creattime;
        $data['endtime'] = $endtime;

        // 从数据表取出的时间
        $time = DB::table('user_vip')->where('user_id', $id)->first();
        $dataa['creattime'] = $time->creattime;
        $dataa['endtime'] = $time->endtime;

        if(($data['creattime']) > ($dataa['endtime'])){
            $info = DB::table('user_vip')->where('user_id', $id)->update($data);
            return view('home.chongzhi', ['vo'=>$data]);
        }else{
            $data['creattime'] = $time->creattime;
            $data['endtime'] = strtotime(' +'.$month.' month', $time->endtime);
            $info = DB::table('user_vip')->where('user_id', $id)->update($data);
            return view('home.chongzhi', ['vo'=>$data]);
        }
    }

    //游戏
    public function game()
    {
        return view("home.game");
    }
}


