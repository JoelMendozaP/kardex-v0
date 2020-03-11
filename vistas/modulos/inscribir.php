<div class="content-wrapper">


  <section class="content-header">

    <h1>

      INSCRITOS DE LA MATERIA

      <small>Panel de Control</small>

    </h1>

    <ol class="breadcrumb">

      <li><a href="materia"><i class="fa fa-dashboard"></i> VOLVER </a></li>

      <li class="active">Tablero</li>

    </ol>

  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="box" style="background: springgreen">
      <div class="box-header with-border">

        <div class="btn btn-danger btn-lg" data-toggle="modal" data-target="#modalpdf">
          <i class="fa fa-print"> GENERAR PDF</i>
        </div>
        <br>
        <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Create Event</h3>
            </div>
            <div class="box-body">
              <div class="btn-group" style="width: 100%; margin-bottom: 10px;">
                <!--<button type="button" id="color-chooser-btn" class="btn btn-info btn-block dropdown-toggle" data-toggle="dropdown">Color <span class="caret"></span></button>-->
                <ul class="fc-color-picker" id="color-chooser">
                  <li><a class="text-aqua" href="#"><i class="fa fa-square"></i></a></li>
                  <li><a class="text-blue" href="#"><i class="fa fa-square"></i></a></li>
                  <li><a class="text-light-blue" href="#"><i class="fa fa-square"></i></a></li>
                  <li><a class="text-teal" href="#"><i class="fa fa-square"></i></a></li>
                  <li><a class="text-yellow" href="#"><i class="fa fa-square"></i></a></li>
                  <li><a class="text-orange" href="#"><i class="fa fa-square"></i></a></li>
                  <li><a class="text-green" href="#"><i class="fa fa-square"></i></a></li>
                  <li><a class="text-lime" href="#"><i class="fa fa-square"></i></a></li>
                  <li><a class="text-red" href="#"><i class="fa fa-square"></i></a></li>
                  <li><a class="text-purple" href="#"><i class="fa fa-square"></i></a></li>
                  <li><a class="text-fuchsia" href="#"><i class="fa fa-square"></i></a></li>
                  <li><a class="text-muted" href="#"><i class="fa fa-square"></i></a></li>
                  <li><a class="text-navy" href="#"><i class="fa fa-square"></i></a></li>
                </ul>
              </div>
              <!-- /btn-group -->
              <div class="input-group">
                <input id="new-event" type="text" class="form-control" placeholder="Event Title">

                <div class="input-group-btn">
                  <button id="add-new-event" type="button" class="btn btn-primary btn-flat" style="background-color: rgb(60, 141, 188); border-color: rgb(60, 141, 188);">Add</button>
                </div>
                <!-- /btn-group -->
              </div>
              <!-- /input-group -->
            </div>
          </div>


      </div>



      <?php
      if (isset($_GET["idmaterias"])) {


        include("conexionmysqli.php");
        $id = $_GET["idmaterias"];
        $reg = $_GET["materia"];
        $query = "SELECT * FROM materia where cod_mat = $id";
        $resultado = $conexion->query($query);

        while ($row = $resultado->fetch_assoc()) {
          $sig = $row['sigla'];
          $nom = $row['nombre_m'];
          $fol = $row["folio"];
          $li = $row["libro"];
          $ges = $row["gestion"];
          $tip = $row["tipo"];
          $esta = $row["fecha_curso"];
          $doc = $row["docente"];
      ?>
      <?php
        }
      } ?>

      <?php

      echo ' <div class="row   icono-nosotros">
        <div class="col-md-3 col-sm-6 col-xs-12 ">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-folder-open-o"></i></span>
            <div class="info-box-content">
            <span class="info-box-text">NOMBRE MATERIA</span>
             <span class="info-box-number">' . $nom . '</span>
              <span class="info-box-text">SIGLA</span>
              <span class="info-box-number">' . $sig . '</span>
            
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12  ">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-files-o"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Folio</span>
              <span class="info-box-number">' . $fol . '</span>
              <span class="info-box-text">Libro</span>
              <span class="info-box-number">' . $li . '</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12 ">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="fa fa-calendar-plus-o"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Gestion</span></span>
              <span class="info-box-number">' . $ges . '</span>
              <span class="info-box-text"> </span>Etapa</span>
              <span class="info-box-number">' . $esta . '</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12 ">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-users"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Tipo de Documento</span>
              <span class="info-box-number">' . $tip . '</span>
              <span class="info-box-text">Docente</span>
              <span class="info-box-number">' . $doc . '</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>';
      ?>







      <div class="box-body">

        <table class="table table-bordered table-striped dt-responsive tablas" style="width:100%">
          <thead>
            <tr>
              <th style="width: 1px">#</th>
              <th style="width: 10px">Ci</th>
              <th style="width: 20px">Nombre</th>
              <th style="width: 20px">Ap_Paterno</th>
              <th style="width: 20px">Ap_Materno</th>
              <th style="width: 8px">Genero</th>
              <th style="width: 5px">Matricula</th>
              <th style="width: 5px">Nota Final</th>
              <th style="width: 20px">Observacion</th>
              <th style="width: 30px">Acciones</th>
              
            </tr>
          </thead>

          <tbody>

            <?php

            if (isset($_GET["idmaterias"])) {


              $id = $_GET["idmaterias"];
              $item = null;
              $valor = null;

              $materia = ControladorEstudiantes::ctrMostrarlista($item, $valor, $id);
              
              foreach ($materia as $key => $value) {

                echo '<tr>
                <td>' . ($key + 1) . '</td>
                <td>' . $value["ci"] . '</td>
                <td>' . $value["nombre"] . '</td>    
                <td>' . $value["ap_paterno"] . '</td>                
                <td>' . $value["ap_materno"] . '</td>
                <td>' . $value["genero"] . '</td>
                <td>' . $value["reg_univ"] . '</td>
                <td>' . $value["notafinal"] . '</td>                
                <td>' . $value["observacion"] . '</td>
                <td>
                        <div class="btn-group">
                        
                      <button class="btn btn-warning btnEditarestudiante" idestudiante="' . $value["codest"] . '" data-toggle="modal" data-target="#ModalEditarestudiante"> <i class="fa fa-pencil"></i></button>
                      <button class="btn btn-danger  btnEliminarestudiante" reg_univ="' . $value["reg_univ"] . '"  idestudiante="' . $value["codest"] . '"> <i class="fa fa-times"></i></button>
                        </div>
                </td>
              </tr>';
              }
            }
            ?>


          </tbody>

        </table>
      </div>
      <!-- /.box-footer-->
    </div>
    <!-- /.box -->
  </section>
  <!-- /.content -->
