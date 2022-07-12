/**
 * Function to alert dialog
 */
var opt = '';
function showAlertDialog(title, message, width) {
    if (typeof title == "undefined" || title == "") {
        title = "Alert";
    }
    $j("#alertDialog").html(message);
    if (typeof width == "undefined" || width == '') {
        width = '800px';
    }
    $j("#alertDialog").dialog({
        title: title,
        width: width,
    });
    $j("#alertDialog").dialog("open");
    return false;
}
/**
 * Function to confirn delete entry from grid
 */

function deleteEntryConfirm(dialogId, confirmTitle, deleteMessage, deleteUrl, gridId, opt) {
    var name = "";
    if (deleteMessage.length != 0) {
        if ($.trim(opt) != '')
        {
            deleteMessage = delete_confirmation1;
        }
        else {
            deleteMessage = delete_confirmation;
        }
        name = unescape(deleteUrl.split('?name=')[1]);
        name = name.split('&')[0];
    } else {
        deleteMessage = delete_confirmation;
        name = unescape(deleteUrl.split('?name=')[1]);
        if (name == 'undefined')
        {
            name = unescape(deleteUrl.split('&name=')[1]);
        }
    }
   // console.log(name);
    name = name.replace(/\+/g, ' ');
    //console.log(name);
    deleteMessage = deleteMessage.replace('{field}', name);
    if (deleteUrl.indexOf('deleteable') != -1) {
        var deleteStatus = unescape(deleteUrl.split('&deleteable=')[1]);
        if (deleteStatus == false_status) {
            showAlertDialog("Alert", name + " is not deletable.");
            return false;
        }
    }
    $j("#" + dialogId).html(deleteMessage);
    $j("#" + dialogId).dialog({
        title: confirmTitle,
        width: '50%'
    });
    $j("#" + dialogId).dialog("option",
            "buttons", {
                "Ok": function() {
                    switch (gridId)
                    {
                        case 'parameters-grid':
                            deleteParameter(dialogId, name, deleteUrl, gridId);
                            break;
                        case 'rule-grid':
                            deleteRule(dialogId, name, deleteUrl);
                            break;
                        case 'user-grid':
                            if (deleteUrl.indexOf('changeStatus') > -1) {
                                changeUserStatus(dialogId, name, deleteUrl);
                            } else
                                deleteUser(dialogId, name, deleteUrl);
                            break;
                        case 'parameter-value-delete':
                            $j(deleteUrl).remove();
                            updateRowLabel();
                            $j("#" + dialogId).dialog("close");
                            break;
                        case 'disb-struc-grid':

                            if ($.trim(opt) != '')
                            {
                                opt.parent().parent().parent().remove();
                            }
                            deleteGridRow(dialogId, deleteUrl, gridId);
                            break;
                        default:
                            deleteGridRow(dialogId, deleteUrl, gridId);
                            $j(this).dialog("close");
                            break;
                    }
                },
                "Cancel": function() {
                    $j(this).dialog("close");
                },
            });
    $j("#" + dialogId).dialog("open");
    return false;
}
function deleteEntryConfirmAgencyAllocate(dialogId, confirmTitle, deleteMessage, deleteUrl, gridId, opt) {
    var name = "";
    if (deleteMessage.length != 0) {
        if ($.trim(opt) != '')
        {
            deleteMessage = delete_confirmation1;
        }
        else {
            deleteMessage = delete_confirmation;
        }
        name = unescape(deleteUrl.split('?name=')[1]);
        name = name.split('&')[0];
    } else {
        deleteMessage = delete_confirmation;
        name = unescape(deleteUrl.split('?name=')[1]);
        if (name == 'undefined')
        {
            name = unescape(deleteUrl.split('&name=')[1]);
        }
    }
    name = name.replace("+", " ");
//    
    deleteMessage = "Are you sure you want to remove allocation of agency {field} from this project?";
    deleteMessage = deleteMessage.replace('{field}', name);
    deleteMessage = deleteMessage.replace("+", " ");
    if (deleteUrl.indexOf('deleteable') != -1) {
        var deleteStatus = unescape(deleteUrl.split('&deleteable=')[1]);
        if (deleteStatus == false_status) {
            showAlertDialog("Alert", name + " is not deletable.");
            return false;
        }
    }
    $j("#" + dialogId).html(deleteMessage);
    $j("#" + dialogId).dialog({
        title: confirmTitle,
        width: '50%'
    });
    $j("#" + dialogId).dialog("option",
            "buttons", {
                "Ok": function() {
                    switch (gridId)
                    {
                        case 'parameters-grid':
                            deleteParameter(dialogId, name, deleteUrl, gridId);
                            break;
                        case 'rule-grid':
                            deleteRule(dialogId, name, deleteUrl);
                            break;
                        case 'user-grid':
                            if (deleteUrl.indexOf('changeStatus') > -1) {
                                changeUserStatus(dialogId, name, deleteUrl);
                            } else
                                deleteUser(dialogId, name, deleteUrl);
                            break;
                        case 'parameter-value-delete':
                            $j(deleteUrl).remove();
                            updateRowLabel();
                            $j("#" + dialogId).dialog("close");
                            break;
                        case 'disb-struc-grid':

                            if ($.trim(opt) != '')
                            {
                                opt.parent().parent().parent().remove();
                            }
                            deleteGridRow(dialogId, deleteUrl, gridId);
                            break;
                        default:
                            deleteGridRow(dialogId, deleteUrl, gridId);
                            $j(this).dialog("close");
                            break;
                    }
                },
                "Cancel": function() {
                    $j(this).dialog("close");
                },
            });
    $j("#" + dialogId).dialog("open");
    return false;
}

  /**
                 * Method for submit leagal actions Tabs
                 */
                function loadTabsContent(e)
                {
                 //   $("#wai").show();
             //     alert("ssssssssssssssssss");

                }
