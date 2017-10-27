var tempForm = "";
var action = "";
var actionForm = "";
var userE = "";

function editUser(user) {
	userE = user;
	$("#tempForm").remove();
	tempForm = "" +
	"<form action='editUsers_.php' method='post' id='tempForm'>" +
	"<input type='text' value='edit' name='action' hidden><input type='text' name='change' value='name' hidden>" +
	"<table id='tempTable'>" +
	"<tr>" +
	"<td>" +
	"<select id='changeAction' name='changeAction'>" +
	"<option selected disabled>- Select Action-</option>" +
	"<option value='changeName'>Change Name</option>" +
	"<option value='changeUsername'>Change Username</option>" +
	"<option value='changePassword'>Change Password</option>" +
	"</select>" +
	"</td>" +
	"<td><button style='position:absolute;right:10px;' onclick='removeForm()'>X</button></td>" +
	"</tr>" +
	"</table>";
	
	
	$("#userTable").append(tempForm);
	
};

function deleteUser(user) {
	var temp = confirm("Are you sure you want to delete " + user + "?\nPress OK to confirm\nPress cancel to abort the action");
	if(temp == true)
	{
		return true;
	}
	else if(temp == false)
	{
		return false;
	}
	else
	{
		alert("An error occured, the action has been cancelled");
		return false;
	}
};

function hashp() {
	$("#admin_pass2").val(CryptoJS.SHA512(CryptoJS.SHA512($("#admin_pass").val())));
	return true;
};

function hashcp() {
	$("#newadmin_passh").val(CryptoJS.SHA512(CryptoJS.SHA512($("#newadmin_pass").val())));
	$("#newadmin_passh2").val(CryptoJS.SHA512(CryptoJS.SHA512($("#newadmin_pass2").val())));
	return true;
};

function removeForm() {
	$("#tempForm").remove();
};

$(document).ready(function(){
	
	$("#userTable").on("change","#changeAction",function(){
		console.log("testing");
		action = $("#changeAction").val();
		
		if(action == "changeName")
		{
            $("#tempTable").empty();
            
			actionForm = "<tr><td>Username</td><td><input type='text' disabled name='username' value='" + userE + "'></td></tr>" +
			"<tr><td>New Name</td><td><input type='text' name='newName'></td></tr>" +
			"<tr><td>Confirm:</td><td><input type='password' name='confirmP' placeholder='enter your password'></td></tr>" +
			"<tr><td></td><td><input type='submit' value='Save'></td></tr>";
			
			$("#tempTable").append(actionForm);
			
			console.log(action);
		}
		else if(action == "changeUsername")
		{
            $("#tempTable").empty();
			console.log(action);
		}
		else if(action == "changePassword")
		{
            $("#tempTable").empty();
			console.log(action);
		}
		
	});
	
});















