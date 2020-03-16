<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>無標題文件</title>
</head>

<?php echo "POST1=".$_POST['test_select_name']."<br />"; ?>
<?php echo "POST2=".$_POST['name']; ?>

<body>
 <form method="post" action="" name="test_form" id="test_form">
  <select id="test_select_id" name="test_select_name">
   <option value="0">000</option>
   <option value="1">010</option>
   <option value="2">200</option>
  </select>
  <input src="Test001.php" type="submit" name="Submit" value="送出">
 </form>
</body>
</html>

<script src="js/jquery-2.1.4.min.js"></script>
<script type="application/javascript">
 /*$(document).ready(function(e) {
	 $('#test_form').submit(function(e){
		 $.ajax({
			 type: "post",
			 url: "Test001.php",
			 data:{Text1:"a",Text2:"b"},
			 success:function(result) {
				 alert(result);
			 },
			 error:function(xhr) {
				 alert('Ajax request 發生錯誤');
			 }
		 });
	 });
 });*/
 
</script>