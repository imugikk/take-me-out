<table class="table table-sm table-hover table-responsive-lg">
    <thead class="thead-dark">
        <tr>
            <th scope="col">No.</th>
            <th scope="col"><?lang('date');?></th>
            <th scope="col"><?lang('maskapai');?></th>
            <th scope="col"><?lang('class');?></th>
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
            ?>
            <tr>
                <td><?= $no;?></td>
                <td><?=tanggal($row['tanggal']);?></td>
                <td><?=$row['nama_maskapai'];?></td>
                <td><?=$row['kelas'];?></td>
                <td><?=thousand($row['harga']);?></td>
                <td>
                <div class="dropdown dropdown-inline mr-4">
                    <button type="button" class="btn btn-light-primary btn-icon btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="ki ki-bold-more-hor"></i>
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="javascript:void(0);" onclick="pesan('<?= $row['id_jadwal'] ?>');">Pesan</a>
                    </div>
                </div>
                </td>
            </tr>
        <?
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