/**
 * 
 * Function to delete row
 */
    function deleteGridRow(dialogId, deleteUrl, gridId) {
    $j.ajax({
        type: 'POST',
        url: deleteUrl,
        dataType: 'json',
        success: function(data) {
            $j('.alert').each(function() {
                $j(this).alert('close');
            });
            $j("#" + dialogId).dialog("close");
            $j.fn.yiiGridView.update(gridId);
            var messageHtml = grid_ajax_message;
            messageHtml = messageHtml.replace('{message}', data.message);
            if (data.status == true_status) {
                messageHtml = messageHtml.replace('{class}', 'success');
            } else {
                messageHtml = messageHtml.replace('{class}', 'error');
            }
            $j('#' + gridId + '-message').html(messageHtml);
            $j('#' + gridId + '-message').show();
            hideAlertDiv(gridId + '-message');
            if(data.reload)
                {
              if(data.reload==1)
                {
                    location.reload();
            }
                }
            
        }
    });
}

/**
 * Function set focus on first error field in form
 * @returns {undefined}
 */
function focusFirstErrField() {
    var errCount = 0;
    var elemntCount = 0;
    var eleMnt = '';
    var firstEle = '';
    $j('.form [rel="tipsy"]').each(function() {
        if (elemntCount == 0) {
            firstEle = $j(this);
        }
        elemntCount++;
    });
    $j('.form [rel="tipsy"]').each(function() {
        if (typeof $j(this).attr('original-title') != "undefined" && $j(this).attr('original-title') != "") {

            if (errCount == 0) {
                eleMnt = $j(this);
                var elemntOffset = eleMnt.offset().top * (-1);
                var firstElemntOffset = firstEle.offset().top * (-1);
                var diffOffset = firstElemntOffset - elemntOffset;
//                $j('.area').slimScroll({
//                    scrollTo: diffOffset,
//                });

                setTimeout(function() {
                    eleMnt.focus();
                }, 500);
            }
            errCount++;
        }
    });
}
function focusAllErrField() {
    setTimeout(function() {
        // Do something after 1 second 
        var errCount = 0;
        var elemntCount = 0;
        var eleMnt = '';
        var firstEle = '';
        $j('.tipsy-form [rel="tipsy"]').each(function() {
            if (typeof $j(this).attr('original-title') != "undefined" && $j(this).attr('original-title') != "") {
                eleMnt = $j(this);
                eleMnt.tipsy('show');
            }
        });
    }
    , 100);
}

function focusAllErrDialogField(form) {
    setTimeout(function() {
        // Do something after 1 second 
        var errCount = 0;
        var elemntCount = 0;
        var eleMnt = '';
        var firstEle = '';
        $j('#' + form + ' [rel="tipsy"]').each(function() {
            if (typeof $j(this).attr('original-title') != "undefined" && $j(this).attr('original-title') != "") {
                eleMnt = $j(this);
                eleMnt.tipsy('show');
            }
        });
    }
    , 100);
    setTimeout(function() {
        // Do something after 1 second 
        var errCount = 0;
        var elemntCount = 0;
        var eleMnt = '';
        var firstEle = '';
        $j('#' + form + ' [rel="tipsy"]').each(function() {
            if (typeof $j(this).attr('original-title') != "undefined" && $j(this).attr('original-title') != "") {
                eleMnt = $j(this);
                eleMnt.tipsy('hide');
            }
        });
    }
    , 3000);
}
/**
 * Function clear form fields original-title attribute
 * @returns {undefined}
 */
