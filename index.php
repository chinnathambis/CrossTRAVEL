<?php
	session_start();
	
	unset($_SESSION['SESS_MEMBER_ID']);
?>

<!DOCTYPE html PUBLIC "-//W3C//EN" "http://www.w3.org/TR/html/DTD">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<title>Welcome to CrossTRAVELS and Restaurant</title>

<link rel="stylesheet" type="text/css" href="xres/css/style.css" />
<link rel="icon" type="image/png" href="xres/images/favicon.png" />
<script type="text/javascript" src="xres/js/saslideshow.js"></script>
<script type="text/javascript" src="xres/js/slideshow.js"></script>

<script src="js/jquery-1.5.min.js" type="text/javascript" charset="utf-8"></script>

<script src="vallenato/vallenato.js" type="text/javascript" charset="utf-8"></script>

<link rel="stylesheet" href="vallenato/vallenato.css" type="text/css" media="screen" charset="utf-8">

		<script type="text/javascript">
		$("#slideshow > div:gt(0)").hide();

		setInterval(function() { 
		  $('#slideshow > div:first')
			.fadeOut(1000	)
			.next()
			.fadeIn(1000)
			.end()
			.appendTo('#slideshow');
		},  3000);
	</script>
		<script type="text/javascript" src="js/datepicker.js"></script>
        <link href="css/demo.css"       rel="stylesheet" type="text/css" />
        <link href="css/datepicker.css" rel="stylesheet" type="text/css" />
		<script type="text/javascript">
	

		function makeTwoChars(inp) {
				return String(inp).length < 2 ? "0" + inp : inp;
		}

		function initialiseInputs() {
				document.getElementById("sd").value = "";
				document.getElementById("ed").value = "";

				datePickerController.addEvent(document.getElementById("sd"), "change", setReservationDates);
		}

		var initAttempts = 0;

		function setReservationDates(e) {
				
				try {
						var sd = datePickerController.getDatePicker("sd");
						var ed = datePickerController.getDatePicker("ed");
				} catch (err) {
						if(initAttempts++ < 10) setTimeout("setReservationDates()", 50);
						return;
				}

				var dt = datePickerController.dateFormat(this.value, sd.format.charAt(0) == "m");

				if(dt == 0) return;

				var edv = datePickerController.dateFormat(document.getElementById("ed").value, ed.format.charAt(0) == "m");

				ed.setRangeLow( dt );
				
				if(edv < dt) {
						document.getElementById("ed").value = "";
				}
		}

		function removeInputEvents() {
				datePickerController.removeEvent(document.getElementById("sd"), "change", setReservationDates);
		}

		datePickerController.addEvent(window, 'load', initialiseInputs);
		datePickerController.addEvent(window, 'unload', removeInputEvents);

		</script></head>

<body>
<STYLE TYPE="text/css">
div.margin{
	margin-right: 20px;
	margin-left: 1200px;
	margin-bottom: 0px;
	margin-top: 10px;
}

</STYLE>

<div class=margin>
<div class="fb-like" data-href="https://www.facebook.com/crasstravels" 
data-layout="button_count" data-action="like" data-show-faces="false" data-share="true"></div>

</div>



<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<div id="wrapper">
	<div id="header">
    <h1><a href="index.php"><img src="xres/images/logo.png" class="logo" alt="CrossTRAVELS and Restaurant" /></a></h1>
<ul id="mainnav">
			<li class="current"><a href="index.php">Home</a></li>
            <li><a href="gallery.php">Gallery</a></li>
            <li><a href="history.php">History</a></li>
            <li><a href="routes.php">Routes</a></li>
            <li><a href="location.php">location</a></li>
            <li><a href="contact.php">Contact Us</a></li>
    	</ul>
	</div>
	
