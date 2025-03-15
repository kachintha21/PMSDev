function swap(obj){
	var path = "img/";
	obj.src = path + "r_" + obj.id ;
}

function unDo(obj){
	var path = "img/";
	obj.src = path + obj.id;
}

function submitEntity(url,val){		
	document.location = url + "?id=" + val + "&url=true";
}

function processAssigEntity(entity,url,val){	
    
	var ret = confirm("Do you really want to process assig process this "+entity+" ["+val+"].\n\n[Note: You cannot undo this operation.]\n");
	
	if(ret == true){		
			document.location = url + "&delete=true";
	}
}


function unDoEntity(entity,url,val){	
    
	var ret = confirm("Do you really want to Undo Plan this "+entity+" ["+val+"].\n\n[Note: You cannot undo this operation.]\n");
	
	if(ret == true){		
			document.location = url + "&undo=true";
	}
}

function AddDoEntity(entity,url,val){	
    
	var ret = confirm("Do you really want to Add  Plan this "+entity+" ["+val+"].\n\n[Note: You cannot undo this operation.]\n");
	
	if(ret == true){		
			document.location = url + "&undo=true";
	}
}




function plan(entity,url,val){	
    
	var ret = confirm("Do you really want to remove this Lot "+entity+" ["+val+"].\n\n[Note: You cannot undo this operation.]\n");
	
	if(ret == true){		
			document.location = url + "&delete=true";
	}
}

function TableUpdate(entity,url,val){	
    
	var ret = confirm("Do you really want to update "+entity+" ["+val+"].\n\n[Note: You cannot undo this operation.]\n");
	
	if(ret == true){		
			document.location = url + "&delete=true";
	}
}




function truncate(entity,url,val){	
    
	var ret = confirm("Do you really want to Truncate "+entity+" ["+val+"].\n\n[Note: You cannot undo this operation.]\n");
	
	if(ret == true){		
			document.location = url + "&delete=true";
	}
}




 
 
 /*Update Entity Here..*/
function updateEntity(entity,url,val){	
 



	var ret = confirm("Do you really want to edit  "+entity+" ["+val+"].\n\n[Note: You cannot undo this operation.]\n");
	
	if(ret == true){		
			document.location = url  + "&Delete=true";
	}
}

/*Update Entity Here..*/
function deleteEntity(entity,url,val){	

    var reply = prompt("Please enter  you  password","");
    if(reply=="" || reply==null){
	
	alert("Password can not be empty.");	
	return false;
	}
    if(reply!=="nlpl"){
	alert("you psssword is incorrect.");
	return false;
		
	} 



	var ret = confirm("Do you really want to delete  "+entity+" ["+val+"].\n\n[Note: You cannot undo this operation.]\n");
	
	if(ret == true){		
		document.location = url  + "&Delete=true";
	}
}





function EnableEntity(entity,url,val){	

    var reply = prompt("Please enter  you  password","");
    if(reply=="" || reply==null){
	
	alert("Password can not be empty.");	
	return false;
	}
    if(reply!=="nlpl"){
	alert("you psssword is incorrect.");
	return false;
		
	} 



	var ret = confirm("Do you really want to Enable  "+entity+" ["+val+"].\n\n[Note: You cannot undo this operation.]\n");
	
	if(ret == true){		
		document.location = url  + "&Delete=true";
	}
}

function DisableEntity(entity,url,val){	

    var reply = prompt("Please enter  you  password","");
    if(reply=="" || reply==null){
	
	alert("Password can not be empty.");	
	return false;
	}
    if(reply!=="nlpl"){
	alert("you psssword is incorrect.");
	return false;
		
	} 



	var ret = confirm("Do you really want to disable  "+entity+" ["+val+"].\n\n[Note: You cannot undo this operation.]\n");
	
	if(ret == true){		
		document.location = url  + "&Delete=true";
	}
}




/*isDefectiveEntity..*/
function isDefectiveEntity(entity,url,val){	

    
    var reply = prompt("Please enter you name","");
    if(reply=="" || reply==null){
	
	alert("your name can not be empty.");	
	return false;
	}
    if(reply==""){
	alert("your name can not be empty ");
	return false;
		
	} 
	var ret = confirm("Do you really want to defective transfer this "+entity+" ["+val+"].\n\n[Note: You cannot undo this operation.]\n");
	
	if(ret == true){		
		document.location = url + "?id=" + val + "&delete=true";
	}
}













/*Update Entity Here..*/
function updateEntity(entity,url,val){	

    var reply = prompt("Please enter  you  password","");
    if(reply=="" || reply==null){
	
	alert("Password can not be empty.");	
	return false;
	}
    if(reply!=="nlpl"){
	alert("you psssword is incorrect.");
	return false;
		
	} 



	var ret = confirm("Do you really want to update  "+entity+" ["+val+"].\n\n[Note: You cannot undo this operation.]\n");
	
	if(ret == true){		
		document.location = url  + "&Update=true";
	}
}




