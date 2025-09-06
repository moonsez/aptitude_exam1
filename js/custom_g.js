$(document).ready(function () {
  // script to clear response
  // $(document).on("click", ".que_clear_res", function () {
  //   var question = $(this).closest('.question');
  //   var classes = $(this).closest('.question').attr('class').split(' ');
  //   var specificClass = classes.find(cls => cls.startsWith('question_'));
  //   var lastNumber = specificClass.split('_').pop();
  //   question.find('input').parent().removeClass('checked');
  //   $(`.btn__${lastNumber}`).removeClass('green');
  // });

  // New JS to clear response
  $(document).on("click", ".que_clear_res", function () {
    var question = $(this).closest(".question");

    // Get the specific class for the question to identify the number (used to remove the selected styles)
    var classes = question.attr("class").split(" ");
    var specificClass = classes.find((cls) => cls.startsWith("question_"));
    var lastNumber = specificClass.split("_").pop();

    // Remove checked class and clear the response visually
    question.find("input").parent().removeClass("checked");
    $(`.btn__${lastNumber}`).removeClass("green").removeClass("mark_review");

    // Uncheck all the input elements related to this question
    question.find("input").prop("checked", false);
});

  // script for mark for review
  // $(document).on("click", ".que_mark_review", function () {
  //   var question = $(this).closest('.question');
  //   var classes = $(this).closest('.question').attr('class').split(' ');
  //   var specificClass = classes.find(cls => cls.startsWith('question_'));
  //   var lastNumber = specificClass.split('_').pop();
  //   question.find('input').parent().removeClass('checked');
  //   $(`.btn__${lastNumber}`).addClass('mark_review');
  // });

  $(document).on("click", ".que_mark_review", function () {
    var question = $(this).closest(".question");
    var classes = question.attr("class").split(" ");
    var specificClass = classes.find((cls) => cls.startsWith("question_"));
    var lastNumber = specificClass.split("_").pop();

   // question.find("input").parent().removeClass("checked");
    $(`.btn__${lastNumber}`).addClass("mark_review");
  });

  $(document).on("click", ".question input[type='radio']", function () {
    var question = $(this).closest(".question");
    var classes = question.attr("class").split(" ");
    var specificClass = classes.find((cls) => cls.startsWith("question_"));
    var lastNumber = specificClass.split("_").pop();

   // question.find("input").parent().removeClass("checked"); // Remove previous selection
    $(this).parent().addClass("checked"); // Add green class to the selected option

    $(`.btn__${lastNumber}`).removeClass("mark_review"); // Remove blue class if an option is selected
  });



  $(document).on("click", ".update_word_result", function () {
    var rel = $(this).attr("rel");

    var heading = $("#heading").val();
    var reference_no_date = $("#reference_no_date").val();
    var addr_of_recipient = $("#addr_of_recipient").val();
    var subject_reference = $("#subject_reference").val();
    var salutation = $("#salutation").val();
    var paragraph = $("#paragraph").val();
    var sign_your_name = $("#sign_your_name").val();
    var enclosure = $("#enclosure").val();

    var auto_heading = $("#auto_heading").val();
    var auto_reference_no_date = $("#auto_reference_no_date").val();
    var auto_addr_of_recipient = $("#auto_addr_of_recipient").val();
    var auto_subject_reference = $("#auto_subject_reference").val();
    var auto_salutation = $("#auto_salutation").val();
    var auto_paragraph = $("#auto_paragraph").val();
    var auto_sign_your_name = $("#auto_sign_your_name").val();
    var auto_enclosure = $("#auto_enclosure").val();

    /*if(heading!='')
        {*/
    var data = {
      rel: rel,
      heading: heading,
      reference_no_date: reference_no_date,
      addr_of_recipient: addr_of_recipient,
      subject_reference: subject_reference,
      salutation: salutation,
      paragraph: paragraph,
      sign_your_name: sign_your_name,
      enclosure: enclosure,
      auto_heading: auto_heading,
      auto_reference_no_date: auto_reference_no_date,
      auto_addr_of_recipient: auto_addr_of_recipient,
      auto_subject_reference: auto_subject_reference,
      auto_salutation: auto_salutation,
      auto_paragraph: auto_paragraph,
      auto_sign_your_name: auto_sign_your_name,
      auto_enclosure: auto_enclosure,
    };
    /*}
        else
        {
            var data = {rel:rel,auto_heading:auto_heading,auto_reference_no_date:auto_reference_no_date,auto_addr_of_recipient:auto_addr_of_recipient,auto_subject_reference:auto_subject_reference,auto_salutation:auto_salutation,auto_paragraph:auto_paragraph,auto_sign_your_name:auto_sign_your_name,auto_enclosure:auto_enclosure};     
        }*/

    $.ajax({
      type: "POST",
      url: completeURL("update_word_result"),
      data: data,
      dataType: "json",
      success: function (data) {
        if (data.valid) {
          bootbox.alert(data.msg, function () {
            location.href = location.href;
          });
        } else {
          bootbox.alert(data.msg, function () {});
        }
      },
    });
  });

  $(document).on("click", ".update_excel_result", function () {
    var marks = $("#marks").val();
    var rel = $(this).attr("rel");
    var data = { rel: rel, marks: marks };

    $.ajax({
      type: "POST",
      url: completeURL("update_excel_result"),
      data: data,
      dataType: "json",
      success: function (data) {
        if (data.valid) {
          bootbox.alert(data.msg, function () {
            location.href = location.href;
          });
        } else {
          bootbox.alert(data.msg, function () {});
        }
      },
    });
  });

  $(document).on("change", ".lang_change_start", function () {
    var lang = $(this).val();
    $.ajax({
      type: "POST",
      url: completeURL("lang_change"),
      data: { lang: lang },
      dataType: "json",
      success: function (data) {},
    });
  });

  $(document).on("change", ".lang_change", function () {
    var lang = $(this).val();
    if (lang == "Marathi") {
      $(this).parents(".portlet").find(".que_english").css("display", "none");
      $(this).parents(".portlet").find(".que_marathi").css("display", "block");
    } else {
      $(this).parents(".portlet").find(".que_marathi").css("display", "none");
      $(this).parents(".portlet").find(".que_english").css("display", "block");
    }
  });

  $(document).on("click", ".next_prev", function () {
    $(".portlet").hide();
    var offset = $(this).attr("rel");
    $(".portlet_" + offset).show();
  });

  $(document).on("click", ".que_next_prev", function () {
    $(".question").addClass("hide");
    var offset = $(this).attr("rel");
    // alert(offset);
    $(".question_" + offset).removeClass("hide");
  });

  $(document).on("click", ".next_section", function () {
    $(".question_group").addClass("hide");
    var offset = $(this).attr("rel");
    var count = $(".question_group_" + offset).attr("rel");
    $(".question_group_" + offset).removeClass("hide");
    $(".test_countdown").countdown("destroy");
    if (count == offset) {
      $(".question_group_" + offset)
        .find(".test_countdown")
        .countdown({
          until:
            $(".question_group_" + offset)
              .find(".test_countdown")
              .html() * 60,
          onExpiry: test_expiry,
        });
    } else {
      $(".question_group_" + offset)
        .find(".test_countdown")
        .countdown({
          until:
            $(".question_group_" + offset)
              .find(".test_countdown")
              .html() * 60,
          onExpiry: section_expiry,
        });
    }

    $(".question_" + offset + "_1").removeClass("hide");
  });

  $(document).on("click", ".negative_radio", function () {
    if ($(this).val() == "yes") {
      $(".negative_per").removeClass("hide");
    } else {
      $(".negative_per").addClass("hide");
    }
  });

  $(document).on("click", ".section_checkbox", function () {
    if ($(this).is(":checked")) {
      $(this).parents("tr").find("input[type=text]").removeClass("hide");
    } else {
      $(this).parents("tr").find("input[type=text]").addClass("hide");
    }
  });

  // for attempting questions making green
  $(document).on("click", ".que_option", function () {
    if ($(this).is(":checked")) {
      $("." + $(this).attr("rel")).addClass("green");
    } else {
      $("." + $(this).attr("rel")).removeClass("green");
    }
  });

  $(document).on("change", ".section_table input", function () {
    var total_no_que = 0;
    var total_test_marks = 0;
    var total_duration = 0;
    $(".section_table tr:not(:first-child):not(:last-child)").each(function (
      index
    ) {
      var section_checkbox = $(this).find("td:nth-child(1) input");
      if (section_checkbox.is(":checked")) {
        var no_of_que = $(this).find("td:nth-child(4) input");

        var marks_per_que = $(this).find("td:nth-child(5) input");
        // alert(marks_per_que);
        var total_marks = $(this).find("td:nth-child(6) input");
        var row_total = no_of_que.val() * marks_per_que.val();
        total_marks.val(row_total);
        total_no_que = total_no_que + parseInt(no_of_que.val());
        total_duration =
          total_duration +
          parseInt($(this).find("td:nth-child(7) input").val());
        total_test_marks = total_test_marks + row_total;
      }
    });
    $(".total_test_marks").val(total_test_marks);
    $(".total_no_of_que").val(total_no_que);

    $(".total_duration").val(total_duration);
  });

  $(document).on("click", ".config_save", function () {
    var form = "#" + $(this).parents("form").attr("id");
    var error = $(".alert-danger", form);
    var success = $(".alert-success", form);

    $(form).validate({
      errorElement: "span", //default input error message container
      errorClass: "help-block", // default input error message class
      focusInvalid: false, // do not focus the last invalid input
      ignore: "", // validate all fields including form hidden input
      rules: {
        section_name: {
          required: true,
        },
      },

      invalidHandler: function (event, validator) {
        //display error alert on form submit
        success.hide();
        error.show();
        Metronic.scrollTo(error, -200);
      },

      errorPlacement: function (error, element) {
        // render error placement for each input type
        var icon = $(element).parent(".input-icon").children("i");
        icon.removeClass("fa-check").addClass("fa-warning");
        icon
          .attr("data-original-title", error.text())
          .tooltip({ container: "body" });
      },

      highlight: function (element) {
        // hightlight error inputs
        $(element)
          .closest(".form-group")
          .removeClass("has-success")
          .addClass("has-error"); // set error class to the control group
      },

      unhighlight: function (element) {
        // revert the change done by hightlight
      },

      success: function (label, element) {
        var icon = $(element).parent(".input-icon").children("i");
        $(element)
          .closest(".form-group")
          .removeClass("has-error")
          .addClass("has-success"); // set success class to the control group
        icon.removeClass("fa-warning").addClass("fa-check");
      },

      submitHandler: function (form) {
        $(".common_save").prop("disabled", true);
        var url = $(form).attr("action");
        var tbDiv = $(form).data("tbdiv");
        var tbUrl = $(form).data("tburl");
        var id = $(form).find(".common_save").attr("rel");
        var serialize_data = $(form).serialize();
        serialize_data = serialize_data + "&id=" + id;

        $.ajax({
          type: "POST",
          url: completeURL(url),
          dataType: "json",
          data: serialize_data,
          success: function (data) {
            bootbox.alert(data.msg, function () {
              //Example.show("Hello world callback");
              resetForm(form);
              location.reload();
              //refreshTable(tbDiv,tbUrl,data.id);
            });
          },
        });
      },
    });

    //apply validation on select2 dropdown value change, this only needed for chosen dropdown integration.
    /*$('.select2me', form).change(function () {
            $(form).validate().element($(this)); //revalidate the chosen dropdown value and show error or success message for the input
        });*/
  });

  // $(document).on('click','.btn_submit_test', function(){
  //     var btn=$(this);
  //   btn.prop('disabled',true);
  //   bootbox.confirm("Are you sure you want to finish ?", function(result) {
  //         if (result) {
  //            submit_test();
  //         } else {
  //             btn.removeAttr('disabled');
  //            /*submit_test();*/
  //         }
  //     });

  // });

  $(document).on("click", ".btn_submit_test", function () {
    var btn = $(this);
    btn.prop("disabled", true);

    bootbox.confirm("Are you sure you want to finish?", function (result) {
      if (result) {
        // Show the loader and overlay when the user confirms submission
        $("#loader, #overlay").show();

        // Call submit_test function
        // submit_test();
        setTimeout(function () {
          submit_test();
        }, 5000);
      } else {
        btn.removeAttr("disabled");
      }
    });
  });
});

