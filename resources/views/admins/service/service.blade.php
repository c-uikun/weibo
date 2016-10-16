@extends('admins.base.base')


@section('content')
<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>客服中心</h1>
    </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title"><i class="fa fa-th"></i> 客服管理</h3>
                  
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table class="table table-bordered">
                    <tr>
                      <th style="width:60px">id号</th>
                      <th>内容</th>
                      <th>修改时间</th>
                      <th style="width: 170px">操作</th>
                    </tr>
                    @foreach($list as $vo)
                        <tr>
                            <td width="80px">{{ $vo->id }} 号客服</td>
                            <td>{{ $vo->content }}</td>
                            <td>{{ date("Y-m-d H:i:s",$vo->time) }}</td>
                            <td><button class="btn btn-xs btn-info" onclick="window.location='{{URL('admins/service')}}/{{ $vo->id }}/edit'">修改内容</button>
                                <button class="btn btn-xs btn-danger" onclick="doDel({{ $vo->id }})">删除</button>
                            </td>
                        </tr>
                    @endforeach
                    
                  </table>
                </div><!-- /.box-body -->
                <div class="box-footer clearfix">
                  {!! $list->appends($where)->render() !!}
                </div>
              </div><!-- /.box -->

            </div><!-- /.col --> 
          </div><!-- /.row -->
        </section><!-- /.content -->
        
    @endsection
    
    @section('myscript')
    <form action="/users/" method="post" name="myform" style="display:none;">
            <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
            <input type="hidden" name="_method" value="delete"/>
           
    </form>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="exampleModalLabel">New message</h4>
          </div>
          <div class="modal-body">
           <!-- 此处填充 -->
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
            <button type="button" onclick="saveRole()" class="btn btn-primary">保存</button>
          </div>
        </div>
      </div>
    </div>
    <script type="text/javascript">
        function doDel(id){
                if(confirm("确定要删除吗？")){
                    //跳转  这种超链接的方式执行不了 delete提交 
                    //window.location.href="action.php?a=del&id="+id;
                    
                    var form = document.myform;
                    form.action = "{{URL('/admins/service')}}/"+id;
                    form.submit();
                }
        }
    </script>
    @endsection