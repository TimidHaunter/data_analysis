<?php defined('BASEPATH') or exit('No direct script access allowed.'); ?>
<div class='panel panel-default grid'>
    <div class='panel-heading'>
        <i class='glyphicon glyphicon-th-list'></i> <?='Lme管理-列表'?>
        <div class='panel-tools'>
            <div class='btn-group'>
                <?php aci_ui_a($folder_name, $controller_name, 'add', '', ' class="btn  btn-sm "', '<span class="glyphicon glyphicon-plus"></span>'.lang('添加')) ?>
            </div>
            <div class='badge'><?php echo count($data_list); ?></div>
        </div>
    </div>

    <!--筛选框-->
<!--    <div class='panel-filter'>-->
<!--        <div class='row'>-->
<!--            <div class='col-md-12'>-->
<!--                <form name="server_filter" class="form-inline" role="form" method="get">-->
<!--                    <button type="submit" name="dosubmit" value="--><?//=lang('确定')?><!--" class="btn btn-success" style="margin-left: 40px;"><i class='glyphicon glyphicon-search'></i></button>-->
<!--                </form>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
    <!--筛选框end-->

    <div id="form-list">
        <div class='panel-body'>
            <?php if ($data_list): ?>
                <div id="query-wrap">
                    <table class='table'>
                        <thead>
                            <tr>
                                <th><?=lang('区服ID')?></th>
                                <th><?=lang('显示ID')?></th>
                                <th><?=lang('显示名称')?></th>
                                <th><?=lang('开服时间')?></th>
                                <th><?=lang('客户端显示状态')?></th>
                                <th><?=lang('是否开服')?></th>
                                <th><?=lang('在线人数')?></th>
                                <th><?=lang('操作')?></th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($data_list as $v) : ?>
                            <tr>
                                <td><?=@$v['serverId']?></td>
                                <td><?=@$v['displayId']?></td>
                                <td><?=@$v['serverName']?></td>
                                <td><?php echo isset($v['openTime']) ? date("Y-m-d H:i:s", $v['openTime']/1000) : ""; ?></td>
                                <td><?php echo $zone_status_list[@$v['clientShowState']] ?? lang('未知'); ?></td>
                                <td><?php echo $zone_type_list[@$v['serverState']] ?? lang('未知'); ?></td>
                                <td><?php echo @$v['online_num'] ?? lang('未知'); ?></td>
                                <td>
                                    <?php aci_ui_a($folder_name, $controller_name, 'query_zone', '?platform='.$platform.'&zone='.$v['serverId'], ' class="btn btn-default btn-xs edit-btn"', '<span class="glyphicon glyphicon-share-alt"></span>'.lang('查看')) ?>
                                    <?php aci_ui_a($folder_name, $controller_name, 'edit', '?platform='.$platform.'&zone='.$v['serverId'], ' class="btn btn-default btn-xs edit-btn"', '<span class="glyphicon glyphicon-edit"></span>'.lang('编辑')) ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php elseif(is_array($data_list)): ?>
                <div class="alert alert-warning" role="alert"><?='暂无数据'?></div>
            <?php endif; ?>
        </div>
    </div>
</div>

<script language="javascript" type="text/javascript">
    require(['<?php echo SITE_URL?>scripts/common.js'], function (common) {
        require(['<?php echo SITE_URL?>scripts/<?php echo $folder_name?>/<?php echo $controller_name?>/index.js']);
    });
</script>
