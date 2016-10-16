@extends("admins.base.base")

@section("content")
	<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>广告信息管理</h1>
    </section>
    <input type="hidden" name="_token" id="token">

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title"><i class="fa fa-th"></i> 广告总览</h3>
                  
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table class="table table-bordered">
                    <tr>
                      <th>名称</th>
                      <th style="width:200px;">视频连接</th>
                      <th>状态</th>
                      <th>操作</th>
                    </tr>
                    @foreach($data as $vo)
                        <tr>
                            <td>{{ $vo->name }}</td>
                            <td style="width:200px;">{{ $vo->src }}</td>

                              @if($vo->lock == 0)
                                <td id="td-{{ $vo->id }}">已上线</td>
                              @else
                                <td id="td-{{ $vo->id }}">已下线</td>
                              @endif

                            <td>
                              @if($vo->lock == 0)
                                <button class="btn btn-xs btn-warning" id="button-{{ $vo->id }}" onclick="ded({{ $vo->id.','.$vo->lock }})">下线</button>
                              @else
                                <button class="btn btn-xs btn-info" id="button-{{ $vo->id }}" onclick="ded({{ $vo->id.','.$vo->lock }})">上线</button>
                              @endif
                              <a href="{{ asset('admins/lunbo/load') }}">
                                <button class="btn btn-xs btn-success">添加</button>
                              </a>
                            </td>
                        </tr>
                    @endforeach
                    
                  </table>
                </div><!-- /.box-body -->
                <!-- 分页 -->
                <div class="box-footer clearfix">
                </div>
              </div><!-- /.box -->

            </div><!-- /.col --> 
          </div><!-- /.row -->
        </section><!-- /.content -->
        
    @endsection
    
    @section('my-js')
    <script type="text/javascript" src="{{ asset('js/admin/ad.js') }}"></script>
	  @endsection