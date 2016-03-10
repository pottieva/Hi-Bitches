<html>
<table border="1" bordercolor="grey" cellspacing="0" cellpadding="0" >
	<tr><th>&nbsp&nbsp&nbsp&nbsp&nbsp组别&nbsp&nbsp&nbsp&nbsp&nbsp</th>
	    <th>&nbsp&nbsp&nbsp&nbsp&nbsp值班人&nbsp&nbsp&nbsp&nbsp&nbsp</th>
	    <th>&nbsp&nbsp&nbsp&nbsp&nbsp上月末值班日期&nbsp&nbsp&nbsp&nbsp&nbsp</th>
	    <th>&nbsp&nbsp&nbsp&nbsp&nbsp保存&nbsp&nbsp&nbsp&nbsp&nbsp</th></tr>
	<tr align=center><td>oracle</td>
		  <td> 
		  	 <select  id='oracle'>
		  	    <option> </option>
                    <?php foreach ($userlist as $ds) { ?>
                        <?php if ($ds['category']==1) { ?>
	                        <option value="<?php echo $ds['member'] ?>"  
	                        <?php if(isset($oracle) &&$oracle==$ds['member'] )echo 'selected' ?>>  
	                          <?php echo $ds['member'] ?>
	                        </option>
                    <?php } } ?>
            </select>
      </td>
      <td><?php  echo $date;  ?></td>
      <td> 
       <input type="button" value="保存" onclick="save(1,'<?php  echo $date;  ?>')"></input>
      </td>
 </tr>
	<tr align=center>
		<td>mysql</td>
		<td>      
           <select  id='mysql'>
                <option> </option>
                    <?php foreach ($userlist as $ds) { ?>
                        <?php if ($ds['category']==2) { ?>
	                        <option value="<?php echo $ds['member'] ?>" 
	                        <?php if(isset($mysql) &&$mysql==$ds['member'] )echo 'selected' ?>>
	                          <?php echo $ds['member'] ?>
	                        </option>
                    <?php } } ?>
           </select>
     </td>
      <td><?php  echo $date;  ?></td>
      <td> 
       <input type="button"  value="保存" onclick="save(2,'<?php  echo $date;  ?>')"></input>
      </td>
  </tr>
</table>
</html>




