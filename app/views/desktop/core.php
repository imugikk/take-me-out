<!DOCTYPE html>
<html lang="en">
	<!--begin::Head-->
	<?= $this->load->view('desktop/head');?>
	<script type="text/javascript">
        let site_url = "<?= site_url() . get_language();?>/";
        let language = "<?= get_language();?>";
    </script>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="page-loading-enabled page-loading header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed footer-fixed page-loading">
		<!--begin::Main-->
		<!--begin::Header Mobile-->
		<?= $this->load->view('desktop/header_mobile');?>
		<!--end::Header Mobile-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Page-->
			<div class="d-flex flex-row flex-column-fluid page">
				<!--begin::Aside-->
				<?= $this->load->view('desktop/aside');?>
				<!--end::Aside-->
				<!--begin::Wrapper-->
				<div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
					<!--begin::Header-->
					<?= $this->load->view('desktop/header');?>
					<!--end::Header-->
					<!--begin::Content-->
					<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
						<div id="core_content">
							<div class="container">
								<div class="card p-20 m-0">
									<h1>Welcome to <span style="color: #05BDF8; font-weight: bold;">Take Me Out</span> </h1>
									<p>Find your love with our app :)</p>
								</div>
							</div>
						</div>
					</div>
					<!--end::Content-->
					<!--begin::Footer-->
					<?= $this->load->view('desktop/footer');?>
					<!--end::Footer-->
				</div>
				<!--end::Wrapper-->
			</div>
			<!--end::Page-->
		</div>
		<!--end::Main-->
		<!-- begin::User Panel-->
		<?= $this->load->view('desktop/user_panel');?>
		<!-- end::User Panel-->
		<!--begin::Quick Cart-->
		
		<!--end::Quick Cart-->
		<!--begin::Quick Panel-->
		
		<!--end::Quick Panel-->
		<!--begin::Chat Panel-->
		
		<!--end::Chat Panel-->
		<!--begin::Scrolltop-->
		<div id="kt_scrolltop" class="scrolltop">
			<span class="svg-icon">
				<!--begin::Svg Icon | path:<?=assets_url();?>media/svg/icons/Navigation/Up-2.svg-->
				<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
					<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
						<polygon points="0 0 24 0 24 24 0 24" />
						<rect fill="#000000" opacity="0.3" x="11" y="10" width="2" height="10" rx="1" />
						<path d="M6.70710678,12.7071068 C6.31658249,13.0976311 5.68341751,13.0976311 5.29289322,12.7071068 C4.90236893,12.3165825 4.90236893,11.6834175 5.29289322,11.2928932 L11.2928932,5.29289322 C11.6714722,4.91431428 12.2810586,4.90106866 12.6757246,5.26284586 L18.6757246,10.7628459 C19.0828436,11.1360383 19.1103465,11.7686056 18.7371541,12.1757246 C18.3639617,12.5828436 17.7313944,12.6103465 17.3242754,12.2371541 L12.0300757,7.38413782 L6.70710678,12.7071068 Z" fill="#000000" fill-rule="nonzero" />
					</g>
				</svg>
				<!--end::Svg Icon-->
			</span>
		</div>
		<!--end::Scrolltop-->
		<!--begin::Sticky Toolbar-->
		
		<!--end::Sticky Toolbar-->
		<!--begin::Demo Panel-->
		
		<!--end::Demo Panel-->
		<?= $this->load->view('desktop/script');?>
	</body>
	<!--end::Body-->
</html>