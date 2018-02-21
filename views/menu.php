<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?php echo $gravata; ?>" class="img-circle" alt="Imagem do Usuário">
      </div>
      <div class="pull-left info">
        <p><?php echo Sessao::getSessionName(); ?></p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <!-- search form -->
<!--    <form action="#" method="get" class="sidebar-form">
      <div class="input-group">
        <input type="text" name="q" class="form-control" placeholder="Procurar...">
            <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
      </div>
    </form>-->
    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu">
      <li class="header">MENU</li>
      <li class="treeview">
        <a href="<?php echo BASE_URL ?>/dashboard">
          <i class="fa fa-dashboard"></i> <span>Dashboard</span>
        </a>
      </li>
      
      <!--<li>
        <a href="<?php echo BASE_URL ?>/parceiros">
          <i class="fa fa-handshake-o" aria-hidden="true"></i> <span>Parceiros</span>
        </a>
      </li>-->
      
      <?php if( Sessao::getSessionNivel() == 'admin' ): ?>
        <li>
          <a href="<?php echo BASE_URL ?>/atleticas">
            <i class="fa fa-handshake-o" aria-hidden="true"></i> <span>Atléticas</span>
          </a>
        </li>
      <?php endif; ?>
      
      <!--<li>
        <a href="<?php echo BASE_URL ?>/clientes">
          <i class="fa fa-handshake-o" aria-hidden="true"></i> <span>Clientes</span>
        </a>
      </li>-->

      <!--<li>
        <a href="<?php echo BASE_URL ?>/contato">
          <i class="fa fa-reply" aria-hidden="true"></i> <span>Contato</span>
        </a>
      </li>-->
      <?php if( Sessao::getSessionNivel() == 'admin' ): ?>
        <li>
          <a href="<?php echo BASE_URL ?>/usuarios">
            <i class="fa fa-users"></i> <span>Usuários</span>
          </a>
        </li>
      <?php endif; ?>
      
      <!--<li>
        <a href="<?php echo BASE_URL ?>/mensagens-recebidas">
          <i class="fa fa-commenting"></i> <span>Mensagens Recebidas</span>
        </a>
      </li>-->
      
      <li>
        <a href="<?php echo BASE_URL ?>/logout">
          <i class="fa  fa-power-off"></i> <span>Sair  </span>
        </a>
      </li>

    </ul>
  </section>
  <!-- /.sidebar -->
</aside>