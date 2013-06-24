<h2>Listing <span class='muted'>Bloblos</span></h2>
<br>
<?php if ($bloblos): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($bloblos as $bloblo): ?>		<tr>

			<td>
				<?php echo Html::anchor('bloblo/view/'.$bloblo->id, '<i class="icon-eye-open" title="View"></i>'); ?> |
				<?php echo Html::anchor('bloblo/edit/'.$bloblo->id, '<i class="icon-wrench" title="Edit"></i>'); ?> |
				<?php echo Html::anchor('bloblo/delete/'.$bloblo->id, '<i class="icon-trash" title="Delete"></i>', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Bloblos.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('bloblo/create', 'Add new Bloblo', array('class' => 'btn btn-success')); ?>

</p>
