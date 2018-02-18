<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>Contato</h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Contato</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <!-- Default box -->
  <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">Edite o conteúdo da sessão Contato</h3>

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
        
        <form action="" method="post">
            
            <div class="col-md-12">
                
                <?php if( isset($aviso) ){ echo $aviso; } ?>
                
                <div class="form-group has-feedback">
                    <label for="email">Email para onde será enviado o contato</label>
                    <input type="email" id="email" class="form-control" name="emaEco" placeholder="Email" value="<?php echo isset($conteudo['emaEco']) ? $conteudo['emaEco'] : ''; ?>">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                
                <div class="form-group">
                    <a href="<?php echo BASE_URL; ?>" class="btn btn-primary">Cancelar</a>
                    <input type="submit" value="Atualizar" name="frmContato" class="btn btn-primary" />
                </div>
                
            </div>
            
        </form>
      
    </div>
    <!-- /.box-body -->
    
  </div>
  <!-- /.box -->

</section>
<!-- /.content -->