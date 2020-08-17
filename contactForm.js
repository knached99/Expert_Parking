const submit = document.getElementById('submit');
const name = document.getElementById('name');
const phone = document.getElementById('phone');
const email = document.getElementById('email');
const subject = document.getElementById('subject');
const form = document.getElementById('myForm');



 function validateForm(){

    form.addEventListener('submit', (e)=>{
    e.preventDefault();
  if(name ==='' || name === null){
    document.getElementById('name').style.borderColor ='red';
    document.getElementById('name').style.visibility = "visible";
    console.log('Name cannot be blank');
  }
  else{
    document.getElementById('name').style.borderColor = 'green';
    console.log('Name is not blank');
  }





  if(phone === ''|| phone ===null){
    document.getElemntById('phone').style.borderColor ='red';
    alert('Phone cannot be blank');
  }
  else if(!validatephoneNum(phone) && phone.length >10){
    document.getElemntById(phone).styleBorderColor ='red';
    alert('Phone number is invalid or is greater than 10 digits');
  }
  else{
    document.getElemntById('phone').style.borderColor = 'green';
  }
  if(email ==='' || email ===null){
    document.getElemntById('email').style.borderColor = 'red';
  }
  else if(!validateEmail(email)){
    document.getElementById('email').styleBorderColor = 'red';
    alert('Enter a valid email');
  }
  else{
    document.getElemntById('email').styleBorderColor = 'green';
  }





  function validatephoneNum(){
    return '/^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/im'





  }
  function getSelectedOption(selected) {
    var selectedOption;
    for (var i =0, len =selected.options.length; i < len; i++){
      selectedOption = selected.options[i];
      if(selected.selected === true){
        break;
      }
    }
    return selected;
  }





  function validateEmail(){
    return '\b[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,}\b';
}




});
}
