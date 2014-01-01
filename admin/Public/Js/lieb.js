// JavaScript Document
$('#yank').change(function(){
	$.post('?m=grade&a=ajxlessionplan6&c=grade','yard_name='+$("#yard").val()+'&lession_rank='+$("#rank").val(),function(date){
		if(date){
			var str='<option value="0">请选择学期</optio>';
			for(var i=0;i<date.length;i++){
					str+='<option value='+date[i]["lession_termid"]+'>'+date[i]["lession_term"]+'</optio>';
			}
			$('#term').html(str);
		}else{
			alert('该校区无部门');
		}
		},'json')
})
$('#term').change(function(){
	$.post('?m=grade&a=ajxlessionplan&c=grade','lession_termid='+$("#term").val()+'&yard_name='+$("#yard").val()+'&lession_rank='+$("#rank").val(),function(date){
		if(date){
			var str='<option value="0">请选择专业</optio>';
			for(var i=0;i<date.length;i++){
					str+='<option value='+date[i]["depar_id"]+'>'+date[i]["depar_name"]+'</optio>';
			}
			$('#depart').html(str);
		}else{
			alert('该校区无部门');
		}
		},'json')
})
$('#depart').change(function(){
	$.post('?m=grade&a=ajxlessionplan3&c=grade','lession_termid='+$("#term").val()+'&yard_name='+$("#yard").val()+'&depar_id='+$("#depart").val()+'&lession_rank='+$("#rank").val(),function(date){
		if(date){
			var str='<option value="0">请选择专业</optio>';
			for(var i=0;i<date.length;i++){
					str+='<option value='+date[i]["maj_id"]+'>'+date[i]["maj_name"]+'</optio>';
			}
			$('#maj').html(str);
		}else{
			alert('该校区无专业');
		}
		},'json')
})
$('#maj').change(function(){
	$.post('?m=grade&a=ajxlessionplan1&c=grade','lession_termid='+$("#term").val()+'&yard_name='+$("#yard").val()+'&maj_id='+$("#maj").val()+'&depar_id='+$("#depart").val()+'&lession_rank='+$("#rank").val(),function(date){
		if(date){
			var str='<option value="0">请选择班级</optio>';
			for(var i=0;i<date.length;i++){
				str+='<option value='+date[i]["class_id"]+'>'+date[i]["class_name"]+'</optio>';
			}
			$('#class').html(str);
		}else{
			alert('该专业无班级');
		}
		},'json')
	$.post('?m=grade&a=ajxlessionplan2&c=grade','lession_termid='+$("#term").val()+'&yard_name='+$("#yard").val()+'&maj_id='+$("#maj").val()+'&depar_id='+$("#depart").val()+'&lession_rank='+$("#rank").val(),function(date){
		if(date){
			var str='<option value="0">请选择课程</optio>';
			for(var i=0;i<date.length;i++){
					str+='<option value='+date[i]["cours_no"]+'>'+date[i]["cours_name"]+'</optio>';
			}
			$('#cours').html(str);
		}else{
			alert('该专业无课程');
		}
		},'json')
})