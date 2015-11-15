function memberinsert(){
document.getElementById("changehere").innerHTML=
"Create a new member <br> \
<form action='manipulate.php' method='get'>\
<table border ='0' style ='font-size:15px'>\
<tr><td>id </td><td><input type= 'text ' name='ID' /></td></tr>\
<tr><td>name </td><td><input type= 'text ' name='NAME' /></td></tr>\
<tr><td>email </td><td><input type= 'text ' name='EMAIL' /></td></tr>\
<tr><td>phone </td><td><input type= 'text ' name='PHONE' /></td></tr>\
<tr><td>nationality </td><td><select name='NATIONALITY' id = 'NATIONALITY'><option value = 'local'>Local</option><option value = 'mainland'>Mainland</option><option value = 'international'>international</option></select></td></tr>\
<tr><td>graduate year </td><td><input type= 'text ' name='GRAD_YEAR' /></td></tr>\
<tr><td>department </td><td><input type= 'text ' name='DEPARTMENT' /></td></tr></table><br>\
<input type='submit' name = 'action' value = 'insert_member' /></form>"
}

function memberupdate(){
document.getElementById("changehere").innerHTML=
"update member information <br>\
<form action='manipulate.php' method='get' >\
<table border ='0' style ='font-size:15px'>\
<tr><td>member id:</td><td><input type= 'text' name='ID' style='margin-left: 0px;margin-top: 0px;' /></td></tr>\
<tr><td>want to change:</td><td><select name = 'item' id = 'item'>\
<option value = 'NAME'>name</option>\
<option value = 'EMAIL'>email</option>\
<option value = 'PHONE'>phone</option>\
<option value = 'NATIONALITY'>nationality</option>\
<option value = 'GRAD_YEAR'>graduate year</option>\
<option value = 'DEPARTMENT'>department</option>\
</select></td></tr>\
<tr><td>change to value:</td><td><input type= 'text' name='value' style='margin-left: 0px;margin-top: 0px;' /></td></tr></table><br>\
<input type='submit' name = 'action' value = 'update_member' /></form>"
}

function memberdelete(){
document.getElementById("changehere").innerHTML=
"Delete a member<br>\
<form action='manipulate.php' method='get' style = 'font-size:15px'>\
member id:&nbsp &nbsp &nbsp<input type= 'text' name='ID' /><br>\
<input type='submit' name = 'action' value = 'delete_member' /></form>"
}

function committeeinsert(){
document.getElementById("changehere").innerHTML=
"Create a new committee member <br> \
<form action='manipulate.php' method='get'>\
<table border ='0' style ='font-size:15px'>\
<tr><td>id </td><td><input type= 'text ' name='ID' /></td></tr>\
<tr><td>name </td><td><input type= 'text ' name='NAME' /></td></tr>\
<tr><td>email </td><td><input type= 'text ' name='EMAIL' /></td></tr>\
<tr><td>phone </td><td><input type= 'text ' name='PHONE' /></td></tr>\
<tr><td>job </td><td><input type= 'text ' name='JOB' /></td></tr>\
<tr><td>status </td><td><select name='STATUS' id = 'status'><option value = 'current'>current</option><option value = 'former'>former</option><option value = 'subcom'>subcom</option></select></td></tr></td></tr></table>\
<input type='submit' name = 'action' value = 'insert_committee' /></form>"
}

function committeeupdate(){
document.getElementById("changehere").innerHTML=
"update committee member information <br>\
<form action='manipulate.php' method='get'>\
<table border ='0' style ='font-size:15px'>\
<tr><td>member id:</td><td><input type= 'text' name='ID' style='margin-left: 0px;margin-top: 0px;' /></td></tr>\
<tr><td>want to change:</td><td><select name = 'item' id = 'item'>\
<option value = 'NAME'>name</option>\
<option value = 'EMAIL'>email</option>\
<option value = 'PHONE'>phone</option>\
<option value = 'JOB'>job</option>\
<option value = 'STATUS'>status</option>\
</select></td></tr>\
<tr><td>change to value:</td><td><input type= 'text' name='VALUE' style='margin-left: 0px;margin-top: 0px;' /></td></tr></table><br>\
<input type='submit' name = 'action' value = 'update_committee' /></form>"
}

function committeedelete(){
document.getElementById("changehere").innerHTML=
"Delete a committee member <br> \
<form action='manipulate.php' method='get' style = 'font-size:15px'>\
committee id:&nbsp &nbsp &nbsp<input type= 'text' name='ID' /><br>\
<input type='submit' name = 'action' value = 'delete_committee' /></form>"
}

