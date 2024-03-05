<?php

include("session.php");




?>
<!DOCTYPE html>
<html lang="en" class="notranslate" translate="no" >
<head id="encabezado">
    <title>Superior 1.9 - Carga Valoraciones</title>
    <meta name="google" content="notranslate" />
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <!--FONTS-->
  <link href="https://fonts.googleapis.com/css?family=Kodchasan|Roboto" rel="stylesheet">
  <!--CUSTOM CSS-->
  <!--BOOTSTRAP CSS-->
  <!-- <link rel="stylesheet" href="css/custom-bootstrap.css" > -->
  
  <link href="./css/flip.css" rel="stylesheet" >


  <script  src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

  <!--TOASTR CSS-->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet" >
	<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
  
  <!--ICON-->
  <link href="favicon.png" rel="icon">

  <style>
  *,
  *::before,
  *::after {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
  }

  table {
    background-color: #fff;
    border-radius: 8px;
    border: solid 1px;
    overflow: scroll;
  
  }
  .btn-asistencia {
    width: 30px;
  }

  tr,td {
      border-radius: 8px;
      border: solid 1px;
    }
   body {
    font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
    display: grid;
    place-content: center;
    min-height: 100vh;
    overflow: hidden;
    background: #e5e5e5;
  } 

  .white-bkg {
    position: absolute;
    background: #f6f6f6;
    inset: 0;
    z-index: -10;
  }
  .shadow{
    filter: drop-shadow(0 0 10px rgba(0, 0, 0, 0.3));
  }
  main {
    background-size: contain;
    width: 320px;
    height: 640px;
    display: flex;
    position: relative;
  }
  section {
    width: 100%;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, .3);
    display: flex;
    gap: 24px;
    flex-direction: column;
    overflow: hidden;
    padding: 16px 6px;
    margin: 24px;
  }

  header {
    display: flex;
    justify-content: start;
    padding-left: 1rem;

    & img {
      width: 24px;
      height: 24px;
    }
  }

  footer {
    display: grid;
    grid-template-columns: repeat(5, 1fr);
    gap: 12px;
    padding: 0 24px;
    justify-content: center;
    align-items: center;

    & button {
      background: url('./tinder-icons.webp') no-repeat;
      background-position: 0px 0px;
      background-size: 175px;
      height: 32px;
      width: 32px;
      border-radius: 50%;
      border: 0;
      cursor: pointer;
      transition: scale .3s ease;

      &:hover {
        scale: 1.4;
      }

      &.is-big {
        background-size: 250px;
        width: 48px;
        height: 48px;
      }

      &.is-undo {
        background-position: -140px 0;
      }

      &.is-remove {
        background-position: -150px 0;
      }

      &.is-fav {
        background-position: -50px 0;
      }

      &.is-star {
        background-position: -70px 0px;
      }
    }
  }

  .cards {
    width: 100%;
    height: 100%;
    margin: 0 auto;
   

    &>span {
      display: grid;
      place-content: center;
      color: #777;
      font-size: 14px;
      text-align: center;
      height: 100%;
      z-index: -1;
    }

    
}
  article {
    overflow: auto;
  }
</style>
<style>
		/* cuando vayamos a imprimir ... */
		@media print{
      @page {
        size: A4 landscape; 
        }

      
      /* indicamos el salto de pagina */
			.saltoDePagina{
				/*display:block;*/
				page-break-before:always;
			}
		}
	</style>  
  </head>
<body>


  <!-- Page Content -->
 <main> 
    <section>
        