<div id="content">
    	<div id="rotator">
              <ul>
                    <li class="show"><img src="xres/images/jb2/01.jpg" width="861" height="379"  alt="" /></li>
                    <li><img src="xres/images/jb2/02.jpg" width="861" height="379"  alt="" /></li>
                    <li><img src="xres/images/jb2/03.jpg" width="861" height="379"  alt="" /></li>
                    <li><img src="xres/images/jb2/04.jpg" width="861" height="379"  alt="" /></li>
                    <li><img src="xres/images/jb2/05.jpg" width="861" height="379"  alt="" /></li>
                    <li><img src="xres/images/jb2/06.jpg" width="861" height="379"  alt="" /></li>

              </ul>
			  
			  <div id="logo" style="left: 600px; height: auto; top: 23px; width: 260px; position: absolute; z-index:4;">
					
					<h2 class="accordion-header" style="height: 18px; margin-bottom: 15px; color: rgb(255, 255, 255); background: none repeat scroll 0px 0px rgb(53, 48, 48);">Ticket Booking</h2>
					<div class="accordion-content" style="margin-bottom: 15px;">
					
						<form action="selectset.php" method="post" style="margin-bottom:none;">
						<span style="margin-right: 11px;">Select Route: 
						<select name="route" style="width: 191px; margin-left: 15px; border: 3px double #CCCCCC; padding:5px 10px;"/>
						
						<?php
						include('db.php');
						$result = mysql_query("SELECT * FROM route");
						while($row = mysql_fetch_array($result))
							{
								echo '<option value="'.$row['id'].'">';
								echo $row['route'].'  :'.$row['type'].'  :'.$row['time'];
								echo '</option>';
							}
						?>
						</select>
						</span><br>
							<span style="margin-right: 11px;">Date: 
						<input type="text" class="w8em format-d-m-y highlight-days-67 range-low-today" name="date" id="sd" value="" maxlength="10" readonly="readonly" style="width: 165px; margin-left: 15px; border: 3px double #CCCCCC; padding:5px 10px;"/>
						</span><br>	
						<span style="margin-right: 11px;">No. of Passenger: 
						<select name="qty" style="width: 191px; margin-left: 15px; border: 3px double #CCCCCC; padding:5px 10px;">
						<option>1</option>
						<option>2</option>
						<option>3</option>
						<option>4</option>
						<option>5</option>
						<option>6</option>
						<option>7</option>
						<option>8</option>
						<option>9</option>
						</select>
						</span><br><br>
						<input type="submit" id="submit" value="Next" style="height: 34px; margin-left: 15px; width: 191px; padding: 5px; border: 3px double rgb(204, 204, 204);" />
						</form>
					</div>
					
					<h2 class="accordion-header" style="height: 18px; margin-bottom: 15px; color: rgb(255, 255, 255); background: none repeat scroll 0px 0px rgb(53, 48, 48);">Admin Login</h2>
					<div class="accordion-content" style="margin-bottom: 15px;">
						
						<form action="login.php" method="post" style="margin-bottom:none;">
						<span style="margin-right: 11px;">Username: <input type="text" name="username" style="width: 165px; margin-left: 15px; border: 3px double #CCCCCC; padding:5px 10px;"/></span><br>
						<span style="margin-right: 11px;">Password: <input type="password" name="password" style="width: 165px; margin-left: 15px; border: 3px double #CCCCCC; padding:5px 10px;"/></span><br><br>
						<input type="submit" id="submit" class="medium gray button" value="Login" style="height: 34px; margin-left: 15px; width: 191px; padding: 5px; border: 3px double rgb(204, 204, 204);" />
						</form>
						
					</div>
				</div>
        </div>
		
    </div>
    <div id="featured">
        <div id="items">
            <div class="item"> <a href="index.php"><img src="xres/images/01_featured.jpg" alt="" /></a>
				<h3><a href="#">Specials Offers</a></h3>
				<p><a href="#"><strong>GET ADDITIONAL OFFER!!!</strong></a></p>
				<p><a href="#"><span class="style1">Book and get additional discount offer </span></a></p>
				<p><a href="#">100 Rs on bus tickets<br />
				</a></p>
				<p>&nbsp;</p>
          </div>
            <div class="item"> <a href="#"><img src="xres/images/02_featured.jpg" alt="" /></a>
				<h3><a href="#">PICK YOUR TRIP</a></h3>
				<p><a href="#"><strong>KERALA - OOTY - AGRA- DELHI</strong><br />
				</a></p>
				<p><a href="#">Get 20% discount for every reservation</a></p>
				<p>&nbsp;</p>
          </div>
			<div class="item" style="width: 860px;"> 
				<img src="xres/images/banner1.png" alt="Reserve your ticket" width="860" height="232" />		  
		  </div>
      </div>
    </div>

	<div id="footer">
	<h4>+(043) 456789 &bull; <a href="contact.php">CMBT Bus Terminal in Tytle City by Cross TECH Transport, Inc.<br />
	  Location: DLF Park Road, Porur-Nanthavanam City ,Chennai-34</a></h4>
	<p>Hours of Operation&nbsp;&nbsp;&bull;&nbsp;&nbsp;Mon - Sun: 10:00 am - 12:00 am</p>
	<a href="index.php"><img src="xres/images/footer-logo.jpg" alt="James Buchanan Pub and Restaurant" /></a>
	<p>&copy; Copyright 2014 CrossTECH | All Rights Reserved <br />
	</p>
</div>
</div>
</body>
</html>
