<?php
$localidades = ControllerLocalidad::ctrMostrarLocalidades();
$rubros = ControllerRubro::ctrMostrarRubros();
?>

<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Localidades y Rubros</h4>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#localidadModal">Agregar Localidad</button>
                <button class="btn btn-info btn-sm ml-2" data-toggle="modal" data-target="#rubroModal">Agregar Rubro</button>
            </div>
        </div>
        <!-- row -->

        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Lista de Localidades</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="display">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Localidad</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($localidades as $key => $value) : ?>
                                        <tr>
                                            <td><?php echo $key + 1 ?></td>
                                            <td><?php echo $value['localidad'] ?></td>
                                            <td>
                                                <button type="button" onclick="borrarLocalidad(<?php echo $value['id'] ?>)" class="btn btn-danger btn-sm"><i class="icon-trash"></i> </button>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Lista de Rubros</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example3" class="display">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Rubros</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($rubros as $key => $value) : ?>
                                        <tr>
                                            <td><?php echo $key + 1 ?></td>
                                            <td><?php echo $value['rubro'] ?></td>
                                            <td>
                                                <button type="button" onclick="borrarRubro(<?php echo $value['id'] ?>)" class="btn btn-danger btn-sm"><i class="icon-trash"></i> </button>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<?php
$borrarLocalidad = new ControllerLocalidad();
$borrarLocalidad->ctrBorrarLocalidad();

$borrarRubro = new ControllerRubro();
$borrarRubro->ctrBorrarRubro();
?>

<!-- Modal -->
<div class="modal fade" id="localidadModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar localidad</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" name="localidad" placeholder="Localidad" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Agregar</button>
                </div>
                <?php
                $crearLocalidad = new ControllerLocalidad();
                $crearLocalidad->ctrCrearLocalidad();
                ?>
            </form>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="rubroModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar Rubro</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" name="rubro" placeholder="Rubro" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Agregar</button>
                </div>
                <?php
                $crearRubro = new ControllerRubro();
                $crearRubro->ctrCrearRubro();
                ?>
            </form>
        </div>
    </div>
</div>