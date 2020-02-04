<h1 class="page-header">
    Registro Facultad
</h1>

<ol class="breadcrumb">
  <li><a href="?c=Facultad">Facultad</a></li>
</ol>

<form id="frm-alumno" action="?c=Facultad&a=Modificar" method="post" enctype="multipart/form-data">      
			<input type="hidden" name="id" value="<?php echo $Facultad->idFacultad; ?>" />
	
			<div class="form-group">
        		<label>idFacultad</label>
        		<input type="text" name="idFacultad" value="<?php echo $Facultad->idFacultad; ?>" class="form-control" placeholder="Ingrese idFacultad" required>
    		</div>
			<div class="form-group">
        		<label>nombre</label>
        		<input type="text" name="nombre" value="<?php echo $Facultad->nombre; ?>" class="form-control" placeholder="Ingrese nombre" required>
    		</div>
    <hr />
    
    <div class="text-right">
        <button class="btn btn-primary">Actualizar</button>
    </div>
</form>

<script>
    $(document).ready(function(){
        $("#frm-alumno").submit(function(){
            return $(this).validate();
        });
    })
</script>
