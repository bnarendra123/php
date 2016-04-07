<form method="post" action="">
	dob : <input type="month" name="value">
	<br>
		<input type="submit" name="submit" value="Submit"> 
	<?php
/*$month = array( 1 => 'January',2=> 'February',3=> 'March',4=> 'April',5=> 'May',6=> 'June',7=> 'July',8=> 'August',9=>'September',
				10=>'October',11=>'November',12=>'December');
							
		echo  '<input type="text" name="k">';	
		foreach ( $month as $k => $v ) {
			echo '<option  name="'. $v . '"  value="' . $k . '"></option><br />';
			//echo '<input value="' . $k . '">' . $v . '><br />';
		}
		?>*/
$month = array('January','February','March','April','May','June','July','August','September','October','November','December');
foreach($month as $key => $value)
{
	//echo $key, ' => ', $value;
}
?>
		
</form>

<?php
if(isset($_POST['submit'])){
	echo $dob=$_POST['value'];
	$con=mysql_connect("localhost","root","") or die(mysql_error());
	$db=mysql_select_db("core",$con);
	$sql="insert into month values('','$dob')";
	$result=mysql_query($sql,$con);
	if($result){
		echo "<script>alert('success')</script>";
	}else{
		echo "<script>alert('fail')</script>";
	}
}
?>