function clearFormValidation() {
    var errCount = 0;
    $j('.form [rel="tipsy"]').each(function() {
        $j(this).attr('original-title', '');
    });
}
$j(document).ready(function() {
    intializeForm();
//    $j(".read-more").each(function() {
//        $j(this).tipsy({
//            html: false
//        });
//    });
//
//    $('#read-more-tooltip').popover({
//        'html': false,
//        'placement' : 'left'
//    });
});
function intializeForm() {
   // alert("sssssssssssssssssss");
     // $("#wai").show();
    intializeTipsy();
    intializeAutoCapitalize();
    $j('.float_number').each(function() {
        $j(this).bind('keypress', function(evt) {
            isValidFloatNumber($j(this), evt);
        });
        $j(this).bind('paste', function(evt) {
            isValidFloatNumber($j(this), evt);
        });
    });
    $j('.integer').each(function() {
        $j(this).bind('keypress', function(evt) {
            isValidNumber($j(this), evt);
        });
        $j(this).bind('paste', function(evt) {
            isValidNumber($j(this), evt);
        });
    });
    $j('.dateField').each(function() {
        $j(this).attr('readonly', 'readonly');
    });
}
function intializeDialogForm(form_id) {
  //   alert("sssssssssssssssssss");
     // $("#wai").show();
    var elementCount = 0;
    $j('#' + form_id + ' [rel="tipsy"]').each(function() {
        var field = $j(this);
        bindTipsyToField(field, true);
        elementCount++;
    });
    focusAllErrDialogField(form_id)
}
/**
 * 
 * Function to auto captitalize field
 */
function intializeAutoCapitalize() {
    $j('.autoCapitalize').bind('keyup', function(e) {
        $j(this).val($j(this).val().toUpperCase());
    });
}

/**
 * Function to check is valid integer
 * 
 */
function isValidNumber(element, evt) {
    if (evt.type == 'paste') {
        setTimeout(function(e) {
            element.val('');
        }, 0);
        return false;
    }
    var charCode = (evt.which) ? evt.which : event.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57))
    {
        showAlertDialog("Alert", "Please enter Valid Number.");
        return false;
    } else {
        return true;
    }
}
/**
 * Function to check is valid float number
 * 
 */
function isValidFloatNumber(element, evt) {
    if (evt.type == 'paste') {
        setTimeout(function(e) {
            element.val('');
        }, 0);
        return false;
    }
    var charCode = (evt.which) ? evt.which : event.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57) && charCode != 46)
    {
        showAlertDialog("Alert", "Please enter Valid Number.");
        return false;
    } else {
        var val = $j(element).val();
        if (charCode == 46 && val.indexOf('.') != -1) {
            showAlertDialog("Alert", "Please enter Valid Number.");
            return false;
        }
        return true;
    }
}
/**
 * 
 * Function to intialize tipsy validation
 */
var tipsySetting = {trigger: 'focus', gravity: 'ne', fade: true};
var tipsyDialogSetting = {trigger: 'focus', gravity: 'ne', fade: true, className: 'tipsy-dialog'};
function intializeTipsy() {
    var elementCount = 0;
    $j('.tipsy-form [rel="tipsy"]').each(function() {
        var field = $j(this);
        bindTipsyToField(field, false);
        elementCount++;
    });
    focusAllErrField();
    showTipsyError()
}

/**
 * Function to show all tipsy error
 * 
 */
function showTipsyError() {

}

/**
 * Method to bind tipsy on element
 * @param {type} formId
 * @returns {undefined}
 */
function bindTipsyToField(field, is_dialog) {
    if (!is_dialog)
        field.tipsy(tipsySetting);
    else
        field.tipsy(tipsyDialogSetting);
    field.bind('keypress', function() {
        field.tipsy("hide");
    });
}

/*
 * Method to disable enter key in form
 */
function disableFormEnter(formId) {
    if (typeof formId != "undefined") {
        formId = "#" + formId;
    } else {
        formId = window;
    }
    $j(formId).keydown(function(event) {
        if (event.keyCode == 13) {
            event.preventDefault ? event.preventDefault() : event.returnValue = false;
        }
    });
}
/*
 * Method select all parameters in rule builder
 */
function toCheckAll(id, child_class) {
    $j('#' + id).click(function() {
        var checkStatus = $j('#' + id).prop('checked');
        if (checkStatus) {
            $j('.' + child_class).each(function() {
                $j(this).prop('checked', true);
                addRowHighlytClas(this);
            });
        } else {
            $j('.' + child_class).each(function() {
                $j(this).prop('checked', false);
                addRowHighlytClas(this);
            });
        }

    });
}
/**
 * Function trim form values
 */
