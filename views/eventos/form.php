<form action="" method="post" enctype="multipart/form-data">
        
    <div class="row">
        <div class="form-group col-md-6">
            <label for="nome">Nome</label>
            <input type="text" id="nome" class="form-control" name="nome" placeholder="Nome do Evento" value="<?php if( isset($evento['nome']) ) { echo $evento['nome']; } ?>" required="required">
        </div>
    </div>

    <div class="row">
        <div class="form-group col-md-6">
            <label for="mes">Mês</label>
            <select id="mes" class="form-control" name="mes" required="required">
                <option value="Janeiro" <?php echo (isset($evento['mes']) && $evento['mes'] == 'Janeiro') ? 'selected' : ''; ?>>Janeiro</option>
                <option value="Fevereiro" <?php echo (isset($evento['mes']) && $evento['mes'] == 'Fevereiro') ? 'selected' : ''; ?>>Fevereiro</option>
                <option value="Março" <?php echo (isset($evento['mes']) && $evento['mes'] == 'Março') ? 'selected' : ''; ?>>Março</option>
                <option value="Abril" <?php echo (isset($evento['mes']) && $evento['mes'] == 'Abril') ? 'selected' : ''; ?>>Abril</option>
                <option value="Maio" <?php echo (isset($evento['mes']) && $evento['mes'] == 'Maio') ? 'selected' : ''; ?>>Maio</option>
                <option value="Junho" <?php echo (isset($evento['mes']) && $evento['mes'] == 'Junho') ? 'selected' : ''; ?>>Junho</option>
                <option value="Julho" <?php echo (isset($evento['mes']) && $evento['mes'] == 'Julho') ? 'selected' : ''; ?>>Julho</option>
                <option value="Agosto" <?php echo (isset($evento['mes']) && $evento['mes'] == 'Agosto') ? 'selected' : ''; ?>>Agosto</option>
                <option value="Setembro" <?php echo (isset($evento['mes']) && $evento['mes'] == 'Setembro') ? 'selected' : ''; ?>>Setembro</option>
                <option value="Outubro" <?php echo (isset($evento['mes']) && $evento['mes'] == 'Outubro') ? 'selected' : ''; ?>>Outubro</option>
                <option value="Novembro" <?php echo (isset($evento['mes']) && $evento['mes'] == 'Novembro') ? 'selected' : ''; ?>>Novembro</option>
                <option value="Dezembro" <?php echo (isset($evento['mes']) && $evento['mes'] == 'Dezembro') ? 'selected' : ''; ?>>Dezembro</option>
            </select>
        </div>
    </div>

    <div class="row">
        <div class="form-group col-md-6">
            <label for="frequencia">Frequência</label>
            <select id="frequencia" class="form-control" name="frequencia" required="required">
                <option value="Mensal" <?php echo (isset($evento['frequencia']) && $evento['frequencia'] == 'Mensal') ? 'selected' : ''; ?>>Mensal</option>
                <option value="Bimestral" <?php echo (isset($evento['frequencia']) && $evento['frequencia'] == 'Bimestral') ? 'selected' : ''; ?>>Bimestral</option>
                <option value="Semestral" <?php echo (isset($evento['frequencia']) && $evento['frequencia'] == 'Semestral') ? 'selected' : ''; ?>>Semestral</option>
                <option value="Anual" <?php echo (isset($evento['frequencia']) && $evento['frequencia'] == 'Anual') ? 'selected' : ''; ?>>Anual</option>
            </select>
        </div>
    </div>
    
    <div class="row">
        <div class="form-group col-md-6">
            <label for="url">Fotos - Arquivo em PNG ou JPG - Tamanho: 3MB</label>
            <input type="file" name="url[]" id="url" multiple="multiple" />
        </div>
    </div>

    <div class="form-group">
        <a href="<?php echo BASE_URL; ?>/eventos" class="btn btn-primary">Cancelar</a>
        <input type="submit" value="<?php echo $botao; ?>" name="frmEvento" class="btn btn-primary" />
    </div>
    
</form>