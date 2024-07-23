<!DOCTYPE html>
<html lang="en">
<head>
   <!-- basic -->
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <!-- mobile metas -->
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="viewport" content="initial-scale=1, maximum-scale=1">
   <!-- site metas -->
   <title>sungla</title>
   <meta name="keywords" content="">
   <meta name="description" content="">
   <meta name="author" content="">
   <!-- bootstrap css -->
   <link rel="stylesheet" href="css/bootstrap.min.css">
   <!-- style css -->
   <link rel="stylesheet" href="css/style.css">
   <!-- Responsive-->
   <link rel="stylesheet" href="css/responsive.css">
   <!-- fevicon -->
   <link rel="icon" href="images/fevicon.png" type="image/gif" />
   <!-- Scrollbar Custom CSS -->
   <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
   <!-- Tweaks for older IEs-->
   <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
   <!--[if lt IE 9]>
   <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
   <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
   <style>
      body {
         background-color:; /* Color de fondo */
         background-image: url('https://wallpapercrafter.com/desktop/81442-city-artist-artwork-digital-art-hd-minimalism-minimalist.jpg'); /* Puedes añadir una imagen de fondo si lo deseas */
         background-size: cover;
         background-position: center;
         background-attachment: fixed;
         margin: 0; /* Elimina el margen predeterminado del body */
         padding: 0; /* Elimina el padding predeterminado del body */
      }
      .container {
         padding: 20px;
         color: #333;
      }
      .card {
         margin-bottom: 20px;
      }
   </style>
</head>
<!-- body -->
<body class="main-layout position_head">
   <!-- loader  -->
   <div class="loader_bg">
      <div class="loader"><img src="images/loading.gif" alt="#" /></div>
   </div>
   <!-- end loader -->
   <!-- header -->
   <header>
      <?php include 'nav.php'; ?>
   </header>
   <!-- end header -->

   <!-- Content Section -->
   <div class="container">
      <h2 class="my-4">Lista de Usuarios</h2>

      <div class="row">
         <!-- Usuario 1 -->
         <div class="col-lg-4 col-md-6">
            <div class="card">
               <div class="card-header bg-primary text-white">
                  <h5 class="mb-0">Juan Pérez</h5>
               </div>
               <div class="card-body">
                  <p class="card-text"><i class="fas fa-user"></i> Apellido: Pérez</p>
                  <p class="card-text"><i class="fas fa-star"></i> Rating: 4.5</p>
               </div>
            </div>
         </div>

         <!-- Usuario 2 -->
         <div class="col-lg-4 col-md-6">
            <div class="card">
               <div class="card-header bg-success text-white">
                  <h5 class="mb-0">María López</h5>
               </div>
               <div class="card-body">
                  <p class="card-text"><i class="fas fa-user"></i> Apellido: López</p>
                  <p class="card-text"><i class="fas fa-star"></i> Rating: 5.0</p>
               </div>
            </div>
         </div>

         <!-- Usuario 3 -->
         <div class="col-lg-4 col-md-6">
            <div class="card">
               <div class="card-header bg-warning text-white">
                  <h5 class="mb-0">Pedro García</h5>
               </div>
               <div class="card-body">
                  <p class="card-text"><i class="fas fa-user"></i> Apellido: García</p>
                  <p class="card-text"><i class="fas fa-star"></i> Rating: 3.8</p>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- End Content Section -->

   <!-- Javascript files-->
   <script src="js/jquery.min.js"></script>
   <script src="js/popper.min.js"></script>
   <script src="js/bootstrap.bundle.min.js"></script>
   <script src="js/jquery-3.0.0.min.js"></script>
   <!-- sidebar -->
   <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
   <script src="js/custom.js"></script>
</body>
</html>
