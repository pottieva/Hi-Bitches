var Inbox = function () {

    var content = $('.inbox-content');
    var loading = $('.inbox-loading');
    var listListing = '';

   /*
   * written by   liudongfa
   * date         20151118
   * modify date  20151127
   */
    var loadInbox = function (el, name,status) {
        var url =  window.location.href+'/normative_info_inbox';
        var title = $('.inbox-nav > li.' + name + ' a').attr('data-title');
        listListing = name;
        toggleButton(el);
        $.ajax({
            type: "GET",
            cache: false,
            url: url,
            data: {'status': status},
            dataType: "json",
            success: function(res) 
            {
                toggleButton(el);

                $('.inbox-nav > li.active').removeClass('active');
                $('.inbox-nav > li.' + name).addClass('active');
                $('.inbox-header > h1').text(title);

                 // 加载模板列表时 同时更新 左侧的相应的记录数
                 // date: 20151127  liudongfa
                 document.getElementById("inbox-content").innerHTML=res[0];
                 document.getElementById("Inbox1").innerHTML='规范总数('+res[1]['inbox']+')';
                 document.getElementById("Draft1").innerHTML='草稿箱('+res[1]['draft']+')';
                 document.getElementById("Trash1").innerHTML='垃圾箱('+res[1]['trash']+')';
            },
            error: function(xhr, ajaxOptions, thrownError)
            {
                toggleButton(el);
            },
            async: false
        });

        // handle group checkbox:
        jQuery('body').on('change', '.mail-group-checkbox', function () {
            var set = jQuery('.mail-checkbox');
            var checked = jQuery(this).is(":checked");
            jQuery(set).each(function () {
                $(this).attr("checked", checked);
            });
            jQuery.uniform.update(set);
        });
    }

    /*
   * written by : liudongfa
   * date: 20151123
   */
    var loadMessage = function (el) {
        var url = window.location.href+'/loadMessage';
        toggleButton(el);
        var message_id = el.parent('tr').attr("data-messageid");       
        $.ajax({
            type: "GET",
            cache: false,
            url: url,
            data: {'id': message_id}, 
            dataType: "json",
            success: function(res) 
            {
                toggleButton(el);
                document.getElementById("inbox-content").innerHTML=res[0];
            },
            error: function(xhr, ajaxOptions, thrownError)
            {
                toggleButton(el);
                alert('loadMessagefail');
            },
            async: false
        });
    }

    var initWysihtml5 = function () {
        $('.inbox-wysihtml5').wysihtml5({
            "stylesheets": ["../../assets/global/plugins/bootstrap-wysihtml5/wysiwyg-color.css"]
        });
    }

     // 上传文件时触发加载的方法
     // written by  fanxinlei liudongfa   
     // date         20151126
    var initFileupload = function () {
        $('#fileupload').fileupload({
            url:  window.location.href+'/do_upload',
            autoUpload: true
        }).bind('fileuploaddone', function (e, data) { 
        	if(data.result!=0){
        		if(document.getElementById("haha").innerHTML){
            		document.getElementById("haha").innerHTML=document.getElementById("haha").innerHTML+','+data.result; 
            	}else{
            		document.getElementById("haha").innerHTML=data.result;
            	}   
        	}
        	     		
        });

        // Upload server status check for browsers with CORS support:
        if ($.support.cors) {
            $.ajax({
                url:  window.location.href+'/do_upload',
                type: 'FILE'
            }).fail(function () {
                $('<span class="alert alert-error"/>')
                    .text('Upload server currently unavailable - ' +
                    new Date())
                    .appendTo('#fileupload');
            });
        }
    }

    var loadCompose = function (el) {
        var url = 'info/inbox_compose.php';
        loading.show();
        content.html('');
        toggleButton(el);
        // load the form via ajax
        $.ajax({
            type: "GET",
            cache: false,
            url: url,
            dataType: "html",
            success: function(res) 
            {
                toggleButton(el);
                $('.inbox-nav > li.active').removeClass('active');
                $('.inbox-header > h1').text('Compose');
                loading.hide();
                // 填充 页面中 div 的id=content的内容
                content.html(res);
                initFileupload();
                initWysihtml5();
                $('.inbox-wysihtml5').focus();
                Layout.fixContentHeight();
                Metronic.initUniform();
            },
            error: function(xhr, ajaxOptions, thrownError)
            {
                toggleButton(el);
            },
            async: false
        });
    }

    var loadReply = function (el) {
        var messageid = $(el).attr("data-messageid");
        var url = window.location.href+'/replay';        
        loading.show();
        content.html('');
        toggleButton(el);
        $.ajax({
            type: "GET",
            cache: false,
            url:   url,
            data: {"id": messageid}   ,
            dataType: "json",
            success: function(res) 
            {
                toggleButton(el);
                document.getElementById("inbox-content").innerHTML=res[0];
            },
            error: function(xhr, ajaxOptions, thrownError)
            {
                toggleButton(el);
            },
            async: false
        });
    }

    var loadSearchResults = function (el) {
        var url = 'info/inbox_search_result.html';
        loading.show();
        content.html('');
        toggleButton(el);

        $.ajax({
            type: "GET",
            cache: false,
            url: url,
            dataType: "html",
            success: function(res) 
            {
                toggleButton(el);
                $('.inbox-nav > li.active').removeClass('active');
                $('.inbox-header > h1').text('Search');
                loading.hide();
                content.html(res);
                Layout.fixContentHeight();
                Metronic.initUniform();
            },
            error: function(xhr, ajaxOptions, thrownError)
            {
                toggleButton(el);
            },
            async: false
        });
    }

    var handleCCInput = function () {
        var the = $('.inbox-compose .mail-to .inbox-cc');
        var input = $('.inbox-compose .input-cc');
        the.hide();
        input.show();
        $('.close', input).click(function () {
            input.hide();
            the.show();
        });
    }

    var handleBCCInput = function () {

        var the = $('.inbox-compose .mail-to .inbox-bcc');
        var input = $('.inbox-compose .input-bcc');
        the.hide();
        input.show();
        $('.close', input).click(function () {
            input.hide();
            the.show();
        });
    }
    // 注释作者： liudongfa
    // 功能：     控件为可用或不可用相互切换。
    // 作用：     防止点击按钮后服务端还没有及时响应,用户频繁点击，加重服务端压力。
    var toggleButton = function(el) {
        if (typeof el == 'undefined') {
            return;
        }
        if (el.attr("disabled")) {
            el.attr("disabled", false);
        } else {
            el.attr("disabled", true);
        }
    }

    return {
        //main function to initiate the module
        init: function () {
            // handle compose btn click           
            $('.inbox').on('click', '.compose-btn a', function () {
                loadCompose($(this));
            });
            // handle discard btn
            $('.inbox').on('click', '.inbox-discard-btn', function(e) {
                e.preventDefault();
                loadInbox($(this), listListing,1);
            });
            // 新添加功能 ： 刘东发  handle send  btn     20151118   
            $('.inbox').on('click', '.inbox-send-btn', function(e) {
                // 禁止btn submit
                e.preventDefault();               
                var theme=$("input[name='to']").attr("value");
                var importance=$("#sel").val();  
                var content = document.getElementById("eml").value;
                var upfilesname = document.getElementById("haha").innerHTML;
                $.ajax({
                url: window.location.href+'/save',  
                data: {'theme':theme,'importance':importance,'content':content,'article_url':upfilesname},
                type: "GET",
                dataType: "json",
                error: function(){  
                     alert('Error loading XML document');  
                },  
                success: function(data){//如果调用php成功  
                	 loadInbox($(this), 'inbox',1);
                
                }
             }); 
            }); 

             // 新添加功能 ：刘东发  handle draft  btn     20151118  
            $('.inbox').on('click', '.inbox-draft-btn', function(e) {
                // 禁止btn submit
                e.preventDefault();
                var theme=$("input[name='to']").attr("value");
                $.ajax({
                url: window.location.href+'/save',  
                data: {'theme': theme , 'status': 0},
                type: "GET",
                dataType: "json",
                error: function(){  
                	alert('Error loading XML document');  
                },  
                success: function(data){//如果调用php成功  
                	loadInbox($(this), 'draft',0);               
                }
             }); 
           });       

          //create 连石峰 add  删除到草稿箱
          //create_time  2015-11-23
          //modifiy by   liudongfa   删除记录同时更新记录数
          //modifiy_time 2015_11_27
  	      $('.inbox-content').on('click','.fa-trash-do',function (){ 	    
              	var idlist = new Array();
              	var idcount = 0;
              	var title = $('.inbox-header > h1').text();
              	var status=1;
              	if(title=='Inbox'){
              		status=1;
              	}else if(title=='Draft'){
              		status=0;
              	}else if(title=='Trash'){
              		status=2;
              	}
              	$("input[name='checkflag']:checked").each(function(){             		
              		idlist.push($(this).attr("value"));
              		idcount++;
              	});              
              	if(idcount==0){
              		alert("请选择要删除的记录");
              		return;
              	}
              	else{
              		$.ajax({
              			type: "GET",
              			url: window.location.href+'/delete',
              			data: {'id': idlist,'status':status},
              			dataType: "json",
              			async:false,
              			success:function(data){           				
              				document.getElementById("inbox-content").innerHTML=data[0];
                      // 删除记录同时修改左侧的记录数
              				document.getElementById("Inbox1").innerHTML='规范总数('+data[1]['inbox']+')';
              				document.getElementById("Draft1").innerHTML='草稿箱('+data[1]['draft']+')';
              				document.getElementById("Trash1").innerHTML='垃圾箱('+data[1]['trash']+')';
              			},	
              			error:function(){
              				alert('删除失败');
              			}
              		});
              	} 	
            });
  	      
  	      //create 连石峰 add  从数据库彻底删除
          //create_time  2015-11-23
          //modifiy by   liudongfa   删除记录同时更新记录数
          //modifiy_time 2015_11_27
  	      $('.inbox-content').on('click','.fa-trash-co',function (){
  	    	    var title = $('.inbox-header > h1').text();
              	var idlist = new Array();
              	var idcount = 0;   
              	$("input[name='checkflag']:checked").each(function(){             		
              		idlist.push($(this).attr("value"));
              		idcount++;
              	});              
              	if(idcount==0){
              		alert("请选择要删除的记录");
              		return;
              	}
              	else{
              		$.ajax({
              			type: "GET",
              			url: window.location.href+'/complete_delete',              			
              			data: {'id': idlist,'title':title},
              			dataType: "json",
              			async:false,
              			success:function(data){
              				document.getElementById("inbox-content").innerHTML=data[0];
              				// 删除记录同时修改左侧的记录数
              				document.getElementById("Inbox1").innerHTML='规范总数('+data[1]['inbox']+')';
              				document.getElementById("Draft1").innerHTML='草稿箱('+data[1]['draft']+')';
              				document.getElementById("Trash1").innerHTML='垃圾箱('+data[1]['trash']+')';
              			},	
              			error:function(){
              				alert('删除失败');
              			}
              		});
              	} 	
            });
            // handle reply and forward button click
            $('.inbox').on('click', '.reply-btn', function () {
                loadReply($(this));
            });
            // handle view message
            $('.inbox-content').on('click', '.view-message', function () {
                loadMessage($(this));
            });
            // handle inbox listing  modified by: 刘东发
            $('.inbox-nav > li.inbox > a').click(function () {
                loadInbox($(this), 'inbox',1);
            });
            // handle draft listing  modified by: 刘东发
            $('.inbox-nav > li.draft > a').click(function () {
                loadInbox($(this), 'draft',0);
            });
            // handle trash listing  modified by: 刘东发
            $('.inbox-nav > li.trash > a').click(function () {
                loadInbox($(this), 'trash',2);
            });
            //handle compose/reply cc input toggle
            $('.inbox-content').on('click', '.mail-to .inbox-cc', function () {
                handleCCInput();
            });
            //handle compose/reply bcc input toggle
            $('.inbox-content').on('click', '.mail-to .inbox-bcc', function () {
                handleBCCInput();
            });
            //handle loading content based on URL parameter
            if (Metronic.getURLParameter("a") === "view") {
                loadMessage();
            } else if (Metronic.getURLParameter("a") === "compose") {
                loadCompose();
            } else {
               $('.inbox-nav > li.inbox > a').click();
            }
        }
    };
}();