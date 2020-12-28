<?
$language = get_language();
?>
<div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
    <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <div class="d-flex align-items-center flex-wrap mr-2">
            <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5"><?lang('setting');?></h5>
            <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div>
            <span class="text-muted font-weight-bold mr-4"><?lang('module');?></span>
            <?
            if ($module['id_office_module'] != "") {
            ?>
            <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div>
            <span class="text-muted font-weight-bold mr-4"><?= $module['title_en']; ?></span>
            <?
            }else{
            ?>
            <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div>
            <span class="text-muted font-weight-bold mr-4"><?lang('add');?></span>
            <?
            }
            ?>
        </div>
        <div class="d-flex align-items-center">
            <a id="button_show_filter" onclick="page_setting_module(1);" href="javascript:void(0);" class="btn btn-clean btn-sm font-weight-bold font-size-base mr-1">
                <?lang('back');?>
            </a>
        </div>
    </div>
</div>
<div class="d-flex flex-column-fluid">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card card-custom gutter-b">
                    <div class="card-header">
                        <div class="card-title">
                            <h3 class="card-label">
                            Form
                            <?
                            if ($module['id_office_module'] != "") {
                            ?>
                            <?lang('update');?> <?= $module['title_en']; ?>
                            <?
                            }else{
                            ?>
                            <?lang('add');?>
                            <?
                            }
                            ?>
                            </h3>
                        </div>
                    </div>
                    <form class="form" id="form_input">
                        <div class="card-body">
                            <div class="form-group row">
                                <div class="col-lg-4">
                                    <input type="hidden" id="id" name="id" value="<?=encode($module['id_office_module']);?>">
                                    <label><?lang('module_title');?> <?lang('en');?>:</label>
                                    <input type="text" name="title_en" id="title_en" onkeydown="if (event.keyCode == 13) save()" class="form-control" value="<?=$module['title_en'];?>" placeholder="<?lang('module_title');?> <?lang('en');?>"/>
                                </div>
                                <div class="col-lg-4">
                                    <label><?lang('module_title');?> <?lang('id');?>:</label>
                                    <input type="text" name="title_id" id="title_id" onkeydown="if (event.keyCode == 13) save()" class="form-control" value="<?=$module['title_id'];?>" placeholder="<?lang('module_title');?> <?lang('id');?>"/>
                                </div>
                                <div class="col-lg-4">
                                    <label><?lang('module_url');?>:</label>
                                    <input type="text" name="url" id="url" onkeydown="if (event.keyCode == 13) save()" class="form-control" value="<?=$module['url'];?>" placeholder="<?lang('module_url');?>"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-4">
                                    <label><?lang('module_parent');?>:</label>
                                    <select id="parent_menu" name="parent_menu" class="form-control" data-live-search="true">
                                        <option SELECTED DISABLED><?lang('choose');?></option>
                                        <?
                                        foreach ($list_module->result_array() as $row_module) {
                                            if($language == "en"){
                                                $title = $row_module['title_en'];
                                            }else{
                                                $title = $row_module['title_id'];
                                            }
                                        ?>
                                        <option value="<?=$row_module['id_office_module'];?>" <?= ($row_module['id_office_module'] == $module['fid_office_module'] ? 'selected="selected"' : '') ?>><?=$title;?></option>
                                        <?
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-lg-4">
                                    <label><?lang('module_icon');?>:</label>
                                    <select id="icon_menu" name="icon_menu" class="form-control" data-live-search="true">
                                        <option SELECTED DISABLED><?lang('choose');?></option>
                                        <?
                                        foreach ($icon->result_array() as $row_icon) {
                                        ?>
                                        <option data-content="<i class='<?=$row_icon['name'];?>'></i> <?=$row_icon['name'];?>" aria-hidden="true" value="<?=$row_icon['id_icon'];?>" <?= ($row_icon['id_icon'] == $module['fid_icon'] ? 'selected="selected"' : '') ?>></option>
                                        <?
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-lg-4">
                                    <label><?lang('module_orderby');?>:</label>
                                    <input type="text" name="order" id="order" onkeydown="if (event.keyCode == 13) save()" class="form-control" value="<?=$module['order_by'];?>" placeholder="<?lang('module_orderby');?>"/>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-lg-6">
                                    <button type="reset" class="btn btn-secondary"><?lang('cancel');?></button>
                                </div>
                                <div class="col-lg-6 text-right">
                                    <button id="tombol_save" onclick="save()" class="btn btn-danger">
                                        <?lang('save');?>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    function save() {
        var btn = $('#tombol_save');
        btn.addClass('kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light').attr('disabled', true);
        $.post(site_url + 'setting.module/manage/save',
            $('#form_input').serialize(),
            function(result) {
                if(result.error == "Input"){
                    error_message('<?lang('no_input');?>');
                    btn.addClass('kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light').attr('disabled', false);
                }else if(result.error == "Failed"){
                    error_message('<?lang('error');?>');
                    btn.addClass('kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light').attr('disabled', false);
                }else if (result.message) {
                    success_message('<?lang('saved');?>');
                    btn.addClass('kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light').attr('disabled', false);
                    setTimeout(function() {
                        page_setting_module(1);
                    }, 2000);
                }
            }, "json"
        );
    }
    select_picker('parent_menu');
    select_picker('icon_menu');
    number_only('order');
</script>