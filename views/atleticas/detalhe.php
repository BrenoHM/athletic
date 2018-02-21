<?php
echo '<pre>';
print_r($atletica);
echo '</pre>';
?>
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
      <h3 class="box-title">Dados da atlética</h3>
    </div>
    <div class="box-body">
        <div class="nav-tabs-custom">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#dados" data-toggle="tab">Dados</a></li>
                    <li><a href="#passo_1" data-toggle="tab">Passo 1</a></li>
                    <li><a href="#passo_2" data-toggle="tab">Passo 2</a></li>
                    <li><a href="#passo_3" data-toggle="tab">Passo 3</a></li>
                    <li><a href="#passo_4" data-toggle="tab">Passo 4</a></li>
                    <li><a href="#passo_5" data-toggle="tab">Passo 5</a></li>
                </ul>
            </div>

            <div class="tab-content">
                <div class="tab-pane active" id="dados">
                    <div clas="row">
                        <div class="col-md-12">
                            <div class="col-md-6"><strong>Nome: </strong><?php echo $atletica['nome']; ?></div>
                            <div class="col-md-6"><strong>Sigla: </strong><?php echo $atletica['sigla']; ?></div>
                            <div class="col-md-6"><strong>Apelido: </strong><?php echo $atletica['apelido']; ?></div>
                            <div class="col-md-6"><strong>Cep: </strong><?php echo $atletica['cep']; ?></div>
                            <div class="col-md-6"><strong>Endereço: </strong><?php echo $atletica['endereco']; ?></div>
                            <div class="col-md-6"><strong>Email: </strong><?php echo $atletica['e-mail']; ?></div>
                            <div class="col-md-6"><strong>Telefone: </strong><?php echo $atletica['telefone']; ?></div>
                            <div class="col-md-6"><strong>Whatsapp: </strong><?php echo $atletica['whatsapp']; ?></div>
                            <div class="col-md-6"><strong>Presidente: </strong><?php echo $atletica['nomePresidente']; ?></div>
                            <div class="col-md-6"><strong>Qtde Diretor: </strong><?php echo $atletica['qtdeDiretor']; ?></div>
                            <div class="col-md-6"><strong>Site: </strong><?php echo $atletica['site']; ?></div>
                            <div class="col-md-6"><strong>Facebook: </strong><?php echo $atletica['facebook']; ?></div>
                            <div class="col-md-6"><strong>Instagran: </strong><?php echo $atletica['instagram']; ?></div>
                            <div class="col-md-6"><strong>Snapchat: </strong><?php echo $atletica['snapchat']; ?></div>
                            <div class="col-md-6"><strong>Data Cadastro: </strong><?php echo date("d/m/Y H:i:s", strtotime($atletica['dataCad'])); ?></div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="tab-pane" id="passo_1">
                    passo 1
                </div>
                <div class="tab-pane" id="passo_2">
                    passo 2
                </div>
                <div class="tab-pane" id="passo_3">
                    passo 3
                </div>
                <div class="tab-pane" id="passo_4">
                    passo 4
                </div>
                <div class="tab-pane" id="passo_5">
                    passo 5
                </div>
            </div>
        </div>
    </div>
    <!-- /.box-body -->
    
  </div>
  <!-- /.box -->

</section>
<!-- /.content -->