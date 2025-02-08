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
	<meta http-equiv="X-UA-Compatible" content="ide=edge">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="mystyle.css">
	<script src="jquery-3.4.1.js"></script>
	<script src="bootstrap-4.0.0-dist/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="bootstrap-4.0.0-dist/css/bootstrap.min.css">
	<script src="login.js"></script>
	<script src="jump.js"></script>
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
                                <a class="dropdown-item" href="signin.php">Customer Signin</a>
                            </div>
                        </li>
                        <li class="nav-item"><a href="registering.php" class="nav-link" id="reg">REGISTER</a></li>
                    </ul>


                    <ul class="navbar-nav ml-auto" id="old">
                        <li class="nav-item"><a href="#" class="nav-link">HOME</a></li>
                        <li class="nav-item"><a href="contact.php" class="nav-link">CONTACT US</a></li>
                        <li id = "cart">
						<a class="nav-link" href="cartshow.php"><span class="glyphicon glyphicon-shopping-cart"></span> Shopping Cart</a>
						</li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-toggle="dropdown" tabindex="-1" href="#"><span class="glyphicon glyphicon-user" id="welcome"> Welcome!</span>
                                <span class="caret"></span>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="showhistory.php">History</a>
                                <a class="dropdown-item" href="setting.php">Setting</a>
                                <a class="dropdown-item" href="#" id="logout">Sign out</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
        <div class="container-fluid register">
	        <div class="row">
	            <div class="col-md-2 register-left"> 		
	           	</div>
	            <div class="col-md-8 register-right">
	            	<div class="container" class="register-right">
						<h1 class="sear"><b>Search Flights</b></h1>
						<br />
						<p><b>Choose your flight option</b></p>
						<div class="btn-group btn-group-justified">			
							<div class="btn-group">
								<button id="button1" type="button" href="#oneway" class="btn btn-primary">One-way</button>
							</div>
							<div class="btn-group">
								<button id="button2" type="button" href="#roundtrip" class="btn btn-primary">Round-trip</button>
							</div>
							<div class="btn-group">
								<button id="button3" type="button" href="#all" class="btn btn-primary">Search all One-Way flights</button>
							</div>
							<div class="btn-group">
								<button id="button4" type="button" href="#allround" class="btn btn-primary">Search all Round-Trip Flights</button>
							</div>
						</div>
						<hr>
						<div id="oneway">
							<form role="form" action="onewaysearch.php" method="post">
							  <div class="row">
							  <div class="col-sm-6">
							    <label for="from">From:</label>
							 <select class="form-control" name="from">
							    <?php
							    $dairport = $data->selectdairport('onewayflights');
							    foreach ($dairport as $value) {
							    	?>
						            <option><?php echo $value['dairport']; ?></option>
							    <?php 
									}
							    ?>
							</select>



							  </div>
							  <div class="col-sm-6">
							    <label for="to">To:</label>
							    <select class="form-control" name="to">
							    	<?php
							    		$aairport = $data->selectaairport('onewayflights');
							    		foreach ($aairport as $value) {
							    			?>
							    			<option><?php echo $value['aairport']; ?></option>
							    	<?php
							    		}
							    	?>
							    </select>
							  </div>
							  </div>
							  <hr >
							  <div class="row">
								  <div class="col-sm-6">
								    <label for="depart">Depart:</label>
								    <input type="date" class="form-control" id="depart" name="dtime" required>
							  </div>   
							   <!-- <div class="row"> -->
							   <hr >
							  <div class="col-sm-6">
							    <label for="class">Class:</label>
							    <select class="form-control" name="class">
							      <option value="Economy">Economy</option>
							      <option value="Business">Business</option>   
							    </select>
							  </div> 
							  </div>
							  <hr> 
							  <br>
							  <div class="btn-group btn-group-justified">	
									<div class="btn-group">
										<button type="submit" class="btn btn-success">Submit</button>
									</div>
									<div class="btn-group">
										<button type="reset"  class="btn btn-info" value="Reset">Reset</button>
									</div>
							  </div>
							  <br>
							  <br>
							</form>
						</div>


						<div id="roundtrip">
							<form role="form" action="roundtripsearch.php" method="post">
								 <div class="row"> 
								  <div class="col-sm-6">
								    <label for="from">From:</label>
								    <select class="form-control" name="from">
									    <?php
									    $dairport = $data->selectairport1('roundflights');
									    foreach ($dairport as $value) {
									    	?>
								            <option><?php echo $value['airport1']; ?></option>
									    <?php 
											}
									    ?>
									</select>
								  </div>
								  <div class="col-sm-6">
								    <label for="to">To:</label>
								    <select class="form-control" name="to">
									    <?php
									    $dairport = $data->selectairport2('roundflights');
									    foreach ($dairport as $value) {
									    	?>
								            <option><?php echo $value['airport2']; ?></option>
									    <?php 
											}
									    ?>
									</select>
								  </div>
								 </div>
								 <hr >
								<div class="row">  
								  <div class="col-sm-6">
								    <label for="depart">Depart:</label>
								    <input type="date" class="form-control" id="depart" name="dtime" required>
								  </div>  
								  <div class="col-sm-6">
								    <label for="return">Return:</label>
								    <input type="date" class="form-control" id="return" name="return" required>
								  </div>
								 </div>
								 <hr >
								 <div class="row">   
								  <div class="col-sm-6">
								    <label for="class">Class:</label>
								    <select class="form-control" name="classtype">
								      <option value="Economy">Economy</option>
								      <option value="Business">Business</option>   
								    </select>
								  </div> 
								 </div>
								 <br> 
								  <div class="btn-group btn-group-justified">	
									<div class="btn-group">
										<button type="submit" class="btn btn-success">Submit</button>
									</div>
									<div class="btn-group">
										<button type="reset"  class="btn btn-info" value="Reset">Reset</button>
									</div>
							  	  </div>
								 <br>
								 <br>
								</form>
						</div>
						<div id="all">
							<form role="form" action="allsearch.php" method="post">
								 <div class="row"> 
								  <div class="col-sm-6">
								  <label for="selectdate">Select a date:</label>
								  <input type="date" class="form-control" id="selectdate" name="selectdate" required>
								  </div>
								 </div>
								 <br>
								<div class="row">   
								  <div class="col-sm-6">
								  <button type="submit" class="btn btn-primary">Show ALL</button>
								  </div>
								</div>
								<br>
								<br> 
								</form> 
						</div>
						<div id="allround">
							<form role="form" action="allsearchroundtrip.php" method="post">
								 <div class="row"> 
								  <div class="col-sm-6">
								  <label for="selectdate">Select Going Date:</label>
								  <input type="date" class="form-control" id="selectdate" name="selectdate1" required>
								  </div>

								  <div class="col-sm-6">
								  <label for="selectdate">Select Returning Date:</label>
								  <input type="date" class="form-control" id="selectdate" name="selectdate2" required>
								  </div>
								 </div>
								 <br>
								<div class="row">   
								  <div class="col-sm-6">
								  <button type="submit" class="btn btn-primary">Show ALL</button>
								  </div>
								</div>
								<br>
								<br> 
								</form> 
						</div>	
					</div>
				</div>
			</div>  
		</div>  
		<div class="container">
			<div class="row">
        		<div class="col-md-12">
        			<h3><b>Quick Facts About Ethiopian Airlines</b></h3>
        		</div>
        	</div>
        	<div class="row">
        		<div class="col-sm-4">
        			<div class ="fact2">
        				<h5 id="punctuality">Punctuality</h5>
        				<p class="numbers">75%</p>
        			</div>
        		</div>
        		<div class="col-sm-4">
        			<div class ="fact2">
        				<h5 id="punctuality">Delayed Flights</h5>
        				<p class="numbers">11%</p>
        			</div>
        		</div>
        		<div class="col-sm-4">
        			<div class="fact2">
        				<h5 id="punctuality">Canceled Flights</h5>
        				<p class="numbers">0%</p>
        			</div>
        		</div>
        	</div>
		</div>

		<div class="container-fluid pics">
            <div class="container-fluid" style="background-color: white;box-shadow: 1px 1px 3px 3px;">
            	<div class="row addis">
            		<div class="col-md-12">
            			<h3 style="margin: 3% 0 2% 0;">Popular Ethiopian Airline Destinations</h3>
            		</div>
            	</div>
            	<div class="row addis">
	            	<div class="col-md-4 addis">
	            		<a><img style="width: 100%;height: 
	            		80%;" src="bahirdar.jpg"></a>
	            		<h6>Bahir Dar</h6>
	            		<h6><b>1012 birr</b></h6>
	            	</div>
	            	<div class="col-md-4 addis">
	            		<img style="width: 100%;height: 
	            		80%;" src="gondar.jpg">
	            		<h6>Gondar</h6>
	            		<h6><b>1012 birr</b></h6>
	            	</div>
	            	<div class="col-md-4 addis">
	            		<img style="width: 100%;height: 
	            		80%;" src="axum.jpg">
	            		<h6>Axum</h6>
	            		<h6><b>1012 birr</b></h6>
	            	</div>
	            </div>
	            <div class="row">
	            	<div class="col-md-4 addis">
	            		<img style="width: 100%;height: 
	            		80%;" src="bole.jpg">
	            		<h6>Addis Ababa</h6>
	            		<h6><b>1012 birr</b></h6>
	            	</div>	
	            	<div class="col-md-4 addis">
	            		<img style="width: 100%;height: 
	            		80%;" src="awasa.jpg"> 
	            		<h6>Awasa</h6>
	            		<h6><b>1012 birr</b></h6>
	            	</div>	
	            	<div class="col-md-4 addis">
	            		<img style="width: 100%;height: 
	            		80%;" src="index.jpg"> 
	            		<h6>Addis Ababa</h6>
	            		<h6><b>1012 birr</b></h6>
	            	</div>	
	            </div> 
            </div>
        </div>
        <div class="container-fluid pics">
            <div class="container-fluid" style="background-color: white;box-shadow: 1px 1px 3px 3px;">
            	<div class="row addis">
            		<div class="col-md-12">
            			<h3 style="margin: 3% 0 2% 0;">Popular Ethiopian Airline Destinations</h3>
            		</div>
            	</div>
            	<div class="row addis">
	            	<div class="col-md-4 addis">
	            		<a><img style="width: 100%;height: 
	            		80%;" src="bahirdar.jpg"></a>
	            		<h6>Bahir Dar</h6>
	            		<h6><b>1012 birr</b></h6>
	            	</div>
	            	<div class="col-md-4 addis">
	            		<img style="width: 100%;height: 
	            		80%;" src="gondar.jpg">
	            		<h6>Gondar</h6>
	            		<h6><b>1012 birr</b></h6>
	            	</div>
	            	<div class="col-md-4 addis">
	            		<img style="width: 100%;height: 
	            		80%;" src="axum.jpg">
	            		<h6>Axum</h6>
	            		<h6><b>1012 birr</b></h6>
	            	</div>
	            </div>
	            <div class="row">
	            	<div class="col-md-4 addis">
	            		<img style="width: 100%;height: 
	            		80%;" src="bole.jpg">
	            		<h6>Addis Ababa</h6>
	            		<h6><b>1012 birr</b></h6>
	            	</div>	
	            	<div class="col-md-4 addis">
	            		<img style="width: 100%;height: 
	            		80%;" src="awasa.jpg"> 
	            		<h6>Awasa</h6>
	            		<h6><b>1012 birr</b></h6>
	            	</div>	
	            	<div class="col-md-4 addis">
	            		<img style="width: 100%;height: 
	            		80%;" src="index.jpg"> 
	            		<h6>Addis Ababa</h6>
	            		<h6><b>1012 birr</b></h6>
	            	</div>	
	            </div> 
            </div>
        </div>
        <footer class="container-fluid text-center">
			<a href="#signUpPage" title="To Top">
				<span class="glyphicon glyphicon-chevron-up"></span>
			</a>
			<p>Ethiopian Airlines</p>		
		</footer>
</body>
<!-- </html> -->