<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" type="text/css" href="/css/style.css?v=1">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;700&display=swap" rel="stylesheet">
  <title>@yield('title')</title>
</head>
<body>
 @include('layouts.header')
 <div class="body">
  @include('layouts.sidebar')
  <div class="main">
   <h1 class="page">@yield('page')</h1>
   <h1 class="filters-title">@yield('search-filters')</h1>
   <div class="forms">
    @yield('filters')

    @yield('addbtn')
  </div>
  @yield('table')
</div>
</div>
<script src="/javascript/script.js?v=1"></script>
</body>
</html>