<div class="cards">
    <h4 > - ASISTENCIA X ASIGNATURA - </h4><HR> 
   
		<div class="row justify-content-left">
      <div id="ciclos">
        <div class='col-sm'><label for='selciclo' class='label-ernes'>CICLO:</label></div>
        <div class='col-sm'><select id='selciclo' style='width:200px;font-size:12px' name='selciclo'>        
          <option>SELECCIONE</option></select></div>
      </div><hr>
     </div><hr> 
		<div class="row justify-content-left">
      <div id="combo">
        <div class='col-sm'><label for='selcarrera' class='label-ernes'>CARRERA:</label></div>
        <div class='col-sm'><select id='selcarrera' style='width:940px;font-size:13px' name='selcarrera'>        
          <option>SELECCIONE</option></select></div><hr>
      </div>
      
		</div>
    
		<div class="row justify-content-left md">
      <div id="materias">
        <div class="col-md"><label class="label-ernes" for="id_asignaturaxplan">MATERIA:</label></div>
        <div class="col-md"><select disabled id="id_asignaturaxplan" style="width:445px;font-size:12px;" name="id_asignaturaxplan"><option>SELECCIONE</option></select></div>
      </div>
      <div id="cursos">
        <div class="col-md"><label class="label-ernes" for="nombre_curso">DIVISION:</label></div>
        <div class="col-md"><select id='nombre_curso' style='width:145px;font-size:12px;' name='nombre_curso' ><option>SELECCIONE</option></select></div>
      </div>
      <div>
      <div class="col-md"><label class="label-ernes" ></label></div>
        <div class="col-md"><button type="button" id="buscar" class="btn btn-ernes">BUSCAR</button>
        <button type="button" id="limpiar" class="btn btn-ernes">LIMPIAR</button>
          <!--<button type="button" id="btnimprime" class="btn btn-ernes">IMPRIME</button>-->
        </div>
      </div>
		</div>
    <article>
        <div  id="catedra" ></div>
        </article>

</div>

      
    
  </section>
 </main>
  <!-- Bootstrap core JavaScript -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>

