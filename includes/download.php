<?php
if(!isset($_POST['download_table'])){
	?>
	<script>
	alert("请先查询");
	</script>
	<?php 
	exit();
}
header ( "Content-type:application/vnd.ms-excel" );
header ( "Content-Disposition:filename=haoke.xls" );
    echo $_POST['download_table'];
?>