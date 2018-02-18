<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Mensagens
    <small>mensagens recebidas pelos clientes</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Mensagens</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <div class="row">
        <div class="col-xs-12">
            
          <?php if(isset($aviso)) { echo $aviso; } ?>
          
          <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Lista de Mensagens</h3>
                    <!--<a href="<?php //echo BASE_URL; ?>/filiais/nova" class="pull-right btn btn-primary">Nova Filial</a>-->
                </div>
                <!-- /.box-header -->
                <form action="" method="post">
                    
                    <div class="col-md-12" style="padding-left: 10px; margin-bottom: 10px;">
                        <input type="submit" name="excluiMsg" value="Excluir Selecionada(s)" class="btn btn-primary" /><br>
                    </div>
                    
                    <div class="box-body">
                        <table class="table table-bordered table-striped dataTable">
                          <thead>
                              <tr>
                                <th><input type="checkbox" id="checkAll" /></th>
                                <th>Data Recebimento</th>  
                                <th>Nome</th>
                                <th>E-mail</th>
                                <th>Telefone</th>
                                <th>Empresa</th>
                                <th>Site</th>
                                <th>Comentário</th>
                                <th>Ação</th>
                              </tr>
                          </thead>
                          <tbody>
                              <?php foreach ($mensagens as $mensagem): ?>
                                <tr>
                                  <td><input type="checkbox" name="idMensagem[]" value="<?php echo $mensagem['codFco']; ?>" /></td>  
                                  <td><?php echo Generica::ConvertDataHoraMysql($mensagem['datCad'], 'normal'); ?></td>
                                  <td><?php echo $mensagem['nomFco']; ?></td>
                                  <td><?php echo $mensagem['emaFco']; ?></td>
                                  <td><?php echo $mensagem['telFco']; ?></td>
                                  <td><?php echo $mensagem['empFco']; ?></td>
                                  <td><?php echo $mensagem['urlFco']; ?></td>
                                  <td><?php echo substr($mensagem['msgFco'], 0, 20) . '...'; ?></td>
                                  <td>
                                      <a href="<?php echo BASE_URL; ?>/mensagens-recebidas/detalhe/<?php echo $mensagem['codFco']; ?>"><i class="fa fa-search" aria-hidden="true"></i></a>
                                  </td>
                                </tr>
                              <?php endforeach; ?>
                          </tbody>
                        </table>
                    </div>
                </form>
                <!-- /.box-body -->
          </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
  </div>

</section>
<!-- /.content -->