define('aci', ['jquery', 'bootstrap', 'message'], function(a,b,$) {
    //上报方法
    window.stat = function(type, content) {
        var mdUrl = "/stat.php?type="+type+'&'+content+"&time="+(new Date().getTime());
        var imgObj = new Image();
        try {imgObj.src = mdUrl} catch(e) {}
    };
    //捕获js报错
    window.onerror = function(){
        var msg = Array.prototype.slice.call(arguments).join("  ");
        window.stat('ERROR', 'msg=' + msg);
    };
    //左侧菜单显示控制
    var sub_menu = null;
    for (var i=0; i<30; i++) {
        sub_menu = $('#sub_menu_'+i);
        sub_menu && sub_menu.click(function(){
            $('#list_' + $(this).attr("id")).slideToggle(500);
        });
    }
    //小屏幕的二级菜单显示
    $('.show_left_menu').click(function(){
        $('.sidebar').fadeIn(500);
    });
    return {
        reverseChecked:	function (name){
            var checkboxs=document.getElementsByName(name);
            for (var i=0;i<checkboxs.length;i++) {
                var e=checkboxs[i];
                e.checked=!e.checked;
            }
        },
        getCheckboxValue: function(objname){
            var chk_value = [];
            $('input[name="'+objname+'"]:checked').each(function(){
                chk_value.push($(this).val());
            });
            return chk_value;
        },
        goUrl: function(url,mins){
            setTimeout(function(){
                window.location.href=url;
            }, mins*1000);
        },
        countdown: function(e){
            var options = $.extend({
                id:{d:'',h:'',n:'',s:''},
                diff:60
            }, e);
            window.setInterval(function(){
                var day=0, hour=0, minute=0, second=0; //时间默认值
                if(options.diff > 0){
                    day = Math.floor(options.diff / (60 * 60 * 24));
                    hour = Math.floor(options.diff / (60 * 60)) - (day * 24);
                    minute = Math.floor(options.diff / 60) - (day * 24 * 60) - (hour * 60);
                    second = Math.floor(options.diff) - (day * 24 * 60 * 60) - (hour * 60 * 60) - (minute * 60);
                }
                if (minute <= 9) minute = '0' + minute;
                if (second <= 9) second = '0' + second;
                $('#'+options.id.d).html(day+"天");
                $('#'+options.id.h).html('<s id="h"></s>'+hour+'时');
                $('#'+options.id.n).html('<s></s>'+minute+'分');
                $('#'+options.id.s).html('<s></s>'+second+'秒');
                options.diff--;
            }, 1000);
        },
        formInput: function () {
            var param = [];
            $("select").each(function () {
                var selName = $(this).attr('name');
                var selValue = $(this).val();
                selValue = selValue ? selValue : "";
                param.push("" + selName + "=" + selValue + "");

            });
            $("input[type='text']").each(function () {
                var selName = $(this).attr('name');
                var selValue = $(this).val();
                selValue = selValue ? selValue : "";
                param.push("" + selName + "=" + selValue + "");

            });
            $("input[type='hidden']").each(function () {
                var selName = $(this).attr('name');
                var selValue = $(this).val();
                selValue = selValue ? selValue : "";
                param.push("" + selName + "=" + selValue + "");

            });
            $("textarea").each(function () {
                var selName = $(this).attr('name');
                var selValue = $(this).val();
                selValue = selValue ? selValue : "";
                param.push("" + selName + "=" + selValue + "");

            });
            return param;
        },
        post: function(url, param, callback, option){
            $.scojs_message('正在拉取数据，请稍等...', $.scojs_message.TYPE_OK);

            var options = {
                btn : $("#dosubmit")
            };
            option && $.extend(options, option);

            options.btn.attr("disabled","disabled");
            $.ajax({
                url: url,
                type: 'POST',
                data: $.isArray(param) ? param.join("&") : param,
                success: function(data) {
                    var rest = $.parseJSON(data);
                    if (! rest) {
                        $.scojs_message(window.lang.system_busy, $.scojs_message.TYPE_ERROR);
                        return;
                    }
                    options.btn.removeAttr("disabled");
                    if (rest.status) {
                        callback(rest);
                    } else if (rest.tips) {
                        $['scojs_message'].options.delay = rest.ms || 2000;
                        $.scojs_message(rest.tips, $.scojs_message.TYPE_ERROR);
                    }
                },
                error: function (request, status, error) {
                    $.scojs_message(request.responseText, $.scojs_message.TYPE_ERROR);
                    options.btn.removeAttr("disabled");
                }
            });
        },
        ajax: function(url, param, callback){
            $.ajax({
                url: url,
                type: 'POST',
                data: $.isArray(param) ? param.join("&") : param,
                success: function(data) {
                    var rest = $.parseJSON(data);
                    if (! rest) {
                        $.scojs_message(window.lang.system_busy, $.scojs_message.TYPE_ERROR);
                        return;
                    }
                    if (rest.status) {
                        callback(rest);
                    } else if (rest.tips) {
                        $.scojs_message(rest.tips, $.scojs_message.TYPE_ERROR);
                    }
                },
                error: function (request, status, error) {
                    $.scojs_message(request.responseText, $.scojs_message.TYPE_ERROR);
                }
            });
        },
        formatDateTime: function(t){
            var date = t ? new Date(t) : new Date();
            var s1 = "-", s2 = ":";
            var month = date.getMonth() + 1;
            var day = date.getDate();
            var hour = date.getHours();
            var minute = date.getMinutes();
            var second = date.getSeconds();
            if (month >= 1 && month <= 9) {
                month = "0" + month;
            }
            if (day >= 0 && day <= 9) {
                day = "0" + day;
            }
            if (hour >= 0 && hour <= 9) {
                hour = "0" + hour;
            }
            if (minute >= 0 && minute <= 9) {
                minute = "0" + minute;
            }
            if (second >= 0 && second <= 9) {
                second = "0" + second;
            }
            return (date.getFullYear() + s1 + month + s1 + day + " " + hour + s2 + minute + s2 + second);
        },
        changePageHtml: function (page_total, page_now, offset) {
            var html = '';
            page_total = Math.ceil(page_total / offset);
            for (var i = 1; i <= page_total; i++) {
                if (page_now == i) {
                    html += '<option selected value="' + i + '">第' + i + '页</option>';
                } else {
                    html += '<option value="' + i + '">第' + i + '页</option>';
                }
            }
            return html;
        },
        alert: function(message, code){
            $("#dosubmit").removeAttr("disabled");
            var type = code || $.scojs_message.TYPE_ERROR;
            $.scojs_message(message, type);
        }
    }
});