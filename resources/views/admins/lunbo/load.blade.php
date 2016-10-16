@extends("admins.base.base")

@section("content")
	<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>轮播图管理</h1>
    </section>
        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title"><i class="fa fa-th"></i> 轮播图上传</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <form role="form" action="{{ asset('admins/lunbo/load') }}" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                      <input type="file" id="exampleInputFile" name="mypic" id="myphoto" accept="image/*">
                    </div>
                    <button type="submit" class="btn btn-default">提交</button>
                  </form>

                  <!-- <form action="{{ asset('admins/lunbo/load') }}" method="post" enctype="multipart/form-data">
        
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      <input type="file" name="mypic">
                      <input type="submit">
                  </form> -->

                </div><!-- /.box-body -->
                <div class="box-footer clearfix">
                </div>
              </div><!-- /.box -->

            </div><!-- /.col --> 
          </div><!-- /.row -->
        </section><!-- /.content -->
        
    @endsection
    
    @section('my-js')
    <script type="text/javascript" src="{{ asset('js/admin/weibo.js') }}"></script>
	  @endsection