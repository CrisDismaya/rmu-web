

var auth = JSON.parse(localStorage.getItem('data'))
var baseUrl =  location.protocol == "https:" ? 'https://rmu-api.suertemotoplaza.com/api' : 'http://127.0.0.1:8000/api';
let current_module_id = localStorage.getItem('current_module_id');
let current_roles = localStorage.getItem('current_roles');

$(document).ready(function(){
	$.ajaxSetup({ 
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});

	$(".select-single").select2();
	$(".select-single-modal").select2({
		dropdownParent: $('#staticBackdrop')
	});

	// format to "1,232.12"
  function formatMoney(value) {
    if (!value) return '';

    // remove everything except digits and dot
    value = value.replace(/[^0-9.]/g, '');

    // only keep first dot
    const parts = value.split('.');
    if (parts.length > 2) value = parts[0] + '.' + parts[1];

    let [intPart, decPart] = value.split('.');
    intPart = intPart || '';
    decPart = decPart || '';

    // add commas (only if we have at least one digit)
    if (intPart.length > 0) {
      intPart = intPart.replace(/\B(?=(\d{3})+(?!\d))/g, ',');
    }

    // limit to 2 decimals max
    if (decPart.length > 2) decPart = decPart.substring(0, 2);

    // keep dot if user just typed it
    if (value.endsWith('.')) return intPart + '.';
    if (decPart.length > 0) return intPart + '.' + decPart;
    return intPart;
  }

  $(document).on('input', '.number-format', function (e) {
    const input = this;
    const cursorPos = input.selectionStart;
    const raw = input.value;
    
    const formatted = formatMoney(raw);
    input.value = formatted;

    // Keep cursor at end (reliable and user-friendly)
    input.setSelectionRange(input.value.length, input.value.length);
  });

  // On blur, always fix to 2 decimals
  $(document).on('blur', '.number-format', function () {
    let val = $(this).val().replace(/,/g, '');
    if (!val || val === '.') {
      $(this).val('');
      return;
    }
    const fixed = parseFloat(val).toFixed(2);
    const parts = fixed.split('.');
    parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ',');
    $(this).val(parts.join('.'));
  });
});

$('.numberonly').keypress(function (e) {    
	var charCode = (e.which) ? e.which : event.keyCode    
	if (String.fromCharCode(charCode).match(/[^0-9]/g))    
		return false;                        
}); 

function roundOf(number){
	return Math.round(number * 100) / 100;
}

function isInputValid(html, selectorId){
	var inputs = $(`#${ selectorId }`).val();
	if(inputs){
		$(`#${ selectorId }`).css('border-color', '#e2e5e8');
		return true;
	}
	
   $(`#${ selectorId }`).css('border-color', '#ed5555');
	return false;
}

function isEmailValid(email_input_id) {
	var inputs = $(`#${ email_input_id }`).val();
	var isValid = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(inputs);

	if(isValid){
		$(`#${ email_input_id }`).css('border-color', '#e2e5e8');
		return true;
	}
	
   $(`#${ email_input_id }`).css('border-color', '#ed5555');
	return false;
}

function toast(message, status){
	Toastify({
		newWindow: !0,
		text: message,
		gravity: 'top',
		position: 'right',
		className: "bg-" + status,
		stopOnFocus: !0,
		duration: 3000,
		close: "close" == 'close'
  }).showToast()
}

function append_number_format_keyup(){
	$('.number-format').keypress(function(event){
		var charCode = (event.which) ? event.which : event.keyCode;
		var number = $(this).val().split(".");
		if (charCode != 46 && charCode > 31 && (charCode < 48 || charCode > 57)) {
			return false;
		}
		// just one dot
		if (number.length > 1 && charCode == 46) {
			return false;
		}
		// if the cursor is to the right of the decimal point, only allow up to 2 decimal places
		if (number.length > 1 && number[1].length >= 2) {
			return false;
		}
		return true;
	});
}
