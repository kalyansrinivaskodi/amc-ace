

function validateName(){
    var userName = document.getElementById("usernames").value;
    if(userName.length === 0){
        producePrompt("Name is required", "unerror", "red","usernames");
        return false;
    }
	//var patt = /^[A-za-z][A-za-z\s.]*$/g;
	//var result = patt.test(userName);
    if(!userName.match(/^[A-za-z][A-za-z\s.]*$/)){	//     ^\w+( \w+)*$    /^[A-za-z\s]+$/
	//if(!result){  
        producePrompt("Please enter valid name", "unerror", "red", "usernames");
        return false;
    }
	producePrompt("", "unerror", "green", "usernames");
        return true;
}
function validateDept(){
    var deptName=document.getElementById("department").value;
    if(deptName === "select"){
        producePrompt("Please select department name", "deperror", "red","department");
        return false;
    }
	producePrompt("", "deperror", "green", "department");
        return true;
}

function validateCat(){
    var cat=document.getElementById("category").value;
    if(cat === "select"){
        producePrompt("Please select asset category", "dserror", "red","category");
        return false;
    }
	producePrompt("", "dserror", "green", "category");
        return true;
}

function validateSerial()
{ 
	var serName = document.getElementById("serialno").value;
    if(serName.length === 0){
        producePrompt("Serial No is required", "snerror", "red","serialno");
        return false;
    }
	//var patt = /^[A-za-z][A-za-z\s.]*$/g;
	//var result = patt.test(userName);
    if(!serName.match(/^[0-9a-zA-Z]+$/)){	//     ^\w+( \w+)*$    /^[A-za-z\s]+$/
	//if(!result){  
        producePrompt("Please enter valid Serial No", "snerror", "red", "serialno");
        return false;
    }
  producePrompt("", "snerror", "green","serialno");
    return true;
}

function validateMake(){
    var userName = document.getElementById("make").value;
    if(userName.length === 0){
        producePrompt("Make is required", "merror", "red","make");
        return false;
    }
	//var patt = /^[A-za-z][A-za-z\s.]*$/g;
	//var result = patt.test(userName);
    if(!userName.match(/^[A-za-z][A-za-z\s.]*$/)){	//     ^\w+( \w+)*$    /^[A-za-z\s]+$/
	//if(!result){  
        producePrompt("Please enter valid details", "merror", "red", "make");
        return false;
    }
	producePrompt("", "merror", "green","make");
    return true;
   
}

function validateModel(){
    var userName = document.getElementById("model").value;
    if(userName.length === 0){
        producePrompt("Model is required", "mderror", "red","model");
        return false;
    }
	//var patt = /^[A-za-z][A-za-z\s.]*$/g;
	//var result = patt.test(userName);
    if(!userName.match(/^[0-9A-za-z][0-9A-za-z\s.]*$/)){	//     ^\w+( \w+)*$    /^[A-za-z\s]+$/
	//if(!result){  
        producePrompt("Please enter valid details", "mderror", "red", "model");
        return false;
    }
	producePrompt("", "mderror", "green","model");
    return true;
   
    
}


function validateWarranty(){
    var cat=document.getElementById("warranty").value;
    if(cat === "select"){
        producePrompt("Please select Warranty", "werror", "red","warranty");
        return false;
    }
	producePrompt("", "werror", "green", "warranty");
        return true;
}

function validateRamsize(){
    var cat = document.getElementById("ramsize").value;
    if(cat === "select"){
        producePrompt("Please select RAM Size", "ramerror", "red","ramsize");
        return false;
    }
	producePrompt("", "ramerror", "green", "ramsize");
        return true;
}

function validateHarddisk(){
    var cat = document.getElementById("harddisk").value;
    if(cat === "select"){
        producePrompt("Please select Hard Disk", "hderror", "red","harddisk");
        return false;
    }
	producePrompt("", "hderror", "green", "harddisk");
        return true;
    
}

function validateProcessor(){
    var cat=document.getElementById("processor").value;
    if(cat === "select"){
        producePrompt("Please select Processor", "prerror", "red","processor");
        return false;
    }
	producePrompt("", "prerror", "green", "processor");
        return true;
}

function validateOS(){
    var cat=document.getElementById("os").value;
    if(cat === "select"){
        producePrompt("Please select Operating System", "oserror", "red","os");
        return false;
    }
	producePrompt("", "oserror", "green", "os");
        return true;
}

function validateMMake(){
    var userName = document.getElementById("mmake").value;
    if(userName.length === 0){
        producePrompt("Make is required", "mmerror", "red","mmake");
        return false;
    }
	//var patt = /^[A-za-z][A-za-z\s.]*$/g;
	//var result = patt.test(userName);
    if(!userName.match(/^[0-9A-za-z][0-9A-za-z\s.]*$/)){	//     ^\w+( \w+)*$    /^[A-za-z\s]+$/
	//if(!result){  
        producePrompt("Please enter valid details", "mmerror", "red", "mmake");
        return false;
    }
	producePrompt("", "mmerror", "green","mmake");
    return true;
   
    
}

function validateMSerialNo(){
    var userName = document.getElementById("mserialno").value;
    if(userName.length === 0){
        producePrompt("Serial No is required", "mserror", "red","mserialno");
        return false;
    }
	//var patt = /^[A-za-z][A-za-z\s.]*$/g;
	//var result = patt.test(userName);
    if(!userName.match(/^[0-9A-za-z][0-9A-za-z\s.]*$/)){	//     ^\w+( \w+)*$    /^[A-za-z\s]+$/
	//if(!result){  
        producePrompt("Please enter valid details", "mserror", "red", "mserialno");
        return false;
    }
	producePrompt("", "mserror", "green","mserialno");
    return true;
   
    
}


function producePrompt(message, promptLocation, color,username){
    document.getElementById(promptLocation).innerHTML = message;
    document.getElementById(promptLocation).style.color = color;
    document.getElementById(username).style.borderColor = color;
}


function validateFormOnSubmit(){
return validateName()&& validateDept() && validateCat() && validateSerial() && validateMake() && validateModel() && validateWarranty() && validateRamsize() && validateHarddisk() && validateProcessor() && validateOS() && validateMMake() && validateMSerialNo();
}









