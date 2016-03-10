<div>
	 <?php 
        $nowfrist=date('Y-m-01');
	 ?>  

	<label class="control-label">月份：</label>
	 <select id='month'>
	 <option value="0">  <?php echo date('Y-m');  ?>  </option>
	 <option value="1">  <?php echo date('Y-m',strtotime("$nowfrist   1  month"));  ?> </option>
	 <option value="-1"> <?php echo date('Y-m',strtotime("$nowfrist  -1  month"));  ?> </option>
	
	 </select>
	 &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	 <input type="button" id="create" name="create" value="生成" onclick="create()"></input>
	 
</div>



<div id ="create_content">


</div>