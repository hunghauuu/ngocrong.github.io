<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title><?php echo $setting['title']; ?></title>
    <link href="/assets/css/vendor.min.css" rel="stylesheet">
    <link href="/assets/css/app.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.6.1/tinymce.min.js"></script>
    <style>
    .cvh-check .form-check {
        display: inline-block;
        margin-right: 15px;
    }

    .cvh-check .form-check-input {
        display: none;
    }

    .cvh-check .form-check-label {
        cursor: pointer;
    }

    .cvh-img {
        width: auto;
        min-width: 80px;
        height: 35px;
        border-radius: 10%;
        border: 3px solid transparent;
        transition: border-color 0.3s ease;
    }

    .avatar-img {
        width: 50px;
        height: 50px;
        border-radius: 10%;
        border: 3px solid transparent;
        transition: border-color 0.3s ease;
    }

    .cvh-check .form-check-input:checked+.form-check-label .avatar-img {
        border-color: #007bff;
    }

    .cvh-check .form-check-input:checked+.form-check-label {
        opacity: 0.7;
    }
    </style>
</head>

<body>