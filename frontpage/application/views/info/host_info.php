<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
/**
 * @Author: Perry.Zhang
 * @Date:   2016-03-30 15:09:55
 * @Last Modified by:   Perry.Zhang
 * @Last Modified time: 2016-04-20 13:27:03
 */
?>
<!-- BEGIN PAGE LEVEL STYLES -->
<link rel="stylesheet" type="text/css" href="./static/assets/global/plugins/select2/select2.css"/>
<link rel="stylesheet" type="text/css" href="./static/assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css"/>
<!-- END PAGE LEVEL STYLES -->

<!-- BEGIN PAGE HEADER -->
<div id="ajaxreloading">
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <i class="fa fa-home"></i>
                <a href="<?php echo base_url();?>">Home</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <?php echo $title;?>          
            </li>
        </ul>
        <div class="page-toolbar">
            <div id="dashboard-report-range" class="pull-right tooltips btn btn-sm btn-default" data-container="body" data-placement="bottom" data-original-title="Change dashboard date range">
                <i class="icon-calendar"></i>&nbsp; <span class="thin uppercase visible-lg-inline-block"></span>&nbsp; <i class="fa fa-angle-down"></i>
            </div>
        </div>
    </div>
    <h3 class="page-title">
        <?php echo $title;?>
    </h3>
    <!-- END PAGE HEADER-->
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
                        <a href="javascript:;" onclick="reloadRow()" class="reload">
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
                                    <button id="add_host_button" class="btn green">
                                    新增主机 <i class="fa fa-plus"></i>
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
                    <table class="table table-striped table-hover table-bordered" id="host_editable_1">
                    <thead>
                    <tr>
                    <!--                           
                    * @ Creator: Perry.Zhang
                    * @ Date: 2016/04/06 
                    * @ Annotation: 展示主机信息
                    */
                    -->
                    <?php  foreach($hostlist[0] as $key=>$value )
                            {  
                                echo "<th>"; 
                                echo  strtoupper($key); 
                                echo "</th>"; 
                            }  
                    ?>           
                        <th>
                            修改
                        </th>
                        <th>
                            删除                    
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if (count($hostlist)!=0)   { ?>
                    <?php foreach ($hostlist as $host_item):?>
                    <tr>
                        <?php foreach ($host_item as $item):?>
                        <td>
                            <?php echo $item;?>
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
                    <?php endforeach; } else { echo "NO DATA" ;} ?>
                    </tbody>
                    </table>
                </div>
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
        </div>
    </div>
    <!-- END PAGE CONTENT -->
</div>
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
<script src="static/assets/admin/pages/scripts/table-editable-host.js"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<script>
function reloadRow() {
    url = window.location.href+"/reload";
    $.ajax({
        url: url,  
        type: "POST",
        dataType: "json",
        error: function(){  
            alert('Error loading XML document');  
        },  
        success: function(data){//如果调用php成功 
            document.getElementById("ajaxreloading").innerHTML=data;
            jQuery(document).ready(function() {       
                TableEditable.init();
            });
        }
    });    
}
</script>
<script>
jQuery(document).ready(function() {       
    TableEditable.init();
});
</script>
