<form action="" method="post" enctype="multipart/form-data">
        
    <div class="row">
        <div class="form-group col-md-6">
            <label for="nome">Nome</label>
            <input type="text" id="nome" class="form-control" name="nome" placeholder="Nome do Evento" value="<?php if( isset($evento['nome']) ) { echo $evento['nome']; } ?>" required="required">
        </div>
    </div>
    
    <div class="row">
        <div class="form-group col-md-6">
            <label for="url">Fotos - Arquivo em PNG ou JPG</label>
            <input type="file" name="url[]" id="url" multiple="multiple" />
        </div>
    </div>

    <div class="form-group">
        <a href="<?php echo BASE_URL; ?>/eventos" class="btn btn-primary">Cancelar</a>
        <input type="submit" value="<?php echo $botao; ?>" name="frmEvento" class="btn btn-primary" />
    </div>
    
</form>