

function validate(){
	const name = document.getElementById('name');
	const mobile = document.getElementById('mobile');
	const email = document.getElementById('email');
	const dateString = document.getElementById('dob');

	//validate name
	if(!name.value.trim().match('^[A-Za-z\\s]*$'))
		setErrorFor(name,'Enter valid name');
	else
		removeErrorFor(name);

	//validate mobile no.
	if(!mobile.value.trim().match('^[0-9]*$')||(mobile.length>0 && mobile.length<10))
		setErrorFor(mobile,'Enter valid mobile number');
	else
		removeErrorFor(mobile);

	//validate email
	if(!email.value.trim().match('^[a-zA-Z0-9._-]+[A-Za-z]+@[a-zA-Z0-9.-]+\\.[a-zA-Z]{2,6}$'))
		setErrorFor(email,'Enter valid email');
	else
		removeErrorFor(email);

	const date = isDate(dateString.value.trim());
	if(date)
		removeErrorFor(dateString);
	else
		setErrorFor(dateString,'Enter valid date');

};

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

function isDate(txtDate)
{
	console.log(txtDate);
	var today = new Date();
	var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
    var currVal = txtDate;
    if(currVal == '')
        return false;

    var rxDatePattern = /^(\d{4})(\/|-)(\d{1,2})(\/|-)(\d{1,2})$/; //Declare Regex
    var dtArray = currVal.match(rxDatePattern); // is format OK?
    console.log(dtArray);
    if (dtArray == null) 
        return false;

    //Checks for mm/dd/yyyy format.
    dtMonth = dtArray[3];
    dtDay= dtArray[5];
    dtYear = dtArray[1];        

    if (dtMonth < 1 || dtMonth > 12) 
        return false;
    else if (dtDay < 1 || dtDay> 31) 
        return false;
    else if ((dtMonth==4 || dtMonth==6 || dtMonth==9 || dtMonth==11) && dtDay ==31) 
        return false;
    else if (dtMonth == 2) 
    {
        var isleap = (dtYear % 4 == 0 && (dtYear % 100 != 0 || dtYear % 400 == 0));
        if (dtDay> 29 || (dtDay ==29 && !isleap)) 
                return false;
    }
    else if(txtDate > date)
    	return false;
    return true;
}
