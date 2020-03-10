<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>

<div class="content-wrapper">
	<section class="content-header">
		<?php echo $pagetitle; ?>
		<?php echo $breadcrumb; ?>
	</section>

	<section class="content">
		<div class="row">
			<div class="col-md-12">
					<div class="box">
					<div class="box-header with-border">
						<h3 class="box-title"><?php echo anchor('admin/tipocontrato/create', '<i class="fa fa-plus"></i> '. 'Adicionar Tipos de Contratos', array('class' => 'btn btn-block btn-primary btn-flat')); ?></h3>
					</div>
					<div class="box-body">
						<table class="table table-striped table-hover">
							<thead>
								<tr>
									<th>ID</th>	
									<th>Nome do Contrato</th>		
									<th>Ações</th>														
								</tr>
							</thead>
							<tbody>
						
							<?php foreach ($contratos as $contrato):?>
								<tr>
									<td><?php echo $contrato->id; ?></td>	
									<td><?php echo $contrato->nome; ?></td>											
									<td><?php echo ($contrato->active) ? anchor('admin/users/deactivate/'.$contrato->id, '<span class="label label-success">'.lang('users_active').'</span>') : anchor('admin/users/activate/'. $contrato->id, '<span class="label label-default">'.lang('users_inactive').'</span>'); ?></td>
									<td>
									<?php echo anchor('admin/users/edit/'.$contrato->id, "<span class=\"glyphicon glyphicon-pencil\"></span>"); ?>
									&ensp;
									<?php echo anchor('admin/users/profile/'.$contrato->id, "<span class=\"glyphicon glyphicon-search\"></span>"); ?>
									</td>
								</tr>
<?php endforeach;?>
							</tbody>
						</table>
					</div>
				</div>
				</div>
		</div>
	</section>
</div>
