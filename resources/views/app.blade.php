<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Fashpull - Admin Dashboard </title>
    <!-- General CSS Files -->
    <link rel="stylesheet" href="/assets/css/app.min.css">
    <link rel="stylesheet" href="/assets/bundles/jqvmap/dist/jqvmap.min.css">
    <link rel="stylesheet" href="/assets/bundles/weather-icon/css/weather-icons.min.css">
    <link rel="stylesheet" href="/assets/bundles/weather-icon/css/weather-icons-wind.min.css">
    <link rel="stylesheet" href="/assets/bundles/summernote/summernote-bs4.css">
    <!-- Template CSS -->
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="/assets/css/components.css">
    <!-- Custom style CSS -->
    <link rel="stylesheet" href="/assets/css/custom.css">
{{--    <link rel='shortcut icon' type='image/x-icon' href='assets/img/favicon.ico' />--}}
</head>

<body>
<div class="loader"></div>
<div id="app">
    <div class="main-wrapper main-wrapper-1">

        @yield('content')
    </div>
</div>

<!-- General JS Scripts -->
<script src="/assets/js/app.min.js"></script>
<!-- JS Libraies -->
<script src="/assets/bundles/echart/echarts.js"></script>
<script src="/assets/bundles/chartjs/chart.min.js"></script>
<!-- Page Specific JS File -->
<script src="/assets/js/page/index.js"></script>
<!-- Template JS File -->
<script src="/assets/js/scripts.js"></script>
<!-- Custom JS File -->
<script src="/assets/js/custom.js"></script>
</body>
</html>
