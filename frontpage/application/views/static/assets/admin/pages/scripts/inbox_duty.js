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
        var url =  window.location.href+'/get_duty_by_month_member';
        var title = $('.inbox-nav > li.' + name + ' a').attr('data-title');
        var member=$("input[name='member']").attr("value");
        var importance=$("#month").val();  

        listListing = name;
        toggleButton(el);
        $.ajax({
            type: "GET",
            cache: false,
            url: url,
            data: {'monthflag': 0,'member':'','flag':0},
            dataType: "json",
            success: function(res) 
            {
                toggleButton(el);
                  
                $('.inbox-nav > li.active').removeClass('active');
                $('.inbox-nav > li.' + name).addClass('active');
                $('.inbox-header > h1').text('值班查询');
                 // date: 20151127  liudongfa
                 document.getElementById("inbox-content").innerHTML=res[0];
            },
            error: function(xhr, ajaxOptions, thrownError)
            {
                toggleButton(el);
                alert('123456');
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
        var url = 'duty/duty_create.php';
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
                $('.inbox-header > h1').text('值班信息生成');
                loading.hide();
                // 填充 页面中 div 的id=content的内容
                content.html(res);
                //initWysihtml5();
                //$('.inbox-wysihtml5').focus();
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
        //alert('loadReply');
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

            //   点击排班生成按钮触发的方法  modified by: 刘东发
            $('.inbox').on('click', '.compose-btn a', function () {
                //alert('handle compose btn click');
                loadCompose($(this));
            });


          
            //  点击排班查询按钮触发的方法  modified by: 刘东发
            $('.inbox-nav > li.inbox > a').click(function () {
                loadInbox($(this), 'inbox');
            });

            // 点击排班设置触发的方法  modified by: 刘东发
            $('.inbox-nav > li.draft > a').click(function () {
            
                $.ajax({
                url: window.location.href+'/get_total_duty_person',  
                type: "GET",
                dataType: "json",
                error: function(){  
                     alert('Error loading XML document');  
                },  
                success: function(data){//如果调用php成功  

                $('.inbox-nav > li.active').removeClass('active');
                $('.inbox-nav > li.draft').addClass('active');
                $('.inbox-header > h1').text('值班设置');
                 document.getElementById("inbox-content").innerHTML=data[0];
                 TableEditable.init();
                
                }
             }); 
              

            });

                   // 点击排班设置触发的方法  modified by: 刘东发
            $('.inbox-nav > li.draft_init > a').click(function () {
            
                $.ajax({
                url: window.location.href+'/init_duty',  
                type: "GET",
                dataType: "json",
                error: function(){  
                     alert('Error loading XML document');  
                },  
                success: function(data){//如果调用php成功  

                $('.inbox-nav > li.active').removeClass('active');
                $('.inbox-nav > li.draft').removeClass('active');
                $('.inbox-nav > li.draft_init').addClass('active');
                $('.inbox-header > h1').text('值班初始化');
                 document.getElementById("inbox-content").innerHTML=data[0];
                 TableEditable.init();
                
                }
             }); 
              

            });




            // handle trash listing  modified by: 刘东发
            $('.inbox-nav > li.trash > a').click(function () {
                loadInbox($(this), 'trash');
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