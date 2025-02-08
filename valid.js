function validateForm(){
    var newpass = document.myForm.newpass.value;
    var confpass = document.myForm.confpass.value;

    // var validpassword = /^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9]).{6,6}$/;
    var returnVal = true;

    
    if(confpass != newpass){
        document.myForm.confpass.style.borderColor = "red";
        document.myForm.newpass.style.borderColor = "red";
        document.getElementById("errconfpass").innerHTML = "*Passwords Don't Match!"; 
        returnVal = false;
    }
    return returnVal;
}