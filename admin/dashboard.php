<?php
	require_once('auth.php');
?>
<html>
<head>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="febe/style.css" type="text/css" media="screen" charset="utf-8">
<script src="argiepolicarpio.js" type="text/javascript" charset="utf-8"></script>
<script src="js/application.js" type="text/javascript" charset="utf-8"></script>	

<link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
   <script src="lib/jquery.js" type="text/javascript"></script>
  <script src="src/facebox.js" type="text/javascript"></script>
  <script type="text/javascript">
  
    jQuery(document).ready(function($) {
      $('a[rel*=facebox]').facebox({
        loadingImage : 'src/loading.gif',
        closeImage   : 'src/closelabel.png'
      })
    })
  </script>
  
  <style type="text/css">
<!--
.style1 {color: #999999}
-->
  </style>
  
</head>
<body>
	<div id="container">
		<div id="adminbar-outer" class="radius-bottom">
			<div id="adminbar" class="radius-bottom">
			  <div id="details">
					<a class="avatar" href="javascript: void(0)">
					<img width="36" height="36" alt="avatar" src="img/avatar.jpg">
					</a>
					<div class="tcenter">
					Hi
					<strong>Admin</strong>
					!
					<br>
					<a class="alightred" href="../index.php">Logout</a>
					</div>
				</div>
			</div>
		</div>
		<div id="panel-outer" class="radius" style="opacity: 1;">
			<div id="panel" class="radius">
				<ul class="radius-top clearfix" id="main-menu">
					<li>						</li>
					
                    <li></li>
                    <li></li>
                    
                    <li><a href="dashboard.php" class="active style1">Dashboard	</a> </li>
                  <li>
						<a href="route.php"><span>Bus</span>						</a>					</li>
					<li>
						<a href="setinventory.php"><span>Seat Inventory</span>						</a>					</li>
				  <div class="clearfix"></div>
				</ul>
<div id="content" class="clearfix">
					<label for="filter">Filter</label> <input type="text" name="filter" value="" id="filter" />
					<table cellpadding="1" cellspacing="1" id="resultTable">
						<thead>
							<tr>
								<th  style="border-left: 1px solid #C1DAD7"> Firstname </th>
								<th> Lastname </th>
								<th> Address </th>
								<th> Contact </th>
								<th> Route </th>
								<th> Bus Type </th>
								<th> Time </th>
								<th> Seat Number </th>
								<th> Payable </th>
								<th> Status </th>
								<th> Action </th>
							</tr>
						</thead>
						<tbody>
                        
						<?php
							include('../db.php');
							$result = mysql_query("SELECT * FROM customer");
							while($row = mysql_fetch_array($result))
								{
									echo '<tr class="record">';
									echo '<td style="border-left: 1px solid #C1DAD7;">'.$row['fname'].'</td>';
									echo '<td><div align="right">'.$row['lname'].'</div></td>';
									echo '<td><div align="right">'.$row['address'].'</div></td>';
									echo '<td><div align="right">'.$row['contact'].'</div></td>';
									$rrad=$row['bus'];
									$dddd=$row['transactionum'];
									$results = mysql_query("SELECT * FROM route WHERE id='$rrad'");
									while($rows = mysql_fetch_array($results))
										{
									echo '<td><div align="right">'.$rows['route'].'</div></td>';
									echo '<td><div align="right">'.$rows['type'].'</div></td>';
									echo '<td><div align="right">'.$rows['time'].'</div></td>';
										}
									$resulta = mysql_query("SELECT * FROM reserve WHERE transactionnum='$dddd'");
									while($rowa = mysql_fetch_array($resulta))
										{
									echo '<td><div align="right">'.$rowa['seat'].'</div></td>';
										}
									
									echo '<td><div align="right">'.$row['payable'].'</div></td>';
									echo '<td><div align="right">'.$row['status'].'</div></td>';
									echo '<td><div align="center"><a rel="facebox" href="editstatus.php?id='.$row['id'].'">edit</a> | <a href="#" id="'.$row['transactionum'].'" class="delbutton" title="Click To Delete">delete</a></div></td>';
									echo '</tr>';
								}
							?> 
						</tbody>
					</table>
				</div>
				<div id="footer" class="radius-bottom"></div>
			  <div class="clearfix"></div>
			</div>
			<div class="clearfix"></div>
		</div>
		<div class="clearfix"></div>
	</div>
	<script src="js/jquery.js"></script>
  <script type="text/javascript">
$(function() {


$(".delbutton").click(function(){

//Save the link in a variable called element
var element = $(this);

//Find the id of the link that was clicked
var del_id = element.attr("id");

//Built a url to send
var info = 'id=' + del_id;
 if(confirm("Sure you want to delete this update? There is NO undo!"))
		  {

 $.ajax({
   type: "GET",
   url: "deleteres.php",
   data: info,
   success: function(){
   
   }
 });
         $(this).parents(".record").animate({ backgroundColor: "#fbc7c7" }, "fast")
		.animate({ opacity: "hide" }, "slow");

 }

return false;

});

});
</script>
</body>
</html>