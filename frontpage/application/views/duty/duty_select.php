<div class='inbox' >
	<label class="control-label">月份：</label>
		 <?php 
          $nowfrist=date('Y-m-01');
	    ?>  
	 <select id='month'>
     <option value="0">  <?php echo date('Y-m');  ?>  </option>
	 <option value="1">  <?php echo date('Y-m',strtotime("$nowfrist   1  month"));  ?> </option>
	 <option value="-1"> <?php echo date('Y-m',strtotime("$nowfrist  -1  month"));  ?> </option>
	 </select>
	 &nbsp;&nbsp;值班人
       	 <select  id='zhibanren'  style="width:180px;" >
		  	    <option> </option>
                    <?php foreach ($members['userlist'] as $ds) { ?>

	                        <option value="<?php echo $ds['member'] ?>"  >
	                          <?php echo $ds['member'] ?>
	                        </option>
                    <?php  } ?>
            </select>

	 &nbsp;&nbsp;
	 <input type="button" id="search" name="search" value="查询" class="query-btn"  onclick="ajax()"  ></input>	
</div>

<div id='duty_select'>

                     <table class="table table-striped table-hover table-bordered" id="duty_info">
                            <thead>
                       <tr > 
                             <th colspan="8" style="text-align:center" >
                             <?php  echo $year_month .' 排班信息' ?>
                             </th>
                        </tr>
                            <tr>
                                 <th> 组别   </th>
                                 <th> 星期一 </th> 
                                 <th> 星期二 </th>
                                 <th> 星期三 </th>
                                 <th> 星期四 </th>
                                 <th> 星期五 </th>
                                 <th> 星期六 </th>
                                 <th> 星期天 </th>
                            </tr>
                            </thead>
                            <tbody>

                                <?php  
		                                    foreach ($dutyinfo as $duty_item) { 
		                                            echo "<tr>";  
			                                       foreach ($duty_item as $item){
			                                     	   echo "<td>".$item; 
			                                     	   echo "</td>"; 
			                                       }
			                                       echo "</tr>"; }
			                                   

			                         
			                   ?>


                                 
                         
                            </tbody>
                            </table>
                     <button class="btn btn-success" onClick ="$('#duty_info').tableExport({type: 'excel', escape: 'false'});">导出 Excel </button>  
              
                      <br><br>  
</div>

