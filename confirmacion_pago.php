<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Carrito de Compras</title>
   <link rel="stylesheet" href="css/bootstrap.min.css">
   <link rel="stylesheet" href="css/style.css">
   <style>
      .cart-item {
         margin: 15px;
         border: 4px solid #000000;
         border-radius: 10px;
         padding: 15px;
         background-color: #fff;
         box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      }

      .cart-item img {
         width: 100%;
         height: auto;
         border-radius: 10px;
      }

      .cart-item h4,
      .cart-item p {
         margin: 10px 0;
      }
      
      body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        h2 {
            text-align: center;
            color: #343a40;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        label {
            margin-bottom: 10px;
            color: #343a40;
        }
        input[type="text"], input[type="number"], input[type="email"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #dee2e6;
            border-radius: 5px;
        }
        .btn {
            background-color: #007bff;
            border: none;
            color: white;
            padding: 15px 30px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        .btn:hover {
            background-color: #0056b3;
        }
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            text-align: center;
        }
        h2 {
            color: #343a40;
        }
        p {
            color: #343a40;
        }
        .btn {
            background-color: #007bff;
            border: none;
            color: white;
            padding: 15px 30px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s ease;
            margin-top: 20px;
        }
        .btn:hover {
            background-color: #0056b3;
        }
   </style>
</head>

<body>
   <header>
      <?php
      include 'nav.php';
      ?>
   </header>

   <div class="container mt-5" >
      <div class="container">
         <div class="row">
            <!-- <div class="col-md-10 offset-md-1">
               <div class="titlepage">
                  <h2>Carrito de Compras</h2> 
               </div> -->
            </div>
         </div>
      </div>

      
    <div class="container">
        <h2>Pago Realizado</h2>
        <p>¡Gracias por tu compra! Tu pago ha sido procesado con éxito.</p>
        <button class="btn" onclick="window.location.href='carrito.php'">Volver al Carrito</button>
        <button class="btn" onclick="window.location.href='pdf/avance_pedido_comprovante.php'">Generar Tiket</button>
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
   <script>
      $(document).ready(function() {
         let cart = JSON.parse(localStorage.getItem('cart')) || [];
         let cartItemsContainer = $('#cartItems');
         let totalAmountContainer = $('#totalAmount');

         function updateTotalAmount() {
            let totalAmount = cart.reduce((total, item) => total + item.price * item.quantity, 0);
            totalAmountContainer.text(`Total a pagar: $${totalAmount.toFixed(2)}`);
         }

         function updateCartDisplay() {
            cartItemsContainer.empty();
            if (cart.length === 0) {
               cartItemsContainer.html('<p>El carrito está vacío</p>');
            } else {
               cart.forEach(function(item, index) {
                  cartItemsContainer.append(`
                     <div class="col-md-4">
                        <div class="cart-item" data-index="${index}">
                           <img src="${item.image}" alt="${item.name}">
                           <h4>${item.name}</h4>
                           <p>${item.description}</p>
                           <p>Precio: ${item.price}</p>
                           <p>Cantidad: <input type="number" min="1" class="quantity" data-index="${index}" value="${item.quantity}" step="1"></p>
                           <p>Total: $${(item.price * item.quantity).toFixed(2)}</p>
                           <button class="btn btn-danger btn-sm remove-item">Eliminar</button>
                        </div>
                     </div>
                  `);
               });
            }
            updateTotalAmount();
         }

         updateCartDisplay();

         $(document).on('click', '.remove-item', function() {
            let indexToRemove = $(this).closest('.cart-item').data('index');
            cart.splice(indexToRemove, 1);
            localStorage.setItem('cart', JSON.stringify(cart));
            updateCartDisplay();
         });

         $(document).on('change', '.quantity', function() {
            let index = $(this).data('index');
            let newQuantity = parseInt($(this).val());
            if (newQuantity < 1) {
               newQuantity = 1;
               $(this).val(newQuantity);
            }
            cart[index].quantity = newQuantity;
            localStorage.setItem('cart', JSON.stringify(cart));
            updateCartDisplay();
         });

   </script>
</body>

</html>



