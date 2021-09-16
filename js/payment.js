function validate(){
   const cardno = document.getElementById('cardno');
   const error1 =document.getElementById('name_error');
   const cvv = document.getElementById('cvv');
   const error2 =document.getElementById('password_error');
   const username = document.getElementById("cdname");
   const error3 = document.getElementById("cdname_error");
   const exp = document.getElementById("exp");
   const error4 = document.getElementById("exp_error");

  let cardnoRegex = /^[0-9]+$/;
    let passwordRegex = /^[0-9]{3}$/;
    let usernameRegex = /^[a-zA-Z]+$/;

    if (!cardno.value.match(cardnoRegex)) {
     	error1.style.display = "inline-block";
		error1.style.color = "#ff0000";
		error1.innerHTML = "Invalid cardno!";
		cardno.focus();
		return false;
    }


  if (cardno.value.length < 16) {
   error1.style.display = "inline-block";
		error1.style.color = "#ff0000";
		error1.innerHTML = "Cardno is less than 16!";
		cardno.focus();
		return false;
  }

  if (cardno.value.length > 16) {
   error1.style.display = "inline-block";
		error1.style.color = "#ff0000";
		error1.innerHTML = "Cardno is greater than 16!";
		cardno.focus();
		return false;
  }
  if (cardno.value.length == 16) {
   error1.style.display = "none";
  }

 if(exp.value < new Date().toISOString().slice(0,10)){
 	 error4.style.display = "inline-block";
		error4.style.color = "#ff0000";
		error4.innerHTML = "Card expired!";
		exp.focus();
      return false;
 }else{
 	error4.style.display="none";
 }

   // validate cvv
    if (cvv.value.length < 3 || cvv.value.length > 3) {
   error2.style.display = "inline-block";
		error2.style.color = "#ff0000";
		error2.innerHTML = "Cvv should be of length 3!";
		cvv.focus();
      return false;
    }else{
		   error2.style.display = "none";
    }

    if(!cvv.value.match(passwordRegex)){
   	error2.style.display = "inline-block";
		error2.style.color = "#ff0000";
		error2.innerHTML = "Invalid cvv";
		cvv.focus();
		return false;
    }else{
		   error2.style.display = "none";
    }

    if(!username.value.match(usernameRegex)){
    	error3.style.display = "inline-block";
		error3.style.color = "#ff0000";
		error3.innerHTML = "Invalid card holder name.";
		username.focus();
		return false;
    }else{
    	error3.style.display = "none";
    }

    let href = window.location.href.replace("payment","success");
    document.getElementById("v1form").setAttribute("action",href);
    return true;

 }