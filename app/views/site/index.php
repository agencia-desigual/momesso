<!doctype html>
<head>
    <!-- Requisitos meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- SEO Meta -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="<?= $seo['description'] ?>" />
    <meta name="keywords" content="<?= $seo['keywords'] ?>" />
    <meta name="distribution" content="global" />
    <meta name="revisit-after" content="10 Days" />
    <meta name="robots" content="ALL" />
    <meta name="language" content="pt-br" />
    <meta name="theme-color" content="#f47920">
    <meta name="apple-mobile-web-app-status-bar-style" content="#f47920">
    <meta name="msapplication-navbutton-color" content="#f47920">

    <!-- SEO Facebook -->
    <meta property="og:locale" content="pt_BR">
    <meta property="og:url" content="<?= $seoFacebook['url'] ?>">
    <meta property="og:title" content="<?= $seoFacebook['title'] ?>">
    <meta property="og:site_name" content="<?= $seoFacebook['site_name'] ?>">
    <meta property="og:description" content="<?= $seoFacebook['description'] ?>">
    <meta property="og:image" content="<?= $seoFacebook['image'] ?>">
    <meta property="og:image:type" content="<?= $seoFacebook['image_type'] ?>">
    <meta property="og:image:width" content="800">
    <meta property="og:image:height" content="600">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>
<body>

<?php
    echo "<pre>";
    print_r($teste);
    echo "</pre>";
?>

<h1>Hello, world!</h1>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>