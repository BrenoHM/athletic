<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Mensagens
    <small>mensagens enviadas</small>
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
                <div class="box-body">
                    <table class="table table-bordered table-striped dataTable">
                      <tbody>
                          <tr>
                            <td><strong>Data: </strong></td>
                            <td colspan="3"><?php echo Generica::ConvertDataHoraMysql($mensagem['datCad'], 'normal'); ?></td>
                          </tr>
                          <tr>
                            <td><strong>Nome: </strong></td>
                            <td><?php echo $mensagem['nomFco']; ?></td>
                            <td><strong>E-mail Contato: </strong></td>
                            <td><?php echo $mensagem['emaFco']; ?></td>
                          </tr>
                          <tr>
                            <td><strong>Empresa: </strong></td>
                            <td colspan="3"><?php echo $mensagem['empFco']; ?></td>
                          </tr>
                          <tr>
                            <td><strong>Mensagem: </strong></td>
                            <td colspan="3"><?php echo $mensagem['msgFco']; ?></td>
                          </tr>
                      </tbody>
                    </table>
                    <div class="text-center">
                        <a href="<?php echo BASE_URL; ?>/mensagens-recebidas" class="btn btn-primary">Voltar</a>
                    </div>
                </div>
                <!-- /.box-body -->
          </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
  </div>

</section>
<!-- /.content -->