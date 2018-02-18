<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Parceiros
    <small>parceiros da cigameasy</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Parceiros</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <div class="row">
        <div class="col-xs-12">
            
          <?php if(isset($aviso)) { echo $aviso; } ?>
          
          <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Lista de Parceiros</h3>
                    <a href="<?php echo BASE_URL; ?>/parceiros/novo" class="pull-right btn btn-primary">Novo Parceiro</a>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-bordered table-striped dataTable">
                      <thead>
                          <tr>
                            <th>Imagem</th>
                            <th>Nome</th>
                            <th data-orderable="false">Ação</th>
                          </tr>
                      </thead>
                      <tbody>
                          <?php foreach ($parceiros as $parceiro): ?>
                            <tr>
                              <td><img src="<?php echo BASE_URL_SITE; ?>/images/parceiros/<?php echo $parceiro['imgPar']; ?>" width="100" /></td>
                              <td><?php echo $parceiro['nomPar']; ?></td>
                              <td>
                                  <a href="<?php echo BASE_URL; ?>/parceiros/editar/<?php echo $parceiro['codPar']; ?>" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i></a>  
                                  <a href="<?php echo BASE_URL; ?>/parceiros/deletar/<?php echo $parceiro['codPar']; ?>" onclick="return confirm('Deseja realmente excluir este registro!');" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></a>
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