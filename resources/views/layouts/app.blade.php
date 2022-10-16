<!doctype html>
<html lang="en" class="h-100">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.104.2">
    <title>Предсказание</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/cover/">
    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>

        a{
            text-decoration: none;
            color: white;
        }

        .nav-scroller {
            position: relative;
            z-index: 2;
            height: 2.75rem;
            overflow-y: hidden;
        }

        .nav-scroller .nav {
            display: flex;
            flex-wrap: nowrap;
            padding-bottom: 1rem;
            margin-top: -1px;
            overflow-x: auto;
            text-align: center;
            white-space: nowrap;
            -webkit-overflow-scrolling: touch;
        }
    </style>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
<script type="text/javascript">

function AjaxRequest(id){
    ;
    jQuery.ajax({
        url: '/show',
        type: "GET",
        dataType: "html",
        data: {id},
        success: function (response) {
            document.getElementById('predict').innerText = response;
        }
    });
}
</script>
<!-- Custom styles for this template -->
<link href="../css/cover.css" rel="stylesheet">
</head>
<body class="d-flex h-100 text-center text-bg-dark">

<div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
<header class="mb-auto">
    <div>
        <h3 class="float-md-start mb-0">Предсказания</h3>
        <nav class="nav nav-masthead justify-content-center float-md-end">
            <a href="{{route('home')}}">В начало</a>
        </nav>
    </div>
</header>

@yield('content')

<footer class="mt-auto text-white-50">
    <p>template</p>
</footer>
</div>



</body>
</html>
