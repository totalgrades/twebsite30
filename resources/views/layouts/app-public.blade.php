<!DOCTYPE html>
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <title>Totalgrades | Home</title>
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <meta name="description" content="Nahorr Analytics - a software and data analytics company">
        <meta name="author" content="nahorr.com">

        @include('includes.google_analytics')

        <!-- Mobile Meta -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Favicon -->
        <link rel="shortcut icon" href="{{asset('favicon.png')}}">
        
        <!-- include summernote css/js -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">

        <!-- Web Fonts -->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,400,700,300&amp;subset=latin,latin-ext' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=PT+Serif' rel='stylesheet' type='text/css'>

        <!-- Bootstrap core CSS -->
        <link href="{{asset('idea/bootstrap/css/bootstrap.css')}}" rel="stylesheet">

        <!-- Font Awesome CSS -->
        <link href="{{asset('idea/fonts/font-awesome/css/font-awesome.css')}}" rel="stylesheet">

        <!-- Fontello CSS -->
        <link href="{{asset('idea/fonts/fontello/css/fontello.css')}}" rel="stylesheet">

        <!-- Plugins -->
        <link href="{{asset('idea/plugins/rs-plugin/css/settings.css')}}" media="screen" rel="stylesheet">
        <link href="{{asset('idea/plugins/rs-plugin/css/extralayers.css')}}" media="screen" rel="stylesheet">
        <link href="{{asset('idea/plugins/magnific-popup/magnific-popup.css')}}" rel="stylesheet">
        <link href="{{asset('idea/css/animations.css')}}" rel="stylesheet">
        <link href="{{asset('idea/plugins/owl-carousel/owl.carousel.css')}}" rel="stylesheet">

        <!-- iDea core CSS file -->
        <link href="{{asset('idea/css/style.css')}}" rel="stylesheet">

        <!-- Color Scheme (In order to change the color scheme, replace the red.css with the color scheme that you prefer)-->
        <link href="{{asset('idea/css/skins/blue.css')}}" rel="stylesheet">

        <!-- Custom css -->
        <link href="{{asset('idea/css/custom.css')}}" rel="stylesheet">

        <!-- for google reCaptcha -->
        <script src='https://www.google.com/recaptcha/api.js'></script>

        <!-- for fa-icons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

            
    </head>

    <!-- body classes: 
            "boxed": boxed layout mode e.g. <body class="boxed">
            "pattern-1 ... pattern-9": background patterns for boxed layout mode e.g. <body class="boxed pattern-1"> 
    -->
    <body class="front no-trans">
        <!-- scrollToTop -->
        <!-- ================ -->
        <div class="scrollToTop"><i class="icon-up-open-big"></i></div>

        <!-- page wrapper start -->
        <!-- ================ -->
        <div class="page-wrapper">

            

            @yield('content')

            
        </div>
        <!-- page-wrapper end -->

        <!-- JavaScript files placed at the end of the document so the pages load faster
        ================================================== -->
        <!-- Jquery and Bootstap core js files -->
        <script type="text/javascript" src="{{asset('idea/plugins/jquery.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('idea/bootstrap/js/bootstrap.min.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>

        <!-- Modernizr javascript -->
        <script type="text/javascript" src="{{asset('idea/plugins/modernizr.js')}}"></script>

        <!-- jQuery REVOLUTION Slider  -->
        <script type="text/javascript" src="{{asset('idea/plugins/rs-plugin/js/jquery.themepunch.tools.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('idea/plugins/rs-plugin/js/jquery.themepunch.revolution.min.js')}}"></script>

        <!-- Isotope javascript -->
        <script type="text/javascript" src="{{asset('idea/plugins/isotope/isotope.pkgd.min.js')}}"></script>

        <!-- Owl carousel javascript -->
        <script type="text/javascript" src="{{asset('idea/plugins/owl-carousel/owl.carousel.js')}}"></script>

        <!-- Magnific Popup javascript -->
        <script type="text/javascript" src="{{asset('idea/plugins/magnific-popup/jquery.magnific-popup.min.js')}}"></script>

        <!-- Appear javascript -->
        <script type="text/javascript" src="{{asset('idea/plugins/jquery.appear.js')}}"></script>

        <!-- Count To javascript -->
        <script type="text/javascript" src="{{asset('idea/plugins/jquery.countTo.js')}}"></script>

        <!-- Parallax javascript -->
        <script src="{{asset('idea/plugins/jquery.parallax-1.1.3.js')}}"></script>

        <!-- Contact form -->
        <script src="{{asset('idea/plugins/jquery.validate.js')}}"></script>

        <!-- Initialization of Plugins -->
        <script type="text/javascript" src="{{asset('idea/js/template.js')}}"></script>

        <!-- Custom Scripts -->
        <script type="text/javascript" src="{{asset('idea/js/custom.js')}}"></script>

        <script type="text/javascript">
        jQuery(document).ready(function(){

            $('.summernote').summernote({
                 height: 500,
                                                   
                 dialogsInBody: true,
                 
                 maximumImageFileSize: 500*1024, // 500 KB
                 callbacks:{ 
                   onImageUploadError: function(msg){ 
                     alert("Your Image is way too big. pls select an image less then 500kb.");
                   }}
               });
            });
        </script>

    </body>
</html>
