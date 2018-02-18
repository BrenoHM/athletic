<form action="" method="post" enctype="multipart/form-data">
    
    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#passo_1" data-toggle="tab">Passo 1</a></li>
            <li><a href="#passo_2" data-toggle="tab">Passo 2</a></li>
            <li><a href="#passo_3" data-toggle="tab">Passo 3</a></li>
            <li><a href="#passo_4" data-toggle="tab">Passo 4</a></li>
            <li><a href="#passo_5" data-toggle="tab">Passo 5</a></li>
        </ul>
        <div class="tab-content">
            
            <!-- INICIO PASSO1 -->
            <div class="tab-pane active" id="passo_1">
                
                <div class="form-group col-md-2">
                    <label for="">Possui registro em cartório</label><br />
                    <label class="font-normal"><input type="radio" id="" name="registroCartorio" value="SIM" <?php echo ( isset($atletica['registroCartorio']) && $atletica['registroCartorio'] == 'SIM' ) ? 'checked' : ''; ?>> Sim</label>&nbsp;
                    <label class="font-normal"><input type="radio" id="" name="registroCartorio" value="NÃO" <?php echo ( isset($atletica['registroCartorio']) && $atletica['registroCartorio'] == 'NÃO' ) ? 'checked' : ''; ?>> Não</label>
                </div>
                
                <div class="form-group col-md-4">
                    <label for="cnpj">CNPJ</label>
                    <input type="text" id="cnpj" class="form-control" name="cnpj" placeholder="CNPJ da Atlética" value="<?php echo isset($atletica['cnpj']) ? $atletica['cnpj'] : ''; ?>">
                </div>
                
                <div class="form-group col-md-6">
                    <label for="idUniversidade">Universidade</label>
                    <select class="form-control select2" name="idUniversidade" id="idUniversidade" style="width: 100%;">
                        <option value="">Selecione</option>
                        <?php foreach ( $universidades as $universidade ): ?>
                            <option value="<?php echo $universidade['idUniversidade']; ?>"><?php echo $universidade['nome']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                
                <div class="form-group col-md-6">
                    <label for="qtdeCampos" class="col-md-9 margin-left-0">Quantos Campus a Atlética tem representação dentro da Faculdade/Universidade?</label>
                    <div class="col-md-3 margin-right-0">
                        <input type="number" id="qtdeCampos" class="form-control" name="qtdeCampos" value="<?php echo isset($atletica['qtdeCampos']) ? $atletica['qtdeCampos'] : ''; ?>">
                    </div>
                    
                    <label for="campus">Quais?</label>
                    <textarea class="form-control" rows="5" id="campus"><?php echo isset($atletica['campus']) ? $atletica['campus'] : ''; ?></textarea>
                </div>
                
                <div class="form-group col-md-6">
                    <label for="qtdeAlunosCurso" class="col-md-9 margin-left-0">Número de alunos do curso</label>
                    <div class="col-md-3 margin-right-0 margin-bottom">
                        <input type="number" id="qtdeAlunosCurso" class="form-control" name="qtdeAlunosCurso" value="<?php echo isset($atletica['qtdeAlunosCurso']) ? $atletica['qtdeAlunosCurso'] : ''; ?>">
                    </div>
                    
                    <label for="qtdeAlunosFaculdade" class="col-md-9 margin-left-0">Número de alunos de toda a faculdade</label>
                    <div class="col-md-3 margin-right-0">
                        <input type="number" id="qtdeAlunosFaculdade" class="form-control" name="qtdeAlunosFaculdade" value="<?php echo isset($atletica['qtdeAlunosFaculdade']) ? $atletica['qtdeAlunosFaculdade'] : ''; ?>">
                    </div>
                </div>
                
                <div class="form-group col-md-2">
                    <label for="salaPropria">Possui sala própria?</label><br />
                    <label class="font-normal"><input type="radio" name="salaPropria" value="SIM" <?php echo ( isset($atletica['salaPropria']) && $atletica['salaPropria'] == 'SIM' ) ? 'checked' : ''; ?>> Sim</label>&nbsp;
                    <label class="font-normal"><input type="radio" name="salaPropria" value="NÃO" <?php echo ( isset($atletica['salaPropria']) && $atletica['salaPropria'] == 'NÃO' ) ? 'checked' : ''; ?>> Não</label>
                </div>
                
                <div class="form-group col-md-4">
                    <label for="repasseFinanceiro">Repasse</label>
                    <input type="text" id="repasseFinanceiro" class="form-control" name="repasseFinanceiro" placeholder="Repasse Financeiro" value="<?php echo isset($atletica['repasseFinanceiro']) ? $atletica['repasseFinanceiro'] : ''; ?>">
                </div>
                
                <div class="clearfix"></div>
                
            </div>
            <!-- FIM PASSO1 -->
            
            <!-- INICIO PASSO2 -->
            <div class="tab-pane" id="passo_2">
                
                <label for="cursos">Cursos</label>
                <div class="form-group">
                    <select name="cursos[]" class="form-control select2" multiple="multiple" data-placeholder="Cursos" style="width: 100%;">
                        <option value="1">Alabama</option>
                        <option value="2">Alaska</option>
                        <option value="3">California</option>
                        <option value="4">Delaware</option>
                        <option value="5">Tennessee</option>
                        <option value="6">Texas</option>
                        <option value="7">Washington</option>
                    </select>
                </div>
                
                <div class="clearfix"></div>
         
            </div>
            <!-- FIM PASSO2 -->
            
            <!-- INICIO PASSO3 -->
            <div class="tab-pane" id="passo_3">
                Passo3
            </div>
            <!-- FIM PASSO3 -->
            
            <div class="tab-pane" id="passo_4">
                Passo4
            </div>
            
            <div class="tab-pane" id="passo_5">
                Passo5
            </div>
            
          <!-- /.tab-pane -->
        </div>
        <!-- /.tab-content -->
    </div>

    <div class="form-group">
        <a href="<?php echo BASE_URL; ?>/clientes" class="btn btn-primary">Cancelar</a>
        <input type="submit" value="Editar" name="frmCliente" class="btn btn-primary" />
    </div>
    
</form>