</div>





<!-- CLASE MODAL GENERAR PDF-->

<div class="modal fade bd-example-modal-lg  modal-success tabindex=" -1" id="modalpdf" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <form role="form" method="POST" enctype="multipart/form-data">
        <!-- cabeza del modal-->
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">GENERAR PDF</h4>
        </div>
        <!-- cuerpo del modal -->
        <div class="modal-body">
          <div class="box-body">
            <?php
            // include("reporte.php");

            ?>
            <iframe src=<?php echo "http://localhost/sistema/vistas/modulos/reporte.php?id=" . $id ?> height="1200" width="100%"></iframe>
          </div>
        </div>
        <!-- /.pie del modal-->

        <div class="modal-footer">



          <div type="button" class="btn  btn-outline pull-right" data-dismiss="modal">CANCELAR</div>


        </div>

        <?php
        $editarmateria = new Controladormaterias();
        $editarmateria->Ctreditarmateria();
        ?>
      </form>


    </div>
  </div>
</div>








<!-- /.MODAL EDITAR MATERIA -->

<div class="modal modal-info fade" id="ModalEditarmateria" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <form role="form" method="POST" enctype="multipart/form-data">
        <!-- cabeza del modal-->
        <div class="modal-header">

          <button type="button" class="close" data-dismiss="modal" aria-label="Close">

            <span aria-hidden="true">&times;</span></button>

          <h4 class="modal-title">Editar Materia</h4>

        </div>
        <!-- cuerpo del modal -->
        <div class="modal-body">

          <div class="box-body">


            <!-- Sigla  -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-university"> </i></span>
                <input type="text" class="form-control input-lg" style="color: black" value="" name="editarsigla" id="editarsigla" required>
              </div>
            </div>


            <!-- Nombre de Materia  -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-users"> </i></span>
                <input type="text" class="form-control input-lg" style="color: black" value="" name="editarnombrem" id="editarnombrem" required>
              </div>
            </div>


            <!-- Nro de folio  -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-file-o"> </i></span>
                <input type="text" class="form-control input-lg" style="color: black" value="" name="editarfolio" id="editarfolio" required>
              </div>
            </div>

            <!-- Libro  -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-file"> </i></span>
                <input type="text" class="form-control input-lg" style="color: black" value="" name="editarlibro" id="editarlibro" required>
              </div>
            </div>

            <!-- gestion del curso -->
            <div class="form-group">
              <h4>Gestion de la materia</h4>
              <div class="input-group">

                <h4 class="modal-title"> </h4>
                <span class="input-group-addon"><i class="fa  fa-calendar-plus-o"> </i></span>
                <input type="year" class=" form-control input-lg" value="" name="editargestion" id="editargestion" data-datepicker-color="primary">

              </div>
            </div>

            <!-- etapa de la materia -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-calendar-plus-o"> </i></span>
                <select class="form-control input-lg" name="editarestapa">
                  <option value="" id="editarestapa"></option>
                  <option value=" Primera">Primera</option>
                  <option value=" Segunda">Segunda</option>
                  <option value=" Curso de Temporada">Curso de Temporada</option>
                </select>
              </div>
            </div>
            <!-- docente  -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa fa-calendar-check-o"> </i></span>
                <input type="text" class="form-control input-lg" style="color: black" value="" name="editardocente" id="editardocente" required>
              </div>
            </div>
          </div>

        </div>
        <!-- /.pie del modal-->

        <div class="modal-footer">

          <button type="button" class="btn 
                        btn-outline pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-outline">Guardar Cambios</button>

        </div>
        <?php
        $editarmateria = new Controladormaterias();
        $editarmateria->Ctreditarmateria();
        ?>

      </form>

    </div>

  </div>

  <!-- /.modal-dialog -->
</div>


<!--   BORRAR MATERIA -->
<?php
$borrarmateria = new Controladormaterias();
$borrarmateria->ctrBorrarmateria();
?>