//  function submit_test()
//     {
//                 var form="#test_form";
//                 var url=$(form).attr("rel");
//                 var serialize_data=$(form).serialize();
//                 $(".loding_img").show();
//                 $.ajax({
//                         type:'POST',
//                         url:completeURL(url),
//                         dataType:'json',
//                         data:serialize_data,
//                         success:function(data)
//                         {
//                             if(data.valid)
//                             {
//                                bootbox.alert(data.msg, function() {
//                                location.href=completeURL(data.redirect);
//                             });
//                             }else
//                             {
//                                  bootbox.alert(data.msg, function() {
//                                //location.href=data.redirect();
//                             });
//                             }

//                         },
//                         complete:function()
//                         {
//                             $(".loding_img").hide();
//                         }

//                     });
//     }

// function submit_test_warn()
// {
//     var form="#test_form";
//     var url=$(form).attr("rel");
//     var serialize_data=$(form).serialize();
//     $.ajax({
//         type:'POST',
//         url:completeURL(url),
//         dataType:'json',
//         data:serialize_data,
//         success:function(data)
//         {
//             if(data.valid)
//             {
//                 let alertBox = bootbox.dialog({
//                     message: data.msg,
//                     closeButton: false
//                 });

//                 setTimeout(function() {
//                     alertBox.modal('hide');
//                     location.href = completeURL(data.redirect);
//                 }, 3000);
//             }
//         },
//         complete:function()
//         {
//             $(".loding_img").hide();
//         }
//     });
// }

