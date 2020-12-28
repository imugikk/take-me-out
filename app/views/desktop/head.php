<head>
    <meta charset="utf-8" />
    <title><?lang('app');?></title>
    <meta name="description" content="<?lang('app');?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="canonical" href="" />
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <!--end::Fonts-->
    <!--begin::Page Vendors Styles(used by this page)-->
    <link href="<?=assets_url();?>confirm/confirm.min.css" rel="stylesheet" type="text/css" />
    <!--end::Page Vendors Styles-->
    <!--begin::Global Theme Styles(used by all pages)-->
    <link href="<?=assets_url();?>plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
    <link href="<?=assets_url();?>plugins/custom/prismjs/prismjs.bundle.css" rel="stylesheet" type="text/css" />
    <link href="<?=assets_url();?>css/style.bundle.css" rel="stylesheet" type="text/css" />
    <!--end::Global Theme Styles-->
    <!--begin::Layout Themes(used by all pages)-->
    <link href="<?=assets_url();?>css/themes/layout/header/base/<?= my_config('key_value_6'); ?>.css" rel="stylesheet" type="text/css" />
    <link href="<?=assets_url();?>css/themes/layout/header/menu/<?= my_config('key_value_7'); ?>.css" rel="stylesheet" type="text/css" />
    <link href="<?=assets_url();?>css/themes/layout/brand/<?= my_config('key_value_8'); ?>.css" rel="stylesheet" type="text/css" />
    <link href="<?=assets_url();?>css/themes/layout/aside/<?= my_config('key_value_9'); ?>.css" rel="stylesheet" type="text/css" />
    <!--end::Layout Themes-->
    <link rel="shortcut icon" href="<?=assets_url();?><?= $this->module->config(array('id_config' => '5')); ?>" />
    <style>
        .transaction_font{
            font-family: 'Inconsolata', monospace;
            font-size:14px;
            font-weight: bold;
        }
        .font_global{
			font-family: 'Baloo 2',cursive;
		}
    </style>
</head>