<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Eventos
    <small>eventos cadastrados</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Eventos</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <div class="row">
        <div class="col-xs-12">
            
          <?php if(isset($aviso)) { echo $aviso; } ?>
          
          <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Lista de Atléticas</h3>
                    <a href="<?php echo BASE_URL; ?>/eventos/novo" class="pull-right btn btn-primary">Novo Evento</a>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-bordered table-striped dataTable">
                      <thead>
                          <tr>
                            <th>Nome</th>
                            <th>Data</th>
                            <th data-orderable="false">Ação</th>
                          </tr>
                      </thead>
                      <tbody>
                          <?php foreach ($eventos as $evento): ?>
                            <tr>
                              <!--<td><img src="<?php //echo BASE_URL_SITE; ?>/images/clientes/<?php //echo $cliente['imgCli']; ?>" width="100" /></td>-->
                              <td><?php echo $evento['nome']; ?></td>
                              <td><?php echo $evento['dataCad']; ?></td>
                              <td>
                                  <a href="<?php echo BASE_URL; ?>/atleticas/detalhe/<?php echo $atletica['idAtletica']; ?>" class="btn btn-default btn-xs"><i class="fa fa-search"></i></a>  
                                  <a href="<?php echo BASE_URL; ?>/atleticas/editar/<?php echo $atletica['idAtletica']; ?>" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i></a>  
                                  <!--<a href="<?php //echo BASE_URL; ?>/atleticas/deletar/<?php echo $atletica['idAtletica']; ?>" onclick="return confirm('Deseja realmente excluir este registro!');" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></a>-->
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