

function validateName(){
    var userName = document.getElementById("username").value;
    if(userName.length === 0){
        producePrompt("Name is required", "unerror", "red","username");
        return false;
    }
	//var patt = /^[A-za-z][A-za-z\s.]*$/g;
	//var result = patt.test(userName);
    if(!userName.match(/^[A-za-z][A-za-z\s.]*$/)){	//     ^\w+( \w+)*$    /^[A-za-z\s]+$/
	//if(!result){  
        producePrompt("please enter valid name", "unerror", "red", "username");
        return false;
    }
    producePrompt("valid Name", "unerror", "green","username");
        return true;
}



function validatePhone(){

    var phoneno = document.getElementById("phone").value;
    if(phoneno.length == 0){
        producePrompt("phone Number is required", "pherror", "red","phone");
        return false;
    }
    if((!phoneno.match(/^[1-9][0-9]{9}$/))&&(!phoneno.match(/^[1-9][0-9]{3}$/))){
        producePrompt("please enter valid phone Number", "pherror", "red","phone");
        return false;
    }
    producePrompt("valid Phone Number", "pherror", "green","phone");
        return true;
}

function validateDesig(){
    var designName=document.getElementById("design").value;
    if(designName === "select"){
        producePrompt("please select your designation", "dserror", "red","design");
        return false;
    }
	producePrompt("", "dserror", "green","design");
	return true;
}


function validateDept(){
    var deptName=document.getElementById("dept").value;
    if(deptName === "select"){
        producePrompt("Please select department name", "deperror", "red","dept");
        return false;
    }
	producePrompt("", "deperror", "green","dept");
    return true;
}

function validateCompCat(){
    var compcategory=document.getElementById("compcat").value;
    if(compcategory === "select"){
        producePrompt("Please select Complaint category", "compcaterror", "red","compcat");
        return false;
    }
	producePrompt("", "compcaterror", "green","compcat");
    return true;
}

function validateCompDetails(){
    var details = document.getElementById("complaint").value;
    if(details.length === 0){
        producePrompt("Complaint Details are required", "comperror", "red","complaint");
        return false;
    }
	producePrompt("", "comperror", "green","complaint");
    return true;
}

function validateEmail(){

    var email = document.getElementById("email").value;
    if(email.length == 0){
        producePrompt("Email is required", "emerror", "red", "email");
        return false;
    }
	 if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(myForm.emailAddr.value))
  /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/
  if(!email.match(/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/)){
        producePrompt("please enter valid email address", "emerror", "red","email");
        return false;
    }
    producePrompt(" valid Email address", "emerror", "green","email");
        return true;

}

function producePrompt(message, promptLocation, color,username){
    document.getElementById(promptLocation).innerHTML = message;
    document.getElementById(promptLocation).style.color = color;
    document.getElementById(username).style.borderColor = color;
}


function validateFormOnSubmit(){
return validateName() && validateEmail() && validatePhone() && validateDesig() && validateDept() && validateCompDetails();
}

function validateReportOnSubmit(){

    var from = document.getElementById("from").value;
	var to = document.getElementById("to").value;
	var today = new Date();
	var fromDate = new Date(from);
	var toDate = new Date(to);
	if(toDate.getTime() > today.getTime()) {
		producePrompt("To date should be less than or equal to Today's date", "toerror", "red", "to");
		return false;
    }
	if(fromDate.getTime() <= toDate.getTime()) {
		return true;
    } 
    else {
		//window.alert("from date should be earlier to date");
		producePrompt("From date should be earlier than To date", "fromerror", "red", "from");
		return false;
    }
}

function validateEngineerName(){
    var Name = document.getElementById("name").value;
    if(Name.length === 0){
        producePrompt("Name is required", "nameerror", "red","name");
        return false;
    }
    if(!Name.match(/^[A-za-z][A-za-z\s.]*$/)){
        producePrompt("please enter valid name", "nameerror", "red", "name");
        return false;
    }
    producePrompt("valid Name", "nameerror", "green","name");
        return true;
}

function validateEngineerUsername(){
    var userName = document.getElementById("username").value;
    if(userName.length === 0){
        producePrompt("Username is required", "usernameerror", "red","username");
        return false;
    }
    if(userName.length <= 5){
        producePrompt("Username should be atleast 5 characters", "usernameerror", "red", "username");
        return false;
    }
    producePrompt("valid Name", "usernameerror", "green","username");
        return true;
}

function validateEngineerMobile(){

    var phoneno = document.getElementById("mobile").value;
    if(phoneno.length == 0){
        producePrompt("Mobile Number is required", "mobileerror", "red","mobile");
        return false;
    }
    if((!phoneno.match(/^[1-9][0-9]{9}$/))&&(!phoneno.match(/^[1-9][0-9]{3}$/))){
        producePrompt("please enter valid Mobile Number", "mobileerror", "red","mobile");
        return false;
    }
    producePrompt("valid Mobile Number", "mobileerror", "green","mobile");
        return true;
}

function validateEngineerPassword(){
    var password = document.getElementById("password").value;
    if(password.length === 0){
        producePrompt("Password is required", "passworderror", "red","password");
        return false;
    }
    if(password.length <= 5){
        producePrompt("Password should be atleast 5 characters", "passworderror", "red", "password");
        return false;
    }
    producePrompt("valid Password", "passworderror", "green","password");
        return true;
}

function validateEngineerFormOnSubmit(){

return validateEngineerName() && validateEngineerUsername() && validateEngineerMobile() && validateEngineerPassword();

}

function validateOldPassword(){
    var password = document.getElementById("password").value;
    if(password.length === 0){
        producePrompt("Password is required", "passworderror", "red","password");
        return false;
    }
    if(password.length <= 5){
        producePrompt("Password should be atleast 5 characters", "passworderror", "red", "password");
        return false;
    }
    producePrompt("valid Password", "passworderror", "green","password");
        return true;
}
function validateEngineerPassword(){
    var password = document.getElementById("password").value;
    if(password.length === 0){
        producePrompt("Password is required", "passworderror", "red","password");
        return false;
    }
    if(userName.length <= 5){
        producePrompt("Password should be atleast 5 characters", "passworderror", "red", "password");
        return false;
    }
    producePrompt("valid Password", "passworderror", "green","password");
        return true;
}
function validateEngineerPassword(){
    var password = document.getElementById("password").value;
    if(password.length === 0){
        producePrompt("Password is required", "passworderror", "red","password");
        return false;
    }
    if(userName.length <= 5){
        producePrompt("Password should be atleast 5 characters", "passworderror", "red", "password");
        return false;
    }
    producePrompt("valid Password", "passworderror", "green","password");
        return true;
}
function validateChangePasswordOnSubmit(){

return validateEngineerName() && validateEngineerUsername() && validateEngineerMobile() && validateEngineerPassword();

}







