function validateForm(theForm1) {
		document.getElementById("emailErr").innerHTML="";
		document.getElementById("msgErr").innerHTML="";

		if(theForm1.email.value==""){
	    	document.getElementById("emailErr").innerHTML="Please enter email address";
	    	theForm1.email.focus();
	    	return (false);
	    }

		var reg=/^([A-Za-z0-9_\-\.]){1,}\@([A-Za-z0-9]){1,}\.([A-Za-z]){2,3}$/;
		var eml=theForm1.email.value;
		if(reg.test(eml)!=true){
			document.getElementById("emailErr").innerHTML="Please enter valid email";
			theForm1.email.focus();
			return(false);
		}
		if(theForm1.msg.value==""){
	    	document.getElementById("msgErr").innerHTML="Please type a message";
	    	theForm1.msg.focus();
	    	return (false);
	    }
	    var reg=/^([A-Za-z]){1,}$/;
		var msg=theForm1.msg.value;
		if(reg.test(msg)!=true){
			document.getElementById("msgErr").innerHTML="Please type a message";
			theForm1.msg.focus();
			return(false);
		}
	}
