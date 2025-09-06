var Login = function () {
	
	var handleLogin = function() {
		//alert($('.login-form'));
		$('.login-form').validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            rules: {
                username: {
                    required: true
                },
                password: {
                    required: true
                },
                /*remember: {
                    required: false
                }*/
            },

            /*messages: {
                username: {
                    required: "Username is required."
                },
                password: {
                    required: "Password is required."
                }
            },*/

            invalidHandler: function (event, validator) { //display error alert on form submit   
                $('.alert-danger', $('.login-form')).show();
            },

            highlight: function (element) { // hightlight error inputs
                $(element)
                    .closest('.form-group').addClass('has-error'); // set error class to the control group
            },

            success: function (label) {
                label.closest('.form-group').removeClass('has-error');
                label.remove();
            },

            errorPlacement: function (error, element) {
                //error.insertAfter(element.closest('.input-icon'));
            },

            submitHandler: function (form) {                
            	var email = $('#useremail').val();	            	            	          	         
		        var pass = $('#userpass').val();	
		        		        
		        var md5 = $().crypt({method:"md5",source:pass}); 
		        //alert(md5);
		        /*alert(md5);
		        var sha = $().crypt({method:"sha1",source:md5});
		        alert(sha);
		        var md = $().crypt({method:"md5",source:sha});
		        alert(md);*/  

		        if(email!='' && pass!='')
		        {

		            var submitBt = $('.login-form').find('button[type=submit]');
		            submitBt.attr('disabled','disabled');              
		            var target = $('.login-form').attr('action');			                      
		              
		            if (!target || target == '')
		            {                        
		                target = document.location.href.match(/^([^#]+)/)[1];
		            }
		            //alert($('#user_role').val());            
		            var data = {
		                key: $('#keyValue').val(),
		                email: email,
		                password: md5,
		                user_role:$('#user_role').val()           
		            };

		            var sendTimer = new Date().getTime();			            
	                try
	                {  
	                	//alert();

	                    $.ajax({
	                        url: target,
	                        dataType: 'json',
	                        type: 'POST',
	                        data: data,
	                        success: function(data, textStatus, XMLHttpRequest)
	                        {
	                            if (data.valid)
	                            {
	                            	$('.alert-success', $('.login-form')).show();		                            	
	                                var receiveTimer = new Date().getTime();			                                
	                                if (receiveTimer-sendTimer < 500)
	                                {
	                                    setTimeout(function()
	                                    {
	                                        document.location.href = data.redirect;
	                                    }, 500-(receiveTimer-sendTimer));
	                                }
	                                else
	                                {
	                                	//alert(data.redirect);
	                                	$('.alert-success', $('.login-form')).html(data.msg).show();
	                                	
										if(data.redirect=='')
	                                	{
	                                		window.location.href=window.location.href;
	                                	}
	                                	else
	                                	{
	                                		document.location.href = data.redirect;
	                                	}	                                	                                 
	                                }
	                            }
	                            else
	                            {
	                                // Message
	                                $('.alert-success', $('.login-form')).hide();
	                                $('.alert-wrong-user', $('.login-form')).show();                   
	                            }	  		                           
	                            submitBt.removeAttr('disabled');
	                        },
	                        error: function(XMLHttpRequest, textStatus, errorThrown)
	                        {
	                            // Message
	                            //$('#').css('display','block').html('<div class="alert alert-error">Error while contacting server, please try again</div>').fadeOut(5000);                    
	                            //resetForm($this);
	                            submitBt.removeAttr("disabled");
	                        },
	                        complete: function(data)
	                        {                  
	                            setTimeout(function(){                   
	                                $('#adminpass').val('');
	                            },2000);
	                        }  
	                    });
	                }
	                catch(e)
	                {
	                    alert(e)
	                }   
		            
		            //$('#adminMsg').css('display','block').html('<div class="alert alert-block">Please wait, checking login...</div>');                    
		            $('.alert-wrong-user', $('.login-form')).hide(); 
		            $('.alert-success', $('.login-form')).show();
		        }
		    }
        });

	        /*$('.login-form input').keypress(function (e) {
	            if (e.which == 13) {
	                if ($('.login-form').validate().form()) {
	                    $('.login-form').submit();
	                }
	                return false;
	            }
	        });*/

			$('.login-form input').keypress(function (e) {
	            if (e.which == 13) {

	                if ($('.login-form').validate().form()) {

	                	var email = $('#useremail').val();		            	          
				        var pass = $('#userpass').val();				       
				        var md5 = $().crypt({method:"md5",source:pass});
				        /*alert(md5);
				        var sha = $().crypt({method:"sha1",source:md5});
				        alert(sha);
				        var md = $().crypt({method:"md5",source:sha});
				        alert(md);*/  

				        if(email!='' && pass!='')
				        {
				            var submitBt = $('.login-form').find('button[type=submit]');
				            submitBt.attr('disabled','disabled');              
				            var target = $('.login-form').attr('action');			                      
				              
				            if (!target || target == '')
				            {                        
				                target = document.location.href.match(/^([^#]+)/)[1];
				            }
				                        
				            var data = {
				                key: $('#keyValue').val(),
				                email: email,
				                password: md5,
				                user_role:$('#user_role').val()           
				            };
				                
				            var sendTimer = new Date().getTime();			            
			                try
			                {  
			                    $.ajax({
			                        url: target,
			                        dataType: 'json',
			                        type: 'POST',
			                        data: data,
			                        success: function(data, textStatus, XMLHttpRequest)
			                        {
			                            if (data.valid)
			                            {
			                            	$('.alert-success', $('.login-form')).show();
			                            	
			                                var receiveTimer = new Date().getTime();			                                
			                                if (receiveTimer-sendTimer < 500)
			                                {
			                                    setTimeout(function()
			                                    {
			                                        document.location.href = data.redirect;
			                                    }, 500-(receiveTimer-sendTimer));
			                                }
			                                else
			                                {
			                                	$('.alert-success', $('.login-form')).html(data.msg).show();
			                                	setTimeout(function(){                   
					                                if(data.redirect==3)
				                                	{
				                                		window.location.href=window.location.href;
				                                	}
				                                	else
				                                	{
				                                		document.location.href = data.redirect;
				                                	} 
					                            },2000);
			                                	                                 
			                                }
			                            }
			                            else
			                            {
			                                // Message
			                                $('.alert-success', $('.login-form')).hide();
			                                $('.alert-wrong-user', $('.login-form')).show();                   
			                            }			                           
			                            submitBt.removeAttr('disabled');
			                        },
			                        error: function(XMLHttpRequest, textStatus, errorThrown)
			                        {
			                            // Message
			                            $('#adminMsg').css('display','block').html('<div class="alert alert-error">Error while contacting server, please try again</div>').fadeOut(5000);                    
			                            //resetForm($this);
			                            submitBt.removeAttr("disabled");
			                        },
			                        complete: function(data)
			                        {                  
			                            setTimeout(function(){                   
			                                $('#adminpass').val('');
			                            },2000);
			                        }  
			                    });
			                }
			                catch(e)
			                {
			                    alert(e)
			                }   
				            
				            //$('#adminMsg').css('display','block').html('<div class="alert alert-block">Please wait, checking login...</div>');                    
				            $('.alert-wrong-user', $('.login-form')).hide(); 
				            $('.alert-success', $('.login-form')).show();
				        } 

	                }
	                return false;
	            }
	        });
	}

	var handleForgetPassword = function () {
		$('.forget-form').validate({
	            errorElement: 'span', //default input error message container
	            errorClass: 'help-block', // default input error message class
	            focusInvalid: false, // do not focus the last invalid input
	            ignore: "",
	            rules: {
	                email: {
	                    required: true,
	                    email: true
	                }
	            },

	            messages: {
	                email: {
	                    required: "Email is required."
	                }
	            },

	            invalidHandler: function (event, validator) { //display error alert on form submit   

	            },

	            highlight: function (element) { // hightlight error inputs
	                $(element)
	                    .closest('.form-group').addClass('has-error'); // set error class to the control group
	            },

	            success: function (label) {
	                label.closest('.form-group').removeClass('has-error');
	                label.remove();
	            },

	            errorPlacement: function (error, element) {
	                error.insertAfter(element.closest('.input-icon'));
	            },

	            submitHandler: function (form) {
	               // $('.loding_img').css('display','block');
	            	var url = $(form).attr('action');
	               $(".alert-success").find("span").html("Please wait...");
					$(".alert-danger").hide();
					$(".alert-success").show();
					
	                $.ajax({
	                    type:'POST',
	                    url:url,
	                    dataType:'json',
	                    data:{email:$(".forget_email").val(),role:$(".role").val()},
	                    success:function(data)
	                    {	                    	
	                    	if(data.valid)
	                    	{
	                    		$(".alert-error-reg").hide(); 
	                    		$(".alert-success-reg").show();
	                    		$(".alert-success-reg").find("span").html(data.msg);
	                    	}
	                    	else
	                    	{
	                    		$(".alert-success-reg").hide();
	                    		$(".alert-error-reg").show();
	                    		$(".alert-error-reg ").find("span").html(data.msg);

	                    	}
		                	//$('.loding_img').css('display','none');
	                    },
	                    complete:function()
	                    {
	                    	
	                    }
                   });

	                //form.submit();
	            }
	        });

	        $('.forget-form input').keypress(function (e) {
	            if (e.which == 13) {
	                if ($('.forget-form').validate().form()) {
	                    $('.forget-form').submit();
	                }
	                return false;
	            }
	        });

	        jQuery('#forget-password').click(function () {
	            jQuery('.login-form').hide();
	            jQuery('.forget-form').show();
	        });

	        jQuery('#back-btn').click(function () {
	            jQuery('.login-form').show();
	            jQuery('.forget-form').hide();
	        });

	}

	var handleRegister = function () {

		function format(state) {
            if (!state.id) return state.text; // optgroup
            return "<img class='flag' src='../../assets/global/img/flags/" + state.id.toLowerCase() + ".png'/>&nbsp;&nbsp;" + state.text;
        }


		/*$("#select2_sample4").select2({
		  	placeholder: '<i class="fa fa-map-marker"></i>&nbsp;Select a Country',
            allowClear: true,
            formatResult: format,
            formatSelection: format,
            escapeMarkup: function (m) {
                return m;
            }
        });


			$('#select2_sample4').change(function () {
                $('.register-form').validate().element($(this)); //revalidate the chosen dropdown value and show error or success message for the input
            });*/



         $('.register-form').validate({
	            errorElement: 'span', //default input error message container
	            errorClass: 'help-block', // default input error message class
	            focusInvalid: false, // do not focus the last invalid input
	            ignore: "",
	            rules: {
	                
	                fullname: {
	                    required: true
	                },
	                email: {
	                    required: true,
	                    email: true
	                },
	                mobile_no: {
	                    required: true
	                },
	                organisation: {
	                    required: true
	                },
	                designation: {
	                    required: true
	                },      

	                tnc: {
	                    required: true
	                }
	            },

	            messages: { // custom messages for radio buttons and checkboxes
	                tnc: {
	                    required: "Please accept TNC first."
	                }
	            },

	            invalidHandler: function (event, validator) { //display error alert on form submit   

	            },

	            highlight: function (element) { // hightlight error inputs
	                $(element)
	                    .closest('.form-group').addClass('has-error'); // set error class to the control group
	            },

	            success: function (label) {
	                label.closest('.form-group').removeClass('has-error');
	                label.remove();
	            },

	            errorPlacement: function (error, element) {
	                if (element.attr("name") == "tnc") { // insert checkbox errors after the container                  
	                    error.insertAfter($('#register_tnc_error'));
	                } else if (element.closest('.input-icon').size() === 1) {
	                    error.insertAfter(element.closest('.input-icon'));
	                } else {
	                	error.insertAfter(element);
	                }
	            },

	            submitHandler: function (form) {
	            	
	                $('.loding_img').css('display','block');

	            	var url = $(form).attr('action');
	                var serialize_data = $(form).serialize();  
					$(".alert-success-reg",$(form)).find("span").html("Please wait...");
					$(".alert-danger",$(form)).hide();
					$(".alert-success",$(form)).show();
					//alert(completeURL(url));

	                $.ajax({
	                    type:'POST',
	                    url:url,
	                    dataType:'json',
	                    data:serialize_data,
	                    success:function(data)
	                    {	                    	
	                    	//Metronic.unblockUI('.register-form');
	                    	if(data.valid)
	                    	{
	                    		//$(form).reset();
	                    	
	                    		 
	                    		
                                
	                    		setTimeout(function(){
								resetForm(form);
								$(".alert-error-reg",$(form)).hide(); 
	                    		$(".alert-success-reg",$(form)).show();
	                    		$(".alert-success-reg",$(form)).find("span").html(data.msg);
								location.href=data.redirect;},5000);
	                    		
	                    	}
	                    	else
	                    	{
	                    		$(".alert-success-reg",$(form)).hide();
	                    		$(".alert-error-reg",$(form)).show();
	                    		$(".alert-error-reg",$(form)).find("span").html(data.msg);

	                    	}
		                	$('.loding_img').css('display','none');
	                    },
	                    complete:function()
	                    {
	                    	/*$(':input').each(function(){
	                    		$(this).val('');
	                    	});*/
							/* */
	                    }
                   });
	                //form.submit();
	            }
	        });

			$('.register-form input').keypress(function (e) {
	            if (e.which == 13) {
	                if ($('.register-form').validate().form()) {
	                    $('.register-form').submit();
	                }
	                return false;
	            }
	        });

	        jQuery('#register-btn').click(function () {
	        	//alert(1);;
	            jQuery('.login-form').hide();
	            jQuery('.register-form').show();
	        });

	        jQuery('#register-back-btn').click(function () {
	            jQuery('.login-form').show();
	            jQuery('.register-form').hide();
	        });
	}
    
    return {
        //main function to initiate the module
        init: function () {
        	
            handleLogin();
            //handleForgetPassword();
            handleRegister();    
        }

    };

}();

/*Start of Reset Form*/
function resetForm(id) 
{
	$(id).find('input:text, input:password, input:file, textarea, select').val('');
	//$(id).find('input:checkbox').removeAttr('checked').removeAttr('selected');
    $(id).find('input:checkbox').prop('checked', false).uniform(); 
    
    //$.uniform.restore(':checkbox');
    //$(":checkbox").uniform();
}
/*End of reset form*/
