<h1 class="page-header">Manejo tabla Carrera</h1>
	<a class="btn btn-primary pull-left" href="index.html">Regresar</a>
    <a class="btn btn-primary pull-right" href="?c=Carrera&a=CrudAdd">Agregar</a>
<br><br><br>

<table class="table  table-striped  table-hover" id="tabla">
    <thead>
        <tr>
        <th style="width:120px; background-color: #5DACCD; color:#fff">idCarrera</th>            
        <th style="width:120px; background-color: #5DACCD; color:#fff">nombre</th>            
        <th style="width:120px; background-color: #5DACCD; color:#fff">idFacultad</th>            
		<th style="width:60px; background-color: #5DACCD; color:#fff"></th>
        <th style="width:60px; background-color: #5DACCD; color:#fff"></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($this->model->Listar() as $r): ?>
        <tr>
					<td><?php echo $r->idCarrera; ?></td>
				
					<td><?php echo $r->nombre; ?></td>
				
					<td><?php echo $r->idFacultad; ?></td>
				
				<td><a  class="btn btn-warning" href="?c=Carrera&a=Crud&idCarrera=<?php echo $r->idCarrera; ?>">Editar</a></td>
         		<td><a  class="btn btn-danger" onclick="javascript:return confirm('?Seguro de eliminar este registro?');" href="?c=Carrera&a=Eliminar&idCarrera=<?php echo $r->idCarrera; ?>">Eliminar</a></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table> 
</body>
<script  src="assets/js/datatable.js">  
</script>
</html>
