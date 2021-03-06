<div class="container-fluid" id="top-box" style="border-top:2px solid #fa7d3c;background:#fff;box-shadow:0 0 1px 0 rgba(0, 0, 0, 0.3), 0 0 6px 2px rgba(0, 0, 0, 0.15)">
    <div class="col-md-12" style="background:#fff">
        <div class="row" id="top">
            <!-- logo -->
            <div class="col-md-2 hidden-xs">
                <div class="pull-right"><a href="{{ URL('/') }}"><img src="{{ asset('/imgs/logo_big.png') }}" height="40px"></a></div>
            </div>
            <!-- logo-end -->
            <!-- search -->
            <div class="col-md-4">
                <form class="form-horizontal col-md-12" action="{{ URL('/find') }}" method="get">
                  <div class="form-group" style="margin-bottom: 0px;">
                    <div class="input-group col-md-12" style="margin-top: 7px;">
                        <input type="text" name="find" class="form-control" placeholder="大家都在搜：天凉别感冒">
                        <span class="input-group-btn">  
                            <button class="btn btn-default" id="find-btn" type="submit"><span class="glyphicon glyphicon-search"></span></button>  
                        </span>
                    </div>
                  </div>
                </form>
            </div>
            <!-- search-end -->
            <div class="col-md-4 col-md-offset-2 hidden-xs">
                <ul id="top-nuv">
                    <li><a href="{{ URL('') }}"><span class="glyphicon glyphicon-home nuv-ico"> </span> 首页 </a></li>
                    @if(session('userInfo'))
                        <li><a href="{{ URL('/center/'.session('userInfo')->id) }}">{{ session('userInfo')->nickname }}</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-cog"> </span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ URL('/centerset') }}">修改资料</a></li>
                                <li class="divider"></li>
                                <li><a href="{{ URL('/exit') }}">退出登陆</a></li>
                            </ul>
                        </li>
                    @else
                        <li><a href="{{ URL('/reg') }}">注册</a></li>
                        <li><span id="login-btn" data-toggle="modal" data-target="#login">登陆</span></li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</div>
<div id="top-post"></div>
<div class="modal fade bs-example-modal-sm" id="login">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">会员登陆</h4>
            </div>
            <div class="modal-body">
                <form action="{{ URL('/login') }}" method="post" name="login_form">
                    <input type="hidden" name="_token" id="token" value="<?php echo csrf_token(); ?>">
                    <div class="form-group">
                        <label>邮箱账号</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label>密码</label>
                        <input type="password" id="pwd" name="pwd" class="form-control" placeholder="Password">
                    </div> 
                    <label>验证码</label>
                    <div class="input-group">
                        <span class="input-group-addon code">
                            <img src="{{ URL('/captcha/'.time()) }}" onclick="this.src = this.src+ '&i=' + Math.round()" name="code">
                        </span>
                        <input type="text" class="form-control" name="code" id="code" placeholder="验证码" maxlength="4">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <a href="{{ URL('/reg') }}" class="btn btn-warning pull-left">注册一个</a>
                <button type="button" class="btn btn-info" onclick="login()">&nbsp;&nbsp;登&nbsp;&nbsp;&nbsp;&nbsp;陆&nbsp;&nbsp;</button>
                
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<div id="tianqi-box">
    <div id="tianqi-ico-box"><img src="" id="tianqi-ico"></div>
    <div id="tianqi-info">
        城市：<span id="tq-name"></span><br>
        天气：<span id="tq-text"></span><br>
        温度：<span id="tq-wd"></span> 
    </div>
</div>
