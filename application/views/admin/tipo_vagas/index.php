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
									<h3 class="box-title"><?php echo anchor('admin/tipo_vagas/create', '<i class="fa fa-plus"></i> '. lang('users_create_user'), array('class' => 'btn btn-block btn-primary btn-flat')); ?></h3>
								</div>
								<div class="box-body">
									<table class="table table-striped table-hover">
										<thead>
											<tr>
												<th>Tipo de Vaga</th>	
                                                <th>Status</th>				
                                                <th>Acoes</th>														
											</tr>
										</thead>
										<tbody>
<?php foreach ($tipo_vagas as $vaga):?>
											<tr>
												<td><?php echo $vaga->titulo; ?></td>											
												<td><?php echo ($vaga->active) ? anchor('admin/users/deactivate/'.$vaga->id, '<span class="label label-success">'.lang('users_active').'</span>') : anchor('admin/users/activate/'. $vaga->id, '<span class="label label-default">'.lang('users_inactive').'</span>'); ?></td>
												<td>
												<?php echo anchor('admin/users/edit/'.$vaga->id, "<span class=\"glyphicon glyphicon-pencil\"></span>"); ?>
												&ensp;
												<?php echo anchor('admin/users/profile/'.$vaga->id, "<span class=\"glyphicon glyphicon-search\"></span>"); ?>
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
