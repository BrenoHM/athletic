<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>Parceiro</h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Parceiro</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <!-- Default box -->
  <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">Edição do parceiro</h3>

      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Minimizar">
          <i class="fa fa-minus"></i>
        </button>
        <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remover">
          <i class="fa fa-times"></i>
        </button>
      </div>
    </div>
    <div class="box-body">
        
        <form action="" method="post" enctype="multipart/form-data">
            
            <div class="col-md-12">
                
                <?php if( isset($aviso) ){ echo $aviso; } ?>
                
                <div class="form-group">
                    <label for="nomPar">Nome</label>
                    <input type="text" id="nomPar" class="form-control" name="nomPar" placeholder="Nome do Parceiro" value="<?php echo isset($parceiro['nomPar']) ? $parceiro['nomPar'] : ''; ?>">
                </div>
                
                <div class="form-group">
                    <label for="urlPar">Site do Parceiro</label>
                    <input type="text" id="urlPar" class="form-control" name="urlPar" placeholder="Site do Parceiro" value="<?php echo isset($parceiro['urlPar']) ? $parceiro['urlPar'] : ''; ?>">
                </div>
                
                <div class="form-group">
                    <label for="imgPar">Logomarca (Resolução: 384px X 317px)</label>
                    <input type="file" class="form-control" name="imgPar" id="imgPar">
                </div>
                
                <div class="form-group">
                    <a href="<?php echo BASE_URL; ?>/parceiros" class="btn btn-primary">Cancelar</a>
                    <input type="submit" value="Editar" name="frmParceiro" class="btn btn-primary" />
                </div>
                
            </div>
            
        </form>
      
    </div>
    <!-- /.box-body -->
    
  </div>
  <!-- /.box -->

</section>
<!-- /.content -->