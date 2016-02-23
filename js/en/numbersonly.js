/* This script and many more are available free online at
The JavaScript Source!! http://javascript.internet.com
Copyright 1999 Idocs, Inc. http://www.idocs.com
Distribute this script freely but keep this notice in place */

function numbersonly(myfield, e, dec) {
  var key;
  var keychar;

  if (window.event)
    key = window.event.keyCode;
  else if (e)
    key = e.which;
  else
    return true;
  keychar = String.fromCharCode(key);

  // control keys
  if ((key==null) || (key==0) || (key==8) || (key==9) || (key==13) || (key==27) )
    return true;

  // numbers
  else if ((("0123456789").indexOf(keychar) > -1))
    return true;

  // decimal point jump
  else if (dec && (keychar == ".")) {
    myfield.form.elements[dec].focus();
    return false;
  } else
    return false;
}

function checkFields() {

	desc = document.submitform.booking_description.value;
	book_amount = document.submitform.booking_amount.value;
	day_in_month = document.submitform.day_in_month.value;
	
	if(desc == "") {
		alert("Description is required field!");
		return false;
	}

	if (book_amount == "") {
		alert("Amount is required field!");
		return false;
	}
	
	if(isNaN(book_amount)) {
		alert("Amount must be a number! Decimal sign must be a dot.");
		return false;
	}
	
	if(day_in_month  == "") {
		alert("Date in the month for automatic payment is required field!")
		return false;
	}
	
	if(day_in_month > 31) {
	   	alert("Date in the month cannot be greater then 31!");
	   	return false;
	 }
	
	if(day_in_month == 29 || day_in_month == 30 || day_in_month == 31) {
		if (confirm('Recommended date is lower then 29, months without 30 or 31 days, will not have accurate automatic input. Do you still wish to enter this date in th month?')) {
			return TRUE;
        }
        else {
            return false;
        }
	}
	
	else return true;
}
<!-- The JavaScript Source!! http://javascript.internet.com -->