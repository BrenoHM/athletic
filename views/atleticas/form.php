<form action="" method="post" enctype="multipart/form-data">
    
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
                    </select><br>
                    <input type="text" id="outroRepasseFinanceiro" class="form-control" name="outroRepasseFinanceiro" placeholder="Quais?" 
                            value="<?php if( (isset($post['repasseFinanceiro'])) && ($post['repasseFinanceiro'] != 'Aluno' && $post['repasseFinanceiro'] != 'Instituição') ) { echo $post['repasseFinanceiro']; } elseif ( (isset($atletica['repasseFinanceiro'])) && ($atletica['repasseFinanceiro'] != 'Aluno' && $atletica['repasseFinanceiro'] != 'Instituição') ) { echo $atletica['repasseFinanceiro']; } ?>"
                            style="display: <?php if( (isset($post['repasseFinanceiro'])) && ($post['repasseFinanceiro'] != 'Aluno' && $post['repasseFinanceiro'] != 'Instituição') ) { echo 'block'; } elseif ( (isset($atletica['repasseFinanceiro'])) && ($atletica['repasseFinanceiro'] != 'Aluno' && $atletica['repasseFinanceiro'] != 'Instituição') ) { echo 'bock'; }else{ echo 'none'; } ?>">
                </div>
                
                <div class="clearfix"></div>
                
            </div>
            <!-- FIM PASSO1 -->
            
            <!-- INICIO PASSO2 -->
            <div class="tab-pane <?php echo ( isset($atletica['passoFormulario']) && $atletica['passoFormulario'] == 2 ) ? 'active' : ''; ?>" id="passo_2">
                
                <div class="form-group <?php echo ( isset($error) && in_array('cursos', $error) ) ? 'has-error' : ''; ?>">
                    <label for="cursos">Cursos</label>
                    <input type="text" id="cursos" class="form-control" name="cursos" placeholder="Cursos" value="<?php if( isset($post['cursos']) ) { echo $post['cursos']; } elseif ( isset($atletica['cursos']) ) { echo $atletica['cursos']; } ?>">
                </div>
                
                <div class="clearfix"></div>
         
            </div>
            <!-- FIM PASSO2 -->
            
            <!-- INICIO PASSO3 -->
            <div class="tab-pane <?php echo ( isset($atletica['passoFormulario']) && $atletica['passoFormulario'] == 3 ) ? 'active' : ''; ?>" id="passo_3">
                
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
                    <label class="font-normal"><input type="radio" name="possuiBateria" value="NÃO" <?php echo ( isset($post['possuiBateria']) && $post['possuiBateria'] == 'NÃO' ) ? 'checked' : ( isset($atletica['possuiBateria']) && $atletica['possuiBateria'] == 'NÃO' ) ? 'checked' : ''; ?>> Não</label>
                </div>
                
                <div class="form-group <?php echo ( isset($error) && in_array('principaisEventos', $error) ) ? 'has-error' : ''; ?>">
                    <label for="principaisEventos">Quais os principais eventos que a Atlética participa e em que data/período?</label>
                    <textarea name="principaisEventos" class="form-control" rows="10" id="principaisEventos" style="resize: none;"><?php if( isset($post['principaisEventos']) ) { echo $post['principaisEventos']; } elseif ( isset($atletica['principaisEventos']) ) { echo $atletica['principaisEventos']; } ?></textarea>
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
                
                <div class="form-group <?php echo ( isset($error) && in_array('autorizacaoTermo', $error) ) ? 'has-error' : ''; ?>">
                    <label>
                        <input type="checkbox" name="autorizacaoTermo" value="SIM" <?php echo ( isset($post['autorizacaoTermo']) && $post['autorizacaoTermo'] == 'SIM' ) ? 'checked' : ( isset($atletica['autorizacaoTermo']) && $atletica['autorizacaoTermo'] == 'SIM' ) ? 'checked' : ''; ?>> 
                        Autorizo à Liga Universitária a utilizar a logomarca da Atlética nos materiais da Liga como CDs promocionais, vídeos de divulgação da Liga, fotos, etc.
                    </label>
                </div>
                
                <div class="form-group <?php echo ( isset($error) && in_array('urlEstatuto', $error) ) ? 'has-error' : ''; ?>">
                    <label for="urlEstatuto">UPLOAD do ESTATUTO - Arquivo em PDF ou WORD</label>
                    <input type="file" name="urlEstatuto" id="urlEstatuto" />
                </div>
                
                <div class="form-group <?php echo ( isset($error) && in_array('urlAta', $error) ) ? 'has-error' : ''; ?>">
                    <label for="urlAta">UPLOAD da ATA - Arquivo em PDF ou WORD</label>
                    <input type="file" name="urlAta" id="urlAta" />
                </div>
                
                <div class="form-group <?php echo ( isset($error) && in_array('urlLogo', $error) ) ? 'has-error' : ''; ?>">
                    <label for="urlLogo">UPLOAD da logo VETORIZADA em COREL/ILUSTRADOR/PNG SEM FUNDO COM 300dpis</label>
                    <input type="file" name="urlLogo" id="urlLogo" />
                </div>
                
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

<script type="text/javascript">
    $(function(){
        $("#repasseFinanceiro").on('change', function(){
            var valor = $(this).val();
            if(valor == "Outro"){
                $("#outroRepasseFinanceiro").show().focus();
            }else{
                $("#outroRepasseFinanceiro").hide().val('');
            }
        });
    });
</script>