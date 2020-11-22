var bool = false, bool2 = false;

function onClick() {
	if(bool) {
		document.querySelectorAll('.hidden').forEach(item => item.classList.remove('show'));
	} else {
		document.querySelectorAll('.hidden').forEach(item => item.classList.add('show'));
		if(document.querySelector('.hidden2').classList.contains('show')) {
			document.querySelectorAll('.hidden2').forEach(item => item.classList.remove('show'));
			bool2 = false;
		}
	}
	bool = !bool;
} 

function onClick2() {
	if(bool2) {
		document.querySelectorAll('.hidden2').forEach(item => item.classList.remove('show'));
	} else {
		document.querySelectorAll('.hidden2').forEach(item => item.classList.add('show'));
		if(document.querySelector('.hidden').classList.contains('show')) {
			document.querySelectorAll('.hidden').forEach(item => item.classList.remove('show'));
			bool = false;
		}
	}
	bool2 = !bool2;
}

var style = "<style> table {width: 100%; font: 12px Helvetica;} table, th, td {border: solid 1px #DDD; border-collapse: collapse; padding: 2px 3px; text-align: center;} h1 {font: 20px Helvetica; text-align: center;}</style>";
var months = ["Jan", "Feb", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
function printTable() {
		var payroll = document.getElementById('payroll');
		clone = payroll.cloneNode(true);
		var row = clone.rows; 
		for (var i = 0; i < row[0].cells.length; i++) { 
			var str = row[0].cells[i].innerHTML; 
			if (str.search("Payslip") != -1) {  
				for (var j = 0; j < row.length - 1; j++) { 
					row[j].deleteCell(i); 
				} 
			} 
		} 
		var date = document.getElementById("date").value;
		var list = date.split("-");
		var header = "<h1>Payroll Report for the Month of " + months[list[1]-1] + ", Year " + list[0] + "</h1>";
		var win = window.open('', '', "width=" + screen.availWidth + ",height=" + screen.availHeight);
		win.document.write(style + header + clone.outerHTML);
		win.document.close();
		win.print();
}

function printPayslip() {
	var win = window.open('', '', "width=" + screen.availWidth + ",height=" + screen.availHeight);
	win.document.write(style + "<h1>" + document.getElementById("header").innerHTML + "</h1>" + document.getElementById('payroll').outerHTML);
	win.document.close();
	win.print();
}

function check() {
  if (document.getElementById('new_password').value ==
    document.getElementById('confirm_new_password').value) {
    document.getElementById('check_password_match').innerHTML = "";
    document.getElementById('password_button').disabled = false;
  } else {
    document.getElementById('check_password_match').innerHTML = "passwords don't match";
    document.getElementById('password_button').disabled = true;
  }

  if (document.getElementById('new_password').value.length >= 10) {
    document.getElementById('check_password_length').innerHTML = "";
    document.getElementById('password_button').disabled = false;
  } else {
    document.getElementById('check_password_length').innerHTML = "must be at least 10 characters";
    document.getElementById('password_button').disabled = true;
  }
}