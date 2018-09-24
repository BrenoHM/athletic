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
                    <!--<a href="<?php //echo BASE_URL; ?>/atleticas/novo" class="pull-right btn btn-primary">Nova Atlética</a>-->
                    <form method="post" action="">
                      <div class="form-group col-md-6 text-right">
                        <select name="filtro" style="padding: 6px;">
                            <option value="TODOS" <?php echo (isset($post['filtro']) && $post['filtro'] == 'TODOS') ? 'selected' : ''; ?>>TODOS</option>
                            <option value="EM ANÁLISE" <?php echo $post['filtro'] == 'EM ANÁLISE' ? 'selected' : ''; ?>>EM ANÁLISE</option>
                            <option value="APROVADO" <?php echo $post['filtro'] == 'APROVADO' ? 'selected' : ''; ?>>APROVADO</option>
                            <option value="REPROVADO" <?php echo $post['filtro'] == 'REPROVADO' ? 'selected' : ''; ?>>REPROVADO</option>
                        </select>
                        <input type="submit" value="Filtrar" class="btn btn-primary" />
                      </div>
                    </form>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-bordered table-striped dataTable">
                      <thead>
                          <tr>
                            <th>Nome</th>
                            <th>Sigla</th>
                            <th>Telefone</th>
                            <th>Whatsapp</th>
                            <th>Presidente</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th data-orderable="false">Ação</th>
                          </tr>
                      </thead>
                      <tbody>
                          <?php foreach ($atleticas as $atletica): ?>
                            <tr>
                              <!--<td><img src="<?php //echo BASE_URL_SITE; ?>/images/clientes/<?php //echo $cliente['imgCli']; ?>" width="100" /></td>-->
                              <td><?php echo $atletica['nome']; ?></td>
                              <td><?php echo $atletica['sigla']; ?></td>
                              <td><?php echo $atletica['telefone']; ?></td>
                              <td><?php echo $atletica['whatsapp']; ?></td>
                              <td><?php echo $atletica['nomePresidente']; ?></td>
                              <td><?php echo $atletica['e-mail']; ?></td>
                              <td><?php echo $atletica['status']; ?></td>
                              <td>
                                  <a href="<?php echo BASE_URL; ?>/atleticas/detalhe/<?php echo $atletica['idAtletica']; ?>" class="btn btn-default btn-xs"><i class="fa fa-search"></i></a>  
                                  <a href="<?php echo BASE_URL; ?>/atleticas/editar/<?php echo $atletica['idAtletica']; ?>" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i></a>  
                                  <!--<a href="<?php //echo BASE_URL; ?>/atleticas/deletar/<?php echo $atletica['idAtletica']; ?>" onclick="return confirm('Deseja realmente excluir este registro!');" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></a>-->
                              </td>
                            </tr>
                          <?php endforeach; ?>
                      </tbody>
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