// function submit_test() {
//   var form = "#test_form";
//   var url = $(form).attr("rel");
//   var selected = [];
//   $.each($(".que_option:checked").parent().find('span'), function(){
//       selected.push($(this).val());
//   });
//   // console.log(selected);
//   var serialize_data = $(form).serialize();
//   console.log(serialize_data);

//   // Show loader and overlay before AJAX request
//   $("#loader, #overlay").show();

//   $.ajax({
//     type: "POST",
//     url: completeURL(url),
//     dataType: "json",
//     data: serialize_data,
//     success: function (data) {
//       if (data.valid) {
//         bootbox.alert(data.msg, function () {
//           location.href = completeURL(data.redirect);
//         });
//       } else {
//         bootbox.alert(data.msg);
//       }
//     },
//     complete: function () {
//       // Keep loader visible for 6 seconds before hiding
//       // alert();
//       $("#loader, #overlay").hide();
//     },
//   });
// }

function submit_test() {
  var form = "#test_form";
  var url = $(form).attr("rel");

  // This array will store the selected responses.
  var selected = [];

  // Find the checked options and push their values into the selected array.
  $.each($(".que_option:checked").parent().find("span"), function () {
    selected.push($(this).val());
  });

  // Log the selected values (optional for debugging)
  console.log("Selected Responses: ", selected);

  // Ensure that only selected answers are serialized
  var serialize_data = $(form).serialize();

  // Show loader and overlay before the AJAX request
  $("#loader, #overlay").show();

  $.ajax({
    type: "POST",
    url: completeURL(url),
    dataType: "json",
    data: serialize_data,
    success: function (data) {
      if (data.valid) {
        bootbox.alert(data.msg, function () {
          location.href = completeURL(data.redirect);
        });
      } else {
        bootbox.alert(data.msg);
      }
    },
    complete: function () {
      // Hide loader and overlay after a short delay
      $("#loader, #overlay").hide();
    },
  });
}

function section_expiry() {
  bootbox.alert("Time Up ! click ok to start next section.", function (result) {
    //$(".next_section").trigger('click');
    //submit_test();
    setTimeout(function () {
      submit_test();
    }, 2000);
  });
}
function test_expiry() {
  bootbox.alert("Time Up ! click ok to submit your test.", function (result) {
    // submit_test();
    setTimeout(function () {
      submit_test();
    }, 2000);
  });
}

function email_section_expiry() {
  bootbox.alert("Time Up ! click ok to start next section.", function (result) {
    //  submit_test();
    setTimeout(function () {
      submit_test();
    }, 2000);
  });
}

function speed_passage_section_expiry() {
  bootbox.alert("Time Up ! click ok to start next section.", function (result) {
    var textAreaDetails = $("#typingTest").val();
    $.ajax({
      url: completeURL("save_typing"),
      type: "POST",
      dataType: "json",
      data: { val: textAreaDetails },
      success: function (data) {
        if (data.valid) {
          bootbox.alert(data.msg, function () {
            location.href = completeURL(data.redirect);
          });
        } else {
          bootbox.alert(data.msg, function () {});
        }
      },
    });
    //$('#saveTyping').trigger('click');
  });
}
