<?php

$usuarios = ControllerUsuario::ctrMostrarUsuarios();
?>
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Usuarios</h4>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#usuarioModal">Crear Usuario</button>
            </div>
        </div>
        <!-- row -->


        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Lista de usuarios</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                       <th>#</th>
                                        <th>Nombre</th>
                                        <th>Usuario</th>
                                        <th>Email</th>
                                        <th>Rol</th>
                                        <th>Foto</th>
                                        <th>Fecha Ingreso</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($usuarios as $key => $value): ?>
                                    <tr>
                                        <td><?php echo $key +1 ?></td>
                                        <td><?php echo $value['nombre'] ?></td>
                                        <td><?php echo $value['usuario'] ?></td>
                                        <td><?php echo $value['email'] ?></td>
                                        <td><?php echo $value['rol'] ?></td>
                                        <td>
                                            <img src="<?php echo $value['foto'] ?>" style="width: 50px">
                                        </td>
                                        <td><?php echo $value['fecha'] ?></td>
                                        <?php if($value['usuario'] == 'admin'): ?>
                                        <td>
                                            <button class="btn btn-warning btn-sm" onclick="editarUsuario(<?php echo $value['id'] ?>)" data-toggle="modal" data-target="#usuarioEditModal"><i class="icon-pencil"></i> </button>
                                        </td>
                                        <?php else: ?>
                                            <td>
                                            <button class="btn btn-warning btn-sm" onclick="editarUsuario(<?php echo $value['id'] ?>)" data-toggle="modal" data-target="#usuarioEditModal"><i class="icon-pencil"></i> </button>
                                            <button class="btn btn-danger btn-sm" onclick="borrarUsuario(<?php echo $value['id'] ?>)"><i class="icon-trash"></i> </button>
                                        </td>
                                        <?php endif; ?>
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

$borrarUsuario = new ControllerUsuario();
$borrarUsuario -> ctrBorrarUsuario();

?>

<!-- Modal -->
<div class="modal fade" id="usuarioModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Dar de alta usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" name="nombre" placeholder="Nombre y Apellido" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="usuario" placeholder="Usuario" required>
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" name="email" placeholder="Correo electrónico">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="password" placeholder="Contraseña" required>
                    </div>
                    <div class="form-group">
                        <select name="rol" class="form-control">
                            <option value="administrador">Administrador</option>
                            <option value="editor">Editor</option>
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
                    <button type="submit" class="btn btn-primary">Dar de alta</button>
                </div>
                <?php
                $crearUsuarios = new ControllerUsuario();
                $crearUsuarios->ctrCrearUsuario();
                ?>
            </form>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="usuarioEditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="hidden" name="idE" id="id">
                        <input type="text" id="nombre" class="form-control" name="nombreE" placeholder="Nombre y Apellido" required>
                    </div>
                    <div class="form-group">
                        <input type="text" id="usuario" class="form-control" name="usuarioE" placeholder="Usuario" required readonly>
                    </div>
                    <div class="form-group">
                        <input type="email" id="email" class="form-control" name="emailE" placeholder="Correo electrónico">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="passwordE" placeholder="Nueva Contraseña" >
                        <input type="hidden" class="form-control" name="passwordActual" id="passwordE">
                    </div>
                    <div class="form-group">
                        <select name="rolE" class="form-control" id="rolE">
                           <option selected></option>
                            <option value="administrador">Administrador</option>
                            <option value="editor">Editor</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Foto</label>
                        <input class="form-control-file imagen" name="fotoE" type="file">
                        <input type="hidden" name="fotoActual" id="fotoE">
                    </div>
                    <div class="form-group mt-2" id="visualizar">
                        <img src="" id="fotoE" class="img-fluid p-3 previsualizar" style="width: 150px; height: 150px;">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                </div>
                <?php
                $editUsuarios = new ControllerUsuario();
                $editUsuarios->ctrEditarUsuario();
                ?>
            </form>
        </div>
    </div>
</div>