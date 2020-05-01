
function mostar(enlace,tabla){
    var request = $.ajax({
      
      url:enlace,
      
  });
  request.done(function(response) {
    console.log(response);
    $(tabla).html(response);
});
request.fail(function(jqXHR, textStatus) {
  alert("Hubo un error: " + textStatus);
});
}

function agregardatos(datos){
 var data= $(datos[1]).serialize();
 console.log(data);
  var request = $.ajax({
     type:"POST",
     data:data,
     url:datos[0],
     
  });
  request.done(function(response) {
    if(response == ''){
      //console.log(response);
      swal('Error al registrar');
    }else{
      $(datos[1])[0].reset();
      console.log(response);
      mostar(datos[2],datos[3]);
      swal('Registro Exitoso');
     // window.locationf="codigo/tabla_pacientes.php";
    }
});

request.fail(function(jqXHR, textStatus) {
    alert("Hubo un error: " + textStatus);
});
}

function Eliminar(datos){
  swal({
        title:"¿Estas segurode borrar este registro?",
        text:"Una vez que elimens este registro, no podra ser recuperado!!!",
        icon:"warning",
        buttons:true,
        dangerMode:true,
  })
  .then((willDelete)=> {
      if(willDelete){
            var request=$.ajax({
              type:"POST",
              data:"id="+idnombre,
              url:"php/eliminar.php",
              
            });
            request.done(function(response) {
              if(response == ''){
                //console.log(response);
                swal=("Upss! Algo ha fallado, intentelo de nuevo");
              }else{
                swal=("Regsitro eliminado con exito");
                mostar(datos[2],datos[3]);
               // window.locationf="codigo/tabla_pacientes.php";
              }
          });
        
    
      }
    
      
    
  });
}
// Sanitiza los input ->Solo permite caracteres
$(function(){

    $('.validcontrol').keypress(function(e) {
      if(isNaN(this.value + String.fromCharCode(e.charCode))) 
       return false;
    })
    .on("cut copy paste",function(e){
      e.preventDefault();
    });
  
  });
  
 