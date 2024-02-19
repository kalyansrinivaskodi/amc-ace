function validateName(){
    console.log("coming here");
    
    var userName = document.getElementById("username").value;
    if(userName.length === 0){
        producePrompt("Name is required", "unerror", "red","username");
        return false;
    }
    if(!userName.match(/^[A-za-z]*$/)){
        producePrompt("please enter valid name", "unerror", "red", "username");
        return false;
    }
    producePrompt("valid Name", "unerror", "green","username");
        return true;
}
function validateDesig(){
    var designName=document.getElementById("design").value;
    if(designName.length === 0){
        producePrompt("please enter your designation", "dserror", "red","design");
        return false;
    }
}
function validateDept(){
    var deptName=document.getElementById("dept").value;
    if(deptName==0){
        producePrompt("Please select department name", "deperror", "red","dept");
        return false;
    }
    

}

function validateComplaint(){
    var designName=document.getElementById("complaint").value;
    if(designName.length === 0){
        producePrompt("please enter complaint details", "deperror", "red","complaint");
        return false;
    }
}
function validateEmail(){
    
    var email = document.getElementById("email").value;
    if(email.length == 0){
        producePrompt("Email is required", "emerror", "red", "email");
        return false;
    }
    if(!email.match(/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/)){
        producePrompt("please enter valid email address", "emerror", "red","email");
        return false;
    } 
    producePrompt(" valid Email address", "emerror", "green","email");
        return true;

}

function validatePhone(){
    var phoneno = document.getElementById("phone").value;
    if(phoneno.length == 0){
        producePrompt("phone Number is required", "pnerror", "red","phone");
        return false;
    }
    if(!phoneno.match(/^\d{10}$/)(/^[0-9]$/)){
        producePrompt("please enter valid phone Number", "pherror", "red","phone");
        return false;
    }
    producePrompt("valid Phone Number", "pherror", "green","phone");
        return true;
}
function producePrompt(message, promptLocation, color,username){
    document.getElementById(promptLocation).innerHTML = message;
    document.getElementById(promptLocation).style.color = color;
    document.getElementById(username).style.borderColor = color;
}


function validateFormOnSubmit(){
    var userName = document.getElementById("username").value;{
    if(userName.length == 0){
        producePrompt("Name is required", "fnerror", "red", "username");
        return false;
        }
        validateName();
    }
    var designation =document.getElementById("design").value;{
    if(designation.length == 0){
        producePrompt("Designation is required", "dserror", "red", "design");
        return false;
        }
        
    }
    var department =document.getElementById("dept").value;{
    if(department.length == 0){
        producePrompt("please select the department", "deperror", "red", "department");
        return false;
        }
        
    }
     var email = document.getElementById("email").value;{
    if(email.length == 0){
        producePrompt("Email is required", "emerror", "red", "email");
        return false;
        }
        validateEmail();
    }
   
    var phoneno = document.getElementById("phone").value;{
    if(phoneno.length == 0){
        producePrompt("Phone No is required", "pherror", "red", "phone");
        return false;
        }
        validatePhone();
    }
     var complaint =document.getElementById("complaint").value;{
    if(complaint.length == 0){
        producePrompt("complaint details is required", "comperror", "red", "complaint");
        return false;
        }
        
    }
    
}



/* 
validateDesig();
validateComplaint();
validateDept();
 */