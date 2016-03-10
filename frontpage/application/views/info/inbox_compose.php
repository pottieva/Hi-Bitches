<form class="inbox-compose form-horizontal" id="fileupload" action="#" method="POST" enctype="multipart/form-data">
	<div class="inbox-compose-btn" >
		<!-- <button class="btn blue"><i class="fa fa-check"></i>Send</button> -->
		<button class="btn inbox-send-btn"><i class="fa fa-check"></i>发表</button>
		<button class="btn inbox-draft-btn">保存到草稿</button>
	</div>
	<div class="inbox-form-group mail-to">
		<label class="control-label">规范名:</label>
		<div class="controls controls-to">
			<input type="text" class="form-control" name="to">
		</div>
	</div>
	

	<div class="inbox-form-group">
	    <label class="control-label">重要等级:</label>
		<select id='sel'>
         <option value="1">普通</option>
         <option value="2">重要</option>
        </select>
	</div>
	<div class="inbox-form-group">
		<textarea class="inbox-editor inbox-wysihtml5 form-control" name="message" rows="12" id="eml"></textarea>
		    
	</div>
	<div class="inbox-compose-attachment">
		<!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
		<span class="btn green fileinput-button">
		<i class="fa fa-plus"></i>
		<span>
		Add files... </span>
		<input type="file" name="filename" id='filenameaa' multiple>
		</span>
		<!-- The table listing the files available for upload/download -->
		<table role="presentation" class="table table-striped margin-top-10" id=filefile>
		<tbody class="files" >
		</tbody>
		</table>
		<label class="control-label">上传文件名: </label>
		<label id='haha'></label>
	</div>
	<script id="template-upload" type="text/x-tmpl">
{% for (var i=0, file; file=o.files[i]; i++) { %}
    <tr class="template-upload fade">
        <td class="name" width="30%"><span>{%=file.name%}</span></td>
        <td class="size" width="40%"><span>{%=o.formatFileSize(file.size)%}</span></td>
        {% if (file.error) { %}
            <td class="error" width="20%" colspan="2"><span class="label label-danger">Error</span> {%=file.error%}</td>
        {% } else if (o.files.valid && !i) { %}
            <td>
                <p class="size">{%=o.formatFileSize(file.size)%}</p>
                <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                   <div class="progress-bar progress-bar-success" style="width:0%;"></div>
                   </div>
            </td>
        {% } else { %}
            <td colspan="2"></td>
        {% } %}
        <td class="cancel" width="10%" align="right">{% if (!i) { %}
            <button class="btn btn-sm red cancel">
                       <i class="fa fa-ban"></i>
                       <span>Cancel</span>
                   </button>
        {% } %}</td>
    </tr>
{% } %}
	</script>
	<!-- The template to display files available for download -->
	<script id="template-download" type="text/x-tmpl">
{% for (var i=0, file; file=o.files[i]; i++) { %}
    <tr class="template-download fade">
        {% if (file.error) { %}
            <td class="name" width="30%"><span>{%=file.name%}</span></td>
            <td class="size" width="40%"><span>{%=o.formatFileSize(file.size)%}</span></td>
            <td class="error" width="30%" colspan="2"><span class="label label-danger">Error</span> {%=file.error%}</td>
        {% } else { %}
            <td class="name" width="30%">
                <a href="{%=file.url%}" title="{%=file.name%}" data-gallery="{%=file.thumbnail_url&&'gallery'%}" download="{%=file.name%}">{%=file.name%}</a>
            </td>
            <td class="size" width="40%"><span>{%=o.formatFileSize(file.size)%}</span></td>
            <td colspan="2"></td>
        {% } %}
        <td class="delete" width="10%" align="right">
            <button class="btn default btn-sm" data-type="{%=file.delete_type%}" data-url="{%=file.delete_url%}"{% if (file.delete_with_credentials) { %} data-xhr-fields='{"withCredentials":true}'{% } %}>
                <i class="fa fa-times"></i>
            </button>
        </td>
    </tr>
{% } %}
	</script>

</form>