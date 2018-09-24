<form action="" id="form" method="post" enctype="multipart/form-data">

    

    <div class="nav-tabs-custom">

        <ul class="nav nav-tabs">

            <li <?php echo ( isset($atletica['passoFormulario']) && $atletica['passoFormulario'] >= 1 ) ? $atletica['passoFormulario'] == 1 ? 'class="active"' : '' : 'class="disabled"'; ?>>

                <a href="#passo_1" <?php echo ( isset($atletica['passoFormulario']) && $atletica['passoFormulario'] >= 1 ) ? 'data-toggle="tab"' : '' ?>>Passo 1</a>

            </li>

            <li <?php echo ( isset($atletica['passoFormulario']) && $atletica['passoFormulario'] >= 2 ) ? $atletica['passoFormulario'] == 2 ? 'class="active"' : '' : 'class="disabled"'; ?>>

                <a href="#passo_2" <?php echo ( isset($atletica['passoFormulario']) && $atletica['passoFormulario'] >= 2 ) ? 'data-toggle="tab"' : '' ?>>Passo 2</a>

            </li>

            <li <?php echo ( isset($atletica['passoFormulario']) && $atletica['passoFormulario'] >= 3 ) ? $atletica['passoFormulario'] == 3 ? 'class="active"' : '' : 'class="disabled"'; ?>>

                <a href="#passo_3" <?php echo ( isset($atletica['passoFormulario']) && $atletica['passoFormulario'] >= 3 ) ? 'data-toggle="tab"' : '' ?>>Passo 3</a>

            </li>

            <li <?php echo ( isset($atletica['passoFormulario']) && $atletica['passoFormulario'] >= 4 ) ? $atletica['passoFormulario'] == 4 ? 'class="active"' : '' : 'class="disabled"'; ?>>

                <a href="#passo_4" <?php echo ( isset($atletica['passoFormulario']) && $atletica['passoFormulario'] >= 4 ) ? 'data-toggle="tab"' : '' ?>>Passo 4</a>

            </li>

            <li <?php echo ( isset($atletica['passoFormulario']) && $atletica['passoFormulario'] >= 5 ) ? $atletica['passoFormulario'] == 5 ? 'class="active"' : '' : 'class="disabled"'; ?>>

                <a href="#passo_5" <?php echo ( isset($atletica['passoFormulario']) && $atletica['passoFormulario'] >= 5 ) ? 'data-toggle="tab"' : '' ?>>Passo 5</a>

            </li>

        </ul>

        <div class="tab-content">

            

            <!-- INICIO PASSO1 -->

            <div class="tab-pane <?php echo ( isset($atletica['passoFormulario']) && $atletica['passoFormulario'] == 1 ) ? 'active' : ''; ?>" id="passo_1">

                

                <div class="form-group col-md-2 <?php echo ( isset($error) && in_array('registroCartorio', $error) ) ? 'has-error' : ''; ?>">

                    <label for="">Possui registro em cartório</label><br />

                    <label class="font-normal"><input type="radio" name="registroCartorio" value="SIM" <?php echo ( isset($atletica['registroCartorio']) && $atletica['registroCartorio'] == 'SIM' ) ? 'checked' : ( isset($post['registroCartorio']) && $post['registroCartorio'] == 'SIM' ) ? 'checked' : ''; ?>> Sim</label>&nbsp;

                    <label class="font-normal"><input type="radio" name="registroCartorio" value="NÃO" <?php echo ( isset($atletica['registroCartorio']) && $atletica['registroCartorio'] == 'NÃO' ) ? 'checked' : ( isset($post['registroCartorio']) && $post['registroCartorio'] == 'NÃO' ) ? 'checked' : ''; ?>> Não</label>

                </div>

                

                <div class="form-group col-md-4 <?php echo ( isset($error) && in_array('cnpj', $error) ) ? 'has-error' : ''; ?>">

                    <label for="cnpj">CNPJ</label>

                    <input type="text" id="cnpj" class="form-control" name="cnpj" placeholder="CNPJ da Atlética" value="<?php if( isset($post['cnpj']) ) { echo $post['cnpj']; } elseif ( isset($atletica['cnpj']) ) { echo $atletica['cnpj']; } ?>">

                </div>

                

                <div class="form-group col-md-6 <?php echo ( isset($error) && in_array('idUniversidade', $error) ) ? 'has-error' : ''; ?>">

                    <label for="idUniversidade">Instituição de Ensino</label>

                    <select class="form-control select2" name="idUniversidade" id="idUniversidade" style="width: 100%;">

                        <option value="">Selecione</option>

                        <?php foreach ( $universidades as $universidade ): ?>

                            <option value="<?php echo $universidade['idUniversidade']; ?>" <?php echo ( isset($post['idUniversidade']) && $post['idUniversidade'] == $universidade['idUniversidade'] ) ? 'selected' : ( isset($atletica['idUniversidade']) && $atletica['idUniversidade'] == $universidade['idUniversidade'] ) ? 'selected' : ''; ?>>

                                <?php echo $universidade['nome']; ?>

                            </option>

                        <?php endforeach; ?>

                    </select>

                </div>

                

                <div class="form-group col-md-12 <?php echo ( isset($error) && in_array('qtdeCampos', $error) ) ? 'has-error' : ''; ?>">

                    <label for="qtdeCampos" class="col-md-9 margin-left-0">Quantos Campus a Atlética tem representação dentro da Instituição de Ensino?</label>

                    <div class="col-md-3 margin-right-0">

                        <input type="number" min="1" id="qtdeCampos" class="form-control" name="qtdeCampos" value="<?php if( isset($post['qtdeCampos']) ) { echo $post['qtdeCampos']; } elseif ( isset($atletica['qtdeCampus']) ) { echo $atletica['qtdeCampus']; } ?>">

                    </div>

                </div>

                

                <div class="form-group col-md-12 <?php echo ( isset($error) && in_array('campus', $error) ) ? 'has-error' : ''; ?>">    

                    <label for="campus">Quais?</label>

                    <textarea name="campus" class="form-control" rows="5" id="campus"><?php if( isset($post['campus']) ) { echo $post['campus']; } elseif ( isset($atletica['campus']) ) { echo $atletica['campus']; } ?></textarea>

                </div>

                

                <div class="form-group col-md-6 <?php echo ( isset($error) && in_array('qtdeAlunosCurso', $error) ) ? 'has-error' : ''; ?>">

                    <label for="qtdeAlunosCurso" class="col-md-9 margin-left-0">Número de alunos do curso</label>

                    <div class="col-md-3 margin-right-0 margin-bottom">

                        <input type="number" min="1" id="qtdeAlunosCurso" class="form-control" name="qtdeAlunosCurso" value="<?php if( isset($post['qtdeAlunosCurso']) ) { echo $post['qtdeAlunosCurso']; } elseif ( isset($atletica['qtdeAlunosCurso']) ) { echo $atletica['qtdeAlunosCurso']; } ?>">

                    </div>

                </div>

                

                <div class="form-group col-md-6 <?php echo ( isset($error) && in_array('qtdeAlunosFaculdade', $error) ) ? 'has-error' : ''; ?>">    

                    <label for="qtdeAlunosFaculdade" class="col-md-9 margin-left-0">Número de alunos de toda a instituição de ensino</label>

                    <div class="col-md-3 margin-right-0">

                        <input type="number" min="1" id="qtdeAlunosFaculdade" class="form-control" name="qtdeAlunosFaculdade" value="<?php if( isset($post['qtdeAlunosFaculdade']) ) { echo $post['qtdeAlunosFaculdade']; } elseif ( isset($atletica['qtdeAlunosFaculdade']) ) { echo $atletica['qtdeAlunosFaculdade']; } ?>">

                    </div>

                </div>

                

                <div class="form-group col-md-12 <?php echo ( isset($error) && in_array('salaPropria', $error) ) ? 'has-error' : ''; ?>">

                    <label for="salaPropria">Possui sala própria?</label><br />

                    <label class="font-normal"><input type="radio" name="salaPropria" value="SIM" <?php echo ( isset($atletica['salaPropria']) && $atletica['salaPropria'] == 'SIM' ) ? 'checked' : ( isset($post['salaPropria']) && $post['salaPropria'] == 'SIM' ) ? 'checked' : ''; ?>> Sim</label>&nbsp;

                    <label class="font-normal"><input type="radio" name="salaPropria" value="NÃO" <?php echo ( isset($atletica['salaPropria']) && $atletica['salaPropria'] == 'NÃO' ) ? 'checked' : ( isset($post['salaPropria']) && $post['salaPropria'] == 'NÃO' ) ? 'checked' : ''; ?>> Não</label>

                </div>

                

                <div class="form-group col-md-4 <?php echo ( isset($error) && in_array('repasseFinanceiro', $error) ) ? 'has-error' : ''; ?>">

                    <label for="repasseFinanceiro">Repasse</label>

                    <select name="repasseFinanceiro" id="repasseFinanceiro" class="form-control">

                        <option value="Aluno" <?php echo ( isset($atletica['repasseFinanceiro']) && $atletica['repasseFinanceiro'] == 'Aluno' ) ? 'selected' : ( isset($post['repasseFinanceiro']) && $post['repasseFinanceiro'] == 'Aluno' ) ? 'selected' : ''; ?>>Aluno</option>

                        <option value="Instituição" <?php echo ( isset($atletica['repasseFinanceiro']) && $atletica['repasseFinanceiro'] == 'Instituição' ) ? 'selected' : ( isset($post['repasseFinanceiro']) && $post['repasseFinanceiro'] == 'Instituição' ) ? 'selected' : ''; ?>>Instituição</option>

                        <option value="Outro" <?php echo ( isset($atletica['repasseFinanceiro']) && ($atletica['repasseFinanceiro'] != 'Aluno' && $atletica['repasseFinanceiro'] != 'Instituição')) ? 'selected' : ( isset($post['repasseFinanceiro']) && ($post['repasseFinanceiro'] != 'Aluno' && $post['repasseFinanceiro'] != 'Instituição')) ? 'selected' : ''; ?>>Outro</option>

                        <option value="Nenhum" <?php echo ( isset($atletica['repasseFinanceiro']) && $atletica['repasseFinanceiro'] == 'Nenhum' ) ? 'selected' : ( isset($post['repasseFinanceiro']) && $post['repasseFinanceiro'] == 'Nenhum' ) ? 'selected' : ''; ?>>Nenhum</option>

                    </select><br>

                    <input type="text" id="outroRepasseFinanceiro" class="form-control" name="outroRepasseFinanceiro" placeholder="Quais?" 

                            value="<?php if( (isset($post['repasseFinanceiro'])) && ($post['repasseFinanceiro'] != 'Aluno' && $post['repasseFinanceiro'] != 'Instituição') ) { echo $post['repasseFinanceiro']; } elseif ( (isset($atletica['repasseFinanceiro'])) && ($atletica['repasseFinanceiro'] != 'Aluno' && $atletica['repasseFinanceiro'] != 'Instituição') ) { echo $atletica['repasseFinanceiro']; } ?>"

                            style="display: <?php if( (isset($post['repasseFinanceiro'])) && ($post['repasseFinanceiro'] != 'Aluno' && $post['repasseFinanceiro'] != 'Instituição' && $post['repasseFinanceiro'] != 'Nenhum') ) { echo 'block'; } elseif ( (isset($atletica['repasseFinanceiro'])) && ($atletica['repasseFinanceiro'] != 'Aluno' && $atletica['repasseFinanceiro'] != 'Instituição' && $atletica['repasseFinanceiro'] != 'Nenhum') ) { echo 'bock'; }else{ echo 'none'; } ?>">

                </div>

                

                <div class="clearfix"></div>

                

            </div>

            <!-- FIM PASSO1 -->

            

            <!-- INICIO PASSO2 -->

            <div class="tab-pane <?php echo ( isset($atletica['passoFormulario']) && $atletica['passoFormulario'] == 2 ) ? 'active' : ''; ?>" id="passo_2">

                

                <div class="form-group <?php echo ( isset($error) && in_array('cursos', $error) ) ? 'has-error' : ''; ?>">

                    <?php $atletica['cursos'] = explode(",", $atletica['cursos']); ?>

                    <label for="cursos">Cursos</label>

                    <select name="cursos[]" id="cursos" class="form-control select2" multiple="multiple" data-placeholder="Cursos" style="width: 100%;">

                        <?php foreach ( $cursos as $curso ): ?>

                            <option value="<?php echo $curso['curso']; ?>" <?php if( isset($post['cursos']) && in_array($curso['curso'], $post['cursos']) ){ echo 'selected'; }elseif( isset($post['cursos']) && empty($post['cursos']) ) { } elseif( isset($atletica['cursos']) && in_array($curso['curso'], $atletica['cursos']) ){ echo 'selected'; } ?>>

                                <?php echo $curso['curso']; ?>

                            </option>

                        <?php endforeach; ?>

                    </select>

                </div>

                

                <div class="clearfix"></div>

         

            </div>

            <!-- FIM PASSO2 -->

            

            <!-- INICIO PASSO3 -->

            <div class="tab-pane <?php echo ( isset($atletica['passoFormulario']) && $atletica['passoFormulario'] == 3 ) ? 'active' : ''; ?>" id="passo_3">



                <div class="form-group <?php echo ( isset($error) && in_array('possuiCamisa', $error) ) ? 'has-error' : ''; ?>">

                    <label>Possui camisa de delegação?</label><br />

                    <label class="font-normal"><input type="radio" name="possuiCamisa" value="SIM" <?php if( isset($post['possuiCamisa']) && $post['possuiCamisa'] == 'SIM' ) { echo 'checked'; } elseif( isset($atletica['possuiCamisa']) && $atletica['possuiCamisa'] == 'SIM' ) { echo 'checked'; } ?>> Sim</label>&nbsp;

                    <label class="font-normal"><input type="radio" name="possuiCamisa" value="NÃO" <?php if( isset($post['possuiCamisa']) && $post['possuiCamisa'] == 'NÃO' ) { echo 'checked'; } elseif( isset($atletica['possuiCamisa']) && $atletica['possuiCamisa'] == 'NÃO' ) { echo 'checked'; } ?>> Não</label>

                </div>



                <div class="form-group <?php echo ( isset($error) && in_array('possuiSambaCancao', $error) ) ? 'has-error' : ''; ?>">

                    <label>Possui samba canção?</label><br />

                    <label class="font-normal"><input type="radio" name="possuiSambaCancao" value="SIM" <?php if( isset($post['possuiSambaCancao']) && $post['possuiSambaCancao'] == 'SIM' ) { echo 'checked'; } elseif( isset($atletica['possuiSambaCancao']) && $atletica['possuiSambaCancao'] == 'SIM' ) { echo 'checked'; } ?>> Sim</label>&nbsp;

                    <label class="font-normal"><input type="radio" name="possuiSambaCancao" value="NÃO" <?php if( isset($post['possuiSambaCancao']) && $post['possuiSambaCancao'] == 'NÃO' ) { echo 'checked'; } elseif( isset($atletica['possuiSambaCancao']) && $atletica['possuiSambaCancao'] == 'NÃO' ) { echo 'checked'; } ?>> Não</label>

                </div>



                <div class="form-group <?php echo ( isset($error) && in_array('possuiBone', $error) ) ? 'has-error' : ''; ?>">

                    <label>Possui boné?</label><br />

                    <label class="font-normal"><input type="radio" name="possuiBone" value="SIM" <?php if( isset($post['possuiBone']) && $post['possuiBone'] == 'SIM' ) { echo 'checked'; } elseif( isset($atletica['possuiBone']) && $atletica['possuiBone'] == 'SIM' ) { echo 'checked'; } ?>> Sim</label>&nbsp;

                    <label class="font-normal"><input type="radio" name="possuiBone" value="NÃO" <?php if( isset($post['possuiBone']) && $post['possuiBone'] == 'NÃO' ) { echo 'checked'; } elseif( isset($atletica['possuiBone']) && $atletica['possuiBone'] == 'NÃO' ) { echo 'checked'; } ?>> Não</label>

                </div>



                <div class="form-group <?php echo ( isset($error) && in_array('possuiGorro', $error) ) ? 'has-error' : ''; ?>">

                    <label>Possui gorro?</label><br />

                    <label class="font-normal"><input type="radio" name="possuiGorro" value="SIM" <?php if( isset($post['possuiGorro']) && $post['possuiGorro'] == 'SIM' ) { echo 'checked'; } elseif( isset($atletica['possuiGorro']) && $atletica['possuiGorro'] == 'SIM' ) { echo 'checked'; } ?>> Sim</label>&nbsp;

                    <label class="font-normal"><input type="radio" name="possuiGorro" value="NÃO" <?php if( isset($post['possuiGorro']) && $post['possuiGorro'] == 'NÃO' ) { echo 'checked'; } elseif( isset($atletica['possuiGorro']) && $atletica['possuiGorro'] == 'NÃO' ) { echo 'checked'; } ?>> Não</label>

                </div>



                <div class="form-group <?php echo ( isset($error) && in_array('possuiOculos', $error) ) ? 'has-error' : ''; ?>">

                    <label>Possui óculos?</label><br />

                    <label class="font-normal"><input type="radio" name="possuiOculos" value="SIM" <?php if( isset($post['possuiOculos']) && $post['possuiOculos'] == 'SIM' ) { echo 'checked'; } elseif( isset($atletica['possuiOculos']) && $atletica['possuiOculos'] == 'SIM' ) { echo 'checked'; } ?>> Sim</label>&nbsp;

                    <label class="font-normal"><input type="radio" name="possuiOculos" value="NÃO" <?php if( isset($post['possuiOculos']) && $post['possuiOculos'] == 'NÃO' ) { echo 'checked'; } elseif( isset($atletica['possuiOculos']) && $atletica['possuiOculos'] == 'NÃO' ) { echo 'checked'; } ?>> Não</label>

                </div>



                <div class="form-group <?php echo ( isset($error) && in_array('possuiCaneca', $error) ) ? 'has-error' : ''; ?>">

                    <label>Possui caneca?</label><br />

                    <label class="font-normal"><input type="radio" name="possuiCaneca" value="SIM" <?php if( isset($post['possuiCaneca']) && $post['possuiCaneca'] == 'SIM' ) { echo 'checked'; } elseif( isset($atletica['possuiCaneca']) && $atletica['possuiCaneca'] == 'SIM' ) { echo 'checked'; } ?>> Sim</label>&nbsp;

                    <label class="font-normal"><input type="radio" name="possuiCaneca" value="NÃO" <?php if( isset($post['possuiCaneca']) && $post['possuiCaneca'] == 'NÃO' ) { echo 'checked'; } elseif( isset($atletica['possuiCaneca']) && $atletica['possuiCaneca'] == 'NÃO' ) { echo 'checked'; } ?>> Não</label>

                </div>



                <div class="form-group <?php echo ( isset($error) && in_array('possuiTirante', $error) ) ? 'has-error' : ''; ?>">

                    <label>Possui tirante?</label><br />

                    <label class="font-normal"><input type="radio" name="possuiTirante" value="SIM" <?php if( isset($post['possuiTirante']) && $post['possuiTirante'] == 'SIM' ) { echo 'checked'; } elseif( isset($atletica['possuiTirante']) && $atletica['possuiTirante'] == 'SIM' ) { echo 'checked'; } ?>> Sim</label>&nbsp;

                    <label class="font-normal"><input type="radio" name="possuiTirante" value="NÃO" <?php if( isset($post['possuiTirante']) && $post['possuiTirante'] == 'NÃO' ) { echo 'checked'; } elseif( isset($atletica['possuiTirante']) && $atletica['possuiTirante'] == 'NÃO' ) { echo 'checked'; } ?>> Não</label>

                </div>



                <div class="form-group <?php echo ( isset($error) && in_array('possuiJaqueta', $error) ) ? 'has-error' : ''; ?>">

                    <label>Possui jaqueta college?</label><br />

                    <label class="font-normal"><input type="radio" name="possuiJaqueta" value="SIM" <?php if( isset($post['possuiJaqueta']) && $post['possuiJaqueta'] == 'SIM' ) { echo 'checked'; } elseif( isset($atletica['possuiJaqueta']) && $atletica['possuiJaqueta'] == 'SIM' ) { echo 'checked'; } ?>> Sim</label>&nbsp;

                    <label class="font-normal"><input type="radio" name="possuiJaqueta" value="NÃO" <?php if( isset($post['possuiJaqueta']) && $post['possuiJaqueta'] == 'NÃO' ) { echo 'checked'; } elseif( isset($atletica['possuiJaqueta']) && $atletica['possuiJaqueta'] == 'NÃO' ) { echo 'checked'; } ?>> Não</label>

                </div>



                <div class="form-group <?php echo ( isset($error) && in_array('possuiEquipEsportivo', $error) ) ? 'has-error' : ''; ?>">

                    <label>Possui equipamento esportivo?</label><br />

                    <label class="font-normal"><input type="radio" name="possuiEquipEsportivo" value="SIM" <?php if( isset($post['possuiEquipEsportivo']) && $post['possuiEquipEsportivo'] == 'SIM' ) { echo 'checked'; } elseif( isset($atletica['possuiEquipEsportivo']) && $atletica['possuiEquipEsportivo'] == 'SIM' ) { echo 'checked'; } ?>> Sim</label>&nbsp;

                    <label class="font-normal"><input type="radio" name="possuiEquipEsportivo" value="NÃO" <?php if( isset($post['possuiEquipEsportivo']) && $post['possuiEquipEsportivo'] == 'NÃO' ) { echo 'checked'; } elseif( isset($atletica['possuiEquipEsportivo']) && $atletica['possuiEquipEsportivo'] == 'NÃO' ) { echo 'checked'; } ?>> Não</label>

                </div>

                

                <div class="form-group <?php echo ( isset($error) && in_array('possuiUniforme', $error) ) ? 'has-error' : ''; ?>">

                    <label>Possui uniforme de equipe?</label><br />

                    <label class="font-normal"><input type="radio" name="possuiUniforme" value="SIM" <?php if( isset($post['possuiUniforme']) && $post['possuiUniforme'] == 'SIM' ) { echo 'checked'; } elseif( isset($atletica['possuiUniforme']) && $atletica['possuiUniforme'] == 'SIM' ) { echo 'checked'; } ?>> Sim</label>&nbsp;

                    <label class="font-normal"><input type="radio" name="possuiUniforme" value="NÃO" <?php if( isset($post['possuiUniforme']) && $post['possuiUniforme'] == 'NÃO' ) { echo 'checked'; } elseif( isset($atletica['possuiUniforme']) && $atletica['possuiUniforme'] == 'NÃO' ) { echo 'checked'; } ?>> Não</label>

                </div>

                

                <div class="form-group <?php echo ( isset($error) && in_array('possuiBandeirao', $error) ) ? 'has-error' : ''; ?>">

                    <label>Possui bandeirão?</label><br />

                    <label class="font-normal"><input type="radio" name="possuiBandeirao" value="SIM" <?php echo ( isset($post['possuiBandeirao']) && $post['possuiBandeirao'] == 'SIM' ) ? 'checked' : ( isset($atletica['possuiBandeirao']) && $atletica['possuiBandeirao'] == 'SIM' ) ? 'checked' : ''; ?>> Sim</label>&nbsp;

                    <label class="font-normal"><input type="radio" name="possuiBandeirao" value="NÃO" <?php echo ( isset($post['possuiBandeirao']) && $post['possuiBandeirao'] == 'NÃO' ) ? 'checked' : ( isset($atletica['possuiBandeirao']) && $atletica['possuiBandeirao'] == 'NÃO' ) ? 'checked' : ''; ?>> Não</label>

                </div>

                

                <div class="form-group <?php echo ( isset($error) && in_array('possuiMascote', $error) ) ? 'has-error' : ''; ?>">

                    <label>Possui mascote?</label><br />

                    <label class="font-normal"><input type="radio" name="possuiMascote" value="SIM" <?php echo ( isset($post['possuiMascote']) && $post['possuiMascote'] == 'SIM' ) ? 'checked' : ( isset($atletica['possuiMascote']) && $atletica['possuiMascote'] == 'SIM' ) ? 'checked' : ''; ?>> Sim</label>&nbsp;

                    <label class="font-normal"><input type="radio" name="possuiMascote" value="NÃO" <?php echo ( isset($post['possuiMascote']) && $post['possuiMascote'] == 'NÃO' ) ? 'checked' : ( isset($atletica['possuiMascote']) && $atletica['possuiMascote'] == 'NÃO' ) ? 'checked' : ''; ?>> Não</label>

                </div>

                

                <div class="form-group <?php echo ( isset($error) && in_array('possuiBateria', $error) ) ? 'has-error' : ''; ?>">

                    <label>Possui bateria?</label><br />

                    <label class="font-normal"><input type="radio" name="possuiBateria" value="SIM" <?php echo ( isset($post['possuiBateria']) && $post['possuiBateria'] == 'SIM' ) ? 'checked' : ( isset($atletica['possuiBateria']) && $atletica['possuiBateria'] == 'SIM' ) ? 'checked' : ''; ?>> Sim</label>&nbsp;

                    <label class="font-normal"><input type="radio" name="possuiBateria" value="NÃO" <?php echo ( isset($post['possuiBateria']) && $post['possuiBateria'] == 'NÃO' ) ? 'checked' : ( isset($atletica['possuiBateria']) && $atletica['possuiBateria'] == 'NÃO' ) || $atletica['possuiBateria'] === null ? 'checked' : ''; ?>> Não</label>

                </div>

                

                <div class="form-group">

                    <label for="principaisEventos">Quais os principais eventos que a Atlética participa e em que data/período? (Não há edição de evento, é necessário incluir outro novamente)</label>

                    <!--<textarea name="principaisEventos" class="form-control" rows="10" id="principaisEventos" style="resize: none;"><?php //if( isset($post['principaisEventos']) ) { echo $post['principaisEventos']; } elseif ( isset($atletica['principaisEventos']) ) { echo $atletica['principaisEventos']; } ?></textarea>-->

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Evento</th>
                                <th>Data Inicial</th>
                                <th>Data Final</th>
                                <th>Ação</th>
                            </tr>
                        </thead>
                        <tbody id="listaEventos">
                            <?php foreach( $eventos as $evento ): ?>
                                <tr>
                                    <td><?php echo $evento['evento']; ?></td>
                                    <td><?php echo $evento['dataInicial']; ?></td>
                                    <td><?php echo $evento['dataFinal']; ?></td>
                                    <td><input type="button" class="btn btn-alert btn-sm excEvento" id="<?php echo $evento['id']; ?>" title="Excluir" value="x" onclick="deletaEvento(<?php echo $evento['id']; ?>)" /></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td><input type="text" name="nomeEvento" id="nomeEvento"></td>
                                <td><input type="date" name="dataInicial" id="dataInicial"></td>
                                <td><input type="date" name="dataFinal" id="dataFinal"></td>
                                <td><input type="button" id="addEvento" class="btn btn-primary btn-sm" title="Adicionar" value="Adicionar" /></td>
                            </tr>
                        </tfoot>
                    </table>

                </div>

                

            </div>

            <!-- FIM PASSO3 -->

            

            <!-- INICIO PASSO4 -->

            <div class="tab-pane <?php echo ( isset($atletica['passoFormulario']) && $atletica['passoFormulario'] == 4 ) ? 'active' : ''; ?>" id="passo_4">

                

                <div class="form-group <?php echo ( isset($error) && in_array('meiosComunicacaoAluno', $error) ) ? 'has-error' : ''; ?>">

                    <?php $atletica['meiosComunicacaoAluno'] = explode(",", $atletica['meiosComunicacaoAluno']); ?>

                    <label for="meiosComunicacaoAluno">Quais os meios de comunicação da atlética com os alunos representados?</label>

                    <select name="meiosComunicacaoAluno[]" id="meiosComunicacaoAluno" class="form-control select2" multiple="multiple" data-placeholder="Meios de Comunicação" style="width: 100%;">

                        <?php foreach ( $meiosComunicacao as $meio ): ?>

                            <option value="<?php echo $meio; ?>" <?php if( isset($post['meiosComunicacaoAluno']) && in_array($meio, $post['meiosComunicacaoAluno']) ){ echo 'selected'; }elseif( isset($post['meiosComunicacaoAluno']) && empty($post['meiosComunicacaoAluno']) ) { } elseif( isset($atletica['meiosComunicacaoAluno']) && in_array($meio, $atletica['meiosComunicacaoAluno']) ){ echo 'selected'; } ?>>

                                <?php echo $meio; ?>

                            </option>

                        <?php endforeach; ?>

                    </select>

                </div>

                

                <div class="form-group <?php echo ( isset($error) && in_array('meiosComunicacaoPatrocinadora', $error) ) ? 'has-error' : ''; ?>">

                    <?php $atletica['meiosComunicacaoPatrocinadora'] = explode(",", $atletica['meiosComunicacaoPatrocinadora']); ?>

                    <label for="meiosComunicacaoPatrocinadora">Quais os meios de comunicação que a empresa patrocinadora poderia utilizar para comunicar e apresentar os produtos e serviços aos alunos representados da Atlética?</label>

                    <select name="meiosComunicacaoPatrocinadora[]" id="meiosComunicacaoPatrocinadora" class="form-control select2" multiple="multiple" data-placeholder="Meios de Comunicação da Patrocinadora" style="width: 100%;">

                        <?php foreach ( $meiosComunicacao as $meio ): ?>

                            <option value="<?php echo $meio; ?>" <?php if( isset($post['meiosComunicacaoPatrocinadora']) && in_array($meio, $post['meiosComunicacaoPatrocinadora']) ){ echo 'selected'; }elseif( isset($post['meiosComunicacaoPatrocinadora']) && empty($post['meiosComunicacaoPatrocinadora']) ) { } elseif( isset($atletica['meiosComunicacaoPatrocinadora']) && in_array($meio, $atletica['meiosComunicacaoPatrocinadora']) ){ echo 'selected'; } ?>>

                                <?php echo $meio; ?>

                            </option>

                        <?php endforeach; ?>

                    </select>

                </div>

                

                <div class="clearfix"></div>

                

            </div>

            <!-- FIM PASSO4 -->

            

            <!-- INICIO PASSO5 -->

            <div class="tab-pane <?php echo ( isset($atletica['passoFormulario']) && $atletica['passoFormulario'] == 5 ) ? 'active' : ''; ?>" id="passo_5">

                

                <div class="form-group <?php echo ( isset($error) && in_array('patrocinio', $error) ) ? 'has-error' : ''; ?>">

                    <label for="patrocinio">Possui algum Patrocínio?</label>

                    <input type="text" id="patrocinio" class="form-control" name="patrocinio" placeholder="Se sim, qual?" value="<?php if( isset($post['patrocinio']) ) { echo $post['patrocinio']; } elseif ( isset($atletica['patrocinio']) ) { echo $atletica['patrocinio']; } ?>">

                </div>

                

                <div class="form-group <?php echo ( isset($error) && in_array('patrocinioCervejaria', $error) ) ? 'has-error' : ''; ?>">

                    <label for="patrocinioCervejaria">Possui patrocínio de alguma cervejaria?</label>

                    <input type="text" id="patrocinioCervejaria" class="form-control" name="patrocinioCervejaria" placeholder="Se sim, qual?" value="<?php if( isset($post['patrocinioCervejaria']) ) { echo $post['patrocinioCervejaria']; } elseif ( isset($atletica['patrocinioCervejaria']) ) { echo $atletica['patrocinioCervejaria']; } ?>">

                </div>

                

                <div class="form-group <?php echo ( isset($error) && in_array('patrocinioEnergetico', $error) ) ? 'has-error' : ''; ?>">

                    <label for="patrocinioEnergetico">Possui patrocínio de alguma empresa de energético?</label>

                    <input type="text" id="patrocinioEnergetico" class="form-control" name="patrocinioEnergetico" placeholder="Se sim, qual?" value="<?php if( isset($post['patrocinioEnergetico']) ) { echo $post['patrocinioEnergetico']; } elseif ( isset($atletica['patrocinioEnergetico']) ) { echo $atletica['patrocinioEnergetico']; } ?>">

                </div>

                

                <div class="form-group <?php echo ( isset($error) && in_array('patrocinioCerimonial', $error) ) ? 'has-error' : ''; ?>">

                    <label for="patrocinioCerimonial">Possui patrocínio de alguma empresa de cerimonial de formaturas?</label>

                    <input type="text" id="patrocinioCerimonial" class="form-control" name="patrocinioCerimonial" placeholder="Se sim, qual?" value="<?php if( isset($post['patrocinioCerimonial']) ) { echo $post['patrocinioCerimonial']; } elseif ( isset($atletica['patrocinioCerimonial']) ) { echo $atletica['patrocinioCerimonial']; } ?>">

                </div>

                

                <div class="form-group">

                    <label for="observacao">Gostaria de deixar alguma observação? Se sim, escreva abaixo:</label>

                    <textarea name="observacao" class="form-control" rows="5" id="observacao" style="resize: none;"><?php if( isset($post['observacao']) ) { echo $post['observacao']; } elseif ( isset($atletica['observacao']) ) { echo $atletica['observacao']; } ?></textarea>

                </div>



                <div class="form-group <?php echo ( isset($error) && in_array('autorizacaoContrato', $error) ) ? 'has-error' : ''; ?>">

                    <label>

                        <input type="checkbox" name="autorizacaoContrato" id="autorizacaoContrato" value="SIM" <?php echo ( isset($post['autorizacaoContrato']) && $post['autorizacaoContrato'] == 'SIM' ) ? 'checked' : ( isset($atletica['autorizacaoContrato']) && $atletica['autorizacaoContrato'] == 'SIM' ) ? 'checked' : ''; ?>> 

                        ACEITO OS TERMOS DE <a href="<?php echo BASE_URL; ?>/uploads/contrato/contrato_associado_liga.pdf" target="_blank">CONTRATO</a> DA AGÊNCIA LIGA UNIVERSITÁRIA LTDA-ME

                    </label>

                </div>


                <div class="form-group <?php echo ( isset($error) && in_array('autorizacaoContrubuicao', $error) ) ? 'has-error' : ''; ?>">

                    <label>

                        DE ACORDO COM O ARTIGO 7º E 8º DO CONTRATO DE ASSOCIAÇÃO À LIGA ACEITO FAZER AS CONTRIBUIÇÕES ANUAIS.

                    </label><br>

                    <label class="font-normal"><input type="radio" name="autorizacaoContribuicao" value="SIM" <?php echo ( isset($post['autorizacaoContrubuicao']) && $post['autorizacaoContrubuicao'] == 'SIM' ) ? 'checked' : ( isset($atletica['autorizacaoContribuicao']) && $atletica['autorizacaoContribuicao'] == 'SIM' ) ? 'checked' : ''; ?>> Sim</label>&nbsp;

                    <label class="font-normal"><input type="radio" name="autorizacaoContribuicao" value="NÃO" <?php echo ( isset($post['autorizacaoContrubuicao']) && $post['autorizacaoContrubuicao'] == 'NÃO' ) ? 'checked' : ( isset($atletica['autorizacaoContribuicao']) && $atletica['autorizacaoContribuicao'] == 'NÃO' ) || $atletica['autorizacaoContribuicao'] === null ? 'checked' : ''; ?>> Não</label>

                </div>

                
                <div class="form-group <?php echo ( isset($error) && in_array('autorizacaoTermo', $error) ) ? 'has-error' : ''; ?>">

                    <label>

                        Autorizo à Liga Universitária a utilizar a logomarca da Atlética nos materiais promocionais, vídeos de divulgação da Liga, fotos, etc e em conjunto com os parceiros e fornecedores da Liga.

                    </label><br>

                    <label class="font-normal"><input type="radio" name="autorizacaoTermo" value="SIM" <?php echo ( isset($post['autorizacaoTermo']) && $post['autorizacaoTermo'] == 'SIM' ) ? 'checked' : ( isset($atletica['autorizacaoTermo']) && $atletica['autorizacaoTermo'] == 'SIM' ) ? 'checked' : ''; ?>> Sim</label>&nbsp;

                    <label class="font-normal"><input type="radio" name="autorizacaoTermo" value="NÃO" <?php echo ( isset($post['autorizacaoTermo']) && $post['autorizacaoTermo'] == 'NÃO' ) ? 'checked' : ( isset($atletica['autorizacaoTermo']) && $atletica['autorizacaoTermo'] == 'NÃO' ) || $atletica['autorizacaoTermo'] === null ? 'checked' : ''; ?>> Não</label>

                </div>

                

                <div class="form-group <?php echo ( isset($error) && in_array('urlEstatuto', $error) ) ? 'has-error' : ''; ?>">

                    <label for="urlEstatuto">UPLOAD do ESTATUTO - Arquivo em PDF ou WORD - Tamanho: 3MB</label>

                    <input type="file" name="urlEstatuto" id="urlEstatuto" />

                </div>

                

                <div class="form-group <?php echo ( isset($error) && in_array('urlAta', $error) ) ? 'has-error' : ''; ?>">

                    <label for="urlAta">UPLOAD da ATA - Arquivo em PDF ou WORD - Tamanho: 3MB</label>

                    <input type="file" name="urlAta" id="urlAta" />

                </div>

                

                <div class="form-group <?php echo ( isset($error) && in_array('urlLogo', $error) ) ? 'has-error' : ''; ?>">

                    <label for="urlLogo">UPLOAD da logo VETORIZADA em Pdf/Corel/Ilustrator/Photoshop/PNG SEM FUNDO COM 300dpis - Tamanho: 3MB</label>

                    <input type="file" name="urlLogo" id="urlLogo" />

                </div>

                

                <div class="form-group <?php echo ( isset($error) && in_array('urlLogoExibicao', $error) ) ? 'has-error' : ''; ?>">

                    <label for="urlLogoExibicao">UPLOAD da logo para EXIBIÇÃO em JPG/PNG SEM FUNDO (para corte) - Tamanho: 3MB</label>

                    <input type="file" accept='image/png, image/jpeg' name="urlLogoExibicao" id="urlLogoExibicao" />

                </div>

                

                <div id="uploadImagem">

                    <p><b>Corte a imagem antes de finalizar o cadastro.</b></p>

                    <div id="image_demo" style="width:350px; margin-top:30px"></div>

                    <input type="button" class="crop_image" value="Cortar e salvar imagem">

                </div>

                <div id="uploadedImagem"></div>

                

                <?php if( isset($atletica['urlLogoExibicao']) ) { ?>

                <div id="logoExibicao">

                    <p><b>Imagem em exibição</b></p>

                    <img src="../../uploads/logo-exibicao/<?php echo $atletica['urlLogoExibicao'];?>" class="img-thumbnail" />

                </div>    

                <?php } ?>                

            </div>

            <!-- FIM PASSO5 -->

            

          <!-- /.tab-pane -->

        </div>

        <!-- /.tab-content -->

    </div>



    <div class="form-group text-right">

        <!--<a href="<?php //echo BASE_URL; ?>/clientes" class="btn btn-primary">Cancelar</a>-->

        <input type="submit" value="<?php echo $atletica['passoFormulario'] < 5 ? "Próximo Passo >" : "Finalizar"; ?>" name="frmAtletica" class="btn btn-primary" />

    </div>

    

