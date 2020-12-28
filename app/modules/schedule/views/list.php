<table class="table table-striped table-responsive-lg table-borderless">
    <thead class="thead-dark">
        <tr>
            <th scope="col">No.</th>
            <th scope="col">Code Order</th>
            <th scope="col">Type</th>
            <th scope="col"><?lang('price');?></th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        <?
        $no = 0;
        if($list->num_rows() > 0){
            foreach ($list->result_array() as $row) {
                $no++;
                if($row['st']==0){
            ?>
            <tr>
                <td><?= $no; ?></td>
                <td><?=$row['nomor_pesanan'];?></td>
                <td><?=$row['type'];?></td>
                <td><?=thousand($row['total']);?></td>
                <td>
                <div class="btn-group dropleft">
                    <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?=$tombol_aksi;?>
                    </button>
                    <div class="dropdown-menu" x-placement="top-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 0px, 0px);">
                        <a class="dropdown-item" href="javascript:void(0);" onclick="input('<?= encode($row['id_pesanan']) ?>');"><?=$tombol_edit;?></a>
                        <a class="dropdown-item" href="javascript:void(0);" onclick="delete_data('<?= encode($row['id_pesanan']) ?>')"><?=$tombol_hapus;?></a>
                        <!-- <div class="dropdown-divider"></div> -->
                    </div>
                </div>
                </td>
            </tr>
            <?      }
                }
            }else{
            ?>
            <tr>
                <td colspan="6"><center><?lang('no_data');?></center></td>
            </tr>
            <?
            }
            ?>
    </tbody>
</table>
<?= $paging['list'] ?>