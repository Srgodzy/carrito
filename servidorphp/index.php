<?php
include 'GLOBAL/config.php';
include 'GLOBAL/conexion.php';
include 'GLOBAL/carrito.php';
include 'TEMPLATE/header.php';
?>
    <br>
    <?php if($mensaje!=""){?>

        <div class="alert alert-danger" role="alert">
      
        
        <?php echo $mensaje ;?>
        <hr>
        
        <a href="Mcarrito.php" class = "badge badge-danger">Carriro</a>
        </div>
    <?php }?>
    
    <div class="row">

    <?php 
   
        $sentencia = $pdo->prepare("SELECT * FROM tdlpoductos");
        $sentencia->execute();
        $resultado = $sentencia->fetchAll();
        //print_r($resultado);
    ?>
    <?php
        foreach($resultado as $producto){ ?>
            <div class = "col-3">
                <div class="card">
                    <img 
                    title= "<?php echo $producto['Nombre'];?>" 
                    alt="<?php echo $producto['Nombre'];?>"  
                    class="card-img-top" 
                    src="<?php echo $producto['Imagen'];?>"
                    data-toggle="popover"
                    data-trigger ="hover"
                    data-content="<?php echo $producto['Descripcion'];?>"
                    height="317px"
                    >
                    <div class="card-body">
                        <span><?php echo $producto['Nombre'];?></span>
                        <h5 class="card-title"><?php echo $producto['Precio'];?>€</h5>
                        <p class="card-text"><?php echo $producto['Descripcion'];?></p>

                        <form action="" method="POST">

                            <input type="hidden" name="id" id="id" value ="<?php echo openssl_encrypt($producto['ID'],COD,KEY);?>">
                            <input type="hidden" name="nombre" id="nombre" value ="<?php echo openssl_encrypt($producto['Nombre'],COD,KEY);?>">
                            <input type="hidden" name="precio" id="precio" value ="<?php echo openssl_encrypt($producto['Precio'],COD,KEY);?>">
                            <input type="hidden" name="cantidad" id="cantidad" value ="<?php echo openssl_encrypt(1,COD,KEY);?>">

                                <button 
                                    class="btn btn-primary" 
                                    name = "btnAccion" 
                                    value = "Agregar" 
                                    type="submit">
                                    Agregar al carito 
                                </button>

                        </form>

                       
                    </div>
                </div>
            </div>

      <?php  }
    ?>     
    
    <?php
    include 'TEMPLATE/footer.php';
    ?>
