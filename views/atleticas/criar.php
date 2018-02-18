<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>Cliente</h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Cliente</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <!-- Default box -->
  <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">Inclua o cliente</h3>
    </div>
    <div class="box-body">
        
        <?php if( isset($aviso) ){ echo $aviso; } ?>
        <?php $this->loadView("clientes/form", array()); ?>
      
    </div>
    <!-- /.box-body -->
    
  </div>
  <!-- /.box -->

</section>
<!-- /.content -->