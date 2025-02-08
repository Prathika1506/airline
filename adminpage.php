<?php 
 include '../Model/Database.php';  
 $data = new Database;  
 $success_message = '';  

 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="mystyle.css">
	<script src="jquery-3.4.1.js"></script>
	<script src="bootstrap-4.0.0-dist/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="bootstrap-4.0.0-dist/css/bootstrap.min.css">
	<script src="login.js"></script> 
	<script src="admin.js"></script>
</head>
<body> 
	<div id="header">
		<nav class="navbar navbar-expand-sm navbar-dark bg-dark fixed-top">
			<div class="container">
				<button class="navbar-toggler" data-toggle="collapse" data-target="#Navbar">
					<span class="navbar-toggler-icon"></span>
				</button>
				<a href="#" class="navbar-brand"><img src="download.png" style="width: 100px;height: 40px;"></a>
				<div class="collapse navbar-collapse" id="Navbar">
					<ul class="navbar-nav ml-auto" id="new">
						<li class="nav-item"><a href="#" class="nav-link">HOME</a></li>
						<li class="nav-item"><a href="contact.php" class="nav-link">CONTACT US</a></li>

						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" data-toggle="dropdown" tabindex="-1" href="#"><span class="glyphicon glyphicon-user"> Sign in&nbsp;</span><span class="caret"></span>
							</a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdown">
								<a class="dropdown-item" href="signin.php" id="sign">Manager Signin</a>
								<a class="dropdown-item" href="#">Customer Signin</a>
							</div>
						</li>
						<li class="nav-item"><a href="registering.php" class="nav-link" id="reg">REGISTER</a></li>
					</ul>


					<ul class="navbar-nav ml-auto" id="old">
						<li class="nav-item"><a href="#" class="nav-link">HOME</a></li>
						
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" data-toggle="dropdown" tabindex="-1" href="#"><span class="glyphicon glyphicon-user" id="welcome"> Welcome!</span>
								<span class="caret"></span>
							</a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdown">
								<a class="dropdown-item" href="#" id="logout">Sign out</a>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</nav>
	</div>
