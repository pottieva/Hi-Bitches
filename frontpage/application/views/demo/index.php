<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>

<!-- 
 @Author: Perry.Zhang
 @Date:   2015-10-26 10:48:07
 -->
<!-- BEGIN PAGE LEVEL STYLES -->
<link rel="stylesheet" type="text/css" href="./static/assets/global/plugins/select2/select2.css"/>
<link rel="stylesheet" type="text/css" href="./static/assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css"/>
<!-- END PAGE LEVEL STYLES -->

<!-- BEGIN PAGE CONTENT-->
            <div class="row">
                <div class="col-md-12">
                    <!-- BEGIN EXAMPLE TABLE PORTLET-->
                    <div class="portlet box blue">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-edit"></i><?php echo $title;?>
                            </div>
                            <div class="tools">
                                <a href="javascript:;" class="collapse">
                                </a>
                                <a href="#portlet-config" data-toggle="modal" class="config">
                                </a>
                                <a href="javascript:;" class="reload">
                                </a>
                                <a href="javascript:;" class="remove">
                                </a>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <div class="table-toolbar">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="btn-group">
                                            <button id="sample_editable_1_new" class="btn green">
                                            新增用户 <i class="fa fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="btn-group pull-right">
                                            <button class="btn dropdown-toggle" data-toggle="dropdown">Tools <i class="fa fa-angle-down"></i>
                                            </button>
                                            <ul class="dropdown-menu pull-right">
                                                <li>
                                                    <a href="javascript:;">
                                                    Print </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;">
                                                    Save as PDF </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;">
                                                    Export to Excel </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
                            <thead>
                            <tr>
                            <?php foreach ($colmsg as $col):?>
                            	<?php foreach ($col as $key=>$value):?>
                            	<th>
                            		<?php echo $value;?>
                            	</th>
                            	<?php endforeach;?>
                            <?php endforeach;?>                         
                                 <th>
                                       修改
                                </th>
                                 <th>
                                     删除                    
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            
                            <?php foreach ($userlist as $user_item):?>
                            <tr>
								<?php foreach ($user_item as $user):?>
								<td>
									<?php echo $user;?>
								</td>
								<?php endforeach;?>
                                <td>
                                    <a class="edit" href="javascript:;">
                                    Edit </a>
                                </td>
                                <td>
                                    <a class="delete" href="javascript:;">
                                    Delete </a>
                                </td>
                            </tr>
                            <?php endforeach;?>
                            </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- END EXAMPLE TABLE PORTLET-->
                </div>
            </div>
            <!-- END PAGE CONTENT -->

<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="static/assets/global/plugins/respond.min.js"></script>
<script src="static/assets/global/plugins/excanvas.min.js"></script> 
<![endif]-->
<script src="static/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="static/assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
<!-- IMPORTANT! Load jquery-ui.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<script src="static/assets/global/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
<script src="static/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="static/assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="static/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="static/assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="static/assets/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<script src="static/assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<script src="static/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script type="text/javascript" src="static/assets/global/plugins/select2/select2.min.js"></script>
<script type="text/javascript" src="static/assets/global/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="static/assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->

<script src="static/assets/admin/pages/scripts/table-editable.js"></script>
<script>
jQuery(document).ready(function() {       
    TableEditable.init();
});
</script>