</form>



<script type="text/javascript" defer="defer">

    $(function(){

        $("#addEvento").on('click', function(){

            var URL_BASE    = '<?php echo BASE_URL; ?>';
            var idAtletica  = '<?php echo $atletica["idAtletica"]; ?>';
            var evento      = $("#nomeEvento").val();
            var dataInicial = $("#dataInicial").val();
            var dataFinal   = $("#dataFinal").val();

            if( evento !== '' && dataInicial !== '' && dataFinal !== '' ){

                $.ajax({
                    url: URL_BASE + "/eventos/adicionar",
                    type: 'POST',
                    data: {idAtletica:idAtletica, evento:evento, dataInicial: dataInicial, dataFinal:dataFinal},
                    dataType: 'json',
                    //contentType: "application/json",
                    beforeSend: function() {},
                    success: function(data) {
                        if(data > 0){
                            var dataInicialBr = dataInicial.split('-').reverse().join('/');
                            var dataFinalBr   = dataFinal.split('-').reverse().join('/');
                            $("#listaEventos").append(`
                                <tr>
                                    <td>`+evento+`</td>
                                    <td>`+dataInicialBr+`</td>
                                    <td>`+dataFinalBr+`</td>
                                    <td><input type="button" class="btn btn-alert btn-sm excEvento" id="`+data+`" title="Excluir" value="x" onclick="deletaEvento(`+data+`)" /></td>
                                </tr>`);
                            $("#nomeEvento").val('');
                            $("#dataInicial").val('');
                            $("#dataFinal").val('');
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.log('ERROR', textStatus, errorThrown);
                    }
                });
            }

        });


        /*$("#form").on('submit', function(){

            if( !$("#autorizacaoContrato").is(":checked") ){

                alert('É necessário aceitar os termos do contrato!');

                return false;

            }

        });*/

        $("#repasseFinanceiro").on('change', function(){

            var valor = $(this).val();

            if(valor == "Outro"){

                $("#outroRepasseFinanceiro").show().focus();

            }else{

                $("#outroRepasseFinanceiro").hide().val('');

            }

        });



        $('#uploadImagem').hide();

        $image_crop = $('#image_demo').croppie({

            enableExif: true,

            viewport: {

              width:200,

              height:200,

              type:'square'

            },

            boundary:{

              width:300,

              height:300

            }

        });

    

        var fileTypes = ['jpg', 'jpeg', 'png'];

        $('#urlLogoExibicao').on('change', function(){

            var extension = $('#urlLogoExibicao')[0].files[0].name.split('.').pop().toLowerCase(),  //extensão do arquivo enviado

                isSuccess = fileTypes.indexOf(extension) > -1,  //é extensão aceitável

                size = $('#urlLogoExibicao')[0].files[0].size, //o tamanho do arquivo

                sizeImages = 3 * 1024 * 1024; //tamanho máximo aceito

            

            if (isSuccess) {

                if(size <= sizeImages){

                    var reader = new FileReader();

                    reader.onload = function (event) {

                      $image_crop.croppie('bind', {

                        url: event.target.result

                      }).then(function(){

                        console.log('jQuery bind complete');

                      });

                    };

                    reader.readAsDataURL(this.files[0]);

                    $('#urlLogoExibicao').val('');

                    $('#uploadImagem').show();

                    $('#logoExibicao').hide();

                }

                else{

                    $('#urlLogoExibicao').val('');

                    $('#uploadImagem').hide();

                    alert("O arquivo é maior que 3MB.");

                }

            }

            else{

                $('#urlLogoExibicao').val('');

                $('#uploadImagem').hide();

                alert("O arquivo precisa ser JPG ou PNG sem fundo.");

            }

        });



        $('.crop_image').click(function(event){

            $image_crop.croppie('result', {

                type: 'canvas',

                size: 'viewport'

            }).then(function(response){

                $.ajax({

                    url:"../../action/corteLogo.php",

                    type: "POST",

                    data:{"image": response},

                    success:function(data)

                    {

                        $('#uploadImagem').hide();

                        $('#uploadedImagem').html(data);

                    }

              });

            });

        });



        $("#cnpj").change(function(){

            var cnpj = $(this).val();

            if( !validarCNPJ(cnpj) ){

                alert('CNPJ inválido!');

                $(this).val('').focus();

            }

        });

    });


    function deletaEvento(id) {

        if( confirm('Deseja relamente excluir este evento?') ){

            var URL_BASE    = '<?php echo BASE_URL; ?>';

            if(id > 0){
                $.ajax({
                    url: URL_BASE + "/eventos/del",
                    type: 'POST',
                    data: {id:id},
                    dataType: 'json',
                    //contentType: "application/json",
                    beforeSend: function() {},
                    success: function(data) {
                        if( data ){
                            $("#" + id).parent().parent().remove();
                        }else{
                            alert('Erroa o deletar evento!');
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.log('ERROR', textStatus, errorThrown);
                    }
                });
            }

        }

    }


    function validarCNPJ(cnpj) {
 
        cnpj = cnpj.replace(/[^\d]+/g,'');     

        if(cnpj == '') return false;

        if (cnpj.length != 14)

            return false;

        // Elimina CNPJs invalidos conhecidos

        if (cnpj == "00000000000000" || 

            cnpj == "11111111111111" || 

            cnpj == "22222222222222" || 

            cnpj == "33333333333333" || 

            cnpj == "44444444444444" || 

            cnpj == "55555555555555" || 

            cnpj == "66666666666666" || 

            cnpj == "77777777777777" || 

            cnpj == "88888888888888" || 

            cnpj == "99999999999999")

            return false;


        // Valida DVs

        tamanho = cnpj.length - 2

        numeros = cnpj.substring(0,tamanho);

        digitos = cnpj.substring(tamanho);

        soma = 0;

        pos = tamanho - 7;

        for (i = tamanho; i >= 1; i--) {

          soma += numeros.charAt(tamanho - i) * pos--;

          if (pos < 2)

                pos = 9;

        }

        resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;

        if (resultado != digitos.charAt(0))

            return false;

             

        tamanho = tamanho + 1;

        numeros = cnpj.substring(0,tamanho);

        soma = 0;

        pos = tamanho - 7;

        for (i = tamanho; i >= 1; i--) {

          soma += numeros.charAt(tamanho - i) * pos--;

          if (pos < 2)

                pos = 9;

        }

        resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;

        if (resultado != digitos.charAt(1))

              return false;

               
        return true;

    
    }


</script>