<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Usuário
    <small>novo usuário</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="<?php echo BASE_URL; ?>/usuarios">Usuarios</a></li>
    <li class="active">Novo Usuário</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <!-- Default box -->
  <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">Criar novo Usuário</h3>

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
        
        <?php if(isset($aviso)) { echo $aviso; } ?>
        
        <form action="" method="post">
            
            <div class="col-md-6">
                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input type="text" name="nomUsu" class="form-control" id="nome" placeholder="Nome ..." />
                </div>
                
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="emaUsu" class="form-control" id="email" placeholder="Email ..." />
                </div>

                <div class="form-group">
                    <label for="senha">Senha</label>
                    <input type="password" name="senUsu" class="form-control" id="senha" placeholder="Senha ..." />
                </div>

                <div class="form-group">
                    <label for="repetirSenha">Repetir Senha</label>
                    <input type="password" name="repetir_senha" class="form-control" id="repetirSenha" placeholder="Repetir a senha ..." />
                </div>
                
                <div class="form-group">
                    <input type="submit" name="frmUsuario" class="btn btn-primary pull-right" />
                </div>
            </div>
            
        </form>
      
    </div>
    <!-- /.box-body -->
    
  </div>
  <!-- /.box -->

</section>
<!-- /.content -->