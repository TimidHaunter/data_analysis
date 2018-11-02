<?php defined('BASEPATH') or exit('No direct script access allowed.'); ?>
<div class='panel panel-default grid'>
    <div class='panel-heading'>
        <i class='glyphicon glyphicon-th-list'></i> <?='Lme管理-列表'?>
        <div class='panel-tools'>
            <div class='btn-group'>
                <?php aci_ui_a($folder_name, $controller_name, 'add', '', ' class="btn  btn-sm "', '<span class="glyphicon glyphicon-plus"></span>添加') ?>
            </div>
            <div class='badge'><?php echo count($data_list); ?></div>
            <div class='btn-group'>
                <?php aci_ui_a($folder_name, $controller_name, 'chart', '', ' class="btn  btn-sm "', '<span class="glyphicon glyphicon-th-list"></span>Lme管理-图表') ?>
            </div>
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
                                <th><?='日期'?></th>
                                <th><?='铜今日留存'?></th>
                                <th><?='铜注销仓单量'?></th>
                                <th><?='铝今日留存'?></th>
                                <th><?='铝注销仓单量'?></th>
                                <th><?='锌今日留存'?></th>
                                <th><?='锌注销仓单量'?></th>
                                <th><?='镍今日留存'?></th>
                                <th><?='镍注销仓单量'?></th>
                                <th><?='锡今日留存'?></th>
                                <th><?='锡注销仓单量'?></th>
                                <th><?='铅今日留存'?></th>
                                <th><?='铅注销仓单量'?></th>
                                <th><?='操作'?></th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($data_list as $v) : ?>
                            <tr>
                                <td><?=@$v['date']?></td>
                                <td><?=@$v['cu_keep']?></td>
                                <td><?=@$v['cu_cancel']?></td>
                                <td><?=@$v['al_keep']?></td>
                                <td><?=@$v['al_cancel']?></td>
                                <td><?=@$v['zn_keep']?></td>
                                <td><?=@$v['zn_cancel']?></td>
                                <td><?=@$v['ni_keep']?></td>
                                <td><?=@$v['ni_cancel']?></td>
                                <td><?=@$v['sn_keep']?></td>
                                <td><?=@$v['sn_cancel']?></td>
                                <td><?=@$v['pb_keep']?></td>
                                <td><?=@$v['pb_cancel']?></td>
                                <td>
                                    <?php aci_ui_a($folder_name, $controller_name, 'show', $v['id'], ' class="btn btn-default btn-xs edit-btn"', '<span class="glyphicon glyphicon-share-alt"></span>查看') ?>
                                    <?php aci_ui_a($folder_name, $controller_name, 'edit', $v['id'], ' class="btn btn-default btn-xs edit-btn"', '<span class="glyphicon glyphicon-edit"></span>编辑') ?>
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
