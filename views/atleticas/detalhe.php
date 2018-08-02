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
                            <div class="col-md-6"><strong>Nome: </strong><?php echo $atletica['nome']; ?><input type="hidden" id="idAtletica" value="<?php echo $atletica['idAtletica']; ?>" /></div>
                            <div class="col-md-6"><strong>Sigla: </strong><?php echo $atletica['sigla']; ?></div>
                            <div class="col-md-6"><strong>Apelido: </strong><?php echo $atletica['apelido']; ?></div>
                            <div class="col-md-6"><strong>Cep: </strong><?php echo $atletica['cep']; ?></div>
                            <div class="col-md-6"><strong>Endereço: </strong><?php echo $atletica['endereco']; ?></div>
                            <div class="col-md-6"><strong>Email: </strong><?php echo $atletica['e-mail']; ?>
                                <input type="hidden" id="email" value="<?php echo $atletica['e-mail']; ?>" />
                                <input type="hidden" id="nome" value="<?php echo $atletica['nome']; ?>" />
                            </div>
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
                    <div clas="row">
                        <div class="col-md-12">
                            <div class="col-md-6"><strong>Possui registro em cartório: </strong><?php echo $atletica['registroCartorio']; ?></div>
                            <div class="col-md-6"><strong>Cnpj: </strong><?php echo $atletica['cnpj']; ?></div>
                            <div class="col-md-6"><strong>Universidade: </strong><?php echo $atletica['idUniversidade']; ?></div>
                            <div class="col-md-6"><strong>Quantos Campus a Atlética tem representação dentro da Faculdade/Universidade?: </strong><?php echo $atletica['qtdeCampus']; ?></div>
                            <div class="col-md-6"><strong>Quais: </strong><?php echo $atletica['campus']; ?></div>
                            <div class="col-md-6"><strong>Número de alunos do curso: </strong><?php echo $atletica['qtdeAlunosCurso']; ?></div>
                            <div class="col-md-6"><strong>Número de alunos de toda a faculdade: </strong><?php echo $atletica['qtdeAlunosFaculdade']; ?></div>
                            <div class="col-md-6"><strong>Possui sala própria: </strong><?php echo $atletica['salaPropria']; ?></div>
                            <div class="col-md-6"><strong>Repasse: </strong><?php echo $atletica['repasseFinanceiro']; ?></div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="tab-pane" id="passo_2">
                    <div clas="row">
                        <div class="col-md-12">
                            <div class="col-md-6"><strong>Cursos: </strong><?php echo $atletica['cursos']; ?></div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="tab-pane" id="passo_3">
                    <div clas="row">
                        <div class="col-md-12">
                            <div class="col-md-12"><strong>Possui camisa de delegação: </strong><?php echo $atletica['possuiCamisa']; ?></div>
                            <div class="col-md-12"><strong>Possui samba canção de delegação: </strong><?php echo $atletica['possuiSambaCancao']; ?></div>
                            <div class="col-md-12"><strong>Possui boné de delegação: </strong><?php echo $atletica['possuiBone']; ?></div>
                            <div class="col-md-12"><strong>Possui gorro de delegação: </strong><?php echo $atletica['possuiGorro']; ?></div>
                            <div class="col-md-12"><strong>Possui óculos de delegação: </strong><?php echo $atletica['possuiOculos']; ?></div>
                            <div class="col-md-12"><strong>Possui caneca de delegação: </strong><?php echo $atletica['possuiCaneca']; ?></div>
                            <div class="col-md-12"><strong>Possui tirante: </strong><?php echo $atletica['possuiTirante']; ?></div>
                            <div class="col-md-12"><strong>Possui jaqueta: </strong><?php echo $atletica['possuiJaqueta']; ?></div>
                            <div class="col-md-12"><strong>Possui equipamento esportivo: </strong><?php echo $atletica['possuiEquipEsportivo']; ?></div>
                            <div class="col-md-12"><strong>Possui uniforme de equipe: </strong><?php echo $atletica['possuiUniforme']; ?></div>
                            <div class="col-md-12"><strong>Possui bandeirão: </strong><?php echo $atletica['possuiBandeirao']; ?></div>
                            <div class="col-md-12"><strong>Possui mascote: </strong><?php echo $atletica['possuiMascote']; ?></div>
                            <div class="col-md-12"><strong>Possui bateria: </strong><?php echo $atletica['possuiBateria']; ?></div>
                            <div class="col-md-12"><strong>Quais os principais eventos que a Atlética participa e em que data/período: </strong><?php echo $atletica['principaisEventos']; ?></div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="tab-pane" id="passo_4">
                    <div clas="row">
                        <div class="col-md-12">
                            <div class="col-md-12"><strong>Quais os meios de comunicação da atlética com os alunos representados: </strong><br /><?php echo $atletica['meiosComunicacaoAluno']; ?></div>
                            <div class="col-md-12"><strong>Quais os meios de comunicação que a empresa patrocinadora poderia utilizar para comunicar e apresentar os produtos e serviços aos alunos representados da Atlética: </strong><br /><?php echo $atletica['meiosComunicacaoPatrocinadora']; ?></div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="tab-pane" id="passo_5">
                    <div clas="row">
                        <div class="col-md-12">
                            <div class="col-md-6"><strong>Possui algum Patrocínio: </strong><?php echo $atletica['patrocinio']; ?></div>
                            <div class="col-md-6"><strong>Possui patrocínio de alguma cervejaria: </strong><?php echo $atletica['patrocinioCervejaria']; ?></div>
                            <div class="col-md-6"><strong>Possui patrocínio de alguma empresa de energético: </strong><?php echo $atletica['patrocinioEnergetico']; ?></div>
                            <div class="col-md-6"><strong>Possui patrocínio de alguma empresa de cerimonial de formaturas: </strong><?php echo $atletica['patrocinioCerimonial']; ?></div>
                            <div class="col-md-6"><strong>Gostaria de deixar alguma observação? Se sim, escreva abaixo: </strong><?php echo $atletica['observacao']; ?></div>
                            <div class="col-md-6"><strong>Estatuto: </strong>
                                <a href="<?php echo BASE_URL; ?>/uploads/estatuto/<?php echo $atletica['urlEstatuto']; ?>" target="_blank"><i class="fa fa-download"></i></a>
                            </div>
                            <div class="col-md-6"><strong>Ata: </strong>
                                <a href="<?php echo BASE_URL; ?>/uploads/ata/<?php echo $atletica['urlAta']; ?>" target="_blank"><i class="fa fa-download"></i></a>
                            </div>
                            <div class="col-md-6"><strong>Logo: </strong>
                                <a href="<?php echo BASE_URL; ?>/uploads/logo/<?php echo $atletica['urlLogo']; ?>" target="_blank"><i class="fa fa-download"></i></a>
                            </div>
                            <div class="col-md-6"><strong>Status: </strong>
                                <select name="" id="teste" onchange="mudaStatusAtletica(this.value);">
                                    <option value="EM ANÁLISE" <?php echo $atletica['status'] == 'EM ANÁLISE' ? 'selected' : ''; ?>>EM ANÁLISE</option>
                                    <option value="APROVADO" <?php echo $atletica['status'] == 'APROVADO' ? 'selected' : ''; ?>>APROVADO</option>
                                    <option value="REPROVADO" <?php echo $atletica['status'] == 'REPROVADO' ? 'selected' : ''; ?>>REPROVADO</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.box-body -->
    
  </div>
  <!-- /.box -->

</section>
<!-- /.content -->
<script>
function mudaStatusAtletica(status){
    var URL_BASE   = '<?php echo BASE_URL; ?>';
    var idAtletica = $("#idAtletica").val();
    var email      = $("#email").val();
    var nome       = $("#nome").val();
    $.ajax({
        url: URL_BASE + "/atleticas/mudaStatus",
        type: 'POST',
        data: {idAtletica:idAtletica, email:email, nome: nome, status:status},
        //dataType: 'json',
        //contentType: "application/json",
        beforeSend: function() {},
        success: function(data) {
            if( data === 'nok' ){
                alert("Erro no envio de mudança de status para a atlética, favor informar ao suporte!");
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log('ERROR', textStatus, errorThrown);
        }
    });
}
</script>