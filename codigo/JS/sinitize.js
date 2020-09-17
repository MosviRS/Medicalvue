
function mostar(enlace,tabla){
      console.log(enlace,tabla);
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
    if(response ==='successGuard'){
      //console.log(response);
      
      $(datos[1])[0].reset();
      console.log(response);
      mostar(datos[2],datos[3]);
      swal({
        title: "Resgitro exitoso!",
        text: "Podras ver tu resgitro en la tabla.",
        type: "success",
      });
    }else{
      swal({
        title: "Upss ha ocurrido un error!",
        text: "Intentalo de nuevo.",
        type: "error",
      });
     // window.locationf="codigo/tabla_pacientes.php";
    }
});

request.fail(function(jqXHR, textStatus) {
    alert("Hubo un error: " + textStatus);
});
}

function Eliminar(idnombre,url,url2,tabla){
  console.log(url,url2,tabla);
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
              url:url,
              
            });
            request.done(function(response) {
              console.log(response);
              if($.trim(response)==='successElim'){
                
                swal({
                  title: "Registro eliminado!",
                  text: "Podras ver tu resgitro en la tabla.",
                  type: "success",
                });
                mostar(url2,tabla);
                
              }else{
                swal({
                  title: "Upss! algo salio mal",
                  text: "Intentalo  de nuevo.",
                  type: "erro",
                });
               // window.locationf="codigo/tabla_pacientes.php";
              }
          });
        
      }
  });
}


function modificar(id,scriptt,tabla){

  var request=$.ajax({
     type:"POST",
     data:"id="+id,
     url:scriptt,
     datatype: 'json',
     success:function(r){
      var auxDatajson = [];
      var i=0;
      var textareas;
      datos = jQuery.parseJSON(r);
      
        datos.forEach((e)=>{
        
          for(var p in e){
            auxDatajson.push(e[p]);
          }
        }
      );
      
      $(tabla).find('input').each(function(){

         $(this).val(auxDatajson[i]);
           i=i+1;
       });
       if($(tabla).find('textarea').length >0){
           $(tabla).find('textarea').val(auxDatajson[auxDatajson.length-1]);
       }
      
     }
  })

}
function actualilzar(datos){
  var datal= $(datos[1]).serialize();
  console.log(datal);
   var request = $.ajax({
      type:"POST",
      data:datal,
      url:datos[0],
      
   });
   request.done(function(response) {
    console.log(response);
     if(response ==='successAct'){
       mostar(datos[2],datos[3]);
       swal({
         title: "Actualizacion exitosa!",
         text: "Podras ver tu resgitro en la tabla.",
         type: "success",
       });
     }else{
      swal({
        title: "Upss fallo al actualizar!",
        text: "Intentalo de nuevo.",
        type: "error",
      });
      // window.locationf="codigo/tabla_pacientes.php";
     }
 });
 
 request.fail(function(jqXHR, textStatus) {
     alert("Hubo un error: " + textStatus);
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
  
 