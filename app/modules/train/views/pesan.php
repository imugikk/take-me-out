<script type="text/javascript">
	$(function() {
		// objDate('TglPO');
		pageLoadDetailList();
		$('#id_property').focus();
	});

	function pageLoadDetailList() {
		$('#resultContentDetail').html('<div class="overlay"><i class="fa fa-refresh fa-spin"></i></div>');
		show_progress();
		$.post(site_url + 'flight/manage/detail_list', {
			id: '<?= $pesanan['id_pesanan'] ?>'
		}, function(result) {
			$('#resultContentDetail').html(result);
			hide_progress();
		}, "html");
	}

	function add_detail() {
		$('#tambah_penumpang').button('loading');
		show_progress();
		$.post(site_url + 'flight/manage/tambah_penumpang', {
			id_jadwal : '<?= $jadwal['id_jadwal']; ?>',
			id_pesanan_detail : $('#id_pesanan_detail').val(),
			id_pesanan : '<?= $pesanan['id_pesanan']; ?>',
			no_ktp : $('#no_ktp').val(),
			name : $('#name').val()
		}, function(result) {
			hide_progress();
			if (result.message) {
				$('#tambah_penumpang').button('reset');
				$('#total_harga').html(thousand(result.total));
				$('#id_pesanan_detail').val('');
				$('#no_ktp').val('');
				$('#name').val('');
				$('#no_ktp').focus();
				pageLoadDetailList();
			} else {
				// clean error sign
				error_message(result.error);
				setTimeout(function() {
					$('#no_ktp').focus();
					$('#tambah_penumpang').button('reset');
				}, 2000);
			}
		}, "json");
	}

	function nextDetail(tp) {
		if (tp == 1) {
			$('#Quantity').focus();
		} else if (tp == 2) {
			// $('#QuantitySystem').focus();
		} else if (tp == 3) {
			// $('#tambah_penumpang').focus();
		}
	}
	function delete_detail(id_pesanan_detail, id_pesanan,code){
        Swal.fire({
            title: '<?lang('delete_confirmation_title');?>',
			content: '<?lang('delete_confirmation_content');?>',
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: '<?lang('yes');?>'
        }).then(function(result) {
            if (result.value) {
                $.ajax({
                    type:"POST",
                    url:site_url+'flight/manage/delete_detail',
                    data:{id_detail : id_pesanan_detail,id : id_pesanan},
                    dataType: "json",
                    success:function(result){
						pageLoadDetailList();
                        $('#total_harga').html(thousand(result.grand_total));
                    },
                });
            }
        });
	}

	function posting() {
        Swal.fire({
            title: '<?lang('posting_confirmation_title');?>',
            text: '<?lang('posting_confirmation_content');?>',
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: '<?lang('yes');?>'
        }).then(function(result) {
            if (result.value) {
                $.ajax({
                    type:"POST",
                    url:site_url+'flight/manage/posting',
                    data:{id : '<?= $pesanan['id_pesanan'] ?>'},
                    dataType: "json",
                    success:function(result){
						if (result.error) {
							error_message(result.error);
						} else {
							success_message(result.message);
							// pesan('<?//encode($jadwal['id_jadwal']) ?>');
						}
                    },
                });
            }
        });
	}
	function show_hide() {
		// e.preventDefault();
		$('div[id^="div_1"]').toggleClass('col-lg-1').toggleClass('col-lg-3');
		$('div[id^="div_11"]').toggleClass('col-lg-11').toggleClass('col-lg-9');
		// $('#Code').focus();
		var x = document.getElementById("div_info");
		if (x.style.display === "none") {
			x.style.display = "block";
		} else {
			x.style.display = "none";
		}
		var z = document.getElementById("no_transaksi");
		if (z.style.display === "none") {
			z.style.display = "block";
		} else {
			z.style.display = "none";
		}
		// $('#last_div').toggle();
	}
