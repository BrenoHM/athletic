<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>Evento</h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Evento</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <!-- Default box -->
  <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">Criar Evento</h3>
    </div>
    <div class="box-body">
        
        <?php if( isset($extensoesInvalidas) ): ?>
            <div class="alert alert-danger ct-u-marginBottom10" role="alert">
                Os seguintes arquivos não foram inseridos: <br />
                <?php echo implode("<br />", $extensoesInvalidas); ?>
            </div>
        <?php endif; ?>
        <?php if( isset($aviso) ){ echo $aviso; } ?>
        <?php $this->loadView("eventos/form", array('evento' => $evento, 'botao' => 'Editar')); ?>
        
        <?php if( !empty($fotos) ): ?>
            <form action="" method="post">
                <input type="submit" name="frmGaleria" value="Excluir" class="btn btn-primary" />
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <td>&nbsp;</td>
                            <td>Foto</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ( $fotos as $foto ): ?>
                            <tr>
                                <td><input type="checkbox" name="url[]" value="<?php echo $foto['url']; ?>"</td>
                                <td><img src="<?php echo BASE_URL; ?>/uploads/galeria/<?php echo $foto['url']; ?>" width="200" /></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </form>
        <?php endif; ?>
      
    </div>
    <!-- /.box-body -->
    
  </div>
  <!-- /.box -->

</section>
<!-- /.content -->