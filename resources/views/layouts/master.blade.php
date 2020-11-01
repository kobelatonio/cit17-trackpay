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
<body onload="updateValues()">
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
<script src="/javascript/script.js?v=1" ></script>
<script>
  // Most browsers block popups for printing documents if they are 
  // called outside of user-triggered event handlers like onclick
  // so I had to put the following JS codes directly here
  var months = ["Jan", "Feb", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
  var myApp = new function () {
    this.printTable = function () {
      var payroll = document.getElementById('payroll');
      clone = payroll.cloneNode(true);
      var row = clone.rows; 
      for (var i = 0; i < row[0].cells.length; i++) { 
        var str = row[0].cells[i].innerHTML; 
        if (str.search("Payslip") != -1) {  
          for (var j = 0; j < row.length - 1; j++) { 
            row[j].deleteCell(i); 
          } 
        } 
      } 
      var style = "<style> table {width: 100%; font: 12px Helvetica;} table, th, td {border: solid 1px #DDD; border-collapse: collapse; padding: 2px 3px; text-align: center;} h1 {font: 20px Helvetica; text-align: center;}</style>";
      var date = document.getElementById("month").value;
      var list = date.split("-");
      var header = "<h1>Payroll Report for the Month of " + months[list[1]-1] + ", Year " + list[0] + "</h1>";
      var win = window.open('', '', "width=" + screen.availWidth + ",height=" + screen.availHeight);
      win.document.write(style + header + clone.outerHTML);
      win.document.close();
      win.print();
    }
  }
</script>
</body>
</html>