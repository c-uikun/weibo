function del(id){
	// var token = $('#token').val();
	// alert(id);
	$.ajax({
		url:'/admins/message/del/'+id,
		type:'get',
		datatype:'text',
		success:function(data){
			if (data) {
				alert('删除成功');
				$('#weibo-list-'+id).remove();
			}
		}
	});
	
};

function ded(id,lock){
	$.ajax({
		url:'/admins/message/edit/'+id+'/'+lock,
		type:'get',
		datatype:'text',
		success:function(data){
			// alert(data);
			if(data == 1){
				if (!lock) {
					$("#button-"+id).html('解封').attr('class', 'btn btn-xs btn-info').attr('onclick', 'ded('+id+',1)');
					
				}else{
					$("#button-"+id).html('封印').attr('class', 'btn btn-xs btn-warning').attr('onclick', 'ded('+id+',0)');
				}
			}else{
				alert('操作失败');
			}
		}
	});
};

function dee(id){
	if( $("#tr-"+id).hasClass("abc") ){
		// 隐藏
		$("#tr-"+id).hide().removeClass("abc");
	}else{
		// 显示
		$("#tr-"+id).show().addClass("abc");
	}
};