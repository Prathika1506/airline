$(document).ready(function(){
	
	$("#search").click(function(){
		var url = "adminsearch.php";	
		alert("not working");
		$.getJSON(url, {flightno: document.getElementById("number").value}, function(data){
		alert("not working");
			alert("get in");
			if(data.flights == "")
				alert("No flight found!");
				else{	 
			$.each(data.flights, function(i, flight){ 
				document.getElementById("flightno1").value = flight.fnumber;
				document.getElementById("airplaneid1").value = flight.aid;
				document.getElementById("ttimee").value = flight.todate;
				document.getElementById("departure1").value = flight.dairport;
				document.getElementById("dtime1").value = flight.dtime;
				document.getElementById("arrival1").value = flight.aairport;
				document.getElementById("atime1").value = flight.atime;
				
			});
			$.each(data.airplane, function(i, airplanes){ 
				document.getElementById("airplanename1").value = airplanes.pname;
			});
			$.each(data.class, function(i,classes){
				document.getElementById("ecapacity1").value = classes.ecapacity;
				document.getElementById("eprice1").value = classes.eprice;
				document.getElementById("bcapacity1").value = classes.bcapacity;
				document.getElementById("bprice1").value = classes.bprice;
			});
		}
		});
	});
})