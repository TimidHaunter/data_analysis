<?php defined('BASEPATH') or exit('No direct script access allowed.'); ?>
<div class='panel panel-default grid'>
    <div class='panel-heading'>
        <i class='glyphicon glyphicon-th-list'></i> <?='Lme管理-详情'?>
        <?php include(VIEWPATH.'filter/default/back'.EXT); ?>
    </div>

    <div id="form-list">
        <div class='panel-body'>
            <div class="line-chart table-container">
                <div class='panel-heading'>
                    <div class="title text-center" style="font-size: 14px;">
                        <span id="title-table"><?='LME库存数据 - ' . $data_info['date'];?></span>
                    </div>
                </div>

                <table id="table-download" class="table table-striped table-bordered" style="max-width: 60%;margin-left: 20%;">
                    <thead>
                        <tr>
                            <th style="text-align:center"><?='LME库存数据 - '.$data_info['date']?></th>
                            <th style="text-align:center"><?='今日库存'?></th>
                            <th style="text-align:center"><?='较上一交易日库存变化'?></th>
                            <th style="text-align:center"><?='注销仓单量'?></th>
                            <th style="text-align:center"><?='注销仓单占比'?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="text-align:center"><?='铜'?></td>
                            <td style="text-align:center"><?=$data_info['cu_keep']?></td>
                            <td style="text-align:center"><?=$data_info['cu_change']?></td>
                            <td style="text-align:center"><?=$data_info['cu_cancel']?></td>
                            <td style="text-align:center"><?=percent_format($data_info['cu_cancel']/$data_info['cu_keep']).'%'?></td>
                        </tr>
                        <tr>
                            <td style="text-align:center"><?='铝'?></td>
                            <td style="text-align:center"><?=$data_info['al_keep']?></td>
                            <td style="text-align:center"><?=$data_info['al_change']?></td>
                            <td style="text-align:center"><?=$data_info['al_cancel']?></td>
                            <td style="text-align:center"><?=percent_format($data_info['al_cancel']/$data_info['al_keep']).'%'?></td>
                        </tr>
                        <tr>
                            <td style="text-align:center"><?='锌'?></td>
                            <td style="text-align:center"><?=$data_info['zn_keep']?></td>
                            <td style="text-align:center"><?=$data_info['zn_change']?></td>
                            <td style="text-align:center"><?=$data_info['zn_cancel']?></td>
                            <td style="text-align:center"><?=percent_format($data_info['zn_cancel']/$data_info['zn_keep']).'%'?></td>
                        </tr>
                        <tr>
                            <td style="text-align:center"><?='镍'?></td>
                            <td style="text-align:center"><?=$data_info['ni_keep']?></td>
                            <td style="text-align:center"><?=$data_info['ni_change']?></td>
                            <td style="text-align:center"><?=$data_info['ni_cancel']?></td>
                            <td style="text-align:center"><?=percent_format($data_info['ni_cancel']/$data_info['ni_keep']).'%'?></td>
                        </tr>
                        <tr>
                            <td style="text-align:center"><?='锡'?></td>
                            <td style="text-align:center"><?=$data_info['sn_keep']?></td>
                            <td style="text-align:center"><?=$data_info['sn_change']?></td>
                            <td style="text-align:center"><?=$data_info['sn_cancel']?></td>
                            <td style="text-align:center"><?=percent_format($data_info['sn_cancel']/$data_info['sn_keep']).'%'?></td>
                        </tr>
                        <tr>
                            <td style="text-align:center"><?='铅'?></td>
                            <td style="text-align:center"><?=$data_info['pb_keep']?></td>
                            <td style="text-align:center"><?=$data_info['pb_change']?></td>
                            <td style="text-align:center"><?=$data_info['pb_cancel']?></td>
                            <td style="text-align:center"><?=percent_format($data_info['pb_cancel']/$data_info['pb_keep']).'%'?></td>
                        </tr>
                        <tr>
                            <td colspan="5" style="color: red; text-align:right;">注：以上数据统计单位均为吨；数字前面+/-表示增减变化</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>


    </div>
</div>

<script language="javascript" type="text/javascript">
    require(['<?php echo SITE_URL?>scripts/common.js'], function (common) {
        require(['<?php echo SITE_URL?>scripts/<?php echo $folder_name?>/<?php echo $controller_name?>/show.js']);
    });
</script>
