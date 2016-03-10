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