</script>
<div id="form-main">
	<!--begin::Subheader-->
	<div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
		<div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
			<!--begin::Info-->
			<div class="d-flex align-items-center flex-wrap mr-1">
				<!--begin::Page Heading-->
				<div class="d-flex align-items-baseline mr-5">
					<!--begin::Page Title-->
					<h5 class="text-dark font-weight-bold my-2 mr-5"><?lang('flight');?></h5>
					<!--end::Page Title-->
					<!--begin::Breadcrumb-->
					<ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
						<li class="breadcrumb-item">
							<a href="javascript:void(0);" class="text-muted"><?=$pesanan['nomor_pesanan'];?></a></a>
						</li>
					</ul>
					<!--end::Breadcrumb-->
				</div>
				<!--end::Page Heading-->
			</div>
			<!--end::Info-->
			<!--begin::Toolbar-->
			<div class="d-flex align-items-center">
				<!--begin::Actions-->
                <a id="button_show_filter" onclick="main_content('form-main');" href="javascript:void(0);" class="btn btn-clean btn-sm font-weight-bold font-size-base mr-1">
                    <?lang('back');?>
                </a>
				<!--end::Actions-->
			</div>
			<!--end::Toolbar-->
		</div>
	</div>
	<!--end::Subheader-->
	<!--begin::Entry-->
	<div class="d-flex flex-column-fluid">
		<!--begin::Container-->
		<div class="container">
			<div class="row">
				<div class="col-lg-1" id="div_1_info">
					<div class="card card-custom" onclick="show_hide();" style="margin-bottom:-40px;">
						<div class="card-header">
							<div class="card-title" style="margin-left:-10px;">
								<i class="flaticon-information"></i> &nbsp;&nbsp;
								<span style="display:none;" id="no_transaksi"><?=$pesanan['nomor_pesanan'];?></span>
							</div>
						</div>
						<div class="collapse show" id="div_info" style="display:none;">
							<div class="card-body">
								<span style="float:left;margin-left:10px;"><?= tanggal($pesanan['created_at']); ?></span><br>
								<span style="float:left;margin-left:10px;">Total : </span> <span id="total_harga"><?=thousand($pesanan['total'])?:0;?></span>
								<div class="kt-separator kt-separator--border-dashed"></div>
							</div>
							<?php
							if($pesanan['st'] == 0){
							?>
							<div class="card-footer">
                                <a id="posting_data" onclick="posting();" style="float:right;margin-bottom:10px;" class="btn btn-outline-success btn-sm" href="javascript:void(0);">
                                    Simpan
                                </a>
							</div>
							<?php
							}
							?>
						</div>
					</div>
				</div>
				<div class="col-lg-11" id="div_11_input">
					<div class="card card-custom">
						<!-- <div class="card-header">
							<div class="card-title">
								<h3 class="card-label">Toastr Notifications Examples</h3>
							</div>
						</div> -->
						<!--begin::Form-->
						<form class="form" id="form_detail">
							<div class="card-body">
								<div class="form-group row">
									<input type="hidden" id="id_pesanan_detail" name="id_pesanan_detail">
                                    <div class="col-lg-6">
										<label><?lang('no_ktp');?>:</label>
										<input type="text" id="no_ktp" name="no_ktp" class="form-control"/>
									</div>
									<div class="col-lg-6">
										<label><?lang('name');?>:</label>
										<input type="text" id="name" name="name" class="form-control"/>
									</div>
								</div>
								<?
								if($pesanan['st'] == 0){
								?>
								<div class="row">
									<div class="col-lg-5">
									</div>
									<div class="col-lg-7">
										<button type="button" onclick="add_detail();" id="tambah_penumpang" class="btn btn-primary mr-2">
                                            Tambah Penumpang
                                        </button>
										<button type="reset" class="btn btn-secondary">
                                            Cancel
                                        </button>
									</div>
									<!-- <div class="col-lg-6 text-right">
										<button type="reset" class="btn btn-danger">Delete</button>
									</div> -->
								</div>
								<?
								}
								?>
							</div>
							<div class="card-footer" style="margin-top:-20px;">
								<div id="resultContentDetail"></div>
							</div>
						</form>
						<!--end::Form-->
					</div>
				</div>
			</div>
		</div>
		<!--end::Container-->
	</div>
	<!--end::Entry-->
</div>
<script>
number_only('no_ktp');
</script>