<div class="container-fluid admin">
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8">
			<div class="btn-group btn-group-justified" style="width: 100%;">
				<div class="btn btn-success btnn" id="a">Add</div>
				<div class="btn btn-success btnn" id="u">Update</div>
				<div class="btn btn-success btnn" id="d">Delete</div>
			</div>
			<hr /> 
			<div id = "add">
				<div class="row">
					<div class="col-sm-6">
						<div class="btn-group btn-group-justified" style="width: 60%;">
							<div class="btn btn-primary btnn" id="ow">One Way</div>
							<div class="btn btn-primary btnn" id="rt">Round Trip</div>
						</div>
					</div>
				</div>
				<br>
				<form class="form-horizontal" action="../Model/adminjob.php" method="post" role="form" id="addf"> 
					<div class="form-group row">
						<label class="control-label col-sm-2" for="flightno2">Flight No.</label>
						<div class="col-sm-6">
							<input type="flightno" class="form-control" id="flightno2" placeholder="" name="flightno">
						</div>
					</div>
					<div class="form-group row">
						<label class="control-label col-sm-2" for="airplaneid2">Airplane ID</label>
						<div class="col-sm-6">
							<input type="airplaneid" class="form-control" id="airplaneid2" placeholder="" name="airplaneid">
						</div>
					</div>
					<div class="form-group row">
						<label class="control-label col-sm-2" for="airplaneid2">Airplane Name</label>
						<div class="col-sm-6">
							<select class="form-control" id="airplanename2" placeholder="" name="airplanename2">
								<option>Airbus</option>
								<option>Boeing</option>
								<option>De Havilland Dash</option>
							</select>
						</div>
					</div>
					<div class="form-group row" id="fd">
						<label class="control-label col-sm-2" for="ttime">Flight Date</label>
						<div class="col-md-6">
							<input type="date" name="ttime" id="ttime">
						</div>
						<div class="col-md-6">
					<?php 
	                    if(@$_GET['err']==true){
	                ?>
	                <p class="alert-light text-danger text-center py-3"><?php echo $_GET['err'] ?></p>
	                
	                <?php

	                    }
	                 ?></div></div>
					<div class="form-group row" id="godate">
						<label class="control-label col-sm-2" for="ttime">Going Date</label>
						<div class="col-md-6">
							<input type="date" name="gtime" id="gtime">
						</div>
					</div>
					<div class="form-group row" id="retdate">
						<label class="control-label col-sm-2" for="ttime">Returning Date</label>
						<div class="col-md-6">
							<input type="date" name="rtime" id="rtime">
						</div>
					</div>
					<div class="form-group row" id="depair">
						<label class="control-label col-sm-2" for="departure">Departure Airport</label>
						<div class="col-sm-6">
							<input type="departure" class="form-control" id="departure2" placeholder="" name="departure">
						</div>
					</div>
					<div class="form-group row" id="airp1">
						<label class="control-label col-sm-2" for="departure">Airport 1</label>
						<div class="col-sm-6">
							<input type="departure" class="form-control" id="airport1" placeholder="" name="airport1">
						</div>
					</div>
					<div class="form-group row">
						<label class="control-label col-sm-2" for="dtime">Departure Time</label>
						<div class="col-sm-6">
							<input type="time" class="form-control" id="dtime2" placeholder="" name="dtime">
						</div>
					</div>
					<div class="form-group row" id="arrair">
						<label class="control-label col-sm-2" for="arrival">Arrival Airport</label>
						<div class="col-sm-6">
							<input type="arrival" class="form-control" id="arrival2" placeholder="" name="arrival">
						</div>
					</div>
					<div class="form-group row" id="airp2">
						<label class="control-label col-sm-2" for="arrival">Airport 2</label>
						<div class="col-sm-6">
							<input type="arrival" class="form-control" id="airport2" placeholder="" name="airport2">
						</div>
					</div>
					<div class="form-group row">
						<label class="control-label col-sm-2" for="atime">Arrival Time</label>
						<div class="col-sm-6">
							<input type="time" class="form-control" id="atime2" placeholder="" name="atime">
						</div>
					</div>
					<div class="form-group row">
						<label class="control-label col-sm-2" for="ecapacity">Economy Capacity</label>
						<div class="col-sm-6">
							<input type="ecapacity" class="form-control" id="ecapacity2" placeholder="" name="ecapacity">
						</div>
					</div>
					<div class="form-group row">
						<label class="control-label col-sm-2" for="eprice">Economy Price</label>
						<div class="col-sm-6">
							<input type="eprice" class="form-control" id="eprice2" placeholder="" name="eprice">
						</div>
					</div>
					<div class="form-group row">
						<label class="control-label col-sm-2" for="bcapacity">Business Capacity</label>
						<div class="col-sm-6">
							<input type="bcapacity" class="form-control" id="bcapacity2" placeholder="" name="bcapacity">
						</div>
					</div>
					<div class="form-group row">
						<label class="control-label col-sm-2" for="bprice">Business Price</label>
						<div class="col-sm-6">
							<input type="bprice" class="form-control" id="bprice2" placeholder="" name="bprice">
						</div>
					</div>
					<?php 
	                    if(@$_GET['errflightoneway']==true){
	                ?>
	                <p class="alert-light text-danger text-center py-3" id="errflightoneway"><?php echo $_GET['errflightoneway'] ?></p>
	                
	                <?php

	                    }
	                 ?>
					<br />
					<div class="form-group row">        
						<div class="col-sm-offset-2 col-sm-8">
							<input type="submit" class="btn btn-primary btn-block" name="btn_addo" id="adone" value = "Add Flight" />
							<input type="submit" class="btn btn-primary btn-block" name="btn_addr" id="adround" value = "Add Flight"/>
						</div>
					</div>
				</form>
			</div>







			<div id = "update">
				<div class="row" id="upd">
					<div class="col-sm-6">
						<div class="btn-group btn-group-justified" style="width: 60%;">
							<div class="btn btn-primary btnn" id="uow">One Way</div>
							<div class="btn btn-primary btnn" id="urt">Round Trip</div>
						</div>
					</div>
				</div>
				<div class="row" id="dele">
					<div class="col-sm-6">
						<div class="btn-group btn-group-justified" style="width: 60%;">
							<div class="btn btn-primary btnn" id="dow">One Way</div>
							<div class="btn btn-primary btnn" id="drt">Round Trip</div>
						</div>
					</div>
				</div>
				<br>

				<form class="form-horizontal" role="form" id="owsearch">
				<div class="row form-group">
					<label class="control-label col-sm-2" for="number">Flight No.</label>
					<div class="col-sm-4">
						<select class="form-control" name="number" id="number">
							    <?php
							    $fnum = $data->selectonewayflights('onewayflights');
							    foreach ($fnum as $value) {
							    	?>
						            <option><?php echo $value['fnumber']; ?></option>
							    <?php 
									}
							    ?>
							</select>
						<!-- <input type="flightno" class="form-control" name="number" id="number" placeholder=""> -->
					</div>
					<div class="col-sm-2">
						<input type="button" class="btn btn-success btn-block" name="search" id="search" value = "search flight" />
					</div>
				</div>
			</form>
			<form class="form-horizontal" role="form" id="rtsearch">
				<div class="row form-group">
					<label class="control-label col-sm-2" for="number">Flight No.</label>
					<div class="col-sm-4">
						<select class="form-control" name="rnumber" id="rnumber">
							    <?php
							    $fnumb = $data->selectroundflights('roundflights');
							    foreach ($fnumb as $value) {
							    	?>
						            <option><?php echo $value['fnumber']; ?></option>
							    <?php 
									}
							    ?>
							</select>
						<!-- <input type="flightno" class="form-control" name="rnumber" id="rnumber" placeholder=""> -->
					</div>
					<div class="col-sm-2">
						<input type="button" class="btn btn-success btn-block" name="rsearch" id="rsearch" value = "search flight" />
					</div>
				</div>
			</form>


				<form class="form-horizontal" role="form" action="../Model/adminjob.php" method="post" id="result">
					<div class="form-group row">
						<label class="control-label col-sm-2" for="flightno">uFlight No.</label>
						<div class="col-sm-6">
							<input type="flightno" class="form-control" id="flightno1" placeholder="" name="flightno" readonly>
						</div>
					</div>
					<div class="form-group row">
						<label class="control-label col-sm-2" for="airplaneid">uAirplane ID</label>
						<div class="col-sm-6">
							<input type="airplaneid" class="form-control" id="airplaneid1" placeholder="" name="airplaneid">
						</div>
						
						<label class="control-label col-sm-1" for="dairportdetail" id="ud1" ><font color="gray">details</font></label>
						<div class="col-sm-3" id = "detail1">
						</div>
					</div> 
					<div class="form-group row">
						<label class="control-label col-sm-2" for="airplaneid2">uAirplane Name</label>
						<div class="col-sm-6">
							<select class="form-control" id="airplanename1" placeholder="" name="airplanename1">
								<option>Airbus</option>
								<option>Boeing</option>
								<option>De Havilland Dash</option>
							</select>
						</div>
					</div>
					<div class="form-group row" id="fd2">
						<label class="control-label col-sm-2" for="ttime">uFlight Date</label>
						<div class="col-md-6">
							<input type="date" name="ttime" id="ttime1" >
						</div>
					</div>
					<div class="form-group row" id="godatee">
						<label class="control-label col-sm-2" for="ttime">uGoing Date</label>
						<div class="col-md-6">
							<input type="date" name="gtime" id="gtimee" >
						</div>
					</div>
					<div class="form-group row" id="retdatee">
						<label class="control-label col-sm-2" for="ttime">uReturning Date</label>
						<div class="col-md-6">
							<input type="date" name="rtime" id="rtimee" >
						</div>
					</div>
					<div class="form-group row" id="depair1">
						<label class="control-label col-sm-2" for="departure">uDeparture Airport</label>
						<div class="col-sm-6">
							<input type="departure" class="form-control" id="departure1" placeholder="" name="departure"> 
						</div>
						<label class="control-label col-sm-1" for="dairportdetail" id="ud2" ><font color="gray">details</font></label>
						<div class="col-sm-3" id = "udetail2">
						</div>
					</div>
					<div class="form-group row" id="airp11">
						<label class="control-label col-sm-2" for="departure">uAirport 1</label>
						<div class="col-sm-6">
							<input type="departure" class="form-control" id="airport11" placeholder="" name="airport1">
						</div>
					</div>
					<div class="form-group row">
						<label class="control-label col-sm-2" for="dtime">uDeparture Time</label>
						<div class="col-sm-6">
							<input type="time" class="form-control" id="dtime1" placeholder="" name="dtime">
						</div>
					</div>
					<div class="form-group row" id="arrair1">
						<label class="control-label col-sm-2" for="arrival">uArrival Airport</label>
						<div class="col-sm-6">
							<input type="arrival" class="form-control" id="arrival1" placeholder="" name="arrival">
						</div>
						<label class="control-label col-sm-1" for="dairportdetail" id="ud3" ><font color="gray">details</font></label>
						<div class="col-sm-3" id = "udetail3">
						</div>
					</div> 
					<div class="form-group row" id="airp22">
						<label class="control-label col-sm-2" for="arrival">uAirport 2</label>
						<div class="col-sm-6">
							<input type="arrival" class="form-control" id="airport22" placeholder="" name="airport2">
						</div>
					</div>
					<div class="form-group row">
						<label class="control-label col-sm-2" for="atime">uArrival Time</label>
						<div class="col-sm-6">
							<input type="time" class="form-control" id="atime1" placeholder="" name="atime">
						</div>
					</div>
					<div class="form-group row">
						<label class="control-label col-sm-2" for="ecapacity">uEconomy Capacity</label>
						<div class="col-sm-6">
							<input type="ecapacity" class="form-control" id="ecapacity1" placeholder="" name="ecapacity">
						</div>
					</div>
					<div class="form-group row">
						<label class="control-label col-sm-2" for="eprice">uEconomy Price</label>
						<div class="col-sm-6">
							<input type="eprice" class="form-control" id="eprice1" placeholder="" name="eprice">
						</div>
					</div>
					<div class="form-group row">
						<label class="control-label col-sm-2" for="bcapacity">uBusiness Capacity</label>
						<div class="col-sm-6">
							<input type="bcapacity" class="form-control" id="bcapacity1" placeholder="" name="bcapacity">
						</div>
					</div>
					<div class="form-group row">
						<label class="control-label col-sm-2" for="bprice">uBusiness Price</label>
						<div class="col-sm-6">
							<input type="bprice" class="form-control" id="bprice1" placeholder="" name="bprice" >
						</div>
					</div>
					<?php 
	                    if(@$_GET['errflight']==true){
	                ?>
	                <p class="alert-light text-danger text-center py-3" id="errflight"><?php echo $_GET['errflight'] ?></p>
	                
	                <?php

	                    }
	                 ?>
					<br />
					<div class="form-group row">        
						<div class="col-sm-offset-2 col-sm-8">
							<input type = "submit" class="btn btn-primary btn-block btnn" name="btn_update" value="Update one" id="up" />

							<input type = "submit" class="btn btn-primary btn-block btnn" name="btn_delete_oneway" value="Delete One-Way Trip" id="de" />

							<input type = "submit" class="btn btn-primary btn-block btnn" name="btn_updateround" value="Update round" id="upround" />
							
							<input type = "submit" class="btn btn-primary btn-block btnn" name="btn_delete_round" value="Delete Round-Trip" id="deround" />
							

						</div>
					</div>
				</form>
			</div>
			<br /><br /><br />
		</div>
		</div>
	</div>	
</body>
</html>