function trimFormValues(form_class) {
    $j(form_class + ' :input').each(function() {
        if ($j(this).val() != '' || $j(this).val() != null) {
            $j(this).val($j.trim($j(this).val()));
            if ($j(this).val().indexOf('>') > -1 || $j(this).val().indexOf('<') > -1) {
                $j(this).val('');
            }
        }
    });
}
/**
 * Method to submit forms by post back request
 */
function submitForm(butn) {
    $j(".modal-backdrop").show();
    $j(butn).attr('disabled', 'disabled');
    $j(butn).parents('form:first').submit();
}
/**
 * Function to set max start date
 */
function setMaxStartDate(start_date, end_date) {
    var to_date = $j("#" + end_date).datepicker("getDate");
    if (to_date)
    {
        var d = new Date(to_date.getFullYear(), to_date.getMonth(), to_date.getDate());
        $j("#" + start_date).datepicker("option", "defaultDate", d);
        $j("#" + start_date).datepicker("option", "maxDate", d);
    }
}
/**
 * Function to set min end date
 */
function setMinEndDate(start_date, end_date) {
    var from_date = $j("#" + start_date).datepicker("getDate");
    if (from_date)
    {
        var d = new Date(from_date.getFullYear(), from_date.getMonth(), from_date.getDate());
        $j("#" + end_date).datepicker("option", "defaultDate", d);
        $j("#" + end_date).datepicker("option", "minDate", d);
    }
}

/**
 * Method to hide grid alert div
 */
function hideAlertDiv(eleId) {
    setTimeout(function() {
        $j('#' + eleId).hide('slow');
    }, 9000);
}

/**
 * Function to save agent
 */
function changePassword(elemnt, formName, salt) {
    var password = jQuery("#UserLogin_password").val();
    jQuery("#UserLogin_password").val(Aes.Ctr.encrypt(password, salt, 256));
    if (jQuery("#UserLogin_old_password").length > 0) {
        $j('#change-password').append('<input type="hidden" name="UserLogin[old_password_count]" value="' + key_count + '"/>');
        var oldPassword = jQuery("#UserLogin_old_password").val();
        jQuery("#UserLogin_old_password").val(Aes.Ctr.encrypt(oldPassword, salt, 256));
    }
    if (jQuery("#UserLogin_confirm_password").length > 0) {
        var confirmPassword = jQuery("#UserLogin_confirm_password").val();
        jQuery("#UserLogin_confirm_password").val(Aes.Ctr.encrypt(confirmPassword, salt, 256));
    }
    var form = $j(elemnt).parents('form:first');
    form.submit();
}

function pincodeDeleteConfirm(dialogId, confirmTitle, where, className) {
    var checkCount = 0;
    $j('.' + className).each(function() {
        if ($j(this).find('input').attr('checked')) {
            checkCount++;
        }
    });
    if (checkCount > 0) {
        $j("#" + dialogId).html("Selected rows will be deleted permanently. Would you like to proceed?");
        $j("#" + dialogId).dialog({
            title: confirmTitle,
            width: '50%'
        });
        $j("#" + dialogId).dialog("option",
                "buttons", {
                    "Ok": function() {
                        submitForm(where);
                    },
                    "Cancel": function() {
                        $j(this).dialog("close");
                    },
                });
        $j("#" + dialogId).dialog("open");
        return false;
    }
    else {
        $j("#" + dialogId).html("Please select row to be deleted.");
        $j("#" + dialogId).dialog({
            title: "Error",
            width: '50%'
        });
        $j("#" + dialogId).dialog("option",
                "buttons", {
                    "Ok": function() {
                        $j(this).dialog("close");
                    },
                });
        $j("#" + dialogId).dialog("open");
        // return false;
    }
}

function disbDeleteConfirm(dialogId, confirmTitle, where) {
    $j("#" + dialogId).html("Selected pincodes will be deleted permanently. Would you like to proceed?");
    $j("#" + dialogId).dialog({
        title: confirmTitle,
        width: '50%'
    });
    $j("#" + dialogId).dialog("option",
            "buttons", {
                "Ok": function() {
                    submitForm(where);
                },
                "Cancel": function() {
                    $j(this).dialog("close");
                },
            });
    $j("#" + dialogId).dialog("open");
    return false;
}

/**
 * Method to redirect to window location
 */
function goToUrl(url) {
    window.location = web_app_url + url;
}

/**
 * Method to submit file upload
 */
function submitProjDocUpload() {
    $j('#file-upload-submit-form').submit();
}

function hideDiv(ele) {
    $j(ele).addClass('displayN');
}

/**
 * Method to return multidimensional array format for a given json object
 */
function getJsonArrFormat(jsonStr) {
    var arr = [];
    $j.each(jsonStr, function(label, value) {
        arr[label] = []
        $j.each(value, function(key, value) {
            arr[label][key] = value;
        });
    });
    return arr;
}

