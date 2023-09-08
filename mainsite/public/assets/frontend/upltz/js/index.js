$(document).ready(function() {

	$("body").on("submit", "#notifyMe", function() {
        if ($("#newsletteremail").val() == "") {
            $("#newsletteremail").focus('');
            return false;
        }
        else {
			
			var ERR=false;
            if ($("#newsletteremail").val().length == 0) {
                error += "<li>Title: empty</li>";
                $("#newsletteremail").addClass("error");
                ERR = true;
            }
			
            if (ERR) {
                $("#menwsletter-error-msg").html("<ol style='margin-bottom:0px;'>" + error + "</ol>").removeClass("hidden");
                //$("html, body").animate({scrollTop: 0}, "slow");
                return false;
            }else {
                $(this).ajaxSubmit({
                    dataType: "json",
                    beforeSubmit: function(arr, $form, options) {
                        $("#notifyMeButton").attr("disabled", true);
						$('#mydiv').css('display', 'block');
                    },
                    success: function(response) {
						
						$('#mydiv').css('display', 'none');
						$("#notifyMeButton").attr("disabled", false);
						if(response.status){
							Lobibox.alert('success', {
								msg: response.msg
							});

							$("#newsletteremail").val('');
						}else{
							Lobibox.alert('error', {
								msg: response.msg
							});
						}
                    }
                });
                return false;
            }
        }
    });
	
	$("body").on("keypress", "#enq_to_uplatz input, #enq_to_uplatz textarea", function() {
			$(this).css('border-bottom', '1px solid #ccc');
	});

	$("body").on("keypress", "#enq_to_uplatz_h input, #enq_to_uplatz_h textarea", function() {
			$(this).css('border-bottom', '1px solid #ccc');
	});

	$("body").on("submit", "#enq_to_uplatz", function() {
        var flag = 1;
        var full_name = $('#full_name').val().trim();
        var email_address = $('#email_address').val().trim();
        var mobile_number = $('#mobile_number').val().trim();
        var message = $('#message').val().trim();

        var email_regx = /\S+@\S+\.\S+/;
        var phone_regx = /^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/im

        if (message == '') {
            $('#message').css('border-bottom', '1px solid #f00');
            flag = 0;
        }
        else
            $('#message').css('border-bottom', '1px solid #ccc');

        if (full_name == '') {
            $('#full_name').css('border-bottom', '1px solid #f00');
            flag = 0;
        }
        else
            $('#full_name').css('border-bottom', '1px solid #ccc');

        if (email_address == '' || !email_regx.test(email_address)) {
            $('#email_address').css('border-bottom', '1px solid #f00');
            flag = 0;
        }
        else
            $('#email_address').css('border-bottom', '1px solid #ccc');

        if (mobile_number == '' || !phone_regx.test(mobile_number)) {
            $('#mobile_number').css('border-bottom', '1px solid #f00');
            flag = 0;
        }
        else
            $('#mobile_number').css('border-bottom', '1px solid #ccc');

	   if (flag == 1) {

				$(this).ajaxSubmit({
					dataType: "json",
					beforeSubmit: function(arr, $form, options) {
						$("#sendInquiry").attr("disabled", true);
						$('#mydiv').css('display', 'block');
					},
					success: function(response) {
						
						$('#mydiv').css('display', 'none');
						$("#sendInquiry").attr("disabled", false);
						
						if(response.status){

							Lobibox.alert('success', {
								msg: response.msg
							});

							$("#enq_to_uplatz input, #enq_to_uplatz textarea").each(function()
							{
								$(this).val('');
							});

						}else{

							Lobibox.alert('error', {
								msg: response.msg
							});
						}
					}
				});
				return false;
			}else{
				return false;
			}

    });

    // header inquiry
    $("body").on("submit", "#enq_to_uplatz_h", function() {
        var flag = 1;
        var full_name = $('#h_full_name').val().trim();
        var email_address = $('#h_email_address').val().trim();
        var mobile_number = $('#h_mobile_number').val().trim();
        var message = $('#h_message').val().trim();

        var email_regx = /\S+@\S+\.\S+/;
        var phone_regx = /^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/im

        if (message == '') {
            $('#h_message').css('border-bottom', '1px solid #f00');
            flag = 0;
        }
        else
            $('#h_message').css('border-bottom', '1px solid #ccc');

        if (full_name == '') {
            $('#h_full_name').css('border-bottom', '1px solid #f00');
            flag = 0;
        }
        else
            $('#h_full_name').css('border-bottom', '1px solid #ccc');

        if (email_address == '' || !email_regx.test(email_address)) {
            $('#h_email_address').css('border-bottom', '1px solid #f00');
            flag = 0;
        }
        else
            $('#h_email_address').css('border-bottom', '1px solid #ccc');

        if (mobile_number == '' || !phone_regx.test(mobile_number)) {
            $('#h_mobile_number').css('border-bottom', '1px solid #f00');
            flag = 0;
        }
        else
            $('#h_mobile_number').css('border-bottom', '1px solid #ccc');

	   if (flag == 1) {

				$(this).ajaxSubmit({
					dataType: "json",
					beforeSubmit: function(arr, $form, options) {
						$("#sendHInquiry").attr("disabled", true);
						$('#mydiv').css('display', 'block');
					},
					success: function(response) {
						
						$('#mydiv').css('display', 'none');
						$("#sendHInquiry").attr("disabled", false);
						
						if(response.status){
							Lobibox.alert('success', {
								msg: response.msg
							});

							$("#enq_to_uplatz_h input, #enq_to_uplatz_h textarea").each(function()
							{
								$(this).val('');
							});

						}else{
							Lobibox.alert('error', {
								msg: response.msg
							});
						}
					}
				});
				return false;
			}else{
				return false;
			}

    });

    // contact_from_to_uplatz

    $("body").on("keypress", "#contact_from_to_uplatz input, #contact_from_to_uplatz textarea", function() {
			$(this).css('border-bottom', '1px solid #ccc');
	});

	$("body").on("submit", "#contact_from_to_uplatz", function() {
        var flag = 1;
        var full_name = $('#full_name').val().trim();
        var email_address = $('#email_address').val().trim();
        var mobile_number = $('#mobile_number').val().trim();
        var message = $('#message').val().trim();
        var subject = $('#subject').val().trim();

        var email_regx = /\S+@\S+\.\S+/;
        var phone_regx = /^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/im

        if (subject == '') {
            $('#subject').css('border-bottom', '1px solid #f00');
            flag = 0;
        }
        else
            $('#subject').css('border-bottom', '1px solid #ccc');

        if (message == '') {
            $('#message').css('border-bottom', '1px solid #f00');
            flag = 0;
        }
        else
            $('#message').css('border-bottom', '1px solid #ccc');

        if (full_name == '') {
            $('#full_name').css('border-bottom', '1px solid #f00');
            flag = 0;
        }
        else
            $('#full_name').css('border-bottom', '1px solid #ccc');

        if (email_address == '' || !email_regx.test(email_address)) {
            $('#email_address').css('border-bottom', '1px solid #f00');
            flag = 0;
        }
        else
            $('#email_address').css('border-bottom', '1px solid #ccc');

        if (mobile_number == '' || !phone_regx.test(mobile_number)) {
            $('#mobile_number').css('border-bottom', '1px solid #f00');
            flag = 0;
        }
        else
            $('#mobile_number').css('border-bottom', '1px solid #ccc');

	   if (flag == 1) {

			$(this).ajaxSubmit({
				dataType: "json",
				beforeSubmit: function(arr, $form, options) {
					$("#sendContact").attr("disabled", true);
					$('#mydiv').css('display', 'block');
				},
				success: function(response) {
					
					$('#mydiv').css('display', 'none');
					$("#sendContact").attr("disabled", false);
					
					if(response.status){
						Lobibox.alert('success', {
							msg: response.msg
						});

						$("#contact_from_to_uplatz input, #contact_from_to_uplatz textarea").each(function()
						{
							$(this).val('');
						});

					}else{
						Lobibox.alert('error', {
							msg: response.msg
						});
					}
				}
			});
			return false;

		}else{

			return false;

		}

    });

});