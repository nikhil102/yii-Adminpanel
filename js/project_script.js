
$(document).ready(function() {
    //Your call goes in here. 
    $(".Data-div").hide();
    // index  code starts
    $(".nav-tabs > li").click(function() {
        $("#wai").show();
    });
    $(".icon-eye-open").click(function() {
        $("#wai").show();
    });
    hideAlertDiv('accounts_alert');
    // index code ends

    // view code starts
    // scrollTop JS

    $(window).scroll(function() {
        if ($(this).scrollTop() > 500) {
            $('.scrollup').fadeIn();
        } else {
            $('.scrollup').fadeOut();
        }
    });

    $('.scrollup').click(function() {
        $("html, body").animate({scrollTop: 0}, 600);
        return false;
    });

    //view code ends
    //settlement form code starts
    $('#approve').click(function() {

        if (checkSettlementForm()) {
            alert("start form submit");
            var action_type = $(this).val();
            var tid = $("input[name='_random_tokn_id']").val();
            var tcnt = $("input[name='_random_form_count']").val();
            var account_id = $('#SettlementInfo_account_id').val();
            var amt = $('#SettlementInfo_amount').val();
            var type_id = $('#SettlementInfo_type_id').val();
            $.ajax({
                type: "POST",
                url: "<?php echo Yii::app()->createAbsoluteUrl('Accounts/CheckInitiateRights') ?>",
                data: 'account_id=' + account_id + "&&_random_tokn_id=" + tid + '&&_random_form_count=' + tcnt + '&&amt=' + amt + '&&type_id=' + type_id + '&&action_type=' + action_type,
                async: false,
                success: function(data) {
                    // alert(data);
                    if (data == 0) {
                        alert("#settlement-form submit");
                        $('#settlement-form').submit();
                    } else {
                        alert("You are not allowed to Approve!");
                        return false;
                    }
                },
                error: function(data)
                {
                    alert("Error");
                    return false;
                }
            });
        }
    });

    // settlement form code ends
    //view code starts         
    $(".header").click(function() {
        // home page toggle function 
        $header = $(this);
        //getting the next element
        $content = $header.next();
        //open up the content needed - toggle the slide- if visible, slide up, if not slidedown.
        $content.slideToggle(500, function() {
            //execute this after slideToggle is done
            //change text of header based on visibility of content div
            $header.toggleClass('icon-fa-plus icon-fa-minus');
            $header.text(function() {
                //change text based on condition
                //return $content.is(":visible") ? "" : "";
            });
        });

    });

    $(function() {
        $('#img001').live('click', function() {
            $('#Data-div').toggle(100);
        });

        $('#img002').live('click', function() {
            $('#div002').toggle(100);
        });
        $('#img003').live('click', function() {
            $('#div003').toggle(100);
        });

    });

    $(".collapse").collapse()
});
//view code ends
//  End document.ready

//index form code starts

function showSettlementPopup(hashId, actionType) {


    $("#wai").show();
    var urlArr = hashId.split("#", 2);
    // $("#wai").hide();
    var accountId = urlArr[1];
//        var formData = "";
//        if ($("#settlement-form").length > 0) {
//            var frmElement = document.getElementById("settlement-form");
//            formData = new FormData(frmElement);
//            formData = $("#settlement-form").serialize()+"&actionType="+actionType;
//        }
    $("#settlementPopup").dialog("close");
    $("#settlementDiv").html("");
    $.ajax({
        type: 'post',
        url: web_app_url + "accounts/settlement/" + accountId,
//            data: formData,
        success: function(data) {
            $("#settlementDiv").html(data);
            if (actionType == "initiate") {
                $("#settlementPopup").dialog("option", "title", "Initiate Case");
            }
            else {
                $("#settlementPopup").dialog("option", "title", "Update Case");
            }
            $("#wai").hide();
            $("#settlementPopup").dialog("open");
        }
    });
}

