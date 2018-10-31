require(['jquery', 'aci', 'bootstrap', 'bootstrapValidator', 'message'], function ($, aci) {
    $('#validateform').bootstrapValidator({
        message: '输入框不能为空',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            date:      {validators: {notEmpty: {message: '请填写日期'}}},
            cu_keep:   {validators: {notEmpty: {message: '请填写铜今日留存'}}},
            cu_cancel: {validators: {notEmpty: {message: '请填写铜注销仓单量'}}},
            al_keep:   {validators: {notEmpty: {message: '请填写铝今日留存'}}},
            al_cancel: {validators: {notEmpty: {message: '请填写铝注销仓单量'}}},
            zn_keep:   {validators: {notEmpty: {message: '请填写锌今日留存'}}},
            zn_cancel: {validators: {notEmpty: {message: '请填写锌注销仓单量'}}},
            ni_keep:   {validators: {notEmpty: {message: '请填写镍今日留存'}}},
            ni_cancel: {validators: {notEmpty: {message: '请填写镍注销仓单量'}}},
            sn_keep:   {validators: {notEmpty: {message: '请填写锡今日留存'}}},
            sn_cancel: {validators: {notEmpty: {message: '请填写锡注销仓单量'}}},
            pb_keep:   {validators: {notEmpty: {message: '请填写铜今日留存'}}},
            pb_cancel: {validators: {notEmpty: {message: '请填写铜注销仓单量'}}}
        }
    }).on('success.form.bv', function (e) {
        e.preventDefault();

        $("#dosubmit").attr("disabled","disabled");
        $.scojs_message("正在保存，请稍等...", $.scojs_message.TYPE_WAIT);

        data = [
            "date="      + $("#date").val(),
            "cu_keep="   + $("#cu_keep").val(),
            "cu_cancel=" + $("#cu_cancel").val(),
            "al_keep="   + $("#al_keep").val(),
            "al_cancel=" + $("#al_cancel").val(),
            "zn_keep="   + $("#zn_keep").val(),
            "zn_cancel=" + $("#zn_cancel").val(),
            "ni_keep="   + $("#ni_keep").val(),
            "ni_cancel=" + $("#ni_cancel").val(),
            "sn_keep="   + $("#sn_keep").val(),
            "sn_cancel=" + $("#sn_cancel").val(),
            "pb_keep="   + $("#pb_keep").val(),
            "pb_cancel=" + $("#pb_cancel").val()
        ];

        $.ajax({
            type : "POST",
            url  : SITE_URL+"adminpanel/lmeManage/add",
            data : data.join("&"),
            success:function(response){
                var dataObj=jQuery.parseJSON(response);
                if(dataObj.status)
                {
                    $.scojs_message('操作成功...', $.scojs_message.TYPE_OK);
                    window.location.href=SITE_URL+"adminpanel/lmeManage/index";
                } else {
                    $.scojs_message(dataObj.tips, $.scojs_message.TYPE_ERROR);
                    $("#dosubmit").removeAttr("disabled");
                }
            },
            error: function (request, status, error) {
                $.scojs_message(request.responseText, $.scojs_message.TYPE_ERROR);
                $("#dosubmit").removeAttr("disabled");
            }
        });

    }).on('error.form.bv',function(e){ $.scojs_message('带*号不能为空', $.scojs_message.TYPE_ERROR);$("#dosubmit").removeAttr("disabled");});

});