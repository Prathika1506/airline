$(document).ready(function(){
	$("#add").show();
	$("#update").hide();
	// $("#delete").hide();
	$("#godate").hide();
	$("#retdate").hide();
	$("#airp1").hide();
	$("#airp2").hide();
	$("#godatee").hide();
	$("#retdatee").hide();
	$("#airp11").hide();
	$("#airp22").hide();
	$("#adround").hide();
	$("#owsearch").hide();
	$("#rtsearch").hide();
	$("#up").hide();
	$("#upround").hide();
	$("#de").hide();
	$("#deround").hide();

	$("#rt").click(function(){ 
		$("#godate").show();
		$("#retdate").show();
		$("#airp1").show();
		$("#airp2").show();
		$("#fd").hide();
		$("#depair").hide();
		$("#arrair").hide();
		$("#adround").show();
		$("#adone").hide(); 
		$("#errflightoneway").hide();
	});
	$("#ow").click(function(){ 
		$("#godate").hide();
		$("#retdate").hide();
		$("#airp1").hide();
		$("#airp2").hide();
		$("#fd").show();
		$("#depair").show();
		$("#arrair").show();
		$("#adround").hide();
		$("#adone").show();
		$("#errflightoneway").hide();
	});
	$("#urt").click(function(){ 
		$("#godatee").show();
		$("#retdatee").show();
		$("#airp11").show();
		$("#airp22").show();
		$("#fd2").hide();
		$("#upround").show();
		$("#up").hide();
		$("#depair1").hide();
		$("#arrair1").hide();
		$("#owsearch").hide();
		$("#rtsearch").show();
		$("#errflight").hide();
	});
	$("#uow").click(function(){ 
		$("#godatee").hide();
		$("#retdatee").hide();
		$("#airp11").hide();
		$("#airp22").hide();
		$("#fd2").show();
		$("#up").show();
		$("#upround").hide();
		$("#depair1").show();
		$("#arrair1").show();
		$("#owsearch").show();
		$("#rtsearch").hide();
	    $("#errflight").hide();
	});
	$("#drt").click(function(){ 
		$("#godatee").show();
		$("#retdatee").show();
		$("#airp11").show();
		$("#airp22").show();
		$("#fd2").hide();
		$("#upround").hide();
		$("#up").hide();
		$("#de").hide();
		$("#deround").show();
		$("#depair1").hide();
		$("#arrair1").hide();
		$("#owsearch").hide();
		$("#rtsearch").show();
	});
	$("#dow").click(function(){ 
		$("#godatee").hide();
		$("#retdatee").hide();
		$("#airp11").hide();
		$("#airp22").hide();
		$("#fd2").show();
		$("#up").hide();
		$("#de").show();
		$("#deround").hide();
		$("#upround").hide();
		$("#depair1").show();
		$("#arrair1").show();
		$("#owsearch").show();
		$("#rtsearch").hide();
	});
	$("#a").click(function(){
		$(':input','#result')
 	 .not(':button, :submit, :reset, :hidden')
  	.val('');
		$("#update").hide(); 
		$("#add").show(); 
		$("#de").hide();
		$("#deround").hide();
		$("#up").hide();
		$("#upround").hide();
		$("#adone").show();
		$("#adround").hide();
	});
	$("#u").click(function(){
		$(':input','#result')
 	 .not(':button, :submit, :reset, :hidden')
  	.val('');
  	$("#number").val('');
		$("#update").show();
		$("#add").hide();
		$("#de").hide();
		$("#deround").hide();
		$("#up").show();
		$("#upround").hide(); 
		$("#owsearch").show();
		$("#rtsearch").hide();
		$("#dele").hide();
		$("#upd").show();
	});
	$("#d").click(function(){
		$("#number").val('');
		$(':input','#result')
 	 .not(':button, :submit, :reset, :hidden')
  	.val('');
		$("#update").show();
		$("#add").hide();
		$("#de").show();
		$("#deround").hide();
		$("#up").hide();
		$("#upround").hide();
		$("#owsearch").show();
		$("#rtsearch").hide();
		$("#upd").hide();
		$("#dele").show();
	});

	$("#search").click(function(){
		var url = "adminsearch.php"; 
		$.getJSON(url, {flightno: document.getElementById("number").value}, function(data){ 
			if(data.flights == "")
				alert("No flight found!");
				else{	 
			$.each(data.flights, function(i, flight){ 
				document.getElementById("flightno1").value = flight.fnumber;
				document.getElementById("airplaneid1").value = flight.aid;
				document.getElementById("ttime1").value = flight.todate;
				document.getElementById("departure1").value = flight.dairport;
				document.getElementById("dtime1").value = flight.dtime;
				document.getElementById("arrival1").value = flight.aairport;
				document.getElementById("atime1").value = flight.atime;
				
			});
			$.each(data.airplane, function(i, airplanes){ 
				document.getElementById("airplanename1").value = airplanes.pname;
			});
			$.each(data.classeseconomy, function(i,classeseconomy){
				document.getElementById("ecapacity1").value = classeseconomy.capacity;
				document.getElementById("eprice1").value = classeseconomy.price;
			});
			$.each(data.classesbusiness, function(i,classesbusiness){
				document.getElementById("bcapacity1").value = classesbusiness.capacity;
				document.getElementById("bprice1").value = classesbusiness.price;
			});
		}
		});
	});

	$("#rsearch").click(function(){
		var url = "adminroundsearch.php";
		$.getJSON(url, {flightno: document.getElementById("rnumber").value}, function(data){ 
			if(data.flights == "")
				alert("No flight found!");
				else{	 
			$.each(data.flights, function(i, flight){ 
				document.getElementById("flightno1").value = flight.fnumber;
				document.getElementById("airplaneid1").value = flight.aid;
				document.getElementById("gtimee").value = flight.gdate;
				document.getElementById("airport11").value = flight.airport1;
				document.getElementById("rtimee").value = flight.rdate;
				document.getElementById("airport22").value = flight.airport2;
				document.getElementById("dtime1").value = flight.dtime;
				document.getElementById("atime1").value = flight.atime;
				
			});
			$.each(data.airplane, function(i, airplanes){ 
				document.getElementById("airplanename1").value = airplanes.pname;
			});
			$.each(data.classeseconomy, function(i,classeseconomy){
				document.getElementById("ecapacity1").value = classeseconomy.capacity;
				document.getElementById("eprice1").value = classeseconomy.price;
			});
			$.each(data.classesbusiness, function(i,classesbusiness){
				document.getElementById("bcapacity1").value = classesbusiness.capacity;
				document.getElementById("bprice1").value = classesbusiness.price;
			});
		}
		});
	});
})