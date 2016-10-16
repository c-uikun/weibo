@extends('demo')

@section('title','账号设置')

@section('my-css')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/all.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/home/chongzhi.css') }}">
@stop

@section('content')
	@include('home.head')

	<!-- Modal-1 -->
	<div class="modal fade" id="myModal-1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  	<div class="modal-dialog">
	    	<div class="modal-content">
	      		<div class="modal-header">
	        		<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
	       	 		<h4 class="modal-title" id="myModalLabel">尊敬的会员:请仔细查看</h4>
	      		</div>
	      		<div class="modal-body">
	        	<form action="{{ URL('/center/chongzhi/pay') }}" method="post" name="pay">
                    <input type="hidden" name="_token" id="token" value="<?php echo csrf_token(); ?>">
                    <input type="hidden" name="month" id="month" value="1">
                    <div class="form-group">
                        <label>开通对象</label>
                        <input type="text" name="person" id="person" readonly="true" class="form-control" value="{{ session('userInfo')->nickname }}">
                    </div>
                    <div class="form-group">
                        <label>开通时长</label>
                        <input type="text" id="time" name="time" class="form-control" value="1个月" readonly="true">
                    </div>
                
	      		</div>
	      		<div class="modal-footer">
	       	 		<button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
	       	 		<button type="submit" class="btn btn-primary">前往支付</button>
	     		</div>
	     		</form>
	    	</div>
	  	</div>
	</div>
	<!-- Modal-2 -->
	<div class="modal fade" id="myModal-2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  	<div class="modal-dialog">
	    	<div class="modal-content">
	      		<div class="modal-header">
	        		<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
	       	 		<h4 class="modal-title" id="myModalLabel">尊敬的会员:请仔细查看</h4>
	      		</div>
	      		<div class="modal-body">
	        	<form action="{{ URL('/center/chongzhi/pay') }}" method="post" name="pay">
                    <input type="hidden" name="_token" id="token" value="<?php echo csrf_token(); ?>">
                    <input type="hidden" name="month" id="month" value="3">
                    <div class="form-group">
                        <label>开通对象</label>
                        <input type="text" name="person" id="person" readonly="true" class="form-control" value="{{ session('userInfo')->nickname }}">
                    </div>
                    <div class="form-group">
                        <label>开通时长</label>
                        <input type="text" id="time" name="time" class="form-control" value="3个月" readonly="true">
                    </div>
                
	      		</div>
	      		<div class="modal-footer">
	       	 		<button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
	       	 		<button type="submit" class="btn btn-primary">前往支付</button>
	     		</div>
	     		</form>
	    	</div>
	  	</div>
	</div>
	<!-- Modal-3 -->
	<div class="modal fade" id="myModal-3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  	<div class="modal-dialog">
	    	<div class="modal-content">
	      		<div class="modal-header">
	        		<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
	       	 		<h4 class="modal-title" id="myModalLabel">尊敬的会员:请仔细查看</h4>
	      		</div>
	      		<div class="modal-body">
	        	<form action="{{ URL('/center/chongzhi/pay') }}" method="post" name="pay">
                    <input type="hidden" name="_token" id="token" value="<?php echo csrf_token(); ?>">
                    <input type="hidden" name="month" id="month" value="6">
                    <div class="form-group">
                        <label>开通对象</label>
                        <input type="text" name="person" readonly="true" id="person" class="form-control" value="{{ session('userInfo')->nickname }}">
                    </div>
                    <div class="form-group">
                        <label>开通时长</label>
                        <input type="text" id="time" name="time" class="form-control" value="6个月" readonly="true">
                    </div>
                
	      		</div>
	      		<div class="modal-footer">
	       	 		<button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
	       	 		<button type="submit" class="btn btn-primary">前往支付</button>
	     		</div>
	     		</form>
	    	</div>
	  	</div>
	</div>
	<!-- Modal-4 -->
	<div class="modal fade" id="myModal-4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  	<div class="modal-dialog">
	    	<div class="modal-content">
	      		<div class="modal-header">
	        		<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
	       	 		<h4 class="modal-title" id="myModalLabel">尊敬的会员:请仔细查看</h4>
	      		</div>
	      		<div class="modal-body">
	        	<form action="{{ URL('/center/chongzhi/pay') }}" method="post" name="pay">
                    <input type="hidden" name="_token" id="token" value="<?php echo csrf_token(); ?>">
                    <input type="hidden" name="month" id="month" value="12">
                    <div class="form-group">
                        <label>开通对象</label>
                        <input type="text" name="person" readonly="true" id="person" class="form-control" value="{{ session('userInfo')->nickname }}">
                    </div>
                    <div class="form-group">
                        <label>开通时长</label>
                        <input type="text" id="time" name="time" class="form-control" value="12个月" readonly="true">
                    </div>
                
	      		</div>
	      		<div class="modal-footer">
	       	 		<button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
	       	 		<button type="submit" class="btn btn-primary">前往支付</button>
	     		</div>
	     		</form>
	    	</div>
	  	</div>
	</div>

	<div>
		<div class="container-fluid" >
		<div class="row">
		    <div id="vip_bg">
		    	<ul id="posi">
		    		<li><button class="btn btn-danger" id="button1">首页</button></li>
		    		<li>
		    			<div class="dropdown" id="button2">
						  	<button class="btn btn-danger dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown">
						    会员充值
						    	<span class="caret"></span>
						  	</button>
						  	<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
						    	<li role="presentation" data-toggle="modal" data-target="#myModal-1"><a role="menuitem" tabindex="-1">1个月</a></li>
						    	<li role="presentation" data-toggle="modal" data-target="#myModal-2"><a role="menuitem" tabindex="-1">3个月</a></li>
						    	<li role="presentation" data-toggle="modal" data-target="#myModal-3"><a role="menuitem" tabindex="-1">6个月</a></li>
						    	<li role="presentation" data-toggle="modal" data-target="#myModal-4"><a role="menuitem" tabindex="-1">12个月</a></li>
						  	</ul>
						</div>
		    		</li>
		    	</ul>
		    </div>
		</div>
	</div>
	<div style="width:100%;height:40px;"></div>
	<div class="container">
		<div class="row">
		    <div>
		    	<div class="col-md-4" id="box">
			    	<div id="box-1">
			    		<div class="col-md-9">{{ session('userInfo')->nickname }}</div>
			    		@if( $vo['creattime'] != 0 )
			    		<div class="col-md-9">
			    			会员有效期:
			    			<br>
			    			<?php echo date("Y-m-d", $vo['creattime'])  ?>
			    			<br>
			    			至
			    			<br>
			    			<?php echo date("Y-m-d", $vo['endtime'])  ?>
			    		</div>
			    		@else
			    		<div class="col-md-9">
			    			<strong>你暂时还不是我们的会员,请前往购买</strong>
			    		</div>
			    		@endif
			    	</div>
			    	
		    	</div>
		    	<div class="col-md-8 col-md-offset-1">
		    		<div class="slideShow">
					   	<!--图片布局开始-->
					   	<ul>
					    	
							@foreach(session('lunbo') as $img)
					    		<li><img src="{{ asset('imgs/lunbo/'.$img->src) }}" /></li>
					    	@endforeach
					   </ul>
					   <!--图片布局结束-->
					    
					   	<!--按钮布局开始-->
					   	<div class="showNav">
					    	@for($i=1;$i<=count(session('lunbo'));$i++)
					    		@if($i == 1)
					    		<span class="active">{{ $i }}</span>
					    		@else
					    		<span>{{ $i }}</span>
					    		@endif
					    	@endfor
					   	</div>
					   	<!--按钮布局结束-->
					</div>
		    	</div>
		    </div>
		</div>
	</div>
	</div>
	
@stop

@section('my-js')
	<script src="{{ asset('js/home/layout.js') }}"></script>
	<script src="{{ asset('js/home/sign.js') }}"></script>
@stop
