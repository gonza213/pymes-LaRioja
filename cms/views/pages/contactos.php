<?php
  $contacto = ControllerContacto::ctrMostrarContactos();
?>
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Contactos</h4>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <!-- <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#usuarioModal">Crear Usuario</button> -->
            </div>
        </div>
        <!-- row -->


        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Lista de contactos</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="display">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nombre</th>
                                        <th>Email</th>
                                        <th>Teléfono</th>
                                        <th>Mensaje</th>
                                        <th>Fecha</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($contacto as $key => $value): ?>
                                    <tr>
                                        <td><?php echo $key + 1 ?></td>
                                        <td><?php echo $value['nombre'] ?></td>
                                        <td><?php echo $value['email'] ?></td>
                                        <td><?php echo $value['tel'] ?></td>
                                        <td><?php echo $value['mensaje'] ?></td>
                                        <td><?php echo $value['fecha'] ?></td>
                                        <td>
                                            <button type="button" class="btn btn-danger btn-sm" onclick="borrarContacto(<?php echo $value['id'] ?>)"> <i class="fas fa-trash"></i> </button>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<?php

$borrarContacto = new ControllerContacto();
$borrarContacto -> ctrBorrarContacto();

?>