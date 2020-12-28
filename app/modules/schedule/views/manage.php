<script type="text/javascript">
	$(function() {
		page_Pesanan(1);
	});
    function MainContent(cont) {
		$('#form-main').hide();
		$('#form-input').hide();
		//
		$('#' + cont).show();
	}
	function show_filter() {
		var tp = $('#effect').val();
        var language = "<?=get_language();?>";
        var toggle_filter = document.getElementById("toggle_filter");
        if(tp==1){
            if(language == "id"){
                $("#button_show_filter").text("Sembunyikan Filter");
            }
            else if(language == "en"){
                $("#button_show_filter").text("Hide Filter");
            }
            toggle_filter.style.display = "block";
            $('#effect').val(2);
        }else{
            if(language == "id"){
                $("#button_show_filter").text("Tampilkan Filter");
            }
            else if(language == "en"){
                $("#button_show_filter").text("Show Filter");
            }
            toggle_filter.style.display = "none";
            $('#effect').val(1);
        }

	}

	function page_Pesanan(pg) {
                show_progress();
                $.post(site_url + 'schedule/manage/page/' + pg, $('#filter_content').serialize(), function(result) {
                    $('#resultContent').html(result);
                    hide_progress();
                }, "html");
	}

	function input(id) {
        showProgres();
		$.post(site_url + 'schedule/manage/input/' + id, {}, function(result) {
			$('#form-input').html(result);
			MainContent('form-input');
			hideProgres();
		}, "html");
	}
    
    function delete_data(id){
        var language = "<?=get_language();?>";
        var title, content, tombolok, tombolcancel
        if(language == "id"){
            title = 'Konfirmasi hapus data';
            content = 'Apakah anda yakin ingin menghapus data ini ?';
        }else if(language == "en"){
            title = 'Confirm delete data';
            content = 'Are you sure you want to delete this data?';
        }
		$.confirm({
			animationSpeed: 1000,
			animation: 'zoom',
			closeAnimation: 'scale',
			animateFromElement: false,
			columnClass: 'medium',
			title: title,
			content: content,
			icon: 'fa fa-question',
			theme: 'material',
			closeIcon: true,
			type: 'orange',
			autoClose: 'No|5000',
			buttons: {
				Yes: {
					btnClass: 'btn-red any-other-class',
					action: function(){
						$.ajax({
							type:"POST",
							url:site_url+'schedule/manage/delete',
							data:{id:id},
                            dataType: "json",
							success:function(result){
								success_message(result.message);
                                page_Pesanan(1);
							},
						});
					}
				},
				No: {
					btnClass: 'btn-blue', // multiple classes.
					// ...
				}
			}
		});
	}
</script>
<div id="form-main">
    <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <div class="d-flex align-items-center flex-wrap mr-2">
                <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5"><?=$header;?></h5>
                <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div>
                <span class="text-muted font-weight-bold mr-4"><?=$sub_header;?></span>
                <!-- <a href="javascript:void(0);" onclick="input();" class="btn btn-light-warning font-weight-bolder btn-sm">=$tombol_tambah;?></a> -->
            </div>
            <div class="d-flex align-items-center">
                <a id="button_show_filter" onclick="show_filter();" href="javascript:void(0);" class="btn btn-clean btn-sm font-weight-bold font-size-base mr-1">
                    <?=$tombol_show;?>
                </a>
            </div>
        </div>
    </div>
    <div class="d-flex flex-column-fluid">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card card-custom gutter-b" id="toggle_filter" style="display:none;">
                        <div class="card-header">
                            <div class="card-title">
                                <h3 class="card-label">Form Pencarian Data</h3>
                            </div>
                        </div>
                        <form class="form" id="filter_content">
                            <div class="card-body">
                                <div hidden>
                                    <input name="t_effect" id="effect" value="1">
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        <label>Filter Pencarian:</label>
                                        <input type="text" name="f_search" onkeydown="if (event.keyCode == 13) page_Pesanan(1);" class="form-control" placeholder="Cari Data..."/>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-lg-6"></div>
                                    <div class="col-lg-6 text-right">
                                        <button type="button" onclick="page_Pesanan(1)" class="btn btn-danger">
                                            <?=$label_filter;?>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card card-custom gutter-b">
                        <div class="card-body">
                            <div id="resultContent"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="form-input"></div>