<h1 class="page-header">
    Registro Estudiante
</h1>

<ol class="breadcrumb">
  <li><a href="?c=Estudiante">Estudiante</a></li>
</ol>

<form id="frm-alumno" action="?c=Estudiante&a=Guardar" method="post" enctype="multipart/form-data">      
			<input type="hidden" name="id" value="<?php echo $Estudiante->idEstudiante; ?>" />
	
			<div class="form-group">
        		<label>idEstudiante</label>
        		<input type="text" name="idEstudiante" value="<?php echo $Estudiante->idEstudiante; ?>" class="form-control" placeholder="Ingrese idEstudiante" required>
    		</div>
			<div class="form-group">
        		<label>nombre</label>
        		<input type="text" name="nombre" value="<?php echo $Estudiante->nombre; ?>" class="form-control" placeholder="Ingrese nombre" required>
    		</div>
			<div class="form-group">
        		<label>apellido</label>
        		<input type="text" name="apellido" value="<?php echo $Estudiante->apellido; ?>" class="form-control" placeholder="Ingrese apellido" required>
    		</div>
			<div class="form-group">
        		<label>email</label>
        		<input type="text" name="email" value="<?php echo $Estudiante->email; ?>" class="form-control" placeholder="Ingrese email" required>
    		</div>
			<div class="form-group">
        		<label>idCarrera</label>
        		<input type="text" name="idCarrera" value="<?php echo $Estudiante->idCarrera; ?>" class="form-control" placeholder="Ingrese idCarrera" required>
    		</div>
			<div class="form-group">
        		<label>esBecado</label>
        		<input type="text" name="esBecado" value="<?php echo $Estudiante->esBecado; ?>" class="form-control" placeholder="Ingrese esBecado" required>
    		</div>
			<div class="form-group">
        		<label>edad</label>
        		<input type="text" name="edad" value="<?php echo $Estudiante->edad; ?>" class="form-control" placeholder="Ingrese edad" required>
    		</div>
			<div class="form-group">
        		<label>fechanacimiento</label>
        		<input type="text" name="fechanacimiento" value="<?php echo $Estudiante->fechanacimiento; ?>" class="form-control" placeholder="Ingrese fechanacimiento" required>
    		</div>
    <hr />
    
    <div class="text-right">
        <button class="btn btn-primary">Guardar</button>
    </div>
</form>

<script>
    $(document).ready(function(){
        $("#frm-alumno").submit(function(){
            return $(this).validate();
        });
    })
</script>
