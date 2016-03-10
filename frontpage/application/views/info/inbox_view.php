<div class="inbox-header inbox-view-header">
	<h1 class="pull-left">New server for datacenter needed <a href="javascript:;">
	Inbox </a>
	</h1>
	<div class="pull-right">
		<i class="fa fa-print"></i>
	</div>
</div>
<div class="inbox-view-info">
	<div class="row">
		<div class="col-md-7">
			<?php foreach ($normativelist as $item): ?>
			<span class="bold">
			Theme： </span>
			<span>
			<?php echo $item['theme']; ?> </span>
			  <span class="bold">
			 on &nbsp </span>
			<?php echo $item['create_time']; ?>
		</div>
		<div class="col-md-5 inbox-info-btn">
			<div class="btn-group">
				<button data-messageid="23" class="btn blue reply-btn">
				<i class="fa fa-reply"></i> Reply </button>
				<button class="btn blue dropdown-toggle" data-toggle="dropdown">
				<i class="fa fa-angle-down"></i>
				</button>
				<ul class="dropdown-menu pull-right">
					<li>
						<a href="javascript:;" data-messageid="23" class="reply-btn">
						<i class="fa fa-reply"></i> Reply </a>
					</li>
					<li>
						<a href="javascript:;">
						<i class="fa fa-arrow-right reply-btn"></i> Forward </a>
					</li>
					<li>
						<a href="javascript:;">
						<i class="fa fa-print"></i> Print </a>
					</li>
					<li class="divider">
					</li>
					<li>
						<a href="javascript:;">
						<i class="fa fa-ban"></i> Spam </a>
					</li>
					<li>
						<a href="javascript:;">
						<i class="fa fa-trash-o"></i> Delete </a>
					</li>
					<li>
					</div>
				</div>
			</div>
		</div>
		<div class="inbox-view">
	       <?php echo $item['content']; ?>
		</div>
		
         <br>
         <b>上传文件内容：<b>
         <br>
         <?php     foreach(explode(',', $item['article_url']) as $s){   ?>
                  &nbsp<a href="http://"+base_url()+"/uploads/<?php echo $s ; ?> " target="_blank">
                       <?php echo $s;?>
                  </a>  <br> 
		<?php } endforeach;?>

	

	
