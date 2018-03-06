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
        <?php $this->loadView("eventos/form", array('evento' => $evento, 'fotos' => $fotos, 'botao' => 'Editar')); ?>
      
    </div>
    <!-- /.box-body -->
    
  </div>
  <!-- /.box -->

</section>
<!-- /.content -->