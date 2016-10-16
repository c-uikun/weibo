@extends('demo')

@section('title','个人主页')

@section('my-css')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/all.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/home/centerone.css') }}">
@stop

@section('content')
    @include('home.head')
    <div class="container-fluid" style="background:url({{ asset('imgs/body_bg_page.jpg')  }}) no-repeat;background-color:#B4DAEF;">
	    <div class="container">
	    <div style="height:18px;"></div>
		  <div class="col-md-10 col-md-offset-1">
		  	<!-- 封面开始 -->
		  	<div class="container-fluid" style="height:300px;">
			  	<div class="container-fluid" style="height:150px;">
                        <div id="face100" style="height:100px;width:100px;"><img src="{{ asset('uploads/'.session('userInfo')->face100) }}" class="img-circle face-100"></div>
			  	</div>
		  		<div class="container-fluid" id="nickname">
		  			<h1>{{ $vo->nickname }}</h1>
		  		</div>
		  		<div class="container-fluid" id="intro">{{ $vo->intro }}</div>

		  		<div class="dropdown col-md-offset-10">
		  		
			</div>
		  	</div>
		  	<div style="background-color:#FFFFFF;height:40px;margin-bottom:18px;">
		  		<div style="width:60%;margin:0 auto;">
		  			<table cellpadding="0" cellspacing="0" id="table">
		  				<tr>
		  					@if(session('userInfo')->id == $vo->id)
		  					<td><a href="">我的主页</a></td>
		  					<td><a href="{{URL('/center/'.session('userInfo')->id.'/chongzhi')}}">会员充值</a></td>
		  					@else
		  					<td><a href="">他的主页</a></td>
		  					@endif
		  					<td><a href="{{URL('/center/10086/game')}}">微游戏</a></td>
		  				</tr>
		  			</table>
		  		</div>
		  	</div>
		  	

		  	<!-- 封面结束 -->

		  	<div class="col-md-4">
		  		<!-- 账户信息 关注 粉丝 微博 开始 -->
		  		<div  style="background-color:#FFFFFF;height:50px;border-radius:5px;margin-bottom:18px;">
		  			<div>
		  				
		  					<table id="table_fans">
		  						<tr>
		  							<td><a href=""><strong>{{ $vo->follow }}</strong><span>关注</span></a></td>
		  							
		  							<td><a href="" id="th-2"><strong>{{ $vo->fans }}</strong><span>粉丝</span></a></td>
		  							
		  							<td><a href=""><strong>{{ $vo->weibo }}</strong><span>微博</span></a></td>
		  						</tr>
		  					</table>
		  				
		  			</div>
		  			<!-- 账户信息 关注 粉丝 微博 结束 -->	
		  		</div>
		  		<div style="background-color:white;border-radius:5px;">
		  			<img src="{{ asset('imgs/weixin.png') }}">
		  			<img src="{{ asset('imgs/kefu.jpg') }}">
		  			<button class="btn btn-info btn-block" id="kefu-btn">有问题就点击我吧</button>  		
			  	</div>
		  	</div>
		  		

	  		<!-- 微博 遍历 开始-->
	  		<div class="col-md-8" style="border-radius:5px;">
	  			<ul>
	  				@foreach ($weibos as $weibo)
                        <li id="weibo-{{ $weibo->id }}" onmousemove="showDel({{ $weibo->id }})" onmouseout="hideDel({{ $weibo->id }})">
						    <div class=" col-md-12 weibo-content">
						        <div class="row">
						            <div class="weibo-face-box pull-left">
						                <a href=""><img src="{{ asset('uploads/'.$weibo->face50) }}" class="face-50"></a>
						            </div>
						            <div class="weibo-content-box pull-right">
						                <a href=""><b>{{ $weibo->nickname }}</b></a>
						                @if($weibo->user_id == session('userInfo')->id)
						                    <button id="weibo-del-{{ $weibo->id }}" onclick="delWeibo({{ $weibo->id }})" class="hidden pull-right btn btn-danger btn-xs">删除</button>
						                @endif
						                <br>
						                <span class="weibo-time"> {{ $weibo->time }}</span>
						                <div>{{ $weibo->content }}</div>
						            </div>
						        </div>
						        <div class="row weibo-btn-box">
						            <div id="keep-btn-{{ $weibo->id }}" onclick="keep({{ $weibo->id }},{{ session('userInfo')->id }})">收藏 <span>{{ $weibo->keep }}</span></div>
						            <div id="comment-btn-{{ $weibo->id }}" onclick="comment({{ $weibo->id }},{{ session('userInfo')->id }})">评论 <span>{{ $weibo->comment }}</span></div>
						            <div id="praise-btn-{{ $weibo->id }}" onclick="praise({{ $weibo->id }},{{ session('userInfo')->id }})">赞 <span>{{ $weibo->praise }}</span></div>
						        </div>
						    </div>
						    <div class="col-md-12 weibo-comment-box wb-plk" id="pl-{{ $weibo->id }}" style="display:none;">
						        <div class="row comment-edit-box">
						            <div class="col-md-1"><img src="{{ asset('imgs/face.jpg') }}" class="wb-comment-face"></div>
						            <div class="col-md-11"><textarea class="weibo-comment-edit" id="wb-cmt-edit-{{ $weibo->id }}"></textarea></div>
						            <div class="col-md-11 col-md-offset-1">
						                
						                    @if($weibo->comment > 0)
						                        <span style="color:#808080;font-size:12px;line-height:25px;">共有{{ $weibo->comment }}条评论</span>
						                    @else
						                        <span style="color:#808080;font-size:12px;line-height:25px;">还没有评论这条微博，快来第一个评论吧！</span>
						                    @endif
						                
						                <button class="pull-right btn btn-danger btn-xs comment-btn" id="comment-btn-{{ $weibo->id }}" onclick="setComment({{ $weibo->id }}, {{ session('userInfo')->id }})">评论</button>
						            </div>
						        </div>
						    </div>
						</li>
                    @endforeach
				</ul>
	  		</div>
	  		<!-- 微博 遍历 结束-->
		  	
		  </div>
		</div>
    </div>
@stop

@section('my-js')
<script>
$('#kefu-btn').click(function(){
    $.ajax({
        url:'/kefu',
        type:'get',
        dataType:'json',
        success:function(data){
            alert(data[0].content);
        }
    });
});
</script>
@stop