<!DOCTYPE html>
<html lang="en">

<head>

    <!-- meta data -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= str_replace('-', ' ',$title) ?></title>

    <!-- icon set -->
    <!-- <link rel="shortcut icon" href="<?= base_url() ?>assets/img/fav.ico" /> -->

    <!-- Custom fonts for this template-->
    <script src="https://kit.fontawesome.com/0aa1f9181b.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css"
        integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg=="
        crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
        integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA=="
        crossorigin="anonymous" />
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
        integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
        crossorigin="" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css"
        integrity="sha512-mSYUmp1HYZDFaVKK//63EcZq4iFWFjxSL+Z3T/aCt4IO9Cejm03q3NKKYN6pFQzY0SBOr8h+eCIAZHPXcpZaNw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Custom styles for this template-->
    <link href="<?= base_url() ?>/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="<?= base_url() ?>/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <!-- <link href="<?= base_url() ?>/js/trumbowyg/dist/ui/trumbowyg.min.css" rel="stylesheet">

    <script src="<?= base_url() ?>/vendor/jquery/jquery.min.js"></script> -->
    <style>
    #upload {
        opacity: 0;
    }

    #upload-label {
        position: absolute;
        top: 50%;
        left: 1rem;
        transform: translateY(-50%);
    }

    .image-area {
        border: 2px dashed rgba(255, 255, 255, 0.7);
        padding: 1rem;
        position: relative;
    }

    .image-area::before {
        content: 'Uploaded image result';
        color: #fff;
        font-weight: bold;
        text-transform: uppercase;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        font-size: 0.8rem;
        z-index: 1;
    }

    .image-area img {
        z-index: 2;
        position: relative;
    }


    .lds-dual-ring {
        position: relative;
        top: 50%;
        left: 45%;
        display: block;
        width: 80px;
        height: 80px;
    }

    .lds-dual-ring:after {
        content: " ";
        display: block;
        width: 64px;
        height: 64px;
        margin: 8px;
        border-radius: 50%;
        border: 6px solid #365DCD;
        border-color: #365DCD transparent #365DCD transparent;
        animation: lds-dual-ring 1.2s linear infinite;
    }

    @keyframes lds-dual-ring {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }

    #message {
        position: absolute;
        top: 0;
        right: 0;
        width: 30%;
        z-index: 999;
        margin-top: 10px;
    }

    /* #mess {
        position: relative;
        top: 0;
        right: 0;
        /* width: 30%;
        z-index: 999;
        margin-top:10px; */
    }

    */ .alert {
        position: fixed;
    }

    #inner-message {
        margin: 0 auto;
    }

    .modal {
        padding: 0 !important; // override inline padding-right added from js
    }

    .modal .modal-dialog {
        width: 60%;
        max-width: none;
    }

    .modal .modal-content {
        border: 0;
        border-radius: 0;
    }

    .modal .modal-body {
        overflow-y: auto;
    }

    label {
        margin-left: 5px;
    }

    .card-input-element+.card {
        color: var(--primary);
        -webkit-box-shadow: none;
        box-shadow: none;
        border: solid 5px #ffffff;
        border-radius: 50%;
        background-color: #394867;
    }

    .card-input-element+.card:hover {
        cursor: pointer;
    }

    .card-input-element:checked+.card {
        border: 5px solid var(--primary);
        -webkit-transition: border .3s;
        -o-transition: border .3s;
        transition: border .3s;
    }

    .black {
        background-color: #343A40 !important;
    }

    .purple {
        background-color: #7952B3 !important;
    }

    .yellow {
        background-color: #FFC107 !important;
    }

    .red {
        background-color: #FF2442 !important;
    }

    .pin2 {
        position: absolute;
        top: 40%;
        left: 50%;
        /* margin-left: 115px; */

        border-radius: 50%;
        border: 8px solid #000;
        width: 8px;
        height: 8px;
    }

    .pin2::after {
        position: absolute;
        content: '';
        width: 0px;
        height: 0px;
        bottom: -30px;
        left: -6px;
        border: 10px solid transparent;
        border-top: 17px solid #fff;
    }

    .btn-light:hover {
        background-color: #f8f9fc !important;
    }
    </style>
</head>