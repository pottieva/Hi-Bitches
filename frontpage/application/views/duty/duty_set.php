<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>

<!-- 
 @Author: Perry.Zhang
 @Date:   2015-10-26 10:48:07
 -->
<!-- BEGIN PAGE LEVEL STYLES -->
<link rel="stylesheet" type="text/css" href="./static/assets/global/plugins/select2/select2.css"/>
<link rel="stylesheet" type="text/css" href="./static/assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css"/>

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
                                <a href="javascript:;" onclick="GetInfoFromTable()" class="reload"  >
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
                             
                                </div>
                            </div>
                            <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
                            <thead>
                            <tr>

                            
      <!--                           
     * written by huzj 更新用户信息
     * modify  by Perry.Zhang
     */
     -->


                             <?php  foreach($userlist[0] as $key=>$value ){  
                                     echo "<th>"; 
                                     echo  strtoupper($key); 
                                     echo "</th>"; 
                                 }  ?>           

                                 <th>
                                    修改
                                </th>
                                <th>
                                    删除                    
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if (count($userlist)!=0)   { ?>
                            <?php foreach ($userlist as $user_item):?>
                            <tr>
                                <?php foreach ($user_item as $item):?>
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

 



