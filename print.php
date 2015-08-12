<script language="javascript">
function Clickheretoprint()
{ 
  var disp_setting="toolbar=yes,location=no,directories=yes,menubar=yes,"; 
      disp_setting+="scrollbars=yes,width=400, height=400, left=100, top=25"; 
  var content_vlue = document.getElementById("print_content").innerHTML; 
  
  var docprint=window.open("","",disp_setting); 
   docprint.document.open(); 
   docprint.document.write('<html><head><title>Print Your Ticket</title>'); 
   docprint.document.write('</head><body onLoad="self.print()" style="width:px; font-size:12px; font-family:arial;">');          
   docprint.document.write(content_vlue);          
   docprint.document.write('</body></html>'); 
   docprint.document.close(); 
   docprint.focus(); 
}

</script><br>
<br>
<br>
<span style="margin-left:455px;">
<a href="javascript:Clickheretoprint()">Print</a>
<div id="print_content" style="width:600 px;">
<h1><strong><span style="margin-left:455px;"><u>Ticket Reservation Details</u></strong></h1><br>
<span style="margin-left:455px;"><b><u>Payment Details:</u></b></sapn><br>
<?php
include('db.php');
$id=$_GET['id'];
$setnum=$_GET['setnum'];
$result = mysql_query("SELECT * FROM customer WHERE transactionum='$id'");
while($row = mysql_fetch_array($result))
	{
		


		echo '<span style="margin-left:455px;">Transaction Number:'.$row['transactionum'].'<br>';
		echo '<span style="margin-left:455px;">Name: '.$row['fname'].' '.$row['lname'].'<br>';
		echo '<span style="margin-left:455px;">Address: '.$row['address'].'<br>';
		echo '<span style="margin-left:455px;">Contact: '.$row['contact'].'<br>';
		echo '<span style="margin-left:455px;">Payable: '.$row['payable'].'<br><br>';
	}
	
$results = mysql_query("SELECT * FROM reserve WHERE transactionnum='$id'");
while($rows = mysql_fetch_array($results))
	{
		$ggagaga=$rows['bus'];
		echo '<span style="margin-left:455px;">'.'<u><b>'.'Route and Type of Bus: '.'</u></b>'.'<br>';
		$resulta = mysql_query("SELECT * FROM route WHERE id='$ggagaga'");
		while($rowa = mysql_fetch_array($resulta))
			{
			echo '<span style="margin-left:455px;">'.$rowa['route'].':'.$rowa['type'];
			$time=$rowa['time'].'<br>';
			}
		echo '<br>'.'<span style="margin-left:455px;">'.'Time of Departure: '.$time;

		echo '<span style="margin-left:455px;">Seat Number: '.$setnum.'<br>';
		echo '<span style="margin-left:455px;">Date Of Travel: '.$rows['date'].'<br>';
		
	}
?>
</div>
<br>
<br>
<br>
<span style="margin-left:455px;"><b>******* Welcome again! CrossTRAVELS ********</b></span><br>
<br>
<br>
<span style="margin-left:455px;"><a href="index.php">Home</a>