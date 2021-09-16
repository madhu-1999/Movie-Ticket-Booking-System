function validate() {
			const email = document.getElementById('email');
			const pwd  = document.getElementById('pwd');
			const confirm_pwd  = document.getElementById('confirm_pwd');
			const sec_ans =document.getElementById('sec_ans');
			const form = document.getElementById('signup-form');
			const error1 = document.getElementById('error1');
			const error2 = document.getElementById('error2');
			const error3 = document.getElementById('error3');
			let flag=0,flag1=0,flag2=0,flag3=0;
			
			if(!email.value.trim().match('^[a-zA-Z0-9._-]+[A-Za-z]+@[a-zA-Z0-9]+\\.[a-zA-Z]{2,6}$')){
				error1.style.display = "inline-block";
				error1.style.color = "#ff0000";
				error1.innerHTML = "Invalid email!";
				flag1=0;
				console.log(flag1);
			}
			else{
				error1.style.display = "none";
				flag1=1;
			}

			if(pwd.value!=confirm_pwd.value){
				error2.style.display = "inline-block";
				error2.style.color = "#ff0000";
				error2.innerHTML = "Password not matching!";
				flag2=0;
				console.log(flag2);
			}
			else{
				error2.style.display = "none";
				flag2=1;
			}
			if(sec_ans.value==""){
				error3.style.display = "inline-block";
				error3.style.color = "#ff0000";
				error3.innerHTML = "Please enter answer!";
				flag3=0;
				console.log(flag3);
			}
			else{
				error3.style.display = "none";
				flag3=1;
			}

			if(flag1 == 1 && flag2 == 1 && flag3 == 1)
				flag=1;
			if(flag==0)
				return false;
			else{
				console.log('ok');
				return;
			}
		};