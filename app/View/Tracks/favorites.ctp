<div class="actions span3 well">
	<h3><?php echo __('Actions'); ?></h3>
	
</div>

<div class="tracks index span11">
	<h2><?php echo __('Favorite Tracks'); ?></h2>
    
    <table cellpadding="0" cellspacing="0" class="table table-striped">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('title'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr> 
	<?php foreach ($tracks as $track): ?>
	<tr>
		<td><?php echo h($track['Track']['id']); ?>&nbsp;</td>
		<td><?php echo $this->Html->link($track['Track']['title'], 'javascript:App.play("'.$track['Track']['id'].'")'); ?>&nbsp;</td>
		<td class="actions" style="width:160px">
            <?php echo $this->Favorites->toggleFavorite('favorite', $track['Track']['id'] , '<i class="icon-star"></i>', '<i class="icon-star-off"></i>', array('escape' => false, 'class' => 'btn btn-warning btn-mini', 'title' => 'Salvar/Remover dos Favoritos')); ?>            
			<?php echo $this->Html->link('<i class="icon-list-alt"></i>', array('action' => 'view', $track['Track']['id']), array('escape' => false, 'class' => 'btn btn-mini btn-success', 'title' => 'Ver Detalhes')); ?>
			<?php echo $this->Html->link('<i class="icon-edit"></i>', array('action' => 'edit', $track['Track']['id']), array('escape' => false, 'class' => 'btn btn-mini btn-info', 'title' => 'Editar')); ?>
			<?php echo $this->Form->postLink('<i class="icon-trash"></i>', array('action' => 'delete', $track['Track']['id']), array('class' => 'btn btn-danger btn-mini', 'escape' => false, 'title' => 'Excluir'), __('Are you sure you want to delete # %s?', $track['Track']['id'])); ?>
		</td> 
	</tr> 
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
        $this->Paginator->options(array('url' => $this->passedArgs));
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>

