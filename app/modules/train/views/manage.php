<script type="text/javascript">
    date_start('tanggal');
    select2('kota_asal');
    select2('kota_tujuan');
	$(function() {
        // page_flight(1);
        main_content('form-main');
	});
    function main_content(cont) {
		$('#form-main').hide();
		$('#form-pesan').hide();
		//
		$('#' + cont).show();
	}

	function page_train(pg) {
        let kota_asal = $("#kota_asal").val(),
        kota_tujuan = $("#kota_tujuan").val();
        if(!kota_asal || !kota_tujuan){
            error_message("Harap isi kota asal dan kota tujuan");
        }else{
            if(kota_asal == kota_tujuan){
                error_message("kota asal dan kota tujuan tidak boleh sama");
            }else{
                show_progress();
                $.post(site_url + 'train/manage/page/' + pg, $('#filter_content').serialize(), function(result) {
                    $('#resultContent').html(result);
                    hide_progress();
                }, "html");
            }
        }
	}
    function pesan(id) {
        show_progress();
		$.post(site_url + 'train/manage/pesan/' + id, {}, function(result) {
			$('#form-pesan').html(result);
			main_content('form-pesan');
			hide_progress();
		}, "html");
	}
</script>
<div id="form-main">
    <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Details-->
            <div class="d-flex align-items-center flex-wrap mr-2">
                <!--begin::Title-->
                <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5"><?lang('train');?></h5>
                <!--end::Title-->
            </div>
            <!--end::Details-->
            <!--begin::Toolbar-->
            <div class="d-flex align-items-center">
                <!--begin::Button-->
                <!-- <a href="#" class=""></a> -->
                <!--end::Button-->
                <!--begin::Button-->
                <a href="javascript:void(0);" onclick="page_train(1);" class="btn btn-light-primary font-weight-bold ml-2">
                    Filter
                </a>
                <!--end::Button-->
            </div>
            <!--end::Toolbar-->
        </div>
    </div>
    <div class="d-flex flex-column-fluid">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card card-custom gutter-b">
                        <div class="card-body">
                            <form id="filter_content">
                                <div class="form-group row">
                                    <div class="col-4">
                                        <label>Tanggal</label>
                                        <input type="text" readonly id="tanggal" name="tanggal" class="form-control">
                                    </div>
                                    <div class="col-4">
                                        <label>Kota Asal</label>
                                        <select class="form-control" name="kota_asal" id="kota_asal">
                                            <option selected disabled><?lang('choose');?></option>
                                            <?
                                            foreach($kota_asal->result_array() AS $row_asal){
                                            ?>
                                            <option value="<?=$row_asal['id_kota'];?>">
                                                <?=$row_asal['nama'];?>
                                            </option>
                                            <?
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-4">
                                        <label>Kota Tujuan</label>
                                        <select class="form-control" name="kota_tujuan" id="kota_tujuan">
                                            <option selected disabled><?lang('choose');?></option>
                                            <?
                                            foreach($kota_tujuan->result_array() AS $row_tujuan){
                                            ?>
                                            <option value="<?=$row_tujuan['id_kota'];?>">
                                                <?=$row_tujuan['nama'];?>
                                            </option>
                                            <?
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </form>
                            <div id="resultContent"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="form-pesan"></div>