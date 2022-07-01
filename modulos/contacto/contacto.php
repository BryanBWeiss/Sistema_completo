<?php
// ****** Modulo de contacto *******
require_once("../../header.php"); 
?> 
<script type="text/javascript" language="javascript">
  //metodo para cargar el formulario
  $("body").on('submit', '#formDefault', function(event) {
    event.preventDefault()
    if ($('#formDefault').valid()) {
      $('#barra').show();
      $.ajax({
        type:"POST",
        url: "contactoAjax.php",
        dataType: "json",
        data: $(this).serialize(),
        success: function(respuesta) {
          $('#barra').hide();
          if (respuesta.error == 1) {
            $('#error').show();
            setTimeout(function() {
              $('#error').hide();
            }, 3000);
          }

          if (respuesta.exito == 1) {
            $('#mensaje').show();
            $('#contactForm').hide();
            $('#contactFormExitoso').show();
            setTimeout(function() {
              $('#mensaje').hide();
            }, 3000);
          }
        }
      })
    }
  })
</script> 
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Contácto
        <small> - Llamenos o Escribalos -</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li><a href="#">Contactos</a></li>
        <li class="active">Formulario</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-body">
          
<div class="container-fluid">
  <div class="row">
    <div class="col-md-1">
    </div>
    <div class="col-md-4">

      <div class="list-group" style="padding-top: 30px"> 
  <section id="contactForm" style="display: show;">
         <a href="#" class="list-group-item list-group-item-action active">Formulario de contácto</a>
        <div class="list-group-item">
          Complete los Siguientes Datos:
        </div>
          <section id="contactForm" style="display: show;">
 <div class="list-group-item">
           <h4 class="list-group-item-heading">
             <form class="form-horizontal" id="formDefault">
                <div class="control-group-inline" style="padding-top: 10px">           
          
            <input type="text" class="form-control required redondeado" id="nombre" name="nombre" maxlength="50" placeholder="Nombre" title="Nombre"/>
              </div>
              <div class="control-group-inline" style="padding-top: 10px">           
         
              <input type="email" class="form-control required redondeado" id="correo" name="correo" maxlength="75" placeholder="Correo" title="Correo"/>
             </div>
              <div class="control-group-inline" style="padding-top: 10px; padding-bottom: 10px">           
          
              <input type="text" class="form-control required redondeado" id="telefono" name="telefono" maxlength="15" placeholder="Teléfono"  title="Teléfono"/>          
        </div>
        <button type="button" class="btn btn-default">Cancelar</button>
        <button type="submit" class="btn btn-primary pull-right" title="Enviar los datos">
          Enviar
        </button>
      </form>

      <div class="control-group-inline" style="text-align: center; display:none" id="barra">
        <img src="<?php echo SERVER ?>img/barra.gif" alt="Cargando..." style="width: 200px"><br>
        Enviando mensaje...        
      </div>

      <div class="alert alert-success mensaje_form" style="display: none; margin-top: 20px;" id="mensaje">
        <button data-dismiss="alert" class="close" type="button">x</button>
        <span class="textmensaje">Datos enviados satisfactoriamente!</span>
      </div>

      <div class="alert alert-danger mensaje_form" style="display: none; margin-top: 20px;" id="error">
        <button data-dismiss="alert" class="close" type="button">x</button>
        <span class="textmensaje">No se pudo enviar el mensaje...</span>
      </div>

          </h4>
         
        </div>
</section>


<section id="contactFormExitoso" style="display: none; padding-bottom: 20px">
  <div class="container-fluid" style="background-image: url(../../img/email.png);
  background-size: cover; background-position: right; width: 530px; height: 400px"> 
  <div>
    <div id="confirm"><br><br>
      <br><br>
      <br><br>
      <font color="#000000" size="+2">Gracias por contactarnos.<br>
        Nos comunicaremos con usted lo más Pronto posible<br>
        Si quiere hablarnos ahora, puede llamarnos<br></font>
        <font color="#000000" size="+1">Nuestros horarios de oficina son:<br>
          Lunes a Viernes<br>
          9am - 6pm <br>
        </font><br><br>
      <br><br>
      <br><br>
    </div>
  </div> 
  </div>
</section>




      </div>
    </div>
    <div class="col-md-1">
    </div>
    <div class="col-md-5">
      <div class="list-group" style="padding-top: 30px"> 
         <a href="#" class="list-group-item list-group-item-action active">CONTÁCTANOS</a>
        <div class="list-group-item">
          Cualquier duda y comentarios por favor contácta con nosotros.
        </div>
        <div class="list-group-item">
          <h4 class="list-group-item-heading">
            Call center 24/7<span class="badge badge-secondary badge-pill pull-right">+50377550099</span>
          </h4>
          <p class="list-group-item-text">
            Pais +50377550099
          </p>
         <!--   <div>
            <a href="https://twitter.com/gustabin"><img src="<?php echo SERVER ?>img/logoTwitter.png" alt="Logo Twitter" height="50px" width="50px"></a>
          
          
            <a href="https://www.facebook.com/gustabin2.0"><img src="<?php echo SERVER ?>img/logoFacebook.jpg" alt="Logo Facebook" height="50px" width="50px"></a>
          </div>
        </div>-->

        
        
    </div>
    <div class="col-md-1">
    </div>
  </div>
</div>


        </div>
        <!-- /.box-body -->
      
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php
  require_once("../../footer.php");
?>