

<div class="content-wrapper">

<section class="content-header">

  <h1>
    PAGINA PRINCIPAL
    <small>Panel de Control</small>
  </h1>

  <ol class="breadcrumb">
    <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
    <li class="active">Administrar</li>
    <!-- Trigger the modal with a button -->
  </ol>

</section>
<!-- Main content -->
<section class="content bg-gray-light">



  <!-- Default box -->
  <div class="box " style="background: skyblue"> 
 


    <div class="box-header with-border">

      <button class="btn btn-info btn-lg" data-toggle="modal" data-target="#modalAgregarUsuario">
        Agregar Usuarios
      </button>

      <select class="select2-results"  name="buscadorselec" id="buscadorselec">
    <option value="mexico 1">maxico 1</option>
    <option value="canada 2">canada 2</option>
    <option value=" canada 3">canada 3</option>
    <option value="">europa</option>
    <option value="">francia</option>
    <option value="">bolivia</option>
    <option value="">ecuador</option>
    <option value="">argentina</option>
    <option value="">colombia</option>
    <option value="">peru</option>

      </select>

    <div class="box-body">
   
      <table id="eventos" class="table table-bordered table-striped dt-responsive tablas bg-gray" style="width:100%">
        <thead>
          <tr>
            <th style="width: 2px">#</th>
            <th style="width: 15px">DNI</th>
            <th style="width: 15px">Usuario</th>
            <th style="width: 15px">Cargo</th>
           <th style="width: 25px">Nombre</th>
           <th style="width: 15px">Genero</th>
            <th style="width: 20px">Perfil</th>
            <th style="width: 20px">Foto</th>
            <th style="width: 25px">Email</th>
            <th style="width: 15px">Estado</th>
            <th style="width: 20px">Ultimo login</th>
            <th style="width: 15px">Celular</th>
            <th style="width: 15px">Fecha_crea</th>
            <th style="width: 15px">Fecha_Nac</th>
            <th style="width: 20px">Acciones</th>

          </tr>
        </thead>
        <tbody>
          

        </tbody>
      </table>

    </div>
  </div>

  <!-- /.box -->

</section>
<!-- /.content -->

</div>

<!-- CLASE MODAL AGREGAR USUARIO-->
<div class="modal modal-info fade" id="modalAgregarUsuario" role="dialog">
<div class="modal-dialog">
  <div class="modal-content">
    <form role="form" method="POST" enctype="multipart/form-data">
      
      <div class="modal-header">

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

          <span aria-hidden="true">&times;</span></button>

        <h4 class="modal-title">Agregar Usuarios</h4>

      </div>
      <!-- cuerpo del modal -->
      <div class="modal-body">

        <div class="box-body">


<!-- nombre -->
<div class="form-group">
          <div class="input-group">
             <p>
             <i class="fa fa-user"> 
              <input type="text" class="  input-lg" style="color: black" placeholder="Nombre" name="nuevonombre" id="nuevonombre" size="50" required >            
               </i>
              </p>
             </div>
           </div>
<!-- apellidos -->
           <div class="form-group">
             <div class="input-group">
                   <p>
                     <i class="fa fa-user"> 
             <input type="text" class="input-lg" style="color: black" placeholder="Ap Paterno" name="ApPaterno" id="ApPaterno" size="22"  required >            
              <input type="text" class=" input-lg" style="color: black" placeholder="Ap Materno" name="ApMaterno" id="ApMaterno" size="22"  required >   
                     </i>

                   </p>
                </div>
           </div>
<!-- CI  -->
           <div class="form-group">
             <div class="input-group">
              <P>  <i class="fa fa-credit-card">  <input type="text"  class="input-lg" style="color: black" placeholder=" CI " name="Ci" id="Ci" size="40"  required >  </i> </p>           
              </div>
             
           </div>
           <!-- Nro cel-->           
<div class="form-group">  
                        <div class="input-group">
                          <i class="fa fa-phone-square"> </i>
                          <input type="text" class=" input-lg"  style="color: black" name="nrocel" placeholder="Ingresar Numero de cel:" required>
                        </div>
                      </div>

