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
                    <div class='panel-tools' style="padding-right: 10px;height: 42px;margin-top: -25px;">
                        <button id="btn-download" class="btn"><i class='glyphicon glyphicon-download'></i><?='下载EXCEL'?></button>
                    </div>
                </div>

                <table id="table-download" class="table table-striped table-bordered" style="max-width: 60%;margin-left: 20%;">
                    <thead>
                        <tr>
                            <th><?='LME库存数据 - '.$data_info['date']?></th>
                            <th><?='今日库存'?></th>
                            <th><?='较上一交易日库存变化'?></th>
                            <th><?='注销仓单量'?></th>
                            <th><?='注销仓单占比'?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?='铜'?></td>
                            <td><?=$data_info['cu_keep']?></td>
                            <td></td>
                            <td><?=$data_info['cu_cancel']?></td>
                            <td><?=($data_info['cu_cancel']/$data_info['cu_keep'])*100?></td>
                        </tr>
                        <tr>
                            <td><?='铝'?></td>
                            <td><?=$data_info['al_keep']?></td>
                            <td></td>
                            <td><?=$data_info['al_cancel']?></td>
                            <td><?=($data_info['al_cancel']/$data_info['al_keep'])*100?></td>
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
