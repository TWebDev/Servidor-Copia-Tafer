/*SHOW MORE AN SHOW LESS*/
function show_more(){
  document.getElementById('contenido').style.display = 'block';
  document.getElementById('more').style.display = 'none';
}
function show_less(){
  document.getElementById('contenido').style.display = 'none';
  document.getElementById('more').style.display = 'block';
}

/*OCULTAR QUOTE*/
function ocultarQuote(){
    document.getElementById('quote').style.display = 'none';
    document.getElementById('payment').style.display = 'block';
}
function ocultarPayment(){
  document.getElementById('quote').style.display = 'block';
  document.getElementById('payment').style.display = 'none';
}
/*MOSTRAR EL FIND A PACKAGE*/
function findMuestra(){
  document.getElementById('pack').style.display = 'block';
  document.getElementById('find').style.display = 'none';
  document.getElementById('phone-box').style.backgroundColor = 'transparent';
  
}
function findOculta(){
  document.getElementById('find').style.display = 'block';
  document.getElementById('pack').style.display = 'none';
  document.getElementById('phone-box').style.backgroundColor = '#B7D93D';
}

/*function validar(){
  var nombre, apellidos, correo, telefono, expresion;

  nombre = document.getElementById('Fname').value;
  apellidos = document.getElementById('Lname').value;
  correo = document.getElementById('Email').value;
  telefono = document.getElementById('Phone').value;
  expresion = /\w+@\w+\.+[a-z]/;

  if(nombre == "" || apellidos == "" || correo == "" || telefono == ""){
    alert("Todos los cambios son obligatorios");
     return false;
  }
  else if(telefono.length > 10 || telefono.length<10){
    alert("Teléfono inválido");
    return false;
  }
  else if(correo.length > 80){
    alert("Email inválido");
    return false;
  }
  else if(isNaN(telefono)){
    alert("Solo se admiten números");
    return false;
  }
  else if(!expresion.test(correo)){
    alert("correo inválido");
    return false;
  }
  
}*/
function validaCheck(){
  if (document.getElementById('test').checked)
  {
    document.getElementById('btn-pay').style.display = 'block';
  //alert('checkbox1 esta seleccionado');
  }
}


