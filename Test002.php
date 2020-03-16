<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>無標題文件</title>
</head>


<body>
	<form id="sel_form" action="post">
		選項：
        <select id="select_op";>
			<option value="0" selected="selected">請選擇</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
        </select>
	</form>
</body>
</html>

<script src="js/jquery-2.1.4.min.js"></script>
<script>
	$('#select_op').change(function(e){
		var select_num = $('#select_op').val();
		alert(typeof(select_num));
		var sel_jsonstr = [{"selnum":select_num}];
		var sel_jsonstr_real = JSON.stringify(sel_jsonstr);
		alert(sel_jsonstr_real);
		$.ajax({
			type:"post", // 傳送方式
			url:"Test001.php", // 傳送目的地
			dataType:"json", // 回傳-資料格式
			contentType:"application/json; charset=utf-8",
			data:{sel_jsonstr_real}, // 傳送資料
			success: function(data){ // 後端成功回傳資料
				alert('SucceSs');
				var datajson = JSON.stringify(data);
				alert(datajson);
			},
			error: function(xhr,ajaxOptions,thrownError){ // 後端無傳送回來
				alert('ErrOr');
				alert(xhr.status);
				alert(thrownError);
			}
		});
	});
</script>