require(['jquery', 'aci', 'bootstrap', 'bootstrapValidator'], function ($, aci) {
    $('#validateform').bootstrapValidator({
        message: '输入框不能为空',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            data:      {validators: {notEmpty: {message: '请填写日期'}}},
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
        var url = SITE_URL + "adminpanel/lmeManage/add";

        data = [
            "data="      + $("#data").val(),
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

        aci.post(url, data.join("&"), function(){
            $.scojs_message('操作成功,3秒后将返回列表页...', $.scojs_message.TYPE_OK);
            aci.goUrl(SITE_URL + 'assist/adManage/index', 1);
        });
    }).on('error.form.bv', function (e) {
        $.scojs_message('带*号不能为空', $.scojs_message.TYPE_ERROR);
        $("#dosubmit").removeAttr("disabled");
    });
});