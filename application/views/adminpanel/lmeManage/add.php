<?php if (!defined('BASEPATH')) exit('No direct script access allowed.');?>

<form class="form-horizontal" role="form" id="validateform" name="validateform" method="post" action="#">
    <div class='panel panel-default'>
        <div class='panel-heading'>
            <i class='glyphicon glyphicon-th-list'></i> <?='Lme管理'?> - <?php echo ($is_edit) ? '编辑' : '添加'; ?>
            <?php include(VIEWPATH.'filter/default/back'.EXT); ?>
        </div>
        <div class='panel-body'>
            <fieldset>
                <legend>lme数据信息</legend>
                <div class="form-group">
                    <label for="date" class="col-sm-2 control-label form-control-static"><?='日期'?></label>
                    <div class="col-sm-2">
                        <input class="form-control" type="text" size="90" value="<?php echo $data_info['date'] ?? "" ; ?>" autocomplete="off" id="date" name="date" placeholder="<?='请填写数据日期'?>"/>
                    </div>
                </div>

                <div class="form-group">
                    <label for="zn" class="col-sm-2 control-label form-control-static"></label>
                    <div class="col-sm-2">
                        <span class="form-control" size="20" readonly>今日留存</span>
                    </div>
                    <div class="col-sm-2">
                        <span class="form-control" size="20" readonly>注销仓单量</span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="cu" class="col-sm-2 control-label form-control-static"><?='铜(Cu)'?></label>
                    <div class="col-sm-2">
                        <input class="form-control" type="text" size="20" value="<?=@$data_info['cu_keep']??""?>" autocomplete="off" name="cu_keep" id="cu_keep" placeholder="<?='请填写铜今日留存'?>"/>
                    </div>
                    <div class="col-sm-2">
                        <input class="form-control" type="text" size="20" value="<?=@$data_info['cu_cancel']?>" autocomplete="off" name="cu_cancel" id="cu_cancel" placeholder="<?='请填写铜注销仓单量'?>"/>
                    </div>
                </div>
                <div class="form-group">
                    <label for="al" class="col-sm-2 control-label form-control-static"><?='铝(Al)'?></label>
                    <div class="col-sm-2">
                        <input class="form-control" type="text" size="20" value="<?=@$data_info['al_keep']??""?>" autocomplete="off" name="al_keep" id="al_keep" placeholder="<?='请填写铝今日留存'?>"/>
                    </div>
                    <div class="col-sm-2">
                        <input class="form-control" type="text" size="20" value="<?=@$data_info['al_cancel']?>" autocomplete="off" name="al_cancel" id="al_cancel" placeholder="<?='请填写铝注销仓单量'?>"/>
                    </div>
                </div>
                <div class="form-group">
                    <label for="zn" class="col-sm-2 control-label form-control-static"><?='锌(Zn)'?></label>
                    <div class="col-sm-2">
                        <input class="form-control" type="text" size="20" value="<?=@$data_info['zn_keep']??""?>" autocomplete="off" name="zn_keep" id="zn_keep" placeholder="<?='请填写锌今日留存'?>"/>
                    </div>
                    <div class="col-sm-2">
                        <input class="form-control" type="text" size="20" value="<?=@$data_info['zn_cancel']?>" autocomplete="off" name="zn_cancel" id="zn_cancel" placeholder="<?='请填写锌注销仓单量'?>"/>
                    </div>
                </div>
                <div class="form-group">
                    <label for="ni" class="col-sm-2 control-label form-control-static"><?='镍(Ni)'?></label>
                    <div class="col-sm-2">
                        <input class="form-control" type="text" size="20" value="<?=@$data_info['ni_keep']??""?>" autocomplete="off" name="ni_keep" id="ni_keep" placeholder="<?='请填写镍今日留存'?>"/>
                    </div>
                    <div class="col-sm-2">
                        <input class="form-control" type="text" size="20" value="<?=@$data_info['ni_cancel']?>" autocomplete="off" name="ni_cancel" id="ni_cancel" placeholder="<?='请填写镍注销仓单量'?>"/>
                    </div>
                </div>
                <div class="form-group">
                    <label for="sn" class="col-sm-2 control-label form-control-static"><?='锡(Sn)'?></label>
                    <div class="col-sm-2">
                        <input class="form-control" type="text" size="20" value="<?=@$data_info['sn_keep']??""?>" autocomplete="off" name="sn_keep" id="sn_keep" placeholder="<?='请填写锡今日留存'?>"/>
                    </div>
                    <div class="col-sm-2">
                        <input class="form-control" type="text" size="20" value="<?=@$data_info['sn_cancel']?>" autocomplete="off" name="sn_cancel" id="sn_cancel" placeholder="<?='请填写锡注销仓单量'?>"/>
                    </div>
                </div>
                <div class="form-group">
                    <label for="pb" class="col-sm-2 control-label form-control-static"><?='铅(Pb)'?></label>
                    <div class="col-sm-2">
                        <input class="form-control" type="text" size="20" value="<?=@$data_info['pb_keep']??""?>" autocomplete="off" name="pb_keep" id="pb_keep" placeholder="<?='请填写铅今日留存'?>"/>
                    </div>
                    <div class="col-sm-2">
                        <input class="form-control" type="text" size="20" value="<?=@$data_info['pb_cancel']?>" autocomplete="off" name="pb_cancel" id="pb_cancel" placeholder="<?='请填写铅注销仓单量'?>"/>
                    </div>
                </div>


            </fieldset>

            <fieldset>
                <div class='form-actions' id="flass" name="flass">
                    <button class='btn btn-primary' type='submit' id="dosubmit">保存</button>
                </div>
            </fieldset>
        </div>
    </div>
</form>
<script language="javascript" type="text/javascript">
    var id = '<?=@$data_info['id']?>';
    var is_edit = <?php echo $is_edit ? "true" : "false" ?>;

    require(['<?php echo SITE_URL?>scripts/common.js'], function (common) {
        require(['<?php echo SITE_URL?>scripts/<?php echo $folder_name?>/<?php echo $controller_name?>/add.js']);
    });
</script>