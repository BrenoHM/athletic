<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Atléticas
    <small>atléticas cadastradas</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Atléticas</li>
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
                    <a href="<?php echo BASE_URL; ?>/atleticas/editar/1" class="pull-right btn btn-primary">Nova Atlética</a>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-bordered table-striped dataTable" id="tableClientes">
                      <thead>
                          <tr>
                            <th>Imagem</th>
                            <th>Nome</th>
                            <th data-orderable="false">Ação</th>
                          </tr>
                      </thead>
                      <!--<tbody>
                          <?php //foreach ($clientes as $cliente): ?>
                            <tr>
                              <td><img src="<?php //echo BASE_URL_SITE; ?>/images/clientes/<?php //echo $cliente['imgCli']; ?>" width="100" /></td>
                              <td><?php //echo $cliente['nomCli']; ?></td>
                              <td>
                                  <a href="<?php //echo BASE_URL; ?>/clientes/editar/<?php //echo $cliente['codCli']; ?>" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i></a>  
                                  <a href="<?php //echo BASE_URL; ?>/clientes/deletar/<?php //echo $cliente['codCli']; ?>" onclick="return confirm('Deseja realmente excluir este registro!');" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></a>
                              </td>
                            </tr>
                          <?php //endforeach; ?>
                      </tbody>-->
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
  /*$(function(){
    $('#tableClientes').DataTable({
      "paging": true,
      "info": true,
      "bProcessing": true,
      "bServerSide": true,
      "sAjaxSource": "/framework/clientes/dataServer",
      "oLanguage": {
        "sLengthMenu": "_MENU_ registros por página",
        "sInfo": "Mostrando registros de _START_ a _END_ de um total de _TOTAL_ registros",
        "sInfoEmpty": "Mostrando registros de 0 a 0 de um total de 0 registros",
        "sInfoFiltered":  "(filtrado de um total de _MAX_ registros)",
        "zeroRecords": "Nothing found - sorry",
        "sEmptyTable": "Nenhum registro encontrado.",
        "sProcessing": "Processando...",
        "sSearch": "Pesquisar:",
        "oPaginate": {
          "sFirst":    "Primero",
          "sLast":    "Último",
          "sNext":    "Seguinte",
          "sPrevious": "Anterior"
        }
      }
    });
  })
  */
</script>