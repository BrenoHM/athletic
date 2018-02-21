<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>Atlética</h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Atlética</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <!-- Default box -->
  <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">Edição de atlética</h3>
    </div>
    <div class="box-body">
      
        <?php if( isset($aviso) ){ echo $aviso; } ?>
        <?php
            $dados = array(
                'atletica' => $atletica,
                'universidades' => $universidades,
                'meiosComunicacao' => $meiosComunicacao,
                'post' => $post,
                'error' => $error
            );
            $this->loadView("atleticas/form", $dados);
        ?>
      
    </div>
    <!-- /.box-body -->
    
  </div>
  <!-- /.box -->

</section>
<!-- /.content -->