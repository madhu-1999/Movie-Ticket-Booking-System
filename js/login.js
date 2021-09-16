function validate() {
			const email = document.getElementById('email');
			const pwd  = document.getElementById('pwd');
			const form = document.getElementById('login-form');
			let flag =0;
			//validate email
			if(!email.value.trim().match('^[a-zA-Z0-9._-]+[A-Za-z]+@[a-zA-Z0-9]+\\.[a-zA-Z]{2,6}$')){
				document.getElementsByTagName('small')[0].style.display = "inline-block";
				document.getElementsByTagName('small')[0].style.color = "#ff0000";
				document.getElementsByTagName('small')[0].innerHTML = "Invalid email!";
				return false;
			}
			else{
				document.getElementsByTagName('small')[0].style.display = "none";	
			}
			
			return true;
		}