	function SelectAll() {	  
	 var frm=document.subjectform; 
	 	 if(frm.selectall.checked == true) {	  
	 	  for(i=0;i<frm.elements.length;i++) {		 
	 	    if((frm.elements[i].type == "checkbox") && (frm.elements[i].name != "selectall")) 
	 	    			 frm.elements[i].checked = true;		 
	 	    	  } 		 
	 	    	 } 	 
	 	        else if(frm.selectall.checked == false) {		
	 	      	  for(i=0;i<frm.elements.length;i++) {	
	 	      	  		 if((frm.elements[i].type == "checkbox") && (frm.elements[i].name != "selectall")) {			  
			 	      	  	 frm.elements[i].checked = false;			 
	 	      	  	}
	 	      	  }
	 	      	}
	 	      } 


function deleteit()
{
	 var frm=document.subjectform;
	frm.operation.value="delete";
	validatefrm();
}
function validatefrm()
{
	var frm=document.subjectform;
	var length = frm.elements.length;
	var i=0;
	var isChecked=false;
		
	for(i=0;i<frm.elements.length;i++)
	{
		if(frm.elements[i].type=="checkbox")
		{
			if(frm.elements[i].checked == true)
			{
				isChecked=true;
				break;
			}
		}
	}
	if(isChecked) 
	{
		frm.submit();
	}
	else
	{
		alert('You must select atleast one Delete from the list');
		frm.accept.focus();
	}
}
 function validate(oForm){
   
var v = new RegExp();
	v.compile("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})+$");
	if (!v.test(oForm["email"].value)) {
		alert("You must supply a valid Email.");
		oForm.email.focus();
		return false;
		}

	if(oForm.subject.value.length == 0){
		alert("Please Enter Subject.");
		oForm.subject.focus();
		return false;
		}



	return true;
}