function showJustificationPopup(hashId, stageId) {
    $("#wai").show();
    var urlArr = hashId.split("#", 3);

    var accountId = urlArr[1];
    var accountNo = urlArr[2];

    var popTitle = "Justification";
    var labelText = "Justification"
    if (stageId == 100) {
        popTitle = "Approve Case";
    }
    else if (stageId == 101) {
        popTitle = "Reject Case";
    }
    else if (stageId == 103) {
        popTitle = "Cancel Case";
    }
    else if (stageId == 104) {
        popTitle = "Close Case";
    }
    else if (stageId == 106) {
        popTitle = "Reopen Case";
    }
    else if (stageId == 2) {
        popTitle = "Recommend Case";
    }

    else if (stageId == 3) {
        popTitle = "Need More Information";
        labelText = "Query";
    }
    //$("#wai").hide();
    $("#spnAccountId").html(accountId);
    $('#spnAccountNo').html(accountNo);
    $("#spnJustification").html(labelText);
    $("#errJustification").html("");
    $("#accountId").val(accountId);
    $("#stageId").val(stageId);
    $("#justificationPopup").dialog("option", "title", popTitle);
    $("#wai").hide();
    $("#justificationPopup").dialog("open");

}

function checkJustificationForm() {
    // $("#wai").show();
    if ($("#justification").val() == "") {
        // $("#wai").hide();
        $("#errJustification").html("This field is required.");
        return false;
    }
    else {
        $("#errJustification").html("");
        return true;
    }
}


//index form code ends



// view code starts
function showSettlementPopupInner(hashId, actionType) {

    $("#wai").show();

    // $("#wai").hide();
    var accountId = hashId;

    $("#settlementPopup").dialog("close");
    $("#settlementDiv").html("");
    $.ajax({
        type: 'post',
        url: web_app_url + "accounts/settlement/" + accountId,
//            data: formData,
        success: function(data) {
            $("#settlementDiv").html(data);
            if (actionType == "initiate") {
                $("#settlementPopup").dialog("option", "title", "Initiate Case");
            }
            else {
                $("#settlementPopup").dialog("option", "title", "Update Case");
            }
            $("#wai").hide();
            $("#settlementPopup").dialog("open");
        }
    });
}

function showSettlementPopupalert(hashId , actionType) {
    // var accountId = hashId;
  
    if (confirm("Are you sure you want to Initiate Case")) {
        $("#wai").show();
     showSettlementPopupInner(hashId, actionType);
     }
 
}
//view code ends

// settlement form code starts
function checkSettlementForm() {

    var validFlag = true;
    // aler $("#SettlementInfo_amount").val() 
    //alert('checkSettlementForm');

    $("#SettlementInfo_amount").parent("div.controls").children("span.error").remove();
    //$("#SettlementInfo_duration").parent("div.controls").children("span.error").remove();
    //$("#SettlementInfo_duration").parent("div.controls").children("span.help-inline").remove();
    $( "#mn" ).remove();
    $( ".mnbr" ).remove();
    
    $("#StageRemarks_remark").parent("div.controls").children("span.error").remove();
    $('#SettlementInfo_type_id').parent("div.controls").children("span.error").remove();
    //$('#SettlementInfo_duration').parent("div.controls").children("span.error").remove();

    if ($("#SettlementInfo_amount").val() == "" || isNaN($("#SettlementInfo_amount").val())) {
        validFlag = false;

        $("#SettlementInfo_amount").parent("div.controls").append("<span class='help-inline error'> Enter a valid amount.</span>");
    }
    // $("#SettlementInfo_duration option:selected").val()

    if ($("#SettlementInfo_duration option:selected").val() == "0") {

        validFlag = false;

        $("#SettlementInfo_duration").parent("div.controls").append("<br class='mnbr'> <span id='mn' class='help-inline error'> Select Month.</span>");
    }

    if (parseInt($("#SettlementInfo_amount").val()) > parseInt($('#outstanding_amt1').val())) {

        validFlag = false;

        $("#SettlementInfo_amount").parent("div.controls").append("<span class='help-inline error'>Amount must be less than total outstanding.</span>");

    }

    if (parseInt($("#SettlementInfo_amount").val()) <= 0) {

        validFlag = false;

        $("#SettlementInfo_amount").parent("div.controls").append("<span class='help-inline error'>Amount must be greater than 0 </span>");

    }



    if ($("#SettlementInfo_duration").val() == "") {
        validFlag = false;

        $("#SettlementInfo_duration").parent("div.controls").append("<span class='help-inline error'> Enter valid no of months.</span>");
    }

    if ($("#SettlementInfo_type_id").val() == "") {
        validFlag = false;

        $("#SettlementInfo_type_id").parent("div.controls").append("<span class='help-inline error'>Please select Settlement Type.</span>");

    }
    if ($("#StageRemarks_remark").val() == "") {
        validFlag = false;

        $("#StageRemarks_remark").parent("div.controls").append("<span class='help-inline error'>Justification cannot be blank.</span>");

    }
    //alert(validFlag);
    return validFlag;
}


//settlement form code ends