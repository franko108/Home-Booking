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
	number_days = document.submitform.number_days.value;
	day_in_month = document.submitform.day_in_month.value;
	
	if(desc == "") {
		alert("Obavezan unos opisa plaćanja!");
		return false;
	}

	if (book_amount == "") {
		alert("Obavezan unos iznosa mjesečne uplate!");
		return false;
	}
	
	if(number_days == "") {
		alert("Obavezan unos broja dana koliko se unatrag kontrolira uplata!")
		return false;
	}
	if (number_days != parseFloat(number_days)) {
		alert('Broj dana za kontrolu uplate mora biti cijeli broj!');
		return false;
	}
	if(day_in_month  == "") {
		alert("Obavezan unos datuma u mjesecu kojeg će biti obavljeno automatsko plaćanje!")
		return false;
	}
	if(day_in_month > 31) {
	   	alert("Datum u mjesecu ne može biti veći od 31!.");
	return false;
	  }
	if(day_in_month == 30 || day_in_month == 31) {
		if (confirm('Preporučeni datum je manji od 29, mjeseci koji nemaju 30 ili 31 dana, neće imati ispravan unos. Želite li ipak unijeti ovaj datum?')) {
			return TRUE;
        }
        else {
            return false;
        }
	}
	
	else return true;
}
<!-- The JavaScript Source!! http://javascript.internet.com -->