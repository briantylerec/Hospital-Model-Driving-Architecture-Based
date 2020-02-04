<h1 class="page-header">
    Registro Carrera
</h1>

<ol class="breadcrumb">
  <li><a href="?c=Carrera">Carrera</a></li>
</ol>

<form id="frm-alumno" action="?c=Carrera&a=Modificar" method="post" enctype="multipart/form-data">      
			<input type="hidden" name="id" value="<?php echo $Carrera->idCarrera; ?>" />
	
			<div class="form-group">
        		<label>idCarrera</label>
        		<input type="text" name="idCarrera" value="<?php echo $Carrera->idCarrera; ?>" class="form-control" placeholder="Ingrese idCarrera" required>
    		</div>
			<div class="form-group">
        		<label>nombre</label>
        		<input type="text" name="nombre" value="<?php echo $Carrera->nombre; ?>" class="form-control" placeholder="Ingrese nombre" required>
    		</div>
			<div class="form-group">
        		<label>idFacultad</label>
        		<input type="text" name="idFacultad" value="<?php echo $Carrera->idFacultad; ?>" class="form-control" placeholder="Ingrese idFacultad" required>
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