<!-- GENERO  -->
          <div class="form-group">
               <div class="input-group">
              <p> <h4>     Genero: </h4> 
              <h4 >  
                           <input type="radio" name="generoc" value="Masculino">Hombre   
                           <input type="radio" name="generoc" value="Femenino">Mujer    
                           <input  type="radio" name="generoc" value="Otro">Otro     
                           </h4> 
              </p>
              </div>
           </div>             
<!-- fecha de nacimiento -->       
                     <div class="form-group">  
                       <h4>Fecha de nacimiento</h4>
                    <div class="input-group">
                           
                        <h4 class="modal-title">   </h4>                                           
                  <span class="input-group-addon"><i class="fa  fa-qq"> </i></span>
                  <input type="date"  class=" form-control input-lg" name="fecha" data-datepicker-color="primary">
                
              
                  </div>   
              </div>




          <!-- perfil -->
          <div class="form-group">
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-users"> </i></span>
              <select class="form-control input-lg" name="NuevoPerfil">
                <option value=" Seleccionar un Perfil ">Seleccionar un Perfil</option>
                <option value=" Kardixta">Kardixta</option>
                <option value=" Administrador">Administrador</option>
                <option value=" Auxiliar">Auxiliar</option>
                <option value=" Becario">Becario</option>
                <option value=" Secretaria">Secretaria</option>
              </select>
            </div>
          </div>
          <!-- nombre-cuenta  -->
          <div class="form-group">
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-user"> </i></span>
              <input type="text" class="form-control input-lg" style="color: black" placeholder="Ingresar nombre de cuenta" name="nuevousuario" id="nuevousuario" required>
            </div>
          </div>
          <!-- cargo  -->
          <div class="form-group">
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-suitcase"> </i></span>
              <input type="text" class="form-control input-lg" style="color: black" placeholder="Ingresar Cargo" name="nuevocargo" id="nuevocargo" required>
            </div>
          </div>


<!-- email  -->
              <div class="form-group">
                          <div class="input-group">
                              <span class="input-group-addon"><i class="fa fa-500px"> </i></span>
                              <input type="text" class="form-control input-lg" style="color: black" name="email" id="email" placeholder="Ingresar Email" required>
                          </div>
                </div>

          <!-- password -->
          <div class="form-group">
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-lock"> </i></span>
              <input type="password" class="form-control input-lg" style="color: black" name="nuevoPassword" placeholder="Ingresar Contraseña" required>
            </div>
          </div>


          <!-- Subir foto -->
             <h4 class="modal-title">Subir Foto De Perfil</h4>
                    <h4></h4>
               <div class="form-group">

                   <input type="file" class="nuevafoto" name="nuevafoto">
                    <p class="help-block">Peso maximo de una Foto es de 2MB</p>
                     <img src="vistas/img/usuarios/default/usn.png" class="img-thumbnail previsualizar" width="100px">
                                                                                 
              </div>

        </div>

      </div>
      <!-- /.pie del modal-->

      <div class="modal-footer">

        <button type="button" class="btn 
                          btn-outline pull-left" data-dismiss="modal">Salir</button>

        <button type="submit" class="btn btn-outline">Guardar Usuario</button>

      </div>
      <?php
      $crearUsuario = new ControladorUsuarios();
      $crearUsuario->CtrCrearUsuario();
      ?>

    </form>

  </div>

</div>

<!-- /.modal-dialog -->
</div>
<!-- /.modal -->


<!-- CLASE MODAL Editar  USUARIO-->
<div class="modal modal-info fade" id="ModalEditarUsuario" role="dialog">
<div class="modal-dialog">
  <div class="modal-content">
    <form role="form" method="POST" enctype="multipart/form-data">
      <!-- cabeza del modal-->
      <div class="modal-header">

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

          <span aria-hidden="true">&times;</span></button>

        <h4 class="modal-title">Editar Usuario</h4>

      </div>
      <!-- cuerpo del modal -->
      <div class="modal-body">

        <div class="box-body">


