<form action="" method="post" enctype="multipart/form-data">
            
    <div class="col-md-12">
        
        <div class="form-group">
            <label for="nomCli">Nome</label>
            <input type="text" id="nomCli" class="form-control" name="nomCli" placeholder="Nome do Cliente" value="<?php echo isset($cliente['nomCli']) ? $cliente['nomCli'] : ''; ?>">
        </div>
        
        <div class="form-group">
            <label for="urlCli">Site do Cliente</label>
            <input type="text" id="urlCli" class="form-control" name="urlCli" placeholder="Site do Cliente" value="<?php echo isset($cliente['urlCli']) ? $cliente['urlCli'] : ''; ?>">
        </div>
        
        <div class="form-group">
            <label for="imgCli">Logomarca (Resolução: 384px X 317px)</label>
            <input type="file" class="form-control" name="imgCli" id="imgCli">
        </div>
        
        <div class="form-group">
            <a href="<?php echo BASE_URL; ?>/clientes" class="btn btn-primary">Cancelar</a>
            <input type="submit" value="Editar" name="frmCliente" class="btn btn-primary" />
        </div>
        
    </div>
    
</form>