<form class="inbox-compose form-horizontal" id="fileupload" action="http://"+base_url()+"/demo/do_upload" method="POST" enctype="multipart/form-data">
	<div class="inbox-compose-btn">
		<button class="btn blue"><i class="fa fa-check"></i>Send</button>
		<button class="btn">Discard</button>
		<button class="btn">Draft</button>
	</div>
	<div class="inbox-form-group mail-to">
		<label class="control-label">To:</label>
		<div class="controls controls-to">
			<input type="text" class="form-control" name="to" value="fiona.stone@arthouse.com, lisa.wong@pixel.com, jhon.doe@gmail.com">
			
			<span class="inbox-cc " style="display:none">
			Cc </span>
			<span class="inbox-bcc"><span class="inbox-cc-bcc">
			Bcc </span>
			</span>
		</div>
	</div>
	<div class="inbox-form-group input-cc">
		<a href="javascript:;" class="close">
		</a>
		<label class="control-label">Cc:</label>
		<div class="controls controls-cc">
			<input type="text" name="cc" class="form-control" value="jhon.doe@gmail.com, kevin.larsen@gmail.com">
		</div>
	</div>
	<div class="inbox-form-group input-bcc display-hide">
		<a href="javascript:;" class="close">
		</a>
		<label class="control-label">Bcc:</label>
		<div class="controls controls-bcc">
			<input type="text" name="bcc" class="form-control">
		</div>
	</div>
	<div class="inbox-form-group">
		<label class="control-label">Subject:</label>
		<div class="controls">
			<input type="text" class="form-control" name="subject" value="Urgent - Financial Report for May, 2013">
		</div>
	</div>
	<div class="inbox-form-group">
		<div class="controls-row">
			<textarea class="inbox-editor inbox-wysihtml5 form-control" name="message" rows="12"></textarea>
			<!--blockquote content for reply message, the inner html of reply_email_content_body element will be appended into wysiwyg body. Please refer Inbox.js loadReply() function. -->
			<div id="reply_email_content_body" class="hide">
				<input type="text">
				<br>
				<br>
				<blockquote>
					 Consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. <br>
					<br>
					 Consectetuer adipiscing elit, sed diam nonummy nibh euismod exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. <br>
					<br>
					 All the best,<br>
					 Lisa Nilson, CEO, Pixel Inc.
				</blockquote>
			</div>
		</div>
	</div>
	<div class="inbox-compose-attachment">
		<!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
	<span class="btn green fileinput-button">
		<i class="fa fa-plus"></i>
			<span>
		Add files... </span>
		
	</span>
	<input type="file"  id="userfile"  name="userfile" multiple >
    <br>
	<input class="btn inbox-upload-btn" name='fagege' type="submit" value="upload" />
		
		
	
		</form>

		<!-- The table listing the files available for upload/download -->
		<table role="presentation" class="table table-striped margin-top-10">
		<tbody class="files">
		</tbody>
		</table>
	</div>

	<div class="inbox-compose-btn">
		<button class="btn blue"><i class="fa fa-check"></i>Send</button>
		<button class="btn">Discard</button>
		<button class="btn">Draft</button>
	</div>
</form>
