$("img").prop("draggable", false);
let spinner = 'spinner spinner-right spinner-white pr-15';
function load_content(url) {
	show_progress();
	$.post(site_url + url, {}, function (result) {
		$('#core_content').html(result);
		$('#content_now').val(url);
		hide_progress();
	}, "html");
}
function obj_toogle(obj){
	$(obj).toggle();
}
function show_progress() {
	if(language == "en"){
		message = "Please Wait";
	}else{
		message = "Harap Tunggu";
	}
	KTApp.blockPage({
		overlayColor: '#000000',
		type: 'v2',
		state: 'primary',
		message: message
	});
}
function hide_progress() {
	KTApp.unblockPage();
}
function text_only(obj) {
	$('#' + obj).bind('keypress', function (event) {
		var regex = new RegExp("^[A-Z a-z]+$");
		var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
		if (!regex.test(key)) {
			event.preventDefault();
			return false;
		}
	});
}
function username(obj) {
	$('#' + obj).bind('keypress', function (event) {
		var regex = new RegExp("^[A-Za-z]+$");
		var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
		if (!regex.test(key)) {
			event.preventDefault();
			return false;
		}
	});
}
function number_only(obj) {
	$('#' + obj).bind('keypress', function (event) {
		var regex = new RegExp("^[0-9]+$");
		var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
		if (!regex.test(key)) {
			event.preventDefault();
			return false;
		}
	});
}
function format_email(obj) {
	$('#' + obj).bind('keyup', function (event) {
		var regex = new RegExp("^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$");
		var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
		var iddataerror = $(this).data("id-error");
		var classdataerror = $(this).data("class-error");
		if (!regex.test(key)) {
			$("." + classdataerror).html("Email Invalid");
			$("#" + iddataerror).html("Email Invalid");
		} else {
			$("." + classdataerror).html("");
			$("#" + iddataerror).html("");
		}
	});
}
function success_message(msg) {
	toastr.options = {
		"closeButton": true,
		// "debug": true,
		"newestOnTop": true,
		"progressBar": true,
		"positionClass": "toast-top-right",
		"preventDuplicates": true,
		"onclick": null,
		"showDuration": "300",
		"hideDuration": "1000",
		"timeOut": "2000",
		"extendedTimeOut": "1000",
		"showEasing": "swing",
		"hideEasing": "linear",
		"showMethod": "fadeIn",
		"hideMethod": "fadeOut"
	};
	toastr.success(msg);
}
function error_message(msg) {
	toastr.options = {
		"closeButton": true,
		// "debug": true,
		"newestOnTop": true,
		"progressBar": true,
		"positionClass": "toast-top-right",
		"preventDuplicates": true,
		"onclick": null,
		"showDuration": "300",
		"hideDuration": "1000",
		"timeOut": "2000",
		"extendedTimeOut": "1000",
		"showEasing": "swing",
		"hideEasing": "linear",
		"showMethod": "fadeIn",
		"hideMethod": "fadeOut"
	};
	toastr.warning(msg);
}
function thousand(nStr) {
	nStr += '';
	x = nStr.split('.');
	x1 = x[0];
	x2 = x.length > 1 ? '.' + x[1] : '';
	var rgx = /(\d+)(\d{3})/;
	while (rgx.test(x1)) {
		x1 = x1.replace(rgx, '$1' + ',' + '$2');
	}
	return x1 + x2;
}
function date(obj) {
	$('#' + obj).datepicker({
		todayHighlight: true,
		autoclose: true,
		format: 'dd-mm-yyyy',
		todayBtn: "linked",
		clearBtn: true,
		startDate: '0',
		endDate: '0'
	});
}
function year(obj) {
	var d = new Date();
	var n = d.getFullYear();
	$('#' + obj).datepicker({
		todayHighlight: true,
		autoclose: true,
		format: 'yyyy',
		viewMode: "years",
		minViewMode: "years",
		todayBtn: "linked",
		clearBtn: true,
		endDate: 'n'
	});
}
function date_start(obj) {
	$('#' + obj).datepicker({
		todayHighlight: true,
		autoclose: true,
		format: 'dd-mm-yyyy',
		todayBtn: "linked",
		clearBtn: true,
		startDate: '0'
	});
}
function date_end(obj) {
	$('#' + obj).datepicker({
		todayHighlight: true,
		autoclose: true,
		format: 'dd-mm-yyyy',
		todayBtn: "linked",
		clearBtn: true,
		endDate: '0'
	});
}
function summernote(obj) {
	$('#' + obj).summernote();
	// $('#' + obj).summernote("insertImage", data, 'filename');
}
function auto_size(obj) {
	var obj = $('#' + obj);
	autosize(obj);
	autosize.update(obj);
}
function select2(obj) {
	$('#' + obj).select2({
		width: '100%',
		// theme: "classic",
		placeholder: 'Choose ' + obj,
		language: {
			noResults: function () {
				return 'No Data';
			},
		}
		// escapeMarkup: function(markup) {
		//     return markup;
		// }
	});
}
function select2_multiple(obj) {
	$('#' + obj).select2({
		width: '100%',
		tags: true,
		tokenSeparators: [',', ' '],
		placeholder: 'Choose ' + obj,
		language: {
			noResults: function () {
				return 'No Data';
			},
		}
	});
}
function select_picker(obj) {
	$('#' + obj).selectpicker();
}
function ribuan(obj) {
	$('#' + obj).keyup(function (event) {
		if (event.which >= 37 && event.which <= 40) return;
		// format number
		$(this).val(function (index, value) {
			return value
				.replace(/\D/g, "")
				.replace(/\B(?=(\d{3})+(?!\d))/g, ",");
		});
		var id = $(this).data("id-selector");
		var classs = $(this).data("class-selector");
		var value = $(this).val();
		var noCommas = value.replace(/,/g, "");
		$('#' + id).val(noCommas);
		$('.' + classs).val(noCommas);
	});
}
function dots(obj) {
	$('#' + obj).keyup(function (event) {
		if (event.which >= 37 && event.which <= 40) return;
		// format number
		$(this).val(function (index, value) {
			return value
				.replace(/\D/g, "")
				.replace(/\B(?=(\d{3})+(?!\d))/g, ".");
		});
		var id = $(this).data("id-selector");
		var classs = $(this).data("class-selector");
		var value = $(this).val();
		var noCommas = value.replace(/,/g, "");
		$('#' + id).val(noCommas);
		$('.' + classs).val(noCommas);
	});
}
function image_uploader(obj) {
	let avatar = new KTImageInput(obj);
}
function print_div(div_name) {
	let print_content = document.getElementById(div_name).innerHTML;
	let original_content = document.body.innerHTML;

	document.body.innerHTML = print_content;

	window.print();

	document.body.innerHTML = original_content;
}