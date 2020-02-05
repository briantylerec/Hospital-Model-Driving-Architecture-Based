<h1 class="page-header">Manejo tabla Estudiante</h1>
	<a class="btn btn-primary pull-left" href="index.html">Regresar</a>
    <a class="btn btn-primary pull-right" href="?c=Estudiante&a=CrudAdd">Agregar</a>
<br><br><br>

<table class="table  table-striped  table-hover" id="tabla">
    <thead>
        <tr>
        <th style="width:120px; background-color: #5DACCD; color:#fff">idEstudiante</th>            
        <th style="width:120px; background-color: #5DACCD; color:#fff">nombre</th>            
        <th style="width:120px; background-color: #5DACCD; color:#fff">apellido</th>            
        <th style="width:120px; background-color: #5DACCD; color:#fff">email</th>            
        <th style="width:120px; background-color: #5DACCD; color:#fff">idCarrera</th>            
        <th style="width:120px; background-color: #5DACCD; color:#fff">esBecado</th>            
        <th style="width:120px; background-color: #5DACCD; color:#fff">edad</th>            
        <th style="width:120px; background-color: #5DACCD; color:#fff">fechanacimiento</th>            

		<th style="width:60px; background-color: #5DACCD; color:#fff"></th>
        <th style="width:60px; background-color: #5DACCD; color:#fff"></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($this->model->Listar() as $r): ?>
        <tr>
					<td><?php echo $r->idEstudiante; ?></td>
				
					<td><?php echo $r->nombre; ?></td>
				
					<td><?php echo $r->apellido; ?></td>
				
					<td><?php echo $r->email; ?></td>
				
					<td><?php echo $r->idCarrera; ?></td>
				
					<td><?php echo $r->esBecado; ?></td>
				
					<td><?php echo $r->edad; ?></td>
				
					<td><?php echo $r->fechanacimiento; ?></td>
				
				<td><a  class="btn btn-warning" href="?c=Estudiante&a=Crud&idEstudiante=<?php echo $r->idEstudiante; ?>">Editar</a></td>
         		<td><a  class="btn btn-danger" onclick="javascript:return confirm('?Seguro de eliminar este registro?');" href="?c=Estudiante&a=Eliminar&idEstudiante=<?php echo $r->idEstudiante; ?>">Eliminar</a></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table> 
</body>
<script  src="assets/js/datatable.js">  
</script>
</html>