<!-- nombre -->
<div class="form-group">
          <div class="input-group">
             <p>
             <i class="fa fa-user"> 
              <input type="text" class="  input-lg" style="color: black" value="" name="editarnombre" id="editarnombre" size="50" required >            
               </i>
              </p>
             </div>
           </div>
<!-- apellidos -->
           <div class="form-group">
             <div class="input-group">
                   <p>
                     <i class="fa fa-user"> 
             <input type="text" class="input-lg" style="color: black" value="" name="editarApPaterno" id="editarApPaterno" size="22"  required >            
              <input type="text" class=" input-lg" style="color: black" value="" name="editarApMaterno" id="editarApMaterno" size="22"  required >   
                     </i>

                   </p>
                </div>
           </div>
<!-- CI  -->
           <div class="form-group">
             <div class="input-group">
              <P>  <i class="fa fa-credit-card">  <input type="text"  class="input-lg" style="color: black" value="" name="editarCi" id="editarCi" size="40"  required >  </i> </p>           
              </div>
             
           </div>
           <!-- Nro cel-->           
<div class="form-group">  
                        <div class="input-group">
                          <i class="fa fa-phone-square"> </i>
                          <input type="text" class=" input-lg"  style="color: black" id="editarnrocel" name="editarnrocel" value="" required>
                        </div>
                      </div>

          <!-- perfil -->
          <div class="form-group">
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-users"> </i></span>
              <select class="form-control input-lg" name="editarPerfil">
                
                <option value="" id="editarPerfil"></option>
                <option value="Administrador">Administrador</option>
                <option value="Kardixta">Kardixta</option>
                <option value="Auxiliar">Auxiliar</option>
                <option value="Becario">Becario</option>
                <option value="Secretaria">Secretaria</option>
              </select>
            </div>
          </div>
          <!-- nombre-cuenta  -->
          <div class="form-group">
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-user"> </i></span>         
              <input type="text" class="form-control input-lg" style="color: black" name="editarUsuario" id="editarUsuario" readonly>
            </div>
          </div>
<!-- cargo  -->
<div class="form-group">
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-suitcase"> </i></span>
              <input type="text" class="form-control input-lg" style="color: black" value="" name="editarcargo" id="editarcargo" required>
            </div>
          </div>


<!-- email  -->
              <div class="form-group">
                          <div class="input-group">
                              <span class="input-group-addon"><i class="fa fa-500px"> </i></span>
                              <input type="text" class="form-control input-lg" style="color: black" name="editaremail" id="editaremail" value="" required>
                          </div>
                </div>

<!-- password -->
                 <div class="form-group">

                 <div class="input-group">
                   <span class="input-group-addon"> <i class="fa fa-lock"></i></span>
                   <input type="password" class="form-control input-lg" style="color: black" placeholder="Ingresar nueva contraseña" name="editarpassword" >
                   <input type="hidden" id="passwordActual" name = "passwordActual">

                 </div>
                 </div>
          
         
          <!-- Subir foto -->
          <h4 class="modal-title">Subir Foto De Perfil</h4>
          <h4></h4>
          <div class="form-group">
          
            <input type="file" class="nuevafoto" name="editarfoto">
            <p class="help-block">Peso maximo de una Foto es de 2MB</p>
            <img src="vistas/img/usuarios/default/usn.png" class="img-thumbnail previsualizar" width="100px">
            <input type="hidden" name="fotoActual" id="fotoActual">

          </div>

        </div>

      </div>
      <!-- /.pie del modal-->

      <div class="modal-footer">

        <button type="button" class="btn 
                          btn-outline pull-left" data-dismiss="modal">Salir</button>

        <button type="submit" class="btn btn-outline">Modificar Cambios</button>

      </div>
      <?php
      $editarUsuario = new ControladorUsuarios();
      $editarUsuario->ctreditarUsuario();
      ?>
    </form>
  </div>
</div>
<!-- /.modal-dialog -->
</div>


<?php
      $borrarUsuario = new ControladorUsuarios();
      $borrarUsuario->ctrBorrarUsuario();
      ?>
      





