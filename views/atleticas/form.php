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
                    <input type="text" id="cnpj" class="form-control" name="cnpj" placeholder="CNPJ da Atlética" value="<?php echo ( isset($post['cnpj']) && !empty($post['cnpj']) ) ? $post['cnpj'] : ( isset($atletica['cnpj']) && !empty($atletica['cnpj']) ) ? $atletica['cnpj'] : ''; ?>">
                </div>
                
                <div class="form-group col-md-6 <?php echo ( isset($error) && in_array('idUniversidade', $error) ) ? 'has-error' : ''; ?>">
                    <label for="idUniversidade">Universidade</label>
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
                    <label for="qtdeCampos" class="col-md-9 margin-left-0">Quantos Campus a Atlética tem representação dentro da Faculdade/Universidade?</label>
                    <div class="col-md-3 margin-right-0">
                        <input type="number" min="1" id="qtdeCampos" class="form-control" name="qtdeCampos" value="<?php echo ( isset($post['qtdeCampus']) && !empty($post['qtdeCampus']) ) ? $post['qtdeCampus'] : ( isset($atletica['qtdeCampus']) && !empty($atletica['qtdeCampus']) ) ? $atletica['qtdeCampus'] : ''; ?>">
                    </div>
                </div>
                
                <div class="form-group col-md-12 <?php echo ( isset($error) && in_array('campus', $error) ) ? 'has-error' : ''; ?>">    
                    <label for="campus">Quais?</label>
                    <textarea name="campus" class="form-control" rows="5" id="campus"><?php echo ( isset($post['campus']) && !empty($post['campus']) ) ? $post['campus'] : ( isset($atletica['campus']) && !empty($atletica['campus']) ) ? $atletica['campus'] : ''; ?></textarea>
                </div>
                
                <div class="form-group col-md-6 <?php echo ( isset($error) && in_array('qtdeAlunosCurso', $error) ) ? 'has-error' : ''; ?>">
                    <label for="qtdeAlunosCurso" class="col-md-9 margin-left-0">Número de alunos do curso</label>
                    <div class="col-md-3 margin-right-0 margin-bottom">
                        <input type="number" min="1" id="qtdeAlunosCurso" class="form-control" name="qtdeAlunosCurso" value="<?php echo ( isset($post['qtdeAlunosCurso']) && !empty($post['qtdeAlunosCurso']) ) ? $post['qtdeAlunosCurso'] : ( isset($atletica['qtdeAlunosCurso']) && !empty($atletica['qtdeAlunosCurso']) ) ? $atletica['qtdeAlunosCurso'] : ''; ?>">
                    </div>
                </div>
                
                <div class="form-group col-md-6 <?php echo ( isset($error) && in_array('qtdeAlunosFaculdade', $error) ) ? 'has-error' : ''; ?>">    
                    <label for="qtdeAlunosFaculdade" class="col-md-9 margin-left-0">Número de alunos de toda a faculdade</label>
                    <div class="col-md-3 margin-right-0">
                        <input type="number" min="1" id="qtdeAlunosFaculdade" class="form-control" name="qtdeAlunosFaculdade" value="<?php echo ( isset($post['qtdeAlunosFaculdade']) && !empty($post['qtdeAlunosFaculdade']) ) ? $post['qtdeAlunosFaculdade'] : ( isset($atletica['qtdeAlunosFaculdade']) && !empty($atletica['qtdeAlunosFaculdade']) ) ? $atletica['qtdeAlunosFaculdade'] : ''; ?>">
                    </div>
                </div>
                
                <div class="form-group col-md-12 <?php echo ( isset($error) && in_array('salaPropria', $error) ) ? 'has-error' : ''; ?>">
                    <label for="salaPropria">Possui sala própria?</label><br />
                    <label class="font-normal"><input type="radio" name="salaPropria" value="SIM" <?php echo ( isset($atletica['salaPropria']) && $atletica['salaPropria'] == 'SIM' ) ? 'checked' : ( isset($post['salaPropria']) && $post['salaPropria'] == 'SIM' ) ? 'checked' : ''; ?>> Sim</label>&nbsp;
                    <label class="font-normal"><input type="radio" name="salaPropria" value="NÃO" <?php echo ( isset($atletica['salaPropria']) && $atletica['salaPropria'] == 'NÃO' ) ? 'checked' : ( isset($post['salaPropria']) && $post['salaPropria'] == 'NÃO' ) ? 'checked' : ''; ?>> Não</label>
                </div>
                
                <div class="form-group col-md-4 <?php echo ( isset($error) && in_array('repasseFinanceiro', $error) ) ? 'has-error' : ''; ?>">
                    <label for="repasseFinanceiro">Repasse</label>
                    <input type="text" id="repasseFinanceiro" class="form-control" name="repasseFinanceiro" placeholder="Repasse Financeiro" value="<?php echo ( isset($post['repasseFinanceiro']) && !empty($post['repasseFinanceiro']) ) ? $post['repasseFinanceiro'] : ( isset($atletica['repasseFinanceiro']) && !empty($atletica['repasseFinanceiro']) ) ? $atletica['repasseFinanceiro'] : ''; ?>">
                </div>
                
                <div class="clearfix"></div>
                
            </div>
            <!-- FIM PASSO1 -->
            
            <!-- INICIO PASSO2 -->
            <div class="tab-pane <?php echo ( isset($atletica['passoFormulario']) && $atletica['passoFormulario'] == 2 ) ? 'active' : ''; ?>" id="passo_2">
                
                <div class="form-group <?php echo ( isset($error) && in_array('cursos', $error) ) ? 'has-error' : ''; ?>">
                    <?php $atletica['cursos'] = explode(",", $atletica['cursos']); ?>
                    <label for="cursos">Cursos</label>
                    <select name="cursos[]" class="form-control select2" multiple="multiple" data-placeholder="Cursos" style="width: 100%;">
                        <option value="1" <?php echo ( isset($post['cursos']) && in_array(1, $post['cursos']) ) ? 'selected' : ( isset($atletica['cursos']) && in_array(1, $atletica['cursos']) ) ? 'selected' : ''; ?>>Alabama</option>
                        <option value="2" <?php echo ( isset($post['cursos']) && in_array(2, $post['cursos']) ) ? 'selected' : ( isset($atletica['cursos']) && in_array(2, $atletica['cursos']) ) ? 'selected' : ''; ?>>Alaska</option>
                        <option value="3" <?php echo ( isset($post['cursos']) && in_array(3, $post['cursos']) ) ? 'selected' : ( isset($atletica['cursos']) && in_array(3, $atletica['cursos']) ) ? 'selected' : ''; ?>>California</option>
                        <option value="4" <?php echo ( isset($post['cursos']) && in_array(4, $post['cursos']) ) ? 'selected' : ( isset($atletica['cursos']) && in_array(4, $atletica['cursos']) ) ? 'selected' : ''; ?>>Delaware</option>
                        <option value="5" <?php echo ( isset($post['cursos']) && in_array(5, $post['cursos']) ) ? 'selected' : ( isset($atletica['cursos']) && in_array(5, $atletica['cursos']) ) ? 'selected' : ''; ?>>Tennessee</option>
                        <option value="6" <?php echo ( isset($post['cursos']) && in_array(6, $post['cursos']) ) ? 'selected' : ( isset($atletica['cursos']) && in_array(6, $atletica['cursos']) ) ? 'selected' : ''; ?>>Texas</option>
                        <option value="7" <?php echo ( isset($post['cursos']) && in_array(7, $post['cursos']) ) ? 'selected' : ( isset($atletica['cursos']) && in_array(7, $atletica['cursos']) ) ? 'selected' : ''; ?>>Washington</option>
                    </select>
                </div>
                
                <div class="clearfix"></div>
         
            </div>
            <!-- FIM PASSO2 -->
            
            <!-- INICIO PASSO3 -->
            <div class="tab-pane <?php echo ( isset($atletica['passoFormulario']) && $atletica['passoFormulario'] == 3 ) ? 'active' : ''; ?>" id="passo_3">
                
                <div class="form-group <?php echo ( isset($error) && in_array('possuiUniforme', $error) ) ? 'has-error' : ''; ?>">
                    <label>Possui uniforme de equipe?</label><br />
                    <label class="font-normal"><input type="radio" name="possuiUniforme" value="SIM" <?php echo ( isset($post['possuiUniforme']) && $post['possuiUniforme'] == 'SIM' ) ? 'checked' : ( isset($atletica['possuiUniforme']) && $atletica['possuiUniforme'] == 'SIM' ) ? 'checked' : ''; ?>> Sim</label>&nbsp;
                    <label class="font-normal"><input type="radio" name="possuiUniforme" value="NÃO" <?php echo ( isset($post['possuiUniforme']) && $post['possuiUniforme'] == 'NÃO' ) ? 'checked' : ( isset($atletica['possuiUniforme']) && $atletica['possuiUniforme'] == 'NÃO' ) ? 'checked' : ''; ?>> Não</label>
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
                    <textarea name="principaisEventos" class="form-control" rows="10" id="principaisEventos" style="resize: none;"><?php echo ( isset($post['principaisEventos']) && !empty($post['principaisEventos']) ) ? $post['principaisEventos'] : ( isset($atletica['principaisEventos']) && !empty($atletica['principaisEventos']) ) ? $atletica['principaisEventos'] : ''; ?></textarea>
                </div>
                
            </div>
            <!-- FIM PASSO3 -->
            
            <!-- INICIO PASSO4 -->
            <div class="tab-pane <?php echo ( isset($atletica['passoFormulario']) && $atletica['passoFormulario'] == 4 ) ? 'active' : ''; ?>" id="passo_4">
                
                <div class="form-group <?php echo ( isset($error) && in_array('meiosComunicacaoAluno', $error) ) ? 'has-error' : ''; ?>">
                    <?php $atletica['meiosComunicacaoAluno'] = explode(",", $atletica['meiosComunicacaoAluno']); ?>
                    <label for="meiosComunicacaoAluno">Quais os meios de comunicação da atlética com os alunos representados?</label>
                    <select name="meiosComunicacaoAluno[]" id="meiosComunicacaoAluno" class="form-control select2" multiple="multiple" data-placeholder="Meios de Comunicação" style="width: 100%;">
                        <option value="Facebook Perfil" <?php echo ( isset($post['meiosComunicacaoAluno']) && in_array('Facebook Perfil', $post['meiosComunicacaoAluno']) ) ? 'selected' : ( isset($atletica['meiosComunicacaoAluno']) && in_array('Facebook Perfil', $atletica['meiosComunicacaoAluno']) ) ? 'selected' : ''; ?>>Facebook Perfil</option>
                        <option value="Facebook Fanpage" <?php echo ( isset($post['meiosComunicacaoAluno']) && in_array('Facebook Fanpage', $post['meiosComunicacaoAluno']) ) ? 'selected' : ( isset($atletica['meiosComunicacaoAluno']) && in_array('Facebook Fanpage', $atletica['meiosComunicacaoAluno']) ) ? 'selected' : ''; ?>>Facebook Fanpage</option>
                        <option value="Grupos de Whatsapp" <?php echo ( isset($post['meiosComunicacaoAluno']) && in_array('Grupos de Whatsapp', $post['meiosComunicacaoAluno']) ) ? 'selected' : ( isset($atletica['meiosComunicacaoAluno']) && in_array('Grupos de Whatsapp', $atletica['meiosComunicacaoAluno']) ) ? 'selected' : ''; ?>>Grupos de Whatsapp</option>
                        <option value="Instagram" <?php echo ( isset($post['meiosComunicacaoAluno']) && in_array('Instagram', $post['meiosComunicacaoAluno']) ) ? 'selected' : ( isset($atletica['meiosComunicacaoAluno']) && in_array('Instagram', $atletica['meiosComunicacaoAluno']) ) ? 'selected' : ''; ?>>Instagram</option>
                        <option value="Snapchat" <?php echo ( isset($post['meiosComunicacaoAluno']) && in_array('Snapchat', $post['meiosComunicacaoAluno']) ) ? 'selected' : ( isset($atletica['meiosComunicacaoAluno']) && in_array('Snapchat', $atletica['meiosComunicacaoAluno']) ) ? 'selected' : ''; ?>>Snapchat</option>
                        <option value="Twitter" <?php echo ( isset($post['meiosComunicacaoAluno']) && in_array('Twitter', $post['meiosComunicacaoAluno']) ) ? 'selected' : ( isset($atletica['meiosComunicacaoAluno']) && in_array('Twitter', $atletica['meiosComunicacaoAluno']) ) ? 'selected' : ''; ?>>Twitter</option>
                        <option value="Mailling (Lista de email dos Associados)" <?php echo ( isset($post['meiosComunicacaoAluno']) && in_array('Mailling (Lista de email dos Associados)', $post['meiosComunicacaoAluno']) ) ? 'selected' : ( isset($atletica['meiosComunicacaoAluno']) && in_array('Mailling (Lista de email dos Associados)', $atletica['meiosComunicacaoAluno']) ) ? 'selected' : ''; ?>>Mailling (Lista de email dos Associados)</option>
                        <option value="Através do site da Instituição" <?php echo ( isset($post['meiosComunicacaoAluno']) && in_array('Através do site da Instituição', $post['meiosComunicacaoAluno']) ) ? 'selected' : ( isset($atletica['meiosComunicacaoAluno']) && in_array('Através do site da Instituição', $atletica['meiosComunicacaoAluno']) ) ? 'selected' : ''; ?>>Através do site da Instituição</option>
                        <option value="Quadro de Aviso próprio (Mural de Recados)" <?php echo ( isset($post['meiosComunicacaoAluno']) && in_array('Quadro de Aviso próprio (Mural de Recados)', $post['meiosComunicacaoAluno']) ) ? 'selected' : ( isset($atletica['meiosComunicacaoAluno']) && in_array('Quadro de Aviso próprio (Mural de Recados)', $atletica['meiosComunicacaoAluno']) ) ? 'selected' : ''; ?>>Quadro de Aviso próprio (Mural de Recados)</option>
                        <option value="Passagem em sala de aula" <?php echo ( isset($post['meiosComunicacaoAluno']) && in_array('Passagem em sala de aula', $post['meiosComunicacaoAluno']) ) ? 'selected' : ( isset($atletica['meiosComunicacaoAluno']) && in_array('Passagem em sala de aula', $atletica['meiosComunicacaoAluno']) ) ? 'selected' : ''; ?>>Passagem em sala de aula</option>
                        <option value="Ação de ativação de marketing dentro da instituição" <?php echo ( isset($post['meiosComunicacaoAluno']) && in_array('Ação de ativação de marketing dentro da instituição', $post['meiosComunicacaoAluno']) ) ? 'selected' : ( isset($atletica['meiosComunicacaoAluno']) && in_array('Ação de ativação de marketing dentro da instituição', $atletica['meiosComunicacaoAluno']) ) ? 'selected' : ''; ?>>Ação de ativação de marketing dentro da instituição</option>
                    </select>
                </div>
                
                <div class="form-group <?php echo ( isset($error) && in_array('meiosComunicacaoPatrocinadora', $error) ) ? 'has-error' : ''; ?>">
                    <?php $atletica['meiosComunicacaoPatrocinadora'] = explode(",", $atletica['meiosComunicacaoPatrocinadora']); ?>
                    <label for="meiosComunicacaoPatrocinadora">Quais os meios de comunicação que a empresa patrocinadora poderia utilizar para comunicar e apresentar os produtos e serviços aos alunos representados da Atlética?</label>
                    <select name="meiosComunicacaoPatrocinadora[]" id="meiosComunicacaoPatrocinadora" class="form-control select2" multiple="multiple" data-placeholder="Meios de Comunicação da Patrocinadora" style="width: 100%;">
                        <option value="Facebook Perfil" <?php echo ( isset($post['meiosComunicacaoPatrocinadora']) && in_array('Facebook Perfil', $post['meiosComunicacaoPatrocinadora']) ) ? 'selected' : ( isset($atletica['meiosComunicacaoPatrocinadora']) && in_array('Facebook Perfil', $atletica['meiosComunicacaoPatrocinadora']) ) ? 'selected' : ''; ?>>Facebook Perfil</option>
                        <option value="Facebook Fanpage" <?php echo ( isset($post['meiosComunicacaoPatrocinadora']) && in_array('Facebook Fanpage', $post['meiosComunicacaoPatrocinadora']) ) ? 'selected' : ( isset($atletica['meiosComunicacaoPatrocinadora']) && in_array('Facebook Fanpage', $atletica['meiosComunicacaoPatrocinadora']) ) ? 'selected' : ''; ?>>Facebook Fanpage</option>
                        <option value="Grupos de Whatsapp" <?php echo ( isset($post['meiosComunicacaoPatrocinadora']) && in_array('Grupos de Whatsapp', $post['meiosComunicacaoPatrocinadora']) ) ? 'selected' : ( isset($atletica['meiosComunicacaoPatrocinadora']) && in_array('Grupos de Whatsapp', $atletica['meiosComunicacaoPatrocinadora']) ) ? 'selected' : ''; ?>>Grupos de Whatsapp</option>
                        <option value="Instagram" <?php echo ( isset($post['meiosComunicacaoPatrocinadora']) && in_array('Instagram', $post['meiosComunicacaoPatrocinadora']) ) ? 'selected' : ( isset($atletica['meiosComunicacaoPatrocinadora']) && in_array('Instagram', $atletica['meiosComunicacaoPatrocinadora']) ) ? 'selected' : ''; ?>>Instagram</option>
                        <option value="Snapchat" <?php echo ( isset($post['meiosComunicacaoPatrocinadora']) && in_array('Snapchat', $post['meiosComunicacaoPatrocinadora']) ) ? 'selected' : ( isset($atletica['meiosComunicacaoPatrocinadora']) && in_array('Snapchat', $atletica['meiosComunicacaoPatrocinadora']) ) ? 'selected' : ''; ?>>Snapchat</option>
                        <option value="Twitter" <?php echo ( isset($post['meiosComunicacaoPatrocinadora']) && in_array('Twitter', $post['meiosComunicacaoPatrocinadora']) ) ? 'selected' : ( isset($atletica['meiosComunicacaoPatrocinadora']) && in_array('Twitter', $atletica['meiosComunicacaoPatrocinadora']) ) ? 'selected' : ''; ?>>Twitter</option>
                        <option value="Mailling (Lista de email dos Associados)" <?php echo ( isset($post['meiosComunicacaoPatrocinadora']) && in_array('Mailling (Lista de email dos Associados)', $post['meiosComunicacaoPatrocinadora']) ) ? 'selected' : ( isset($atletica['meiosComunicacaoPatrocinadora']) && in_array('Mailling (Lista de email dos Associados)', $atletica['meiosComunicacaoPatrocinadora']) ) ? 'selected' : ''; ?>>Mailling (Lista de email dos Associados)</option>
                        <option value="Através do site da Instituição" <?php echo ( isset($post['meiosComunicacaoPatrocinadora']) && in_array('Através do site da Instituição', $post['meiosComunicacaoPatrocinadora']) ) ? 'selected' : ( isset($atletica['meiosComunicacaoPatrocinadora']) && in_array('Através do site da Instituição', $atletica['meiosComunicacaoPatrocinadora']) ) ? 'selected' : ''; ?>>Através do site da Instituição</option>
                        <option value="Quadro de Aviso próprio (Mural de Recados)" <?php echo ( isset($post['meiosComunicacaoPatrocinadora']) && in_array('Quadro de Aviso próprio (Mural de Recados)', $post['meiosComunicacaoPatrocinadora']) ) ? 'selected' : ( isset($atletica['meiosComunicacaoPatrocinadora']) && in_array('Quadro de Aviso próprio (Mural de Recados)', $atletica['meiosComunicacaoPatrocinadora']) ) ? 'selected' : ''; ?>>Quadro de Aviso próprio (Mural de Recados)</option>
                        <option value="Passagem em sala de aula" <?php echo ( isset($post['meiosComunicacaoPatrocinadora']) && in_array('Passagem em sala de aula', $post['meiosComunicacaoPatrocinadora']) ) ? 'selected' : ( isset($atletica['meiosComunicacaoPatrocinadora']) && in_array('Passagem em sala de aula', $atletica['meiosComunicacaoPatrocinadora']) ) ? 'selected' : ''; ?>>Passagem em sala de aula</option>
                        <option value="Ação de ativação de marketing dentro da instituição" <?php echo ( isset($post['meiosComunicacaoPatrocinadora']) && in_array('Ação de ativação de marketing dentro da instituição', $post['meiosComunicacaoPatrocinadora']) ) ? 'selected' : ( isset($atletica['meiosComunicacaoPatrocinadora']) && in_array('Ação de ativação de marketing dentro da instituição', $atletica['meiosComunicacaoPatrocinadora']) ) ? 'selected' : ''; ?>>Ação de ativação de marketing dentro da instituição</option>
                    </select>
                </div>
                
                <div class="clearfix"></div>
                
            </div>
            <!-- FIM PASSO4 -->
            
            <!-- INICIO PASSO5 -->
            <div class="tab-pane <?php echo ( isset($atletica['passoFormulario']) && $atletica['passoFormulario'] == 5 ) ? 'active' : ''; ?>" id="passo_5">
                
                <div class="form-group <?php echo ( isset($error) && in_array('patrocinio', $error) ) ? 'has-error' : ''; ?>">
                    <label for="patrocinio">Possui algum Patrocínio?</label>
                    <input type="text" id="patrocinio" class="form-control" name="patrocinio" placeholder="Se sim, qual?" value="<?php echo ( isset($post['patrocinio']) && !empty($post['patrocinio']) ) ? $post['patrocinio'] : ( isset($atletica['patrocinio']) && !empty($atletica['patrocinio']) ) ? $atletica['patrocinio'] : ''; ?>">
                </div>
                
                <div class="form-group <?php echo ( isset($error) && in_array('patrocinioCervejaria', $error) ) ? 'has-error' : ''; ?>">
                    <label for="patrocinioCervejaria">Possui patrocínio de alguma cervejaria?</label>
                    <input type="text" id="patrocinioCervejaria" class="form-control" name="patrocinioCervejaria" placeholder="Se sim, qual?" value="<?php echo ( isset($post['patrocinioCervejaria']) && !empty($post['patrocinioCervejaria']) ) ? $post['patrocinioCervejaria'] : ( isset($atletica['patrocinioCervejaria']) && !empty($atletica['patrocinioCervejaria']) ) ? $atletica['patrocinioCervejaria'] : ''; ?>">
                </div>
                
                <div class="form-group <?php echo ( isset($error) && in_array('patrocinioEnergetico', $error) ) ? 'has-error' : ''; ?>">
                    <label for="patrocinioEnergetico">Possui patrocínio de alguma empresa de energético?</label>
                    <input type="text" id="patrocinioEnergetico" class="form-control" name="patrocinioEnergetico" placeholder="Se sim, qual?" value="<?php echo ( isset($post['patrocinioEnergetico']) && !empty($post['patrocinioEnergetico']) ) ? $post['patrocinioEnergetico'] : ( isset($atletica['patrocinioEnergetico']) && !empty($atletica['patrocinioEnergetico']) ) ? $atletica['patrocinioEnergetico'] : ''; ?>">
                </div>
                
                <div class="form-group <?php echo ( isset($error) && in_array('patrocinioCerimonial', $error) ) ? 'has-error' : ''; ?>">
                    <label for="patrocinioCerimonial">Possui patrocínio de alguma empresa de cerimonial de formaturas?</label>
                    <input type="text" id="patrocinioCerimonial" class="form-control" name="patrocinioCerimonial" placeholder="Se sim, qual?" value="<?php echo ( isset($post['patrocinioCerimonial']) && !empty($post['patrocinioCerimonial']) ) ? $post['patrocinioCerimonial'] : ( isset($atletica['patrocinioCerimonial']) && !empty($atletica['patrocinioCerimonial']) ) ? $atletica['patrocinioCerimonial'] : ''; ?>">
                </div>
                
                <div class="form-group">
                    <label for="observacao">Gostaria de deixar alguma observação? Se sim, escreva abaixo:</label>
                    <textarea name="observacao" class="form-control" rows="5" id="observacao" style="resize: none;"><?php echo ( isset($post['observacao']) && !empty($post['observacao']) ) ? $post['observacao'] : ( isset($atletica['observacao']) && !empty($atletica['observacao']) ) ? $atletica['observacao'] : ''; ?></textarea>
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
                    <label for="urlLogo">UPLOAD da logo VETORIZADA em COREL/ILUSTRADOR/PNG SEM FUNDO COM 300dpis - Arquivo em PDF ou WORD</label>
                    <input type="file" name="urlLogo" id="urlLogo" />
                </div>
                
            </div>
            <!-- FIM PASSO5 -->
            
          <!-- /.tab-pane -->
        </div>
        <!-- /.tab-content -->
    </div>

    <div class="form-group">
        <a href="<?php echo BASE_URL; ?>/clientes" class="btn btn-primary">Cancelar</a>
        <input type="submit" value="Atualizar" name="frmAtletica" class="btn btn-primary" />
    </div>
    
</form>