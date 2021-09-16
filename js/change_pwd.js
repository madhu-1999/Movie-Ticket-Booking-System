$(document).ready(function(){
		$("#hidden-row").hide();
		$("#new_pwd").keyup(function(){
		check_pass();
	});
});

function check_pass(){
	const val = document.getElementById("new_pwd").value;
	let meter = document.getElementById("meter");
	let points=0;
	let length=val.length;
	let characters=[];

	//longer the better,min 8 characters
	points+=Math.floor((length/8)*10);

	//1 point for unique appearance of a character
	for(let i=0;i<length;i+=1){
		if(characters.indexOf(val[i])===-1)
			characters.push(val[i]);
		points+=1;
	}

	//Atleast one of each:lowercase letter,uppercase letter,number,special characters
	if(val.search(/[a-z]/)!=-1)
		points+=1;
	if(val.search(/[A-Z]/)!=-1)
		points+=2;
	if(val.search(/[0-9]/)!=-1)
		points+=3;
	if(val.search(/[\W]/)!=-1)
		points+=4;

	//repetitions like aa,11 are bad
	//sequences are bad like abcd
	for(let i=0;i<length-1;i++){
		if(val[i]===val[i+1]||val[i+1].charCodeAt()===val[i].charCodeAt()+1){
			points-=1;
		}
	}
    // The minimally strong password should have
    // 10 points for length
    // 10 points for variety
    // 8 points for unique characters
    // No minus points for sequences/repetitions
    // That means 28 points. We call the callback with the percentage
    // 100% is the minimally strong password. Anything below is weak, it is
	// always stronger upwards
	meter.value=Math.floor((points/28)*10);
	document.getElementById("hidden-row").style.display=""; //returns to default display style
}


function pwdvalidate(){
	const oldpwd = document.getElementById('old_pwd');
	const newpwd = document.getElementById('new_pwd');
	const confirmpwd = document.getElementById('confirm_pwd');
	const form = document.getElementById('change_pwd');
	let flag_1 = 0,flag_2=0,flag_3=0;

	if(!(oldpwd.value.match(/[a-z]/g) && oldpwd.value.match(/[A-Z]/g) && !(oldpwd.value.match(/[0-9]/g) && oldpwd.value.match(/[^a-zA-Z\d]/g) && oldpwd.length >=8)))
		setErrorFor(oldpwd,'Enter valid password');
	else
		{
			removeErrorFor(oldpwd);
			flag_1=1;
		}


	if(!(newpwd.value.match(/[a-z]/g) && newpwd.value.match(/[A-Z]/g) && !(newpwd.value.match(/[0-9]/g) && newpwd.value.match(/[^a-zA-Z\d]/g) && newpwd.length >=8)))
		setErrorFor(newpwd,'Enter valid password');
	else
		{
			removeErrorFor(newpwd);
			flag_2=1;
		}
	if(newpwd.value!=confirmpwd.value)
		setErrorFor(confirmpwd,'Password not matching');
	else
		{
			removeErrorFor(confirmpwd);
			flag_3=1;
		}

	if(flag_1==1 && flag_2==1 && flag_3==1){
		//form.setAttribute("action","");
		alert('success');
	}
}

function setErrorFor(input,message){
	const parent = input.parentElement;
	const small = parent.querySelector('small');

	//add error message inside small
	small.innerText = message;

	//add error class
	parent.className = 'error';
};

function removeErrorFor(input){
	const parent = input.parentElement;

	//remove error class
	parent.className = '';
};