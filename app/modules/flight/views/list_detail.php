<?php
$screen_height = '';
echo "
<script language=\"JavaScript\">
<!--
var height = screen.height;
var screen_height = parseInt(height * 0.22)
//-->
</script>";
?>
<script type="text/javascript">
document.getElementById('scroll-pane').style.height = screen_height+"px";

var divEl = document.getElementById("scroll-pane");
var selectedTrEl = undefined;

function select(index) {
    var trEl = divEl.getElementsByTagName("tr")[index];
    if(selectedTrEl) {
        // selectedTrEl.className = "";
    }
    selectedTrEl = trEl;
    selectedTrEl.className = "selected";
    var scrollTo = selectedTrEl.offsetTop;
    divEl.scrollTop = scrollTo;
}

select($("#nomornya").val());

function edit_detail(id_pesanan_detail, no_ktp,nama) {
	$('#id_pesanan_detail').val(id_pesanan_detail);
	$('#no_ktp').val(no_ktp);
	$('#name').val(nama);
}
</script>
<style>
	th {
		text-align: center;
		vertical-align: middle;
	}
</style>
<table class="table" style="margin-top:-25px;">
	<thead class="thead-dark">
		<tr>
			<th style="width:5%;text-align:left;font-family: 'Inconsolata', monospace;">No </th>
			<th style="width:15%;text-align:left;font-family: 'Inconsolata', monospace;"><?lang('no_ktp');?></th>
			<th style="width:15%;text-align:left;font-family: 'Inconsolata', monospace;"><?lang('name');?></th>
			<?php
			if($pesanan['st'] == 0){
			?>
			<th style="width:20%;text-align:left;font-family: 'Inconsolata', monospace;">Action</th>
			<?php
			}
			?>
		</tr>
	</thead>
</table>
<div id="scroll-pane" style="overflow-y:scroll; overflow-x:hidden;">
	<table class="table">
		<thead class="thead-dark">
			<tr>
			</tr>
		</thead>
		<tbody>
			<?php
			$no = 0;
			$status = '';
			$total_item = 0;
			$total_harga = 0;
			foreach ($pesanan_detail->result_array() as $row) {
				$no++;
				$total_item = $no;
				$id = $row['fid_pesanan'];
				$total_harga = $pesanan['total'];
				// $total_item = thousand($row['harga']);
				// $total_harga = $no * thousand($row['harga']);
				// $sub_total = $row['price'] * $row['qty'];
				// $total_item += $row['qty'];
				// $total_harga += $sub_total;
			?>
				<tr>
					<td style="width:5%;text-align:left;font-family: 'Inconsolata', monospace;"><?= $no; ?></td>
					<td style="width:15%;text-align:left;font-family: 'Inconsolata', monospace;"><?= $row['no_ktp_pemesan'] ?></td>
					<td style="width:25%;text-align:left;font-family: 'Inconsolata', monospace;"><?= $row['nama_pemesan'] ?></td>
					<?php
					if($pesanan['st'] == 0){
					?>
					<td style="width:20%;">
						<a href="javascript:;" onclick="edit_detail('<?= $row['id_pesanan_detail']; ?>','<?= $row['no_ktp_pemesan'] ?>','<?= $row['nama_pemesan'] ?>')" class="btn btn-sm btn-clean btn-icon mr-2">
							<span class="svg-icon svg-icon-md">
								<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
									<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
										<rect x="0" y="0" width="24" height="24"></rect>
										<path d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) "></path>
										<rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2" rx="1"></rect>
									</g>
								</svg>
							</span>
						</a>
						<a href="javascript:;" onclick="delete_detail('<?= $row['id_pesanan_detail']; ?>','<?= encode($row['fid_pesanan']); ?>')" class="btn btn-sm btn-clean btn-icon mr-2">
							<span class="svg-icon svg-icon-md">
								<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
									<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
										<rect x="0" y="0" width="24" height="24"/>
										<path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero"/>
										<path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3"/>
									</g>
								</svg>
							</span>
						</a>
					</td>
					<?php
					}
					?>
				</tr>
			<?php } ?>
			<input type="hidden" id="nomornya" name="t_nomornya" value="<?=$no;?>">
		</tbody>
		<tfoot>
			<tr>
				<td style="text-align:left;font-family: 'Inconsolata', monospace;" colspan="2">
					Total
				</td>
				<td style="text-align:right;font-family: 'Inconsolata', monospace;"><?=thousand($total_item);?></td>
				<td style="text-align:right;font-family: 'Inconsolata', monospace;"><?=thousand($total_harga);?></td>
			</tr>
		</tfoot>
	</table>
</div>
<script>
$(function () {
    $('[data-toggle="tooltip"]').tooltip()
});
</script>