<script>
		$(document).ready(function () {

		cargaciclos();


    function cargaciclos(){
      
        accion="comboanioscursada";
        //alert(id_plan);
          $.ajax({
              type: "POST",
              url: "servicio.php",
              data: {accion:accion},
            success:function(data)
              {
                 //alert('hola');
                  $('#ciclos').html(data);
                 //cargacombo();
              }
          });

      
    }  

      $(document).on('change','select#selciclo',function(){
            $("#catedra").html("");
            $("#guardado").html("");
            
            if($(this).val()>0)
            {
              cargacombo();
            }
        
      })
      
		function cargacombo(){
 			

      
      docente=<?php echo $_SESSION['docente'];?>;
      //alert(docente);
      if(docente>0)
            {
              id_aniocursada=$("#selciclo").val();
              if(id_aniocursada>0)
              {
                    //alert(id_aniocursada);
                    tipo="CARRERAS";
                    accion="comboxdocente";
                          $.ajax({
                              type: "POST",
                              url: "servidocentes.php",
                              data: {accion:accion,id_docente:docente,tipo:tipo,id_aniocursada:id_aniocursada},
                            success:function(data)
                              {
                                 //alert('hola');
                                  $('#combo').html(data);
                              }
                          });		
              }

            }      
       else
            {
                    accion="combo";
                          $.ajax({
                              type: "POST",
                              url: "servicio.php",
                              data: {accion:accion},
                            success:function(data)
                              {
                                 //alert('hola');
                                  $('#combo').html(data);
                              }
                          });		
              }
        }

function confirmDialog(message, handler){

  
  $(`<div class="modal fade" id="myModal" tabindex="-1" role="dialog"> 
     <div class="modal-dialog"> 
       <!-- Modal content--> 
        <div class="modal-content"> 
              <div class="modal-header">
                  <h5 class="modal-title">Aviso!</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
            </div>
          <div class="modal-body" style="padding:10px;"> 
             <h5 class="text-center">${message}</h5> 
            <div class="modal-footer">
              <button type="button" class="btn btn-primary">Aceptar</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            </div>
           </div> 
       </div> 
    </div> 
  </div>`).appendTo('body');
 
  //Trigger the modal
  $("#myModal").modal({
     backdrop: 'static',
     keyboard: false
  });
  
   //Pass true to a callback function
   $(".btn-primary").click(function () {
       handler(true);
       $("#myModal").modal("hide");
   });
    
   //Pass false to callback function
   $(".btn-secondary").click(function () {
       handler(false);
       $("#myModal").modal("hide");
   });

   //Remove the modal once it is closed.
   $("#myModal").on('hidden.bs.modal', function () {
      $("#myModal").remove();
   });
}    
    
    
        function limpiarpantalla(){
                $("#selcarrera").val(0);
                $("#nombre_curso").empty();
                $("#id_asignaturaxplan").empty();
      
    }

      $(document).on('click','#limpiar',function(){
          
          
        confirmDialog("Está Seguro que desea Limpiar?", (ans) => {
          if (ans) {
            
                  limpiarpantalla();
          }
          });
        
      });
    
         function MensajesError(valor){
                    toastr.options = {
                      "closeButton": false,
                      "debug": false,
                      "newestOnTop": false,
                      "progressBar": false,
                      "positionClass": "toast-top-left",
                      "preventDuplicates": false,
                      "onclick": null,
                      "showDuration": "300",
                      "hideDuration": "1000",
                      "timeOut": "5000",
                      "extendedTimeOut": "1000",
                      "showEasing": "swing",
                      "hideEasing": "linear",
                      "showMethod": "fadeIn",
                      "hideMethod": "fadeOut"
                    }
                  switch(valor) {
                    case "DNI":
                    toastr.error("Ingrese un DNI Valido","Aviso!");
                    break;

                    case "EXITO":
                    toastr.info("Operación Guardada con Exito!!","Aviso!");
                    break;
                      
                    case "FCUR":
                    toastr.error("Ingrese una Fecha para Inicio de Cursada","Aviso!");
                    break;

                    case "NOEXISTE":
                    toastr.error("No existe ese DNI o NO Está asociado a la Carrera","Aviso!");
                    break;
                    
                    case "DOCUMENTO":
                    toastr.error("Debe completar el Campo DNI","Aviso!");
                     break;
                    
                    case "APELLIDO":
                    toastr.error("Debe completar el Campo APELLIDO","Aviso!");
                    break;

                    case "NOMBRE":
                    toastr.error("Debe completar el Campo NOMBRE","Aviso!");
                    break;

                    case "SEXO":
                    toastr.error("Debe Seleccionar un SEXO","Aviso!");
                    break;

                    case "FNAC":
                    toastr.error("Debe completar el Campo FECHA NACIMIENTO","Aviso!");
                    break;

                    case "LUGAR":
                    toastr.error("Debe completar el Campo LUGAR","Aviso!");
                    break;

                    case "CICLO":
                    toastr.error("Debe Seleccionar un CICLO","Aviso!");
                    break;

                    case "DIRE":
                    toastr.error("Debe completar el Campo DOMICILIO","Aviso!");
                    break;
                      
                    case "TEL":
                    toastr.error("Debe completar el Campo TELEFONO","Aviso!");
                    break;

                    case "MAIL":
                    toastr.error("Debe completar el Campo E-MAIL","Aviso!");
                    break;
                      
                    case "CARRERA":
                    toastr.error("No ha Seleccionado una Carrera","Aviso!");
                    break;
                  
                    case "DIVISION":
                    toastr.error("No ha Seleccionado una Division","Aviso!");
                    break;

                    case "MATERIA":
                    toastr.error("No ha Seleccionado una Materia","Aviso!");
                    break;
                      
                    case "INVALIDO":
                    toastr.error("Debe ingresar un EMAIL Valido","Aviso!");
                    break;

                    case "SEL0":
                    toastr.error("Se ha Guardado una Matriculacion Vacia!","Aviso!");
                    break;

                    case "WAIT":
                    toastr.info("Espere mientras se guardan los cambios","Aviso!");
                    break;
                      
                  }
           
         }
    
         
        
    
          function validaCampos(){
  
           quehay=$("#selcarrera").val();
           materia=$("#id_asignaturaxplan").val();
           curso = $("#nombre_curso").val();
           ciclo= $('#selciclo').val();

         //validamos campos
         if(quehay == 0){
            MensajesError("CARRERA");
            return false;
          }

         if(ciclo == 0){
            MensajesError("CICLO");
            return false;
          }

         if(!$("#chkmate").is(":checked")){  

              if(materia == 0){
                MensajesError("MATERIA");
                  return false;
              }
          }
          if(curso == 0){
            MensajesError("DIVISION");
              return false;
          }
           return true; 
          }      

      $(document).on('keyup','.nf',function(event){
          if(event.which == 13 || event.which == 40 )
          {
                sigo=0;
                fila=$(this).parent("td").data("fila");
                columna=$(this).parent("td").index();
                while(sigo<1)
                      {
                          fila=fila+1;
                          idalu=$('#tblnotas').find("tr:eq("+fila+")").find("td:eq(2)").parent().find("#alumno").data('idalu');
                          id_control="nf-"+idalu;
                          //alert(id_control);
                          if(!$('#tblnotas').find("tr:eq("+fila+")").find("td:eq("+columna+")").parent().find("#"+id_control).attr('disabled'))
                          {
                              sigo=1;

                          }

                      }
                   $('#tblnotas').find("tr:eq("+fila+")").find("td:eq("+columna+")").find("#"+id_control).focus();
          }
          if(event.which == 38 )
          {
                sigo=0;
                fila=$(this).parent("td").data("fila");
                columna=$(this).parent("td").index();
                while(sigo<1)
                      {
                          fila=fila-1;
                          idalu=$('#tblnotas').find("tr:eq("+fila+")").find("td:eq(2)").parent().find("#alumno").data('idalu');
                          id_control="nf-"+idalu;
                          //alert(id_control);
                          if(!$('#tblnotas').find("tr:eq("+fila+")").find("td:eq("+columna+")").parent().find("#"+id_control).attr('disabled'))
                          {
                              sigo=1;

                          }

                      }
                   $('#tblnotas').find("tr:eq("+fila+")").find("td:eq("+columna+")").find("#"+id_control).focus();
          }
          if(event.which == 39 )
          {
                sigo=0;
                //fila=$(this).parent("td").data("fila");
                columna=$(this).parent("td").index();
                columna=columna+1;
                $('#tblnotas').find("tr:eq("+fila+")").find("td:eq("+columna+")").find("input").focus();
          }            
          if(event.which == 37 )
          {
                sigo=0;
                //fila=$(this).parent("td").data("fila");
                columna=$(this).parent("td").index();
                columna=columna-1;
                $('#tblnotas').find("tr:eq("+fila+")").find("td:eq("+columna+")").find("input").focus();
          }            
        
        
        
        
      })

      $(document).on('keyup','.ab',function(event){
          if(event.which == 40 )
          {
                sigo=0;
                fila=$(this).parent("td").data("fila");
                columna=$(this).parent("td").index();
                while(sigo<1)
                      {
                          fila=fila+1;
                          idalu=$('#tblnotas').find("tr:eq("+fila+")").find("td:eq(2)").parent().find("#alumno").data('idalu');
                          id_control="ab-"+idalu;
                          //alert(id_control);
                          if(!$('#tblnotas').find("tr:eq("+fila+")").find("td:eq("+columna+")").parent().find("#"+id_control).attr('disabled'))
                          {
                              sigo=1;

                          }

                      }
                   $('#tblnotas').find("tr:eq("+fila+")").find("td:eq("+columna+")").find("#"+id_control).focus();
          }
          if(event.which == 38 )
          {
                sigo=0;
                fila=$(this).parent("td").data("fila");
                columna=$(this).parent("td").index();
                while(sigo<1)
                      {
                          fila=fila-1;
                          idalu=$('#tblnotas').find("tr:eq("+fila+")").find("td:eq(2)").parent().find("#alumno").data('idalu');
                          id_control="ab-"+idalu;
                          //alert(id_control);
                          if(!$('#tblnotas').find("tr:eq("+fila+")").find("td:eq("+columna+")").parent().find("#"+id_control).attr('disabled'))
                          {
                              sigo=1;

                          }

                      }
                   $('#tblnotas').find("tr:eq("+fila+")").find("td:eq("+columna+")").find("#"+id_control).focus();
          }
          if(event.which == 39 )
          {
                sigo=0;
                //fila=$(this).parent("td").data("fila");
                columna=$(this).parent("td").index();
                columna=columna+1;
                $('#tblnotas').find("tr:eq("+fila+")").find("td:eq("+columna+")").find("input").focus();
          }            
          if(event.which == 37 )
          {
                sigo=0;
                //fila=$(this).parent("td").data("fila");
                columna=$(this).parent("td").index();
                columna=columna-1;
                $('#tblnotas').find("tr:eq("+fila+")").find("td:eq("+columna+")").find("input").focus();
          }            
        
        
        
        
      })
    
      
      $(document).on('keyup','.ac',function(event){
          if(event.which == 40 )
          {
                sigo=0;
                fila=$(this).parent("td").data("fila");
                columna=$(this).parent("td").index();
                while(sigo<1)
                      {
                          fila=fila+1;
                          idalu=$('#tblnotas').find("tr:eq("+fila+")").find("td:eq(2)").parent().find("#alumno").data('idalu');
                          id_control="ac-"+idalu;
                          //alert(id_control);
                          if(!$('#tblnotas').find("tr:eq("+fila+")").find("td:eq("+columna+")").parent().find("#"+id_control).attr('disabled'))
                          {
                              sigo=1;

                          }

                      }
                   $('#tblnotas').find("tr:eq("+fila+")").find("td:eq("+columna+")").find("#"+id_control).focus();
          }
          if(event.which == 38 )
          {
                sigo=0;
                fila=$(this).parent("td").data("fila");
                columna=$(this).parent("td").index();
                while(sigo<1)
                      {
                          fila=fila-1;
                          idalu=$('#tblnotas').find("tr:eq("+fila+")").find("td:eq(2)").parent().find("#alumno").data('idalu');
                          id_control="ac-"+idalu;
                          //alert(id_control);
                          if(!$('#tblnotas').find("tr:eq("+fila+")").find("td:eq("+columna+")").parent().find("#"+id_control).attr('disabled'))
                          {
                              sigo=1;

                          }

                      }
                   $('#tblnotas').find("tr:eq("+fila+")").find("td:eq("+columna+")").find("#"+id_control).focus();
          }
          if(event.which == 39 )
          {
                sigo=0;
                //fila=$(this).parent("td").data("fila");
                columna=$(this).parent("td").index();
                columna=columna+1;
                $('#tblnotas').find("tr:eq("+fila+")").find("td:eq("+columna+")").find("input").focus();
          }            
          if(event.which == 37 )
          {
                sigo=0;
                //fila=$(this).parent("td").data("fila");
                columna=$(this).parent("td").index();
                columna=columna-1;
                $('#tblnotas').find("tr:eq("+fila+")").find("td:eq("+columna+")").find("input").focus();
          }            
        
        
        
        
      })
      
      $(document).on('keyup','.nota',function(event){
          if(event.which == 13 || event.which == 40 )
          {
                sigo=0;
                fila=$(this).parent("td").data("fila");
                columna=$(this).parent("td").index();
                nom=$(this).attr('id');
                num_nota=nom.substring(0,3);
                while(sigo<1)
                      {
                          fila=fila+1;
                          idalu=$('#tblnotas').find("tr:eq("+fila+")").find("td:eq(2)").parent().find("#alumno").data('idalu');
                          id_control=num_nota+idalu;
                          if(!$('#tblnotas').find("tr:eq("+fila+")").find("td:eq("+columna+")").parent().find("#"+id_control).attr('disabled'))
                          {
                              sigo=1;

                          }

                      }
                   $('#tblnotas').find("tr:eq("+fila+")").find("td:eq("+columna+")").parent().find("#"+id_control).focus();
          }
          if(event.which == 38 )
          {
                sigo=0;
                fila=$(this).parent("td").data("fila");
                columna=$(this).parent("td").index();
                nom=$(this).attr('id');
                num_nota=nom.substring(0,3);
                while(sigo<1)
                      {
                          fila=fila-1;
                          idalu=$('#tblnotas').find("tr:eq("+fila+")").find("td:eq(2)").parent().find("#alumno").data('idalu');
                          id_control=num_nota+idalu;
                          if(!$('#tblnotas').find("tr:eq("+fila+")").find("td:eq("+columna+")").parent().find("#"+id_control).attr('disabled'))
                          {
                              sigo=1;

                          }

                      }
                   $('#tblnotas').find("tr:eq("+fila+")").find("td:eq("+columna+")").parent().find("#"+id_control).focus();
          }
        
          if(event.which == 39 )
          {
                sigo=0;
                //fila=$(this).parent("td").data("fila");
                columna=$(this).parent("td").index();
                columna=columna+1;
                $('#tblnotas').find("tr:eq("+fila+")").find("td:eq("+columna+")").find("input").focus();
          }            
          if(event.which == 37 )
          {
                sigo=0;
                //fila=$(this).parent("td").data("fila");
                columna=$(this).parent("td").index();
                columna=columna-1;
                $('#tblnotas').find("tr:eq("+fila+")").find("td:eq("+columna+")").find("input").focus();
          }            
        
      })
      
      $(document).on('change','select#selcarrera',function(){
          $("#catedra").html(""); 
          $("#guardado").html("");

          id_plan = $('#selcarrera').val();
           if(id_plan==0){return false;}
           id_aniocursada=$("#selciclo").val();

            /*accion="comboanioscursada";
                //alert(id_plan);
                  $.ajax({
                      type: "POST",
                      url: "servicio.php",
                      data: {accion:accion},
                    success:function(data)
                      {
                         //alert('hola');
                          $('#ciclos').html(data);
                      }
                  });*/
        
           docente=<?php echo $_SESSION['docente'];?>;
            if(docente>0)
                  {
                          tipo="MATERIAS";
                          accion="comboxdocente";
                                $.ajax({
                                    type: "POST",
                                    url: "servidocentes.php",
                                    data: {accion:accion,id_docente:docente,tipo:tipo,id_plan:id_plan,id_aniocursada:id_aniocursada},
                                  success:function(data)
                                    {
                                       //alert('hola');
                                        $('#materias').html(data);
                                    }
                                });		

                  }      
             else
                  {
        
                        accion="combomaterias";
                            $.ajax({
                                type: "POST",
                                url: "servicio.php",
                                data: {accion:accion,id_plan:id_plan},
                              success:function(data)
                                {
                                    $('#materias').html(data);
                                }
                            });
                  }
      })

      
    
      $(document).on('change','select#id_asignaturaxplan',function(){
           $("#catedra").html("");
            $("#guardado").html("");
           id_asignaturaxplan = $('#id_asignaturaxplan').val();
           id_aniocursada=$('#selciclo').val();
           if(id_asignaturaxplan==0){return false;}
                          accion="cursos_asignatura";
                                $.ajax({
                                    type: "POST",
                                    url: "reportes.php",
                                    data: {accion:accion,id_asignaturaxplan:id_asignaturaxplan,id_aniocursada:id_aniocursada},
                                  success:function(data)
                                    {
                                       //alert('hola');
                                        $('#cursos').html(data);
                                    }
                                });		

        
      })

           $(document).on('click','button#salida',function () {

              printContents = document.getElementById("todo").innerHTML;
              originalContents = document.body.innerHTML;
              document.getElementById("intro").style.display = 'none';    
              document.body.innerHTML = printContents;
              window.print();
              location.reload();         
             
            })
      
      
      
      
          $(document).on('click','#tblnotas .ab',function () {
                
            
                 if($(this).is(':checked')){
                     $(this).parents("tr").css('background-color','silver');
                     $(this).parents("tr").find("td:eq(4)").find('input').attr('disabled',true);
                     $(this).parents("tr").find("td:eq(5)").find('input').attr('disabled',true);
                     $(this).parents("tr").find("td:eq(6)").find('input').attr('disabled',true);
                     $(this).parents("tr").find("td:eq(7)").find('input').attr('disabled',true);
                     $(this).parents("tr").find("td:eq(8)").find('input').attr('disabled',true);
                     $(this).parents("tr").find("td:eq(9)").find('input').attr('disabled',true);
                     $(this).parents("tr").find("td:eq(10)").find('input').attr('disabled',true);
                     $(this).parents("tr").find("td:eq(11)").find('input').attr('disabled',true);
                     $(this).parents("tr").find("td:eq(12)").find('input').attr('disabled',true);
                     $(this).parents("tr").find("td:eq(14)").find('input').attr('disabled',true);

                 }
                else
                 {
                     $(this).parents("tr").css('background-color','white');
                     $(this).parents("tr").find("td:eq(4)").find('input').attr('disabled',false);
                     $(this).parents("tr").find("td:eq(5)").find('input').attr('disabled',false);
                     $(this).parents("tr").find("td:eq(6)").find('input').attr('disabled',false);
                     $(this).parents("tr").find("td:eq(7)").find('input').attr('disabled',false);
                     $(this).parents("tr").find("td:eq(8)").find('input').attr('disabled',false);
                     $(this).parents("tr").find("td:eq(9)").find('input').attr('disabled',false);
                     $(this).parents("tr").find("td:eq(10)").find('input').attr('disabled',false);
                     $(this).parents("tr").find("td:eq(11)").find('input').attr('disabled',false);
                     $(this).parents("tr").find("td:eq(12)").find('input').attr('disabled',false);
                     $(this).parents("tr").find("td:eq(14)").find('input').attr('disabled',false);
                   
                 }
            

            //alert("hola");
                  
                           
            })      
      
      
           $(document).on('click','button#guardar',function () {
                  idasignaturaxplan=$('#id_asignaturaxplan').val();
                  var tipo=<?php echo  $_SESSION['tipo'];?>;
                  usuario="<?php echo  $_SESSION['usuario'];?>";
                  colidalu=2;
                  colpoe1=4;
                  colamt1=5;
                  colippr1=6;
                  colval1=7;
                  colpoe2=8;
                  colamt2=9;
                  colippr2=10;
                  colval2=11;
                  colsit=12;
                  colnc=13;
                  opciones=$("#opciones").val();
                  
                  cadenapasada='';
                  orden=0;
                  e=-1;
                  tot_tr=$('#tblnotas tr').length;
                  //alert(tot_tr);
                  MensajesError("WAIT");
                  for(i=0;i<tot_tr;i++)
                  {
                      valor=$('#tblnotas').find("tr:eq("+i+")").find("td:eq("+orden+")").html();
                     
                      if ($.isNumeric(valor))
                      {
                                        
                                        idalu=$('#tblnotas').find("tr:eq("+i+")").find("td:eq("+colidalu+")").parent().find("#alumno").data('idalu');
                                        cadenapasada+=pad($('#tblnotas').find("tr:eq("+i+")").find("td:eq("+colidalu+")").parent().find("#alumno").data('idcaap'),6);
                                        cadenapasada+=pad($('#tblnotas').find("tr:eq("+i+")").find("td:eq("+colpoe1+")").parent().find("#poe1-"+idalu).val(),1);
                                        cadenapasada+=pad($('#tblnotas').find("tr:eq("+i+")").find("td:eq("+colamt1+")").parent().find("#amt1-"+idalu).val(),1);
                                        cadenapasada+=pad($('#tblnotas').find("tr:eq("+i+")").find("td:eq("+colippr1+")").parent().find("#ippr1-"+idalu).val(),1);
                                        var valora1 = $('#tblnotas').find("tr:eq("+i+")").find("td:eq("+colval1+")").parent().find("#val1-"+idalu).val().substring(0,5);
                                        cadenapasada+=padspa(valora1,5);
                                        cadenapasada+=pad($('#tblnotas').find("tr:eq("+i+")").find("td:eq("+colpoe2+")").parent().find("#poe2-"+idalu).val(),1);
                                        cadenapasada+=pad($('#tblnotas').find("tr:eq("+i+")").find("td:eq("+colamt2+")").parent().find("#amt2-"+idalu).val(),1);
                                        cadenapasada+=pad($('#tblnotas').find("tr:eq("+i+")").find("td:eq("+colippr2+")").parent().find("#ippr2-"+idalu).val(),1);
                                        var valora2 = $('#tblnotas').find("tr:eq("+i+")").find("td:eq("+colval2+")").parent().find("#val2-"+idalu).val().substring(0,5);
                                        cadenapasada+=padspa(valora2,5);
                                        cadenapasada+=pad($('#tblnotas').find("tr:eq("+i+")").find("td:eq("+colsit+")").parent().find("#sit-"+idalu).val(),1);
                                        cadenapasada+=pad($('#tblnotas').find("tr:eq("+i+")").find("td:eq("+colnc+")").parent().find("#cursada-"+idalu).val(),2);
                        
                      }
                                        console.log(cadenapasada+'\n');                                        
                    
                    
                  }

                    //alert("Observaciones: "+opciones);
                    /*if(tipo==4)
                    {
                      console.log("Asignatura: "+idasignaturaxplan+" Cadena:\n"+cadenapasada+" \n Usuario: "+usuario+" \n Opciones: "+opciones);
                    }*/
                      //alert("Largo Cadena : "+cadenapasada.length);
                    
                   GuardaCadena(idasignaturaxplan,cadenapasada,usuario,opciones);
                    /*setTimeout(function()
                       {
                         
                         

                        },3000);*/
             
             
           })    

      
      function GuardaCadena(idasignaturaxplan,cadena,usuario,opciones)
      {
                  
                 $("#catedra").html('<div class="col-lg-12 text-center"><img src="./img/ball.gif" alt="Guardando" /><br/><h4 style="color:red;">Un momento, por favor Guardando...</h4></div>');                        
                //alert("Largo Cadena : "+cadena.length);
                  accion="guarda_informe_valoracion";
                    $.ajax({
                        type: "POST",
                        url: "valorar.php",
                        data: {accion:accion,id_asignaturaxplan:idasignaturaxplan,
                               cadena:cadena,
                               usuario:usuario,
                               observacion:opciones},
                      success:function(data)
                        {
                            if(data!='')
                            {
                                  alert(data);
                              
                            }else
                            {
                                $("#buscar").trigger("click");
                                MensajesError("EXITO");
                              
                            }
                        }
                    });
          
        
      }
      
      
      
      

      function GuardaCalificacion(idcaap,nota1,nota2,nota3,nota4,nota5,nota6,nota7,nota8,acre,aban,notafinal,usuario,opciones)
      {
                  
                  accion="guardacalificaciones";
                    $.ajax({
                        type: "POST",
                        url: "consultas.php",
                        data: {accion:accion,id_cursadaxasignaturaxalumnoxplan:idcaap,nota_1:nota1,
                               nota_2:nota2,nota_3:nota3,nota_4:nota4,nota_5:nota5,nota_6:nota6,nota_7:nota7,nota_8:nota8,
                               acredita:acre,abandono:aban,nota_final:notafinal,usuario:usuario,observacion:opciones},
                      success:function(data)
                        {
                          //alert(data);
                        }
                    });
          
        
      }
      
          function pad(n, width, z) 
          {
            z = z || '0';
            n = n + '';
            return n.length >= width ? n : new Array(width - n.length + 1).join(z) + n;
          }      

          function padspa(n, width, z) 
          {
            z = z || ' ';
            n = n + '';
            return n.length >= width ? n : new Array(width - n.length + 1).join(z) + n;
          }      
      
      
          function printExternal(url) {
                printWindow = window.open( '', '_blank' );
                //printWindow.addEventListener('open', function(){
                printWindow.document.write(url);
                printWindow.print();
                printWindow.close();
          //}, true);
          }

      
        $(document).on('click','button#btnimprime',function(){
         	
           
           if(validaCampos()){ 
           
               id_asignaturaxplan = $('#id_asignaturaxplan').val();
               id_plan = $('#selcarrera').val();
               division=$('#nombre_curso').val();
               materia=$('#id_asignaturaxplan option:selected').text();
               carrera=$('#selcarrera option:selected').text(); 
               id_aniocursada=$("#selciclo").val(); 
             
          alert(id_plan+" - "+id_asignaturaxplan+" - "+carrera+" - "+materia+" - "+id_aniocursada);
           //alert("entro");
                  accion="imprimecalificaciones";
                    $.ajax({
                        type: "POST",
                        url: "consultas.php",
                        data: {accion:accion,id_plan:id_plan,id_asignaturaxplan:id_asignaturaxplan,division:division,materia:materia,carrera:carrera,id_aniocursada:id_aniocursada},
                      success:function(data)
                        {

                                  printExternal(data);                          
                          
                        }
                    });
                
                

            }

         });

      
      
         $(document).on('click','button#buscar',function(){
         	
           //alert("entro");
           if(validaCampos()){ 
           
           id_asignaturaxplan = $('#id_asignaturaxplan').val();
           id_plan = $('#selcarrera').val();
           id_curso=$('#nombre_curso').val();
           materia=$('#id_asignaturaxplan option:selected').text();
           carrera=$('#selcarrera option:selected').text();  
           id_aniocursada=$('#selciclo').val();  
           //alert(id_plan+" - "+id_asignaturaxplan+" - "+carrera+" - "+nombre_asignatura);

//                  accion="calificaciones";
//                  accion="calificaciones2";
                  $("#catedra").html('<div class="col-lg-12 text-center"><img src="./img/ball.gif" alt="Buscando" /><br/><h4 style="color:red;">Un momento, por favor...</h4></div>');                        
                  accion="asistenciaxmateriadigital";
                      $.ajax({
                          type: "POST",
                          url: "reportes.php",
                          data: {accion:accion,id_plan:id_plan,id_asignaturaxplan:id_asignaturaxplan,id_curso:id_curso,carrera:carrera,id_aniocursada:id_aniocursada},
                        success:function(data)
                          {
                            $('#catedra').html(data);
                            $('#guardado').html('<button type="button" id="guardar" class="btn btn-ernes">GUARDAR</button>');

                          }
                      });

                
                

            }

         });
      
      
      
      
      
      
      
      


	});





</script>