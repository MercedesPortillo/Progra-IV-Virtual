<?php
if (isset($_POST["producto"])){
    $cantidad=$_POST['cantidad'];
    $producto=$_POST['producto'];
    $precio=$_POST['precio'];
    $SubTotal=$precio*$cantidad;
    $CESC=$SubTotal*0.05;
    $IVA=$SubTotal*0.13;
  $Total=$SubTotal+$CESC+$IVA;
  
  echo '
  <!-- partial:index.partial.html -->
<!-- Nav -->
<nav class="navbar navbar-inverse bg-inverse fixed-top bg-faded">
    <div class="row">
        <div class="col">
          <button type="button" class="btn btn-primary" data-toggle="modal" 
data-target="#cart">Mi Carrito </button></div>
    </div>
</nav>
';
}

?>
<!-- Main -->
<div class="container">
    <div class="row">

      <div class="col">
        <div class="card" style="width: 20rem;">
  <img class="card-img-top" src="https://all-free-download.com/free-photos/download/apple_computer_computer_keyboard_computer_technology_597860.jpg" alt="Card image cap">
  <div class="card-block">

    <form method="POST">
   <h4 class="card-title">Camara Profesional</h4>
   <p class="card-text">Precio: $900</p>
   <input type="number" name="cantidad" value="1">
   <input type="hidden" name="producto" value="Apple Computer">
  <input type="hidden" name="precio" value="900">
    <button type="submit" value>Add to cart</button>
</form>

</div>
</div>
      </div>
      <?php
if (isset($_POST['producto'])){
  


  echo '
 <!-- Modal -->
<div class="modal fade" id="cart" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cart</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <table class="table table-dark">
  <thead>
  <th>Producto</th>
    <th>Cantidad</th>
    <th>Precio</th>
    <th>Total</th>
  </thead>
  <tbody>
    <tr class="table-active">
    <td>'.$producto.'</td>
    <td>'.$cantidad.'</td>
    <td>'.$precio.'</td>
    <td>'.$SubTotal.'</td>
    </tr>
  

  </tbody>
</table>
<div>CESC: $'.$CESC.' <span class="total-cart"></span></div>
<div>IVA: $'.$IVA.' <span class="total-cart"></span></div>        
<div>Total a Pagar: $'.$Total.' <span class="total-cart"></span></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Order now</button>
      </div>s
    </div>
  </div>
</div>';
}
?>

<!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>

</body>
</html>



