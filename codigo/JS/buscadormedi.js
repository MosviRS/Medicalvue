function RequestSearch(enlace,tabla,valores){
    console.log(enlace,tabla,valores);
        var request = $.ajax({ 
            type:"POST",
            data:"name="+valores,
            url:enlace,
            datatype: 'html',
      });
      request.done(function(response) {
        console.log(response);
        $(tabla).html(response);
    });
    request.fail(function(jqXHR, textStatus) {
      alert("Hubo un error: " + textStatus);
    });
}
function  WithOutParameters(enlace,tabla){
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
function BuscadormMedicamento(){
    let inputbusc=document.querySelector('#buscadorMedica');
    inputbusc.addEventListener('input', function(){
           let busqueda=this.value;
           if(busqueda!=""){
               RequestSearch('entidades/mostardatosmedicam.php','#tabladatosmedicamentos',busqueda);
           }else{
               WithOutParameters('entidades/mostardatosmedicam.php','#tabladatosmedicamentos');
           }
    });

}
BuscadormMedicamento();