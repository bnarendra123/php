<?php

define ("DB_HOST", "localhost");

define ("DB_USER", "root");

define ("DB_PASS","");

define ("DB_NAME","test1");

$link = mysql_connect(DB_HOST, DB_USER, DB_PASS) or die("Couldn't make connection.");

$db = mysql_select_db('test1', $link) or die("Couldn't select database");

$sql = "select * from db";
$result = mysql_query($sql);
if($result === FALSE) { 
    die(mysql_error()); // TODO: better error handling
}


?>

<input type="button" id="btnExport" value=" Export Table data into Excel " />
<br/>
<br/>
<div id="dvData" style="display:none;">
    <table>
	<tr>
            <th>Column One</th>
            <th>Column Two</th>
            <th>Column Three</th>
        </tr>
		<?php
	while($rows = mysql_fetch_array($result)){ 
	?>
        
        <tr>
			
            <td><?php echo $rows['name'];?></td>
            <td><?php echo $rows['email'];?></td>
            <td><?php echo $rows['mobile'];?></td>
        
	<?php }?>
    </table>
</div>
<style>
ody {
    font-size: 12pt;
    font-family: Calibri;
    padding : 10px;
}
table {
    border: 1px solid black;
}
th {
    border: 1px solid black;
    padding: 5px;
    background-color:grey;
    color: white;
}
td {
    border: 1px solid black;
    padding: 5px;
}
input {
    font-size: 12pt;
    font-family: Calibri;
}
</style>
 <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
    <script type="text/javascript" src="http://ajax.microsoft.com/ajax/jquery.validate/1.7/jquery.validate.min.js"></script>
    <script src="http://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script>
<script>
$("#btnExport").click(function (e) {
    window.open('data:application/vnd.ms-excel,' + $('#dvData').html());
    e.preventDefault();
});
</script>