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

function updateValues() {
	var month = new Date().getMonth() + 1;
	var year = new Date().getFullYear();
	var day = String(new Date().getDate()).padStart(2, '0');
	if(document.getElementById('month')) {
		document.getElementById('month').value = year + "-" + month;
	}
	if(document.getElementById('date')) {
		document.getElementById('date').value = year + "-" + month + "-" + day;
	}
	if(document.getElementById('payroll')){
		var payroll = document.getElementById('payroll');
		var sum = 0;
		for(var i = 1; i < payroll.rows.length - 1; i++) {
            sum += parseInt(payroll.rows[i].cells[5].innerHTML.substring(4, payroll.rows[i].cells[5].innerHTML.length).replace(',', ''));
        }
        document.getElementById("total").innerHTML = "Php " + sum.toLocaleString();
	}
}