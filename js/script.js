var checkbox = document.getElementById('color');
checkbox.addEventListener("change", validaCheckbox, false);

function validaCheckbox(){
  var checked = checkbox.checked;
  if(!checked){
    alert('Debes escoger un color');
  }
}