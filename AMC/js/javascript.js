function validateName(){

	var userName = document.getElementById("username").value;
	if(userName.length == 0){
		producePrompt("Name is required", "fnerror", "red","username");
		return false;
	}
	if(!userName.match(/^[A-za-z]*$/)){
		producePrompt("please enter valid name", "fnerror", "red", "username");
		return false;
	}
	producePrompt("valid Name", "fnerror", "green","username");
		return true;
}


function validatepassword(){
	var password = document.getElementById("password").value;
	if(password.length == 0){
		producePrompt("password is required", "pswerror", "red","password");
		return false;
	}
	if(!password.match(/^(?=.*[A-Za-z])(?=.*\d)(?=.*[$@$!%*#?&])[A-Za-z\d$@$!%*#?&]{8,}$/)){
        producePrompt("password contain atleast 8 characters and at least 1 Alphabet and 1 Number", "pswerror", "red", "password");
        return false;
    }
    if(password.match(/^(?=.*[A-Za-z])(?=.*\d)(?=.*[$@$!%*#?&])[A-Za-z\d$@$!%*#?&]{8,}$/)){
     producePrompt(" valid password", "pswerror", "green","password");
    }
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
	var password = document.getElementById("password").value;{
	if(password.length == 0){
		producePrompt("password is required", "pswerror", "red", "password");
		return false;
		}
		validatepassword();
	}
}


// $db = mysqli_connect('localhost','root','','phpform');
//       $sql = sprintf("INSERT INTO users (user_name, user_mobileno, user_email,user_dob,user_password,user_repassword) values ('%s','%s','%s','%s','%s','%s')",mysqli_real_escape_string($db, $username),mysqli_real_escape_string($db, $phone),mysqli_real_escape_string($db, $email),mysqli_real_escape_string($db, $date),mysqli_real_escape_string($db, $password),mysqli_real_escape_string($db, $repassword));
//       mysqli_query($db,$sql);
//       mysqli_close($db);
//       echo '<p>user added</p>';

$('#login').click(function(){
  var data = $("form").serializeArray();
  console.log(data + 'coming here');
  	$.post($("form").attr("action"),data,function(info){$('#result').html(info)});
  	clearInput();
});
function clearInput(){
	$('#form:input').each(function(){
		$(this).val('');
	});
}

