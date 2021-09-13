<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Albatroz Admin Panel</title>

        
        <!-- Bootstrap Core CSS -->
        <link href="/css-admin/bootstrap.min.css" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="/css-admin/metisMenu.min.css" rel="stylesheet">
           
        <!-- Timeline CSS -->
    <link href="/css-admin/timeline.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="/css-admin/startmin.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="/css-admin/font-awesome.min.css" rel="stylesheet" type="text/css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

      
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
        
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<link rel="stylesheet" type="text/css" 
 href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    </head>
    <body>
     

        @include('admin.inc.header')
          
        
        @yield('content')

         <!-- jQuery -->
         <script src="/js-admin/jquery.min.js"></script>

         <!-- Bootstrap Core JavaScript -->
         <script src="/js-admin/bootstrap.min.js"></script>
 
         <!-- Metis Menu Plugin JavaScript -->
         <script src="/js-admin/metisMenu.min.js"></script>
 
         <!-- Custom Theme JavaScript -->
         <script src="/js-admin/startmin.js"></script>
 
     </body>
 </html>
 