function publicinsert(){
document.getElementById("changehere").innerHTML=
"Create a new public person <br> \
<form action='manipulate.php' method='get'>\
<table border ='0' style ='font-size:15px'>\
<tr><td>id </td><td><input type= 'text ' name='ID' /></td></tr>\
<tr><td>name </td><td><input type= 'text ' name='NAME' /></td></tr>\
<tr><td>email </td><td><input type= 'text ' name='EMAIL' /></td></tr>\
<tr><td>Type </td><td><select name='TYPE' id = 'type'><option value = 'DONOR'>donor</option><option value = 'SUPERVISOR'>supervisor</option></select></td></tr></td></tr></table><br>\
<input type='submit' name = 'action' value = 'insert_public' /></form>"
}

function publicupdate(){
document.getElementById("changehere").innerHTML=
"update public person information <br>\
<form action='manipulate.php' method='get'>\
<table border ='0' style ='font-size:15px'>\
<tr><td>member id:</td><td><input type= 'text' name='ID' style='margin-left: 0px;margin-top: 0px;' /></td></tr>\
<tr><td>Type </td><td><select name='TYPE' id = 'type'><option value = 'DONOR'>donor</option><option value = 'SUPERVISOR'>supervisor</option></select></td></tr></td></tr>\
<tr><td>want to change:</td><td><select name = 'item' id = 'item'>\
<option value = 'NAME'>name</option>\
<option value = 'EMAIL'>email</option>\
</select></td></tr>\
<tr><td>change to value:</td><td><input type= 'text' name='VALUE' style='margin-left: 0px;margin-top: 0px;' /></td></tr></table><br>\
<input type='submit' name = 'action' value = 'update_public' /></form>"
}

function publicdelete(){
document.getElementById("changehere").innerHTML=
"Delete a public person <br> \
<form action='manipulate.php' method='get' style = 'font-size:15px'>\
person id:&nbsp &nbsp &nbsp<input type= 'text' name='ID' /><br>\
Type: &nbsp &nbsp &nbsp&nbsp &nbsp &nbsp<select name='TYPE' id = 'type'><option value = 'DONOR'>donor</option><option value = 'SUPERVISOR'>supervisor</option></select><br>\
<input type='submit' name = 'action' value = 'delete_public' /></form>"
}

function fundinginsert(){
document.getElementById("changehere").innerHTML=
"Create a new funding <br> \
<form action='manipulate.php' method='get'>\
<table border ='0' style ='font-size:15px'>\
<tr><td>name </td><td><input type= 'text ' name='NAME' /></td></tr>\
<tr><td>start date </td><td><input type= 'text ' name='START_DATE' value = 'YYYY-MM-DD' /></td></tr>\
<tr><td>expire date </td><td><input type= 'text ' name='EXPIRE_DATE' value = 'YYYY-MM-DD' /></td></tr>\
<tr><td>amount </td><td><input type= 'text ' name='AMOUNT' value = '15800'/></td></tr>\
<tr><td>detail </td><td><input type= 'text ' name='DETAIL' /></td></tr>\
<tr><td>donor id </td><td><input type= 'text ' name='DONORID'/></td></tr>\
<tr><td>status </td><td><select name='STATUS' id = 'STATUS'><option value = 'miss'>miss</option><option value = 'apply'>apply</option><option value = 'hit'>hit</option></select></td></tr></td></tr></table>\
<input type='submit' name = 'action' value = 'insert_funding' /></form>"
}

function fundingupdate(){
document.getElementById("changehere").innerHTML=
"update funding information <br>\
<form action='manipulate.php' method='get'>\
<table border ='0' style ='font-size:15px'>\
<tr><td>funding name:</td><td><input type= 'text' name='name' style='margin-left: 0px;margin-top: 0px;' /></td></tr>\
<tr><td>start date </td><td><input type= 'text ' name='start_date' value = 'YYYY-MM-DD' /></td></tr>\
<tr><td>want to change:</td><td><select name = 'item' id = 'item'>\
<option value = 'NAME'>name</option>\
<option value = 'START_DATE'>start date</option>\
<option value = 'EXPIRE_DATE'>expire date</option>\
<option value = 'AMOUNT'>amount</option>\
<option value = 'DETAIL'>detail</option>\
<option value = 'DONOR.ID'>donor id</option>\
<option value = 'STATUS'>status</option>\
</select></td></tr>\
<tr><td>change to value:</td><td><input type= 'text' name='value' style='margin-left: 0px;margin-top: 0px;' /></td></tr></table><br>\
<input type='submit' name = 'action' value = 'update_funding' /></form>"
}

function fundingdelete(){
document.getElementById("changehere").innerHTML=
"Delete funding information <br> \
<form action='manipulate.php' method='get' style = 'font-size:15px'>\
funding name:&nbsp &nbsp &nbsp<input type= 'text' name='NAME' /><br>\
start date &nbsp:&nbsp &nbsp &nbsp<input type= 'text' name='START_DATE' /><br>\
<input type='submit' name = 'action' value = 'delete_funding' /></form>"
}