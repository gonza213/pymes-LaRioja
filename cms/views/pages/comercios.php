<?php

$localidades = ControllerLocalidad::ctrMostrarLocalidades();
$rubros = ControllerRubro::ctrMostrarRubros();
$comercios = ControllerComercio::ctrMostrarComercios();

?>
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Comercios</h4>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#comercioModal">Agregar comercio</button>
            </div>
        </div>
        <!-- row -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Lista de comercios</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="display">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nombre del Comercio</th>
                                        <th>Rubro</th>
                                        <th>Localidad</th>
                                        <th>Dirección</th>
                                        <th>Teléfono</th>
                                        <th>Sitio Web</th>
                                        <th>Imagen</th>
                                        <th>Recomendado</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($comercios as $key => $value) : ?>
                                        <tr>
                                            <td> <?php echo $key + 1 ?></td>
                                            <td> <?php echo $value['nombre'] ?></td>
                                            <td><?php echo $value['rubro'] ?></td>
                                            <td><?php echo $value['localidad'] ?></td>
                                            <td><?php echo $value['direccion'] ?></td>
                                            <td><?php echo $value['telefono'] ?></td>
                                            <td>
                                                <a class="btn btn-primary btn-sm" href="<?php echo $value['sitio'] ?>">Web</a>
                                            </td>
                                            <td>
                                                <img src="<?php echo $value['foto'] ?>" style="width: 80px; height: 80px">
                                            </td>
                                            <td>
                                                <?php if ($value['recomendado'] == 1) : ?>
                                                    <button class="btn btn-success btn-sm">Si</button>
                                                <?php else : ?>
                                                    <button class="btn btn-danger btn-sm">No</button>
                                                <?php endif ?>
                                            </td>
                                            <td>
                                                <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#comercioEditModal" onclick="editarComercio(<?php echo $value['id_c'] ?>)"><i class="icon-pencil"></i> </button>
                                                <button type="button" class="btn btn-danger btn-sm" onclick="borrarComercio(<?php echo $value['id_c'] ?>)"><i class="icon-trash"></i> </button>
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
$borrarComercio = new ControllerComercio();
$borrarComercio->ctrBorrarComercio();

?>

<!-- Modal -->
<div class="modal fade" id="comercioModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar comercio</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" name="nombre" placeholder="Nombre del comercio" required>
                    </div>
                    <div class="form-group">
                        <label for="">Rubro:</label>
                        <select name="id_rubro" id="" class="form-control">
                            <?php foreach ($rubros as $key => $value) : ?>
                                <option value="<?php echo $value['id'] ?>"><?php echo $value['rubro'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Localidad:</label>
                        <select name="id_localidad" id="" class="form-control">
                            <?php foreach ($localidades as $key => $value) : ?>
                                <option value="<?php echo $value['id'] ?>"><?php echo $value['localidad'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="direccion" placeholder="Dirección" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="telefono" placeholder="Teléfono" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="sitio" placeholder="Link Sitio Web">
                    </div>
                    <div class="form-group">
                        <label for="">Recomendar:</label>
                        <select name="recomendado" class="form-control">
                            <option value="0">No</option>
                            <option value="1">Si</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Foto</label>
                        <input class="form-control-file imagen" name="foto" type="file">
                    </div>
                    <div class="form-group mt-2">
                        <img src="views/images/avatar/1.png" alt="" class="img-fluid p-3 previsualizar" style="width: 150px; height: 150px;">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Agregar</button>
                </div>
                <?php
                $crearLocalidad = new ControllerComercio();
                $crearLocalidad->ctrCrearComercio();
                ?>
            </form>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="comercioEditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar comercio</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="hidden" class="form-control" name="idC" id="idC">
                        <label for="">Nombre del comercio:</label>
                        <input type="text" class="form-control" name="nombreC" id="nombreC" placeholder="Nombre del comercio" required>
                    </div>
                    <div class="form-group">
                        <label for="">Rubro:</label>
                        <select name="id_rubroC" id="rubroC" class="form-control">
                            <option selected=""></option>
                            <?php foreach ($rubros as $key => $value) : ?>
                                <option value="<?php echo $value['id'] ?>"><?php echo $value['rubro'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Localidad:</label>
                        <select name="id_localidadC" id="localidadC" class="form-control">
                            <option selected=""></option>
                            <?php foreach ($localidades as $key => $value) : ?>
                                <option value="<?php echo $value['id'] ?>"><?php echo $value['localidad'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Dirección:</label>
                        <input type="text" class="form-control" id="direccionC" name="direccionC" placeholder="Dirección" required>
                    </div>
                    <div class="form-group">
                        <label for="">Teléfono</label>
                        <input type="text" class="form-control" id="telefonoC" name="telefonoC" placeholder="Teléfono" required>
                    </div>
                    <div class="form-group">
                        <label for="">Link Sitio Web:</label>
                        <input type="text" class="form-control" id="sitioC" name="sitioC" placeholder="Link Sitio Web" required>
                    </div>
                    <div class="form-group">
                        <label for="">Recomendar:</label>
                        <select name="recomendadoC" id="recomendadoC" class="form-control">
                            <option selected></option>
                            <option value="0">No</option>
                            <option value="1">Si</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Foto:</label>
                        <input class="form-control-file imagen" name="fotoC" type="file">
                        <input id="fotoC" name="fotoActualC" type="hidden">
                    </div>
                    <div class="form-group mt-2">
                        <img src="views/images/avatar/1.png" alt="" class="img-fluid p-3 previsualizar" style="width: 150px; height: 150px;">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                </div>
                <?php
                $editarLocalidad = new ControllerComercio();
                $editarLocalidad->ctrEditarComercio();
                ?>
            </form>
        </div>
    </div>
</div>