<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description"
        content="Chameleon Admin is a modern Bootstrap 4 webapp &amp; admin dashboard html template with a large number of components, elegant design, clean and organized code.">
    <meta name="keywords"
        content="admin template, Chameleon admin template, dashboard template, gradient admin template, responsive admin template, webapp, eCommerce dashboard, analytic dashboard">
    <meta name="author" content="ThemeSelect">
    <title>Dashboard - Chameleon Admin - Modern Bootstrap 4 WebApp & Dashboard HTML Template + UI Kit</title>
    <link rel="apple-touch-icon" href="assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/ico/favicon.ico">
    <link
        href="https://fonts.googleapis.com/css?family=Muli:300,300i,400,400i,600,600i,700,700i%7CComfortaa:300,400,700"
        rel="stylesheet">
    <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="assets/css/vendors.css">
    <link rel="stylesheet" type="text/css" href="assets/vendors/css/charts/chartist.css">
    <!-- END VENDOR CSS-->
    <!-- BEGIN CHAMELEON  CSS-->
    <link rel="stylesheet" type="text/css" href="assets/css/app-lite.css">
    <!-- END CHAMELEON  CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="assets/css/core/colors/palette-gradient.css">

    <?php if ($type === 'dashboard') : ?>
    <link rel="stylesheet" type="text/css" href="assets/css/pages/dashboard-ecommerce.css">
    <?php endif; ?>
    <?php if ($type === 'all_question' || $type === 'individual') : ?>
    <link rel="stylesheet" href="assets/vendor/jquery-datatables-bs3/assets/css/datatables.css" />
    <?php endif; ?>
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    <style>
    .radio,
    .checkbox {
        position: relative;
        display: block;
        margin-top: 10px;
        margin-bottom: 10px;
    }

    .subName span {
        display: inline-block;
        text-decoration: underline;
    }

    .checkbox .click.green {
        color: #0f0;
    }

    .checkbox .click.green:before {
        color: #0f0;
        content: "\f00c";
        font-family: FontAwesome;
    }

    .checkbox .green {
        color: #00f;
    }

    .checkbox .green:before {
        color: #00f;
        content: "\f119";
        font-family: FontAwesome;
    }

    .checkbox .click {
        color: #f00;
    }

    .checkbox .click:before {
        color: #f00;
        content: "\f00d";
        font-family: FontAwesome;
    }

    .checkbox label {
        position: relative;
        font-size: 18px;
        line-height: 21px;
    }

    .radio label,
    .checkbox label {
        min-height: 20px;
        padding-left: 20px;
        margin-bottom: 0;
        font-weight: normal;
        cursor: pointer;
    }
    </style>
    <!-- END Custom CSS-->
</head>

<body class="vertical-layout vertical-menu 2-columns   menu-expanded fixed-navbar" data-open="click"
    data-menu="vertical-menu" data-color="<?= $type === 'dashboard' ? 'bg-chartbg' : 'bg-gradient-x-purple-blue' ?>"
    data-col="2-columns">