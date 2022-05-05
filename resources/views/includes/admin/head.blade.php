<head>
    <meta charset="utf-8">
    <title>Dashboard</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/d79b975262.js" crossorigin="anonymous"></script>

    <!-- Libraries Stylesheet -->
    <link href="{{ url('backend/dashboard/lib/owlcarousel/assets/owl.carousel.min.css') }} "rel="stylesheet">
    <link href="{{ url("backend/dashboard/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css") }}" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ url("backend/dashboard/css/bootstrap.min.css") }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ url("backend/dashboard/css/style.css") }}" rel="stylesheet">
    <link href="{{ url("backend/dashboard/css/admin.css") }}" rel="stylesheet">

    @livewireStyles

    @stack('style-after')
    
</head>