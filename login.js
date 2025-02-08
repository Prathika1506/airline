$(document).ready(function() {
	$("#old").hide();
    $("#cart").hide();
    $("#new").show();
    
    // var username = document.getElementById("username").value;
    xmlhttp = new XMLHttpRequest();	
	xmlhttp.onreadystatechange = function() {
               if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                var content = xmlhttp.responseText;
                
                if(content != "0")
                {
             	   $("#old").show();
                   $("#cart").show();
             	   $("#new").hide();
             	   content = "WELCOME " + content + "!";
             	   $("#welcome").text(content);
             	  }
             	   else
             	   {	
             	   $("#old").hide();
                   $("#cart").hide();
             	   $("#new").show();
             	                	   }
            }
        }
        
        xmlhttp.open("GET","homee.php",true);
        xmlhttp.send();      

        $("#logout").click(function(){
        	location.href = "logout.php";
        });
        });