function EntityConfirm(entity,url,val){	

	var ret = confirm("Do you really want to addd you employee number  "+entity+" ["+val+"].\n\n[Note: You cannot undo this operation.]\n");
	if(ret == true){		
		document.location = url  + "&Update=true";
	}
}


function SalesOrderApprovedConfirm(entity,url,val){	

	var ret = confirm("Do you really want Approved Sales Order  "+entity+" ["+val+"].\n\n[Note: You cannot undo this operation.]\n");
	if(ret == true){		
		document.location = url  + "&Update=true";
	}
}




function EntityViewConfirm(entity,url,val){	

	var ret = confirm("Do you really want to view details "+entity+" ["+val+"].\n\n[Note: You cannot undo this operation.]\n");
	if(ret == true){		
		document.location = url  + "&Update=true";
	}
}





function PlanSaveConfirm(entity,url,val){	

	var ret = confirm("Do you really want to save plan "+entity+" ["+val+"].\n\n[Note: You cannot undo this operation.]\n");
	if(ret == true){		
		document.location = url  + "&Update=true";
	}
}



function PlanResetConfirm(entity,url,val){	

	var ret = confirm("Do you really want to reset plan "+entity+" ["+val+"].\n\n[Note: You cannot undo this operation.]\n");
	if(ret == true){		
		document.location = url  + "&Update=true";
	}
}


function confirmLogoutPro(){
	var x = confirm("Do you really want to sign out?");
	
	if(x == true){
		window.location = "session_end.php";
	}
}











function  	PermissionEntity(entity,url,val){		
	var ret = confirm("Do you really want to permission  "+entity+" ["+val+"].\n\n[Note: You cannot undo this operation.]\n");
	
	if(ret == true){		
		document.location = url  + "&Update=true";
	}
}




function showBlock(obj){
	var com = document.getElementById(obj);
	com.style.display = "block";
}
	

function createPopup(url){	
	var newwindow=window.open(url, "popup", 'width=500,height=450,scrollbars=no,resizable=no,toolbar=no,directories=no,location=no,menubar=no,status=no,left=200,top=100');
	newdocument=newwindow.document;	
	newdocument.close();
}


function submitForm(form){
	form.submit();
}

function validate(form){
	
	var inputs = document.getElementsByTagName("input");
	var selects = document.getElementsByTagName("select");
	var txtareas = document.getElementsByTagName("textarea");
	var msg = "";
	var isSubmit = false;
	
	if(inputs.length > 0){
		for(i=0; i<inputs.length; i++){
			if(inputs[i].id == "required" && inputs[i].value == ""){
				msg = "All fields are required. \nPlease enter values for empty fields.";
			}
		}		
	}
	
	if(selects.length > 0){
		for(i=0; i<selects.length; i++){
			if(selects[i].value == ""){
				msg = "All fields are required. \nPlease enter values for empty fields.";
			}
		}		
	}
	
	if(txtareas.length > 0){
		for(i=0; i<txtareas.length; i++){
			if(txtareas[i].value == ""){
				msg = "Afll fields are required. \nPlease enter values for empty fields.";
			}
		}		
	}
	if(msg != ""){
		isSubmit = false;
		alert(msg);	
	}
	else{
		isSubmit = true;
	}
	return isSubmit;
}

function setMonths(com1,com2){
	
	for(i=0; i<com1.length; i++){
		if((com2.value == (new Date().getYear()+1900)) && (i > new Date().getMonth())){
			com1[i].disabled = "disabled";
			com1[i].selected = "";
		}
		else{
			com1[i].disabled = "";
		}
		
	}
}

function confirmLogout(){
	var x = confirm("Do you really want to sign out?");
	
	if(x == true){
		window.location = "session_end.php";
	}
}


function confirmLogout_admin_login(){
	var x = confirm("Do you really want to sign out?");
	
	if(x == true){
		window.location = "session_end_admin_login.php";
	}
}






function isEqual(com1, com2){
	
	var ret = false;
	if(com1.value != "" && com2.value != ""){
		if(com1.value != com2.value){
			ret = false;
			alert("Confirm Password mismatch !!!");
		}
		else{
			ret = true;
		}
	}
	else{
		alert("Empty Password fields !!!");
	}
	return ret;
}















/*Changed_model*/
function Changed_model(entity,url,val){		
	var ret = confirm("Do you really need  to Changed  The Model Name "+entity+" ["+val+"].\n\n[Note: You cannot undo this operation.]\n");
	
	if(ret == true){		
		document.location = url + "?id=" + val + "&delete=true";
	}
}



/*Changed_model*/
function Changed_pattern(entity,url,val){		
	var ret = confirm("Do you really need  to Changed  The Pattern No "+entity+" ["+val+"].\n\n[Note: You cannot undo this operation.]\n");
	
	if(ret == true){		
		document.location = url + "?id=" + val + "&delete=true";
	}
}





/*MysqlBakup*/
function MysqlBakup(entity,url,val){		
	var ret = confirm("Do you really need  mysql bakup  up to "+entity+" ["+val+"].\n\n[Note: You cannot undo this operation.]\n");
	
	if(ret == true){		
		document.location = url + "?id=" + val + "&delete=true";
	}
}









