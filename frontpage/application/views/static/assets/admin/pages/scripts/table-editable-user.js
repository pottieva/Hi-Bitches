/**
 * @Author: Perry.Zhang
 * @Date:   2015-11-06 
 * @Last Modified by:   Perry.Zhang
 * @Last Modified time: 2015-11-26 19:54
 */

var TableEditable = function () {

    var handleTable = function () {

        function restoreRow(oTable, nRow) {
            var aData = oTable.fnGetData(nRow);
            var jqTds = $('>td', nRow);

            for (var i = 0, iLen = jqTds.length; i < iLen; i++) {
                oTable.fnUpdate(aData[i], nRow, i, false);
            }

            oTable.fnDraw();
        }
 
        function editRow(oTable, nRow) { 
            var aData = oTable.fnGetData(nRow);
            var jqTds = $('>td', nRow);
            // alert('edit msg...');
            for (var i=0;i<aData.length;i++) {
              if(i==0) {
                jqTds[i].innerHTML = '<input type="text" readonly="readonly" class="form-control input-small" value="' + aData[i] + '">';
              } else if(i==aData.length-2) {
                jqTds[i].innerHTML = '<a class="edit" href="">Save</a>';
              } else if(i==aData.length-1) {
                jqTds[i].innerHTML = '<a class="cancel" href="">Cancel</a>';
              } else {
                jqTds[i].innerHTML = '<input type="text" class="form-control input-small" value="' + aData[i] + '">';
              }
            } 
        }

        function saveRow(oTable, nRow) {
        	// 获取表头
            var arr=new Array();
            var parameters="";
            var m=0;
            oTable.find('th').each(function (thindex, thitem) { //遍历Table dgItem的th  
                    arr[m] = $(thitem).text(); 
                    m=m+1;
     
           });

          // 前台js静态保存数据
            var jqInputs = $('input', nRow);
            for (var i=0;i<jqInputs.length;i++) {
            	oTable.fnUpdate(jqInputs[i].value, nRow, i, false);
            	// 获取url 参数键值对
            	parameters=parameters+ arr[i].toLowerCase()+"="+jqInputs[i].value+"&";
            }        
            oTable.fnUpdate('<a class="edit" href="">Edit</a>', nRow, jqInputs.length, false);
            oTable.fnUpdate('<a class="delete" href="">Delete</a>', nRow, jqInputs.length+1, false);
            oTable.fnDraw();           
          
            // ajax              
            var xhr;
            // code for IE7+, Firefox, Chrome, Opera, Safari
            if (window.XMLHttpRequest) {
            	xhr = new XMLHttpRequest();
            }
            else {
            	// code for IE6, IE5
            	xhr = new ActiveXObject("Microsoft.XMLHTTP");
            }
           
            xhr.onreadystatechange=function() { 
            	if (xhr.readyState==4) {
				        // 0：未初始化  1：读取中   2：已读取   3：交互中    4：完成
            		if (xhr.status==200) {
            			msg = xhr.responseText;
          		  	}
          	  	}
            };

           url = window.location.href+"/save_usermsg?"+parameters;
           // 当前URL          
           xhr.open("GET",url,true);          
           xhr.send(null);                      
        }
   
        function cancelEditRow(oTable, nRow) {
        	var jqInputs = $('input', nRow);
            for (var i=0;i<jqInputs.length;i++)
            {
            	oTable.fnUpdate(jqInputs[i].value, nRow, i, false);
            } 
            oTable.fnUpdate('<a class="edit" href="">Edit</a>', nRow,jqInputs.length, false);
            oTable.fnDraw();
        }
        var table = $('#sample_editable_1');
        var oTable = table.dataTable({
            // Uncomment below line("dom" parameter) to fix the dropdown overflow issue in the datatable cells. The default datatable layout
            // setup uses scrollable div(table-scrollable) with overflow:auto to enable vertical scroll(see: assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js). 
            // So when dropdowns used the scrollable div should be removed. 
            //"dom": "<'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r>t<'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>",
            "lengthMenu": [
                // change per page values here
                [10, 5, 15, 20, -1],
                [10, 5, 15, 20, "All"] 
            ],
     
            /*
            * @ Creator: Perry.Zhang
            * @ Date: 2016/04/06
            * @ Annotation: 设置初始值
            * */
            "pageLength": 10, 
            "language": {
                "lengthMenu": " _MENU_ records"
            },
            "columnDefs": [{ 
                // set default column settings
                'orderable': true,
                'targets': [0]
            }, {
                "searchable": true,
                "targets": [0]
            }],

            // set first column as a default sort by asc  
            // modifiy by Perry.Zhang
            "order": [
                [0, "asc"]
            ] 
        });
        var tableWrapper = $("#sample_editable_1_wrapper");
        tableWrapper.find(".dataTables_length select").select2({
            showSearchInput: false //hide search box with special css class
        }); // initialize select2 dropdown

        var nEditing = null;
        var nNew = false;

        $('#sample_editable_1_new').click(function (e) {
            e.preventDefault();

            if (nNew && nEditing) {
                if (confirm("Previose row not saved. Do you want to save it ?")) {
                    saveRow(oTable, nEditing); // save
                    $(nEditing).find("td:first").html("Untitled");
                    nEditing = null;
                    nNew = false;

                } else {
                    oTable.fnDeleteRow(nEditing); // cancel
                    nEditing = null;
                    nNew = false;                    
                    return;
                }
            }

            // 给insert 行初始化列
            // 定义空字符串所在数组 
            // modifiy by   Perry.Zhang 
            var totalString = new Array();
            // 定义标志位
            var flag = 0;
            // 遍历Table的th标签 
            oTable.find('th').each(function (thindex, thitem) {   
                var col_name=$(thitem).text();
                if (col_name=='LOGIN_COUNT' ) {
                  totalString[flag]=0;
                }else if (col_name=='STATUS' ) {
                  totalString[flag]=1;
                }else {
                    totalString[flag] = ''; 
                }               	 
                flag++;
            });
            var aiNew = oTable.fnAddData(totalString);
            var nRow = oTable.fnGetNodes(aiNew[0]);
            editRow(oTable, nRow);
            nEditing = nRow;
            nNew = true;
        });

        table.on('click', '.delete', function (e) {
            e.preventDefault();
            if (confirm("Are you sure to delete this row ?") == false) {
                return;
            }
            var nRow = $(this).parents('tr')[0];         
            //begin written by huzj
            // 后台删除数据
            var aData = oTable.fnGetData(nRow);
            var jqTds = $('>td', nRow);          
            oTable.fnDeleteRow(nRow);
            // ajax 异步修改数据
            var xhr;
            if (window.XMLHttpRequest)
              {// code for IE7+, Firefox, Chrome, Opera, Safari
            	xhr = new XMLHttpRequest();
              }
            else
              {// code for IE6, IE5
            	xhr = new ActiveXObject("Microsoft.XMLHTTP");
              }
            xhr.onreadystatechange=function() { 
             	  if(xhr.readyState==4) {
   				      //0：未初始化  1：读取中   2：已读取   3：交互中    4：完成
             		    if(xhr.status==200) {
             			      msg = xhr.responseText;
             		    }
             	  }
            };
            
            xhr.open("GET", window.location.href+"/del_usermsg?id="+aData[0],true);
            xhr.send(null);
            //end written by huzj
        });

        table.on('click', '.cancel', function (e) {
            e.preventDefault();
            if (nNew) {
                oTable.fnDeleteRow(nEditing);
                nEditing = null;
                nNew = false;
            } else {
                restoreRow(oTable, nEditing);
                nEditing = null;
            }
        });

        table.on('click', '.edit', function (e) {
            e.preventDefault();

            /* Get the row as a parent of the link that was clicked on */
            var nRow = $(this).parents('tr')[0];

            if (nEditing !== null && nEditing != nRow) {
                /* Currently editing - but not this row - restore the old before continuing to edit mode */
                restoreRow(oTable, nEditing);
                editRow(oTable, nRow);
                nEditing = nRow;
            } else if (nEditing == nRow && this.innerHTML == "Save") {
                /* Editing this row and want to save it */
                saveRow(oTable, nEditing);
                nEditing = null;
             // alert("Updated! Do not forget to do some ajax to sync with backend :)");                 
            } else {
                /* No edit in progress - let's start one */
                editRow(oTable, nRow);
                nEditing = nRow;
            }
        });
    }

    return {
        //main function to initiate the module
        init: function () {
            handleTable();
        }

    };
}();