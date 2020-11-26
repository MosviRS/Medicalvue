function GenerarPDf(datos){
    var data=$(datos[1]).serialize();
    var data2=$(datos[2]).serialize();
  
   
    
    console.log(data,data2);
     var request = $.ajax({
        type:"POST",
        data:data + "&" + data2,
        url:datos[0],
        
     });
     request.done(function(response) {
       if(response ==='successGuard'){
         //console.log(response);
         
         $(datos[1])[0].reset();
         $(datos[2])[0].reset();
         console.log(response);
       //  mostar(datos[2],datos[3]);
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
  }