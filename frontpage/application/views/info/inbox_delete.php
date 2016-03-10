<table class="table table-striped table-advance table-hover">
<thead>
<tr>
	<th colspan="3">
		<input type="checkbox" class="mail-checkbox mail-group-checkbox">
		<div class="btn-group">
			<a class="btn btn-sm blue dropdown-toggle" href="javascript:;" data-toggle="dropdown">
			More <i class="fa fa-angle-down"></i>
			</a>
			<ul class="dropdown-menu">
				<li class="fa-trash-do">
					<a href="javascript:;">
					<i class="fa fa-trash-o"></i> Delete </a>
				</li>
				<li class="fa-trash-co">
					<a href="javascript:;">
					<i class="fa fa-trash-o"></i> Completely Delete </a>
				</li>
			</ul>
		</div>
	</th>
	<th class="pagination-control" colspan="3">
		<span class="pagination-info">
		1-20 of <?php echo 20;?> </span>
		<a class="btn btn-sm blue">
		<i class="fa fa-angle-left"></i>
		</a>
		<a class="btn btn-sm blue">
		<i class="fa fa-angle-right"></i>
		</a>
	</th>
</tr>
</thead>
<tbody>
<tbody>
<?php foreach ($normativelist as $item): ?>
<tr class="unread" data-messageid="<?php echo $item['id']; ?>"  >

	<td class="inbox-small-cells">
		<input type="checkbox" class="mail-checkbox" name="checkflag" value='<?php echo $item["id"]?>'>
	</td>
	<td class="inbox-small-cells">
		<i class="fa fa-star"></i>
	</td>
	<td class="view-message hidden-xs">
		<?php  echo $item['author']; ?>
	</td>
	<td class="view-message ">
		 <?php echo $item['theme']; ?>
	</td>
	<td class="view-message inbox-small-cells">
		<i class="fa fa-paperclip"></i>
	</td>
	<td class="view-message text-right">
		 <?php echo $item['create_time'];?>
	</td>
</tr>
<?php  endforeach;?>
</tbody>
</table>