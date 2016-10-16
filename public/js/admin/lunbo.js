function ded(id,lock){
	$.ajax({
		url:'/admins/lunbo/edit/'+id+'/'+lock,
		type:'get',
		datatype:'text',
		success:function(data){
			// alert(data);
			if(data == 1){
				if (!lock) {
					$("#button-"+id).html('上线').attr('class', 'btn btn-xs btn-info').attr('onclick', 'ded('+id+',1)');
					$("#td-"+id).html('已下线');
					
				}else{
					$("#button-"+id).html('下线').attr('class', 'btn btn-xs btn-warning').attr('onclick', 'ded('+id+',0)');
					$("#td-"+id).html('已上线');
				}
			}else{
				alert('操作失败');
			}
		}
	});
};