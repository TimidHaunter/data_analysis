require(['jquery', 'bootstrap', 'highcharts', 'exporting'], function ($) {
    $('#container_cu_keep').highcharts({
        title: {text: 'LME库存 铜'},
        yAxis: {title: {text: '铜 库存量'}},
        legend: {layout: 'vertical', align: 'right', verticalAlign: 'middle'},
        xAxis: {categories: xAxis_serise_date},
        series: [{name: '铜库存', data: yAxis_series_cu_keep}],
        responsive: {rules: [{condition: {maxWidth: 500}, chartOptions: {legend: {layout: 'horizontal', align: 'center', verticalAlign: 'bottom'}}}]}
    });

    $('#container_al_keep').highcharts({
        title: {text: 'LME库存 铝'},
        yAxis: {title: {text: '铝 库存量'}},
        legend: {layout: 'vertical', align: 'right', verticalAlign: 'middle'},
        xAxis: {categories: xAxis_serise_date},
        series: [{name: '铝库存', data: yAxis_series_al_keep}],
        responsive: {rules: [{condition: {maxWidth: 500}, chartOptions: {legend: {layout: 'horizontal', align: 'center', verticalAlign: 'bottom'}}}]}
    });

    $('#container_zn_keep').highcharts({
        title: {text: 'LME库存 锌'},
        yAxis: {title: {text: '锌 库存量'}},
        legend: {layout: 'vertical', align: 'right', verticalAlign: 'middle'},
        xAxis: {categories: xAxis_serise_date},
        series: [{name: '锌库存', data: yAxis_series_zn_keep}],
        responsive: {rules: [{condition: {maxWidth: 500}, chartOptions: {legend: {layout: 'horizontal', align: 'center', verticalAlign: 'bottom'}}}]}
    });

    $('#container_ni_keep').highcharts({
        title: {text: 'LME库存 镍'},
        yAxis: {title: {text: '镍 库存量'}},
        legend: {layout: 'vertical', align: 'right', verticalAlign: 'middle'},
        xAxis: {categories: xAxis_serise_date},
        series: [{name: '镍库存', data: yAxis_series_ni_keep}],
        responsive: {rules: [{condition: {maxWidth: 500}, chartOptions: {legend: {layout: 'horizontal', align: 'center', verticalAlign: 'bottom'}}}]}
    });

    $('#container_sn_keep').highcharts({
        title: {text: 'LME库存 锡'},
        yAxis: {title: {text: '锡 库存量'}},
        legend: {layout: 'vertical', align: 'right', verticalAlign: 'middle'},
        xAxis: {categories: xAxis_serise_date},
        series: [{name: '锡库存', data: yAxis_series_sn_keep}],
        responsive: {rules: [{condition: {maxWidth: 500}, chartOptions: {legend: {layout: 'horizontal', align: 'center', verticalAlign: 'bottom'}}}]}
    });

    $('#container_pb_keep').highcharts({
        title: {text: 'LME库存 铅'},
        yAxis: {title: {text: '库存量'}},
        legend: {layout: 'vertical', align: 'right', verticalAlign: 'middle'},
        xAxis: {categories: xAxis_serise_date},
        series: [{name: '铅库存', data: yAxis_series_pb_keep}],
        responsive: {rules: [{condition: {maxWidth: 500}, chartOptions: {legend: {layout: 'horizontal', align: 'center', verticalAlign: 'bottom'}}}]}
    });
});