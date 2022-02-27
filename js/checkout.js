$(function(){
  getAddr();

  // get form
  const form = document.querySelector('#checkout-form');

  // get form elements
  const fullName = document.querySelector('#full_name');
  const addr1 = document.querySelector('#user_addr1');
  const addr2 = document.querySelector('#user_addr2');
  const pin = document.querySelector('#pin_code');
  const phNumber = document.querySelector('#user_number');
  const chkBox2 = document.querySelector('#checkbox2');
  const chkBox3 = document.querySelector('#checkbox3');
  var strPay = document.querySelector('#stripe-pay');

  $('#stripe-btn').hide();
  $('#checkout-btn').hide();

  // utility functions
  const isRequired = value => value === '' ? false : true;
  

  // check fullname
  const checkFullName = () => {
    let valid = false;

    const fullname = fullName.value.trim();

    if(!isRequired(fullname)){
      showError(fullName, 'Fullname cannot be empty');
    }
    else{
      showSuccess(fullName);
      valid = true;
    }
    return valid;
  }

  // check address
  const checkAddress = () => {
    let valid = false;

    const address1 = addr1.value.trim();

    if(!isRequired(address1)){
      showError(addr1, 'Address cannot be empty');
    }
    else{
      showSuccess(addr1);
      valid = true;
    }
    return valid;
  }

  // check pincode
  const checkPinCode = () => {
    let valid = false;
    const pinCode = pin.value.trim();

    if(!isRequired(pinCode)){
      showError(pin, 'Pincode cannot be empty');
    }
    else{
      pin.addEventListener('keyup', function(e) {
        var len = pin.value.length;
      
        if(e.which > 47 && e.which < 58 || e.which > 95 && e.which < 106){
          if(len == 6) {
            showSuccess(pin);
            valid = true;
            return true;
          }
          else{
            showError(pin, 'PIN must be 6 digits');
            return false;
          }
        }
        else{
          showError(pin, 'Invalid pincode');
          return false;
        }
      });
    }
    return valid;
  }

  // check phone number
  const checkPhoneNumber = () => {
    let valid = false;
    const phoneNumber = phNumber.value.trim();

    if(!isRequired(phoneNumber)){
      showError(phNumber, 'Phone number cannot be empty');
    }
    else{
      phNumber.addEventListener('keyup', function(e) {
        var len = phNumber.value.length;
        if(e.which > 47 && e.which < 58 || e.which > 95 && e.which < 106){
          if(len == 10) {
            showSuccess(phNumber);
            valid = true;
          }
          else{
            showError(phNumber, 'Number must be 10 digits');  
          }
        }
        else{
          showError(phNumber, 'Invalid number');
        }
      });
    }
    return valid;
  }

  // show error function
  const showError = (input, message) => {
    const formField = input.parentElement;
    // add the error class
    formField.classList.remove('success');
    formField.classList.add('error');

    // show error message
    const error = formField.querySelector('small');
    error.textContent = message;
  }

  // show success
  const showSuccess = (input) => {
    // get the form-field element
    const formField = input.parentElement;

    // remove the error class
    formField.classList.remove('error');
    formField.classList.add('success');

    // hide the error message
    const error = formField.querySelector('small');
    error.textContent = '';
  }

  // debounce function
  const debounce = (fn, delay = 500) => {
    let timeoutID;
    return(...args) => {
      // cancel the previous timer
      if(timeoutID) {
        clearTimeout(timeoutID);
      }
      // setup new timer
      timeoutID = setTimeout(() => {
        fn.apply(null, args)
      }, delay);
    }
  }

  // add form event handler
  form.addEventListener('input', debounce(function (e) {
    switch (e.target.id) {
      case 'full_name':
        checkFullName();
        break;
      case 'user_addr1':
        checkAddress();
        break;
      case 'pin_code':
        checkPinCode();
        break;
      case 'user_number':
        checkPhoneNumber();
        break;
    }
  }));

  chkBox2.addEventListener('click', function() {
    form.setAttribute('action', 'confirmation.php?cc');
    $('#checkout-btn').hide();
    document.getElementsByClassName("stripe-button-el")[0].disabled=false;
    $('#stripe-btn').show();
  });

  chkBox3.addEventListener('click', function() {
    $('#stripe-btn').hide();
    $('#checkout-btn').show();
    document.getElementsByClassName("stripe-button-el")[0].disabled=true;
    var btn = document.querySelector('.checkout-btn');
    strPay.removeAttribute('class', 'stripe-button');
    form.setAttribute('action', 'confirmation.php?cod');

    btn.addEventListener('click', function(){
      form.submit();
    });
  });

});

function getAddr(){
  $.ajax({
    type: 'POST',
    url: 'addr_fetch.php',
    dataType: 'json',
    success: function(response){
      if(!response.error){
        $('#addrList').html(response.list);
      }
    }
  });
}