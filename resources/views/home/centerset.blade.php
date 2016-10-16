@extends('demo')

@section('title','账号设置')

@section('my-css')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/all.css') }}">
@stop

@section('content')
    @include('home.head')


	<div class="container-fluid " style="background:url({{ asset('imgs/reg_repeat_bg.png') }});">
        @if(session('success'))
            <div class="callout callout-info lead">
                      <h4>Reminder!</h4>
                        <p>{{session('success')}}</p>
            </div>         
        @endif        

        @if(session('error'))
         <div class="callout callout-danger lead">
                <h4>Tip!</h4>
                <p>{{session('error')}}</p>
         </div> 
         @endif
        <div style="width:100%;height:20px;"></div>
        <div class="col-md-8 col-md-offset-2">
            <div class="col-md-3" style="background-color:#FCFCFC;border-radius:5px;" >
                <div class="col-md-12">
                    <button class="btn btn-link" id="info-btn">
                    <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                     我的信息</button>
                </div>
                <div class="col-md-12">
                    <button class="btn btn-link" id="face-btn">
                    <span class="glyphicon glyphicon-camera" aria-hidden="true"></span> 头像</button>
                </div>
                <div class="col-md-12">
                    <button class="btn btn-link" id="pwd-btn">
                    <span class="glyphicon glyphicon-th" aria-hidden="true"></span> 修改密码</button>
                </div>
            </div>
            <!-- info-div 开始 -->
            <div class="col-md-9" style="background-color:#F2F2F2;border-radius:5px;">
                <div class="col-md-12 info-div" style="border:0 none;border-bottom:1px solid #f00;margin:5px;padding:5px;">
                    我的信息
                </div>
                <div class="col-md-12 info-div">
                    <b>个人资料</b>
                    <form class="form-horizontal" action="/centerset" method="post">
                        <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <label for="nickname" class="col-sm-2 control-label">昵称</label>
                            <div class="col-sm-10">
                                <input type="text" name="nickname" class="form-control" id="nickname" placeholder="昵称" value="{{ $vo->nickname }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="sex" class="col-sm-2 control-label">性别</label>
                            <div class="col-sm-10">
                                <label class="radio-inline">
                                    <input type="radio" name="sex" id="sex" {{ ($vo->sex == "男")?"checked":"" }} value="男"> 男
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="sex" id="sex" {{ ($vo->sex == "女")?"checked":"" }} value="女"> 女
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="age" class="col-sm-2 control-label">年龄</label>
                            <div class="col-sm-10">
                                <input type="number" name="age" class="form-control" id="age" placeholder="年龄" value="{{ $vo->age }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="intro" class="col-sm-2 control-label">自我介绍</label>
                            <div class="col-sm-10">
                                <textarea name="intro" id="intro" class="form-control" rows="3" cols="65">{{ $vo->intro }}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-5">
                                <button type="submit" class="btn btn-default" id="button_store">保存</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- info-div 结束 -->

                <!-- face-div 开始-->
                <div class="col-md-12 face-div" style="border:0 none;border-bottom:1px solid red;margin:5px;padding:5px;">
                    头像
                </div>
                <div class="col-md-12 face-div">
                    <div class="col-md-10">
                            <img src="{{ asset('uploads/'.session('userInfo')->face100) }}" alt="当前头像" class="face-100">
                    </div>
                    <form class="col-sm-10" action="/centerset/face" method="post" enctype="multipart/form-data" style="margin-bottom: 10px;">
                        <div class="form-group">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="file" id="face" name="face" accept="image/*">
                        </div>
                        <button type="submit" class="btn btn-default">保存</button>
                    </form>    
                </div>
                <!-- face-div 结束 -->

                <!-- pwd-div 开始 -->
                <div class="col-md-12 pwd-div" style="border:0 none;border-bottom:1px solid red;margin:5px;padding:5px;">
                        密码修改 
                </div>
                <form class="form-horizontal pwd-div" action="centerset/pwd" method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">原密码</label>
                        <div class="col-sm-10">
                            <input type="password" name="pwd1" class="form-control" id="inputEmail3" placeholder="原密码">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">新密码</label>
                        <div class="col-sm-10">
                            <input type="password" name="pwd2" class="form-control" id="inputPassword3" placeholder="输入您的新密码">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">确认密码</label>
                        <div class="col-sm-10">
                            <input type="password" name="pwd3" class="form-control" id="inputPassword3" placeholder="请重新输入你的密码">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-5">
                            <button type="submit" class="btn btn-default">保存修改</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div style="width:100%;height:600px;"></div>
    </div>


@stop

@section('my-js')
    <script type="text/javascript">
        $(function(){
            $('.face-div').hide();
            $('.pwd-div').hide();
        });
        $('#info-btn').click(function(){
            $('.info-div').show();
            $('.face-div').hide();
            $('.pwd-div').hide();
        });

        $('#face-btn').click(function(){
            $('.face-div').show();
            $('.info-div').hide();
            $('.pwd-div').hide();
        });
        $('#pwd-btn').click(function(){
            $('.pwd-div').show();
            $('.info-div').hide();
            $('.face-div').hide();
        });
    </script>
    {{ $message or '' }}
@stop

