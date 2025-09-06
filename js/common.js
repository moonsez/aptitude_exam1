$(document).ready(function(){

    $(document).on('click','.view_result',function(){
        var id=$(this).attr('rel');
        var title=$(this).data('title');
        var type = $(this).data('type');
        var tit = '<strong>'+title+' Exam Results'+'</strong>';
        if (type) {
            $.ajax({
                url:completeURL("view_report_modal"),
                type:'POST',
                data:{id:id},
                dataType:'json',
                success: function(data)
                {
                    var dialog = bootbox.dialog({
                        message: data.view,
                        title: tit,
                        size: "large",
                        buttons:
                        {
                            danger: {
                                label: "Cancel",
                                className: "btn-danger",
                                callback: function() {
                                    // Example.show("uh oh, look out!");
                                }
                            }
                        }
                    });
                },
                complete:function()
                {
                    $('.dataTable').each(function () {
                        $(this).dataTable().fnDestroy();
                    });

                    if($(".masterTable").length > 0)
                    {
                        $('.masterTable').dataTable({
                            "order": [
                                [0, 'asc']
                            ],

                            "lengthMenu": [
                                [10, 15, 20,100,500,1000, -1],
                                [10, 15, 20,100,500,1000, "All"] // change per page values here
                            ],
                            // set the initial value
                            "pageLength": 10,
                        });

                        var tableWrapper = $('.dataTables_wrapper'); // datatable creates the table wrapper by adding with id {your_table_jd}_wrapper

                        tableWrapper.find('.dataTables_length select').select2(); // initialize select2 dropdown
                    }

                    $('select').select2();
                }
            });
        } else {
         
            // $.ajax({
            //     url:completeURL("view_result_modal"),
            //     type:'POST',
            //     data:{id:id},
            //     dataType:'json',
            //     success: function(data)
            //     {
            //         var dialog = bootbox.dialog({
            //             message: data.view,
            //             title: tit,
            //             size: "large",
            //             buttons:
            //             {
            //                 danger: {
            //                     label: "Cancel",
            //                     className: "btn-danger",
            //                     callback: function() {
            //                         // Example.show("uh oh, look out!");
            //                     }
            //                 }
            //             }
            //         });
            //     },
            //     complete:function()
            //     {
            //         $('.dataTable').each(function () {
            //             $(this).dataTable().fnDestroy();
            //         });

            //         if($(".masterTable").length > 0)
            //         {
            //             $('.masterTable').dataTable({
            //                 "order": [
            //                     [0, 'asc']
            //                 ],

            //                 "lengthMenu": [
            //                     [10, 15, 20,100,500,1000, -1],
            //                     [10, 15, 20,100,500,1000, "All"] // change per page values here
            //                 ],
            //                 // set the initial value
            //                 "pageLength": 10,
            //             });

            //             var tableWrapper = $('.dataTables_wrapper'); // datatable creates the table wrapper by adding with id {your_table_jd}_wrapper

            //             tableWrapper.find('.dataTables_length select').select2(); // initialize select2 dropdown
            //         }

            //         $('select').select2();
            //     }
            // });

            $.ajax({
                url: completeURL("view_result_modal"),
                type: 'POST',
                data: { id: id },
                dataType: 'json',
                success: function(data) {
                    if (data && data.redirect_url) {
                        window.location.href = completeURL(data.redirect_url);
                    } else {
                        alert("Redirect link not found!");
                    }
                }
            });
            
        }
    });

    $(document).on('click','.common_save',function(e){
        var form = '#'+$(this).parents('form').attr('id');
        var error = $('.alert-danger', form);
        var success = $('.alert-success', form);

        $(form).validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "",  // validate all fields including form hidden input
            rules: {
                section_name: {
                    required: true                     
                }, 
                section : {
                    required: true                     
                },
                ans_option : {
                    required: true                     
                }

            },

            invalidHandler: function (event, validator) { //display error alert on form submit              
                success.hide();
                error.show();
                Metronic.scrollTo(error, -200);
            },

            errorPlacement: function (error, element) { // render error placement for each input type
                var icon = $(element).parent('.input-icon').children('i');
                icon.removeClass('fa-check').addClass("fa-warning");  
                icon.attr("data-original-title", error.text()).tooltip({'container': 'body'});
            },

            highlight: function (element) { // hightlight error inputs
                $(element).closest('.form-group').removeClass("has-success").addClass('has-error'); // set error class to the control group   
            },

            unhighlight: function (element) { // revert the change done by hightlight
                
            },

            success: function (label, element) {
                var icon = $(element).parent('.input-icon').children('i');
                $(element).closest('.form-group').removeClass('has-error').addClass('has-success'); // set success class to the control group
                icon.removeClass("fa-warning").addClass("fa-check");
            },

            submitHandler: function (form) {
                
                $('.common_save').prop('disabled',true);
                var url = $(form).attr('action');
                var tbDiv = $(form).data('tbdiv');
                var tbUrl = $(form).data('tburl');
                var id = $(form).find('.common_save').attr('rel');
                var serialize_data = $(form).serialize();   
                serialize_data = {serialize_data:serialize_data,id:id};                
               
                $(form).ajaxSubmit({
                    dataType:'json',
                    data:serialize_data,
                    success:function(data)
                    {
                        bootbox.alert(data.msg, function() {
                            //Example.show("Hello world callback");
                            resetForm(form); 
                            location.reload();
                            /*refreshTable(tbDiv,tbUrl);  
                            setTimeout(function(){                              
                                $('.common_save').removeAttr('disabled');    
                                $('.common_save').text('Submit');
                                $('.common_save').attr('rel','0');                                   
                            },2000);*/
                        });         
                    }
                });
            }
        });
    }); 

    $(document).on('click','.question_common_save',function(e){
       
        var form = '#'+$(this).parents('form').attr('id');
        var error = $('.alert-danger', form);
        var success = $('.alert-success', form);

        $(form).validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "",  // validate all fields including form hidden input
            rules: {
                section_name: {
                    required: true                     
                }, 
                section : {
                    required: true                     
                },
                ans_option : {
                    required: true                     
                },
                test_name: {
                    required: true
                },
                question: {
                    required: true
                }
            },

            invalidHandler: function (event, validator) { //display error alert on form submit              
                success.hide();
                error.show();
                Metronic.scrollTo(error, -200);
            },

            errorPlacement: function (error, element) { // render error placement for each input type
                var icon = $(element).parent('.input-icon').children('i');
                icon.removeClass('fa-check').addClass("fa-warning");  
                icon.attr("data-original-title", error.text()).tooltip({'container': 'body'});
            },

            highlight: function (element) { // hightlight error inputs
                $(element).closest('.form-group').removeClass("has-success").addClass('has-error'); // set error class to the control group   
            },

            unhighlight: function (element) { // revert the change done by hightlight
                
            },

            success: function (label, element) {
                var icon = $(element).parent('.input-icon').children('i');
                $(element).closest('.form-group').removeClass('has-error').addClass('has-success'); // set success class to the control group
                icon.removeClass("fa-warning").addClass("fa-check");
            },

            submitHandler: function (form) {
                
                $('.question_common_save').prop('disabled',true);
                var url = $(form).attr('action');
                var tbDiv = $(form).data('tbdiv');
                var tbUrl = $(form).data('tburl');
                var id = $(form).find('.question_common_save').attr('rel');
                var serialize_data = $(form).serialize();   
                serialize_data = {serialize_data:serialize_data,id:id};                
               
                $(form).ajaxSubmit({
                    dataType:'json',
                    data:serialize_data,
                    success:function(data)
                    {
                        
                        bootbox.alert(data.msg, function() {
                            //Example.show("Hello world callback");
                            resetForm(form); 
                            location.reload();
                            /*refreshTable(tbDiv,tbUrl);  
                            setTimeout(function(){                              
                                $('.common_save').removeAttr('disabled');    
                                $('.common_save').text('Submit');
                                $('.common_save').attr('rel','0');                                   
                            },2000);*/
                        });         
                    },
                     complete: function(data)
                        {
                            //divUnblockUi();
                           
                            /*var question_id = data.question_id;
                           

                            $.ajax({
                                type:'POST',
                                url:completeURL('fetch_question_data'),
                                dataType:'json',
                                data:{question_id:question_id},
                                success:function(data)
                                {
                                 
                              
                                 //alert(data.mailer);
                                $('#department').html(data);
                                $('#sub_department').html(data);
                                $('#reference').html(data);
                                }
                            });*/
                        }
                });
            }
        });
    }); 


    $(document).on('click','.test_common_save',function(e){
       
        var form = '#fetch_test';
        var error = $('.alert-danger', form);
        var success = $('.alert-success', form);
        
        $(form).validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "",  // validate all fields including form hidden input
            rules: {
                section_name: {
                    required: true                     
                }, 
                section : {
                    required: true                     
                },
                ans_option : {
                    required: true                     
                },
                dept_name: {
                    required: true
                },
                location: {
                    required: true
                },
                test_name: {
                    required: true
                },
                question_count: {
                    required: true
                },
                negative_marking: {
                    required: true
                },
                total_mark: {
                    required: true
                },
                test_time: {
                    required: true
                },
                test_datetime: {
                    required: true
                },
                
            },

            invalidHandler: function (event, validator) { //display error alert on form submit              
                success.hide();
                error.show();
                Metronic.scrollTo(error, -200);
            },

            errorPlacement: function (error, element) { // render error placement for each input type
                var icon = $(element).parent('.input-icon').children('i');
                icon.removeClass('fa-check').addClass("fa-warning");  
                icon.attr("data-original-title", error.text()).tooltip({'container': 'body'});
            },

            highlight: function (element) { // hightlight error inputs
                $(element).closest('.form-group').removeClass("has-success").addClass('has-error'); // set error class to the control group   
            },

            unhighlight: function (element) { // revert the change done by hightlight
                
            },

            success: function (label, element) {
                var icon = $(element).parent('.input-icon').children('i');
                $(element).closest('.form-group').removeClass('has-error').addClass('has-success'); // set success class to the control group
                icon.removeClass("fa-warning").addClass("fa-check");
            },

            submitHandler: function (form) {
                $('.test_common_save').prop('disabled',true);
                var url = $(form).attr('action');
                var tbDiv = $(form).data('tbdiv');
                var tbUrl = $(form).data('tburl');
                var id = $(form).find('.test_common_save').attr('rel');
                var serialize_data = $(form).serialize();   
                serialize_data = {serialize_data:serialize_data,id:id};                
               
                $(form).ajaxSubmit({
                    dataType:'json',
                    data:serialize_data,
                    success:function(data)
                    {
                        
                        bootbox.alert(data.msg, function() {
                            //Example.show("Hello world callback");
                            resetForm(form); 
                            location.reload();
                            /*refreshTable(tbDiv,tbUrl);  
                            setTimeout(function(){                              
                                $('.common_save').removeAttr('disabled');    
                                $('.common_save').text('Submit');
                                $('.common_save').attr('rel','0');                                   
                            },2000);*/
                        });         
                    },
                     complete: function(data)
                        {
                            //divUnblockUi();
                           
                            /*var question_id = data.question_id;
                           

                            $.ajax({
                                type:'POST',
                                url:completeURL('fetch_question_data'),
                                dataType:'json',
                                data:{question_id:question_id},
                                success:function(data)
                                {
                                 
                              
                                 //alert(data.mailer);
                                $('#department').html(data);
                                $('#sub_department').html(data);
                                $('#reference').html(data);
                                }
                            });*/
                        }
                });
            }
        });
    }); 

    $(document).on('click','.viewlogo',function(){        
        var data=$(this).attr('rel');        
        var img = '<center><img src="'+data+'" alt="" height="150" width="150"/></center>';        
        bootbox.alert(img, function() { });                   
    }); 
    

    $(document).on('click','.editRecord', function(){

        var id = $(this).attr('rel');
        var url = $(this).attr('rev');
        var data={id:id};
        $.ajax({
            url : completeURL(url),
            type : 'POST',
            dataType : 'html',
            data:data,
            success:function(data)
            {
                $('.form').html($(data).find('.form'));
            },
            complete: function()
            {    
                $('html, body').animate({scrollTop:0});
                $('select').select2();
                //Metronic.init();
                //Layout.init();
                //TableAdvanced.init();
            }
        });

    });

    $(document).on('click','.editQueRecord', function(){

        var id = $(this).attr('rel');
        var url = $(this).attr('rev');
        var data={id:id};
        $.ajax({
            url : completeURL(url),
            type : 'POST',
            dataType : 'html',
            data:data,
            success:function(data)
            {
                $('.page_div').html($(data).find('.page_div'));
            },
            complete: function()
            {    
                $('html, body').animate({scrollTop:0});
                //$('select').select2();
                Metronic.init();
                Layout.init();
                TableAdvanced.init();
            }
        });

    });

    $(document).on('click','.deleteRecord' , function(){
        var deleteDiv = $(this);
        bootbox.confirm("Are you sure?", function(result) {
            if(result)
            {
                var id = deleteDiv.attr('rel');
                var url = deleteDiv.attr('rev');
                var tbDiv = deleteDiv.data('tbdiv');                
                var tbUrl = deleteDiv.data('tburl');

                $.ajax({
                    url : completeURL(url),
                    type:'POST',
                    dataType:'json',
                    data: "id="+id,
                    success:function(data)
                    {
                        bootbox.alert(data.msg, function() {    
                            refreshTable(tbDiv,tbUrl, data.id);  
                        }); 
                    }
                });
            }
        }); 

    }); 
    $(document).on('click','.deletesubRecord' , function(){
        var deleteDiv = $(this);
        bootbox.confirm("Are you sure?", function(result) {
            if(result)
            {
                var id = deleteDiv.attr('rel');
                var url = deleteDiv.attr('rev');
                var tbDiv = deleteDiv.data('tbdiv');                
                var tbUrl = deleteDiv.data('tburl');

                $.ajax({
                    url : completeURL(url),
                    type:'POST',
                    dataType:'json',
                    data: "id="+id,
                    success:function(data)
                    {
                        bootbox.alert(data.msg, function() {    
                            //refreshTable(tbDiv,tbUrl, data.id);
                            location.href=location.href;        
                        }); 
                    },
                    complete:function()
                    {                        
                                        
                    }
                });
                            
                //refreshTable(tbDiv,tbUrl);
            }
            else
            {
                
            }
        
        }); 

    }); 
    

    $(document).on('click','.clearData', function(){

        var formId = '#'+$(this).parents('form').attr('id');
        //alert(formId);
        $(formId).find('input:text, input:password, input:file, textarea, select').val('');
        $(formId).find('input:checkbox').removeAttr('checked').removeAttr('selected');
        $(formId).find('.select2-container').select2('val','0');
        $(formId).find('span.fileinput-exists').css('display','none');           
        $(formId).find('span.fileinput-new').css('display','block');            
        $(formId).find('.fileinput-filename').html(' ');
        $(formId).find('.fileinput-exists').removeClass('close');
        $(formId).find('input[type=radio]').prop('checked', false);
        
    });
    
    $(document).on('click','.addDynaRow',function(){ 
            var clonedRow = $(this).parents('tbody.appendDynaRow').find('tr:first').clone();
            clonedRow.find('select').val('');   
            clonedRow.find('input').val('');
            clonedRow.find('input[type=radio]').prop('checked', false);

            clonedRow.find("input:radio").unwrap();
            clonedRow.find("input:radio").unwrap();
            //$.uniform.update('refresh');

            clonedRow.find('span.fileinput-exists').css('display','none');           
            clonedRow.find('span.fileinput-new').css('display','block');            
            clonedRow.find('.fileinput-filename').html(' ');
            clonedRow.find('.fileinput-exists').removeClass('close');
            

            clonedRow.find('.tooltip').css('display','none');  
            clonedRow.find('div.datepickerMonth').datepicker({rtl: Metronic.isRTL(), autoclose: true, viewMode: 'months', minViewMode: 'months', format:'MM-yyyy', endDate:'+30d'});     
            clonedRow.find('div.addDeleteButton').append('<span class="tooltips deleteParticularRow" data-placement="top" data-original-title="Remove" style="cursor: pointer;">'+                                                  
                                                            '<i class="fa fa-trash-o"></i>'+                                                    
                                                        '</span>');
            clonedRow.find('.tooltips').tooltip({placement: 'top'});
            $(this).parents('tbody.appendDynaRow').append(clonedRow);       
           /* Metronic.init(); // init metronic core componets*/

             var k=0; 
             $("tbody.appendDynaRow  tr").each(function() {
                k++;
                $(this).find('input[type=radio]').val(k);
                $(this).find('input[type=file]').attr("name","option_image_"+k);
                $(this).find('.hidden_option_image').attr("name","hidden_option_image_"+k);
                
            }); 
            Metronic.init();
            //Layout.init(); // init layout
    });

    $(document).on('click','.addDynaRowQue',function(){ 
            var clonedRow = $(this).parents('tbody.appendDynaRow').find('tr:first').clone();
            clonedRow.find('select').val('');   
            clonedRow.find('input').val('');
            clonedRow.find('input[type=radio]').prop('checked', false);

            clonedRow.find("input:radio").unwrap();
            clonedRow.find("input:radio").unwrap();
            //$.uniform.update('refresh');

            clonedRow.find('span.fileinput-exists').css('display','none');           
            clonedRow.find('span.fileinput-new').css('display','block');            
            clonedRow.find('.fileinput-filename').html(' ');
            clonedRow.find('.fileinput-exists').removeClass('close');
            

            clonedRow.find('.tooltip').css('display','none');  
            clonedRow.find('div.datepickerMonth').datepicker({rtl: Metronic.isRTL(), autoclose: true, viewMode: 'months', minViewMode: 'months', format:'MM-yyyy', endDate:'+30d'});     
            // clonedRow.find('div.addDeleteButton').append('<span class="tooltips deleteParticularRow" data-placement="top" data-original-title="Remove" style="cursor: pointer;">'+                                                  
            //                                                 '<i class="fa fa-trash-o"></i>'+                                                    
            //                                             '</span>');
            clonedRow.find('.tooltips').tooltip({placement: 'top'});
            $(this).parents('tbody.appendDynaRow').append(clonedRow);       
           /* Metronic.init(); // init metronic core componets*/

             var k=0; 
             $("tbody.appendDynaRow  tr").each(function() {
                k++;
                $(this).find('input[type=radio]').val(k);
                $(this).find('input[type=file]').attr("name","option_image_"+k);
                $(this).find('.hidden_option_image').attr("name","hidden_option_image_"+k);
                
            }); 
            Metronic.init();
            //Layout.init(); // init layout
    });

    $(document).on('click','.deleteParticularRow', function(){      
        $(this).closest('tr').remove();    
         var k=0; 
         $("tbody.appendDynaRow  tr").each(function() {
            k++;
            $(this).find('input[type=radio]').val(k);
            $(this).find('input[type=file]').attr("name","option_image_"+k);
            
        });  
    });

    $(document).on('click','#saveTyping', function(){
        var btn=$(this);
        var textAreaDetails = $('#typingTest').val();       
        var passage_id = $('#passage_id').val();       
        btn.prop('disabled',true);
        bootbox.confirm("Are you sure you want to finish ?", function(result) {
            if (result) {
               $.ajax({
                        url : completeURL('save_typing'),
                        type:'POST',
                        dataType:'json',
                        data: {val:textAreaDetails,passage_id:passage_id},
                        success:function(data)
                        {
                           if(data.valid)
                            {
                               bootbox.alert(data.msg, function() {
                               location.href=completeURL(data.redirect);
                            });  
                            }else
                            {
                                 bootbox.alert(data.msg, function() {
                               //location.href=data.redirect();
                            });  
                            }
                        },
                        complete:function()
                        {
                            
                        }
                    });     
            } else {
                btn.removeAttr('disabled');    
               /*submit_test();*/  
            }
        });  
                        
    });

    $(document).on('click','.deleteRow', function(){    

        var deleteRow = $(this);
        var url= $(this).attr('rev');
        var id= $(this).attr('rel');
        //var id = $(this).parents('tr').find('td.highlight').find(':input.loa_auth_operation_id').val();
        bootbox.confirm("Are you sure?", function(result) {

            if(result)
            {
                
                $.ajax({
                    url : completeURL(url),
                    type:'POST',
                    dataType:'json',
                    data: "id="+id,
                    success:function(data)
                    {
                        bootbox.alert(data.msg, function() {                
                            if(data.valid)
                            {
                                deleteRow.closest('tr').remove();
                            }                           
                        }); 
                    },
                    complete:function()
                    {
                       var k=0; 
                         $("tbody.appendDynaRow  tr").each(function() {
                            k++;
                            $(this).find('input[type=radio]').val(k);
                            $(this).find('input[type=file]').attr("name","option_image_"+k);
                            $(this).find('.hidden_option_image').attr("name","hidden_option_image_"+k);
                            
                        });  
                    }

                });
                            
                //refreshTable(tbDiv,tbUrl);
            }
            else
            {
                
            }
        
        }); 
    });

    $(document).on('click','.model_form',function(){
        
        var select_url=$(this).attr('rev');
        var this_id='#'+ $(this).attr('id');
        var url=$(this).attr('rel');
        var title=$(this).data('title');
        $.ajax({
            url:completeURL(url),          
            type:'POST',
            dataType:'json',
            success: function(data)
            {
                var dialog = bootbox.dialog({
                    message: data.view,
                    title: title,
                    buttons: 
                    {
                        success: {
                            label: "Submit",
                            className: "green changeButtonType",
                            callback: function() 
                            {
                                var form= '#'+ $('.changeButtonType').parents('.modal-content').find('.modal-body').find('form').attr('id');
                                var form_url=$(form).attr('action');
                                var form2 = $(form);
                                var error2 = $('.alert-danger', form2);
                                var success2 = $('.alert-success', form2);
                                var serialize_data = $(form2).serialize();

                                var $validate = $(form).validate({
                                    errorElement: 'span', //default input error message container
                                    errorClass: 'help-block', // default input error message class
                                    focusInvalid: false, // do not focus the last invalid input
                                    ignore: "",  // validate all fields including form hidden input,
                                    debug: true,
                                    rules: {
                                            
                                        },

                                    invalidHandler: function (event, validator) { //display error alert on form submit              
                                        success2.hide();
                                        error2.show();
                                        Metronic.scrollTo(error2, -200);
                                    },

                                    errorPlacement: function (error, element) { // render error placement for each input type
                                        var icon = $(element).parent('.input-icon').children('i');
                                        icon.removeClass('fa-check').addClass("fa-warning");  
                                        icon.attr("data-original-title", error.text()).tooltip({'container': 'body'});
                                    }, 

                                    highlight: function (element) { // hightlight error inputs
                                        $(element)
                                            .closest('.form-group').removeClass("has-success").addClass('has-error'); // set error class to the control group   
                                    },

                                    unhighlight: function (element) { // revert the change done by hightlight
                                        $(element)
                                            .closest('.form-group').removeClass('has-error'); // set error class to the control group
                                    },

                                    success: function (label, element) {
                                        var icon = $(element).parent('.input-icon').children('i');
                                        $(element).closest('.form-group').removeClass('has-error').addClass('has-success'); // set success class to the control group
                                        icon.removeClass("fa-warning").addClass("fa-check");
                                    },

                                    submitHandler: function (form) {
                                        
                                    }
                                }).form();

                               /* $('.select2me', form2).change(function () {
                                    $(form).validate().element($(this)); //revalidate the chosen dropdown value and show error or success message for the input
                                });*/                         
                                
                                var $valid = $(form).valid();
                                if(!$valid) 
                                {                                                               
                                    return false;
                                }
                                else
                                {                               
                                    $('.changeButtonType').attr('disabled','disabled');                     
                                   
                                    $(form2).ajaxSubmit({
                                        type:'POST',
                                        url:completeURL(form_url),
                                        data:serialize_data,
                                        dataType:'json',
                                        success: function(data)
                                        {
                                            bootbox.alert(data.msg, function() {                            
                                                resetForm(form2); 
                                                
                                                $.ajax({
                                                    type:'POST',
                                                    url:completeURL(select_url),
                                                    dataTypes:'json',
                                                    success:function(data)
                                                    {
                                                       $(this_id).parents('.form-group').find('#reference').html(data);
                                                    }                                                    
                                                })                                       
                                                $('.changeButtonType').removeAttr('disabled');
                                            }); 
                                        }
                                    });
                                }
                            }
                        },

                        danger: {
                            label: "Cancel",
                            className: "btn-danger",
                            callback: function() {
                                // Example.show("uh oh, look out!");
                            }
                        }                   
                    }
                });
            },
            complete: function()
            {    
                $('textarea.ckeditor1').ckeditor({
                    toolbar: [
                        [ 'Bold', 'Italic', '-', 'NumberedList', 'BulletedList', '-', 'Link', 'Unlink' ],
                        [ 'FontSize', 'TextColor', 'BGColor' ]
                    ]
                });               
            } 

        });
    });

    var file_value='';

    $(document).on('click', '.todo-project-list li a', function () {
        file_value = $(this).html();
    });    

    $(document).on('click','.attachment_btn',function(){
        var url='load_file_select';
       
        $.ajax({
            url:completeURL(url),          
            type:'POST',
            dataType:'json',
            success: function(data)
            {
                var dialog = bootbox.dialog({
                    message: data.view,
                    title: 'Select File',
                    buttons: 
                    {
                        Attach: {
                            label: "Attach",
                            className: "btn changeButtonType",
                            callback: function() 
                            {
                               $('.attachment_file').val(file_value);
                            }
                        }             
                    }
                });
            },
            complete: function()
            {    
                         
            } 

        });
    });

    $(document).on('change','.clanguage',function(){
        var lang = $(this).val();  
        if(lang==1)  
        {
            $('.chang_lang').addClass('marathi');
        } 
        else
        {
            $('.chang_lang').removeClass('marathi');
        }
    }); 

});

	
function refreshTable(divId, url, id)
{    
    $.ajax({
        url:completeURL(url),
        dataType : 'html',
        type : 'POST',
        data: {id : id},
        success:function(data)
        {    
            $(divId).html(data); 
            $(".tooltips").tooltip({placement: 'top', trigger: 'hover'});                  
        },
        complete:function()
        {
           /* if($(".masterTable").length > 0)
            {
                $('.masterTable').dataTable({
                    "aLengthMenu": [
                        [5, 15, 20, -1],
                        [5, 15, 20, "All"] // change per page values here
                    ],
                    // set the initial value
                    "iDisplayLength": 5,
                    "sPaginationType": "bootstrap",
                    "oLanguage": {
                        "sLengthMenu": "_MENU_ records",
                        "oPaginate": {
                            "sPrevious": "Prev",
                            "sNext": "Next"
                        }
                    },
                    "aoColumnDefs": [
                        { 'bSortable': false, 'aTargets': [0] },
                        { "bSearchable": false, "aTargets": [ 0 ] }
                    ]
                });

                jQuery('.dataTables_wrapper .dataTables_filter input').addClass("form-control input-inline"); // modify table search input
                jQuery('.dataTables_wrapper .dataTables_length select').addClass("form-control input-xsmall input-inline"); // modify table per page dropdown
                jQuery('.dataTables_wrapper .dataTables_length select').select2(); // initialize select2 dropdown
            }*/

             TableAdvanced.init();

                  
        }
    });     
}

/*Start of Reset Form*/
function resetForm(id) 
{
    $(id).find('input:text, input:password, input:file, textarea, select').val('');
    $(id).find('input:checkbox').removeAttr('checked').removeAttr('selected');
    //$(id).fileupload('reset')
    //$(id).find('.select2-container').select2('val','0');
}
/*End of reset form*/
function getCookie(key) 
{  
   var keyValue = document.cookie.match('(^|;) ?' + key + '=([^;]*)(;|$)');  
   return keyValue ? keyValue[2] : null;  
} 
function replaceurl(url)
{
    var url1=url.replace("%3A",":");
    var url2=url1.replace(/%2F/g,"/");  
    return url2;
}
function completeURL(url)
{
    try
    {
        var target= getCookie('ecommerce')+url;
        target=replaceurl(target);
        return replaceurl(target);      
    }
    catch(e)
    {
        alert(e);
    }

}  