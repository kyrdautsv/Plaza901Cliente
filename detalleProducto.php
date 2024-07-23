<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Detalles del Producto</title>
   <link rel="stylesheet" href="css/bootstrap.min.css">
   <link rel="stylesheet" href="css/style.css">

</head>

<body>
   <header>
      <?php
      include 'nav.php';
      ?>
   </header>
   <div class="container mt-5" style="padding-top: 10%;">
      <div class="row">
         <div class="col-md-6">
            <img id="productImage" src="images/glass1.png" class="img-fluid" alt="Product Image">
         </div>
         <div class="col-md-6">
            <h2 id="productName">Sunglasses</h2>
            <h3 id="productPrice">$50</h3>
            <p id="productDescription">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ac metus at lacus vestibulum consectetur.</p>
            <button id="addToCartBtn" class="btn btn-primary">Añadir al Carrito</button>
         </div>
      </div>
   </div>
   <footer>
      <div class="footer">
         <div class="container">
            <div class="row">
               <div class="col-md-8 offset-md-2">
                  <ul class="location_icon">
                     <li><a href="#"><i class="fa fa-map-marker" aria-hidden="true"></i></a><br> Location</li>
                     <li><a href="#"><i class="fa fa-phone" aria-hidden="true"></i></a><br> +01 1234567890</li>
                     <li><a href="#"><i class="fa fa-envelope" aria-hidden="true"></i></a><br> demo@gmail.com</li>
                  </ul>
               </div>
            </div>
         </div>
         <div class="copyright">
            <div class="container">
               <div class="row">
                  <div class="col-md-12">
                     <p>© 2019 All Rights Reserved. Design by<a href="https://html.design/"> Free Html Templates</a></p>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </footer>
   <script src="js/jquery.min.js"></script>
   <script src="js/popper.min.js"></script>
   <script src="js/bootstrap.bundle.min.js"></script>
   <script src="js/jquery-3.0.0.min.js"></script>
   <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
   <script src="js/custom.js"></script>
   <script>
      $(document).ready(function() {
         const urlParams = new URLSearchParams(window.location.search);
         const productId = urlParams.get('id');
         const products = {
            1: {
               name: "Sunglasses",
               price: value = 50,
               description: "Lorem ipsum dolor sit amet, consectetur adipiscing elit.",
               image: "images/glass1.png"
            },
            2: {
               name: "Sunglasses",
               price: value = 50,
               description: "Lorem ipsum dolor sit amet, consectetur adipiscing elit.",
               image: "images/glass2.png"
            },
            3: {
               name: "Sunglasses",
               price: value = 50,
               description: "Lorem ipsum dolor sit amet, consectetur adipiscing elit.",
               image: "images/glass3.png"
            },
            4: {
               name: "Sunglasses",
               price: value = 50,
               description: "Lorem ipsum dolor sit amet, consectetur adipiscing elit.",
               image: "images/glass4.png"
            },
            // Añade más productos según sea necesario
         };

         if (products[productId]) {
            $('#productName').text(products[productId].name);
            $('#productPrice').text(products[productId].price);
            $('#productDescription').text(products[productId].description);
            $('#productImage').attr('src', products[productId].image);
         }

         $('#addToCartBtn').click(function() {
            let cart = JSON.parse(localStorage.getItem('cart')) || [];
            cart.push(products[productId]);
            localStorage.setItem('cart', JSON.stringify(cart));
            alert('Producto añadido al carrito');
         });
      });
   </script>
</body>

</html>