<table class="table table-sm table-hover table-responsive-lg">
    <thead class="thead-dark">
        <tr>
            <th scope="col">No.</th>
            <th scope="col"><?lang('module_title');?></th>
            <th scope="col"><?lang('module_url');?></th>
            <th scope="col"><?lang('module_parent');?></th>
            <th scope="col"><?lang('module_icon');?></th>
            <th scope="col"><?lang('module_orderby');?></th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        <?
        $no = ($paging['current'] - 1) * $paging['limit'];
        if($list->num_rows() > 0){
            foreach ($list->result_array() as $row) {
                $no++;
                $id_module = $row['fid_office_module'];
                $language = get_language();
                if($language == "en"){
                    $title = $row['title_en'];
                }else{
                    $title = $row['title_id'];
                }
                if ($id_module != 0) {
                    $id_get = $this->Module_model->get($id_module);
                    if($language == "en"){
                        $menu = $id_get['title_en'];
                    }else{
                        $menu = $id_get['title_id'];
                    }
                }else {
                    if($language == "en"){
                        $menu = 'This is Parent Module';
                    }else{
                        $menu = 'ini adalah Modul Utama';
                    }
                }
            ?>
            <tr>
                <td><?= $no ?></td>
                <td><?=$title;?></td>
                <td><?=$row['url'];?></td>
                <td><?=$menu;?></td>
                <td><i class="<?=$row['nama_ikon'];?>"></i></td>
                <td><?=$row['order_by'];?></td>
                <td>
                <div class="dropdown dropdown-inline mr-4">
                    <button type="button" class="btn btn-light-primary btn-icon btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="ki ki-bold-more-hor"></i>
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="javascript:void(0);" onclick="input('<?= encode($row['id_office_module']) ?>');"><?lang('update');?></a>
                        <a class="dropdown-item" href="javascript:void(0);" onclick="delete_data('<?= encode($row['id_office_module']) ?>')"><?lang('delete');?></a>
                        <!-- <div class="dropdown-divider"></div> -->
                    </div>
                </div>
                </td>
            </tr>
            <?
            }
        }else{
        ?>
        <tr>
            <td colspan="7"><center><?lang('no_data');?></center></td>
        </tr>
        <?
        }
        ?>
    </tbody>
</table>
<?= $paging['list'] ?>