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
    if(userName.length <= 5){
        producePrompt("Password should be atleast 5 characters", "passworderror", "red", "password");
        return false;
    }
    producePrompt("valid Password", "passworderror", "green","password");
        return true;
}

function validateEngineerFormOnSubmit(){

return validateEngineerName() && validateEngineerUsername() && validateEngineerMobile() && validateEngineerPassword();

}



