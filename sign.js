function validateForm(theForm) {
		document.getElementById("fnameErr").innerHTML="";
		document.getElementById("lnameErr").innerHTML="";
		document.getElementById("ageErr").innerHTML="";
		document.getElementById("addErr").innerHTML="";
		document.getElementById("numErr").innerHTML="";	
		document.getElementById("emailErr").innerHTML="";	
		document.getElementById("userErr").innerHTML="";
		document.getElementById("passErr").innerHTML="";

	    if(theForm.fname.value==""){
	    	document.getElementById("fnameErr").innerHTML="Please enter firstname";
	    	// alert("Please enter firstname");
	    	theForm.fname.focus();
	    	return (false);
	    }

		var reg=/^([A-Za-z]){1,}$/;
		var name=theForm.fname.value;
		if(reg.test(name)!=true){
			document.getElementById("fnameErr").innerHTML="Please enter valid name";
			theForm.fname.focus();
			return(false);
		}

		if(theForm.lname.value==""){
	    	document.getElementById("lnameErr").innerHTML="Please enter lastname";
	    	theForm.lname.focus();
	    	return (false);
	    }

		var reg=/^([A-Za-z]){1,}$/;
		var name=theForm.lname.value;
		if(reg.test(name)!=true){
			document.getElementById("lnameErr").innerHTML="Please enter valid name";
			theForm.lname.focus();
			return(false);
		}

		if(theForm.age.value<18){
	    	document.getElementById("ageErr").innerHTML="Age must be greater than 18";
	    	theForm.age.focus();
	    	return (false);
	    }

		if(theForm.add.value==""){
	    	document.getElementById("addErr").innerHTML="Please enter your address";
	    	theForm.add.focus();
	    	return (false);
	    }

		var reg=/^([A-Za-z]){1,38}$/;
		var zcd=theForm.add.value;
		if(reg.test(zcd)!=true){
			document.getElementById("addErr").innerHTML="Please enter your address";
			theForm.add.focus();
			return(false);
		}

	    if(theForm.phone.value==""){
	    	document.getElementById("numErr").innerHTML="Please enter a number";
	    	theForm.phone.focus();
	    	return (false);
	    }

	    var reg=/^98([0-9]){8}$/;
		var phn=theForm.phone.value;
		if(reg.test(phn)!=true){
			document.getElementById("numErr").innerHTML="Please enter valid phone number";
			theForm.phone.focus();
			return(false);
		}

		if(theForm.email.value==""){
	    	document.getElementById("emailErr").innerHTML="Please enter your email";
	    	theForm.email.focus();
	    	return (false);
	    }

		var reg=/^([A-Za-z0-9_\-\.]){1,}\@([A-Za-z0-9]){1,}\.([A-Za-z]){2,3}$/;
		var eml=theForm.email.value;
		if(reg.test(eml)!=true){
			document.getElementById("emailErr").innerHTML="Email must be valid email";
			theForm.email.focus();
			return(false);
		}

		if(theForm.user.value==""){
	    	document.getElementById("userErr").innerHTML="Please enter a Username";
	    	theForm.user.focus();
	    	return (false);
	    }
		if(theForm.p1.value==""){
	    	document.getElementById("passErr").innerHTML="Please enter a Password";
	    	theForm.p1.focus();
	    	return (false);
	    }

		if(theForm.p1.value.length<5){
			document.getElementById("passErr").innerHTML="Please enter at least 5 characters in the \"p1\" field";
			theForm.p1.focus();
			return (false);
		}

		if(theForm.p1.value!=theForm.p2.value){
			document.getElementById("passErr").innerHTML="Two Password aren't same";
			theForm.p1.focus();
			return (false);
		}
	}
