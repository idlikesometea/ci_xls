<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>XLS EXPORT TEST</title>
</head>
<style>
	body{
		background: whitesmoke;
	}
	table{
		margin: 100px auto 0;
		
	}
	table, th, td{
		border: 1px solid black;
		border-radius: 3px;
		text-align: center;
		min-width: 60px;
	}
	.header{
		position: absolute;
		width: 100%;
		height: 60px;
		background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#7d7e7d), color-stop(100%,#0e0e0e));
		top: 0;
		left: 0;
		box-shadow: 0 0 10px 0 #000;
	}
	.header p{
		text-align: center;
		color: #FFF;
		font-size: 16px;
		font-weight: 500;
	}
	.btn-container{
		text-align: center;
	}
	.btn-export{
		text-decoration: none;
	}
</style>
<body>
	<div class="header">
		<p>XLS EXPORT CI TEST</p>
	</div>
	<table>
		<thead>
			<th>Año</th>
			<th>Clics</th>
			<th>Impresiones</th>
			<th>Visitas</th>
		</thead>
		<tbody>
		<?php $i = 1; foreach ($datos as $key) { ?>
			<tr>
				<td><?php echo '200'.$i; ?></td>
				<td><?php echo $key->clics; ?></td>
				<td><?php echo $key->impresiones; ?></td>
				<td><?php echo $key->visitas; ?></td>
			</tr>
		<?php $i++; } ?>
		</tbody>
	</table>
	<div class="btn-container">
		<?php echo anchor('xls/export_xls_chart', 'Export XLS', 'target="_blank" class="btn-export"'); ?>
	</div>
	
</body>
</html>