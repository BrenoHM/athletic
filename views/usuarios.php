<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Usuários
    <small>usuários do sistema</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Usuários</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <div class="row">
        <div class="col-xs-12">
            
          <?php if(isset($aviso)) { echo $aviso; } ?>
          
          <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Lista de Usuários</h3>
                    <a href="<?php echo BASE_URL; ?>/usuarios/novo" class="pull-right btn btn-primary">Novo Usuário</a>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-bordered table-striped dataTable">
                      <thead>
                          <tr>
                            <th>Cod</th>
                            <th>Nome</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th data-orderable="false">Ação</th>
                          </tr>
                      </thead>
                      <tbody>
                          <?php foreach ($usuarios as $usuario): ?>
                            <tr>
                              <td><?php echo $usuario['codUsu']; ?></td>
                              <td><?php echo $usuario['nomUsu']; ?></td>
                              <td><?php echo $usuario['emaUsu']; ?></td>
                              <td>aprovado</td>
                              <td>
                                  <a href="<?php echo BASE_URL; ?>/usuarios/perfil/<?php echo $usuario['codUsu']; ?>" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i></a>  
                                  <a href="<?php echo BASE_URL; ?>/usuarios/deletar/<?php echo $usuario['codUsu']; ?>" onclick="return confirm('Deseja realmente excluir este registro!');" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></a>
                              </td>
                            </tr>
                          <?php endforeach; ?>
                      </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
          </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
  </div>

</section>
<!-- /.content -->

<script>
  $(function () {
    
  });
</script>
