<?php
    session_start();
    //variables de sesion 


    $mensaje = "";
    //var_dump($_POST); / valores que le pasa el array
    //die();

    if(isset($_POST['btnAccion'])){

        switch($_POST['btnAccion']){

                case 'Agregar':
                    if(is_numeric(openssl_decrypt($_POST['id'],COD,KEY))){
                    $ID = openssl_decrypt($_POST['id'],COD,KEY);
                    $mensaje = "OK ID Corecto &nbsp;".$ID."<br/>";

                    }else{
                    $mensaje ="Upss.. ID incorecto &nbsp;".$ID."<br/>";
                        }
                    if(is_string(openssl_decrypt($_POST['nombre'],COD,KEY))){
                            $NOMBRE = openssl_decrypt($_POST['nombre'],COD,KEY);
                            $mensaje .= "OK Nombre Corecto &nbsp;".$NOMBRE."<br/>";
                        }else{
                            $mensaje .= "Nombre Incorrecto &nbsp;".$NOMBRE."<br/>"; 
                        }
                    if(is_string(openssl_decrypt($_POST['cantidad'],COD,KEY))){
                            $CANTIDAD = openssl_decrypt($_POST['cantidad'],COD,KEY);
                            $mensaje .= "OK Cantidad Corecto &nbsp;".$CANTIDAD."<br/>";
                        }else{
                            $mensaje .= "Cantidad Incorrecto &nbsp;".$CANTIDAD."<br/>"; 
                        }
                    if(is_string(openssl_decrypt($_POST['precio'],COD,KEY))){
                        $PRECIO = openssl_decrypt($_POST['precio'],COD,KEY);
                        $mensaje .= "OK Precio Corecto &nbsp;".$PRECIO."€<br/>";
                    }else{
                        $mensaje .= "Precio Incorrecto &nbsp;".$PRECIO."€<br/>"; }


                    if(!isset($_SESSION['CARRITO'])){
                        $producto = array(
                            'ID'=>$ID,
                            'NOMBRE'=>$NOMBRE,
                            'CANTIDAD'=>$CANTIDAD,
                            'PRECIO'=>$PRECIO
                        );
                        $_SESSION['CARRITO'][0] = $producto;
                        $mensaje="Producto agregado al carrito";
                    }else{

                        
                        $NumeroProductos = count($_SESSION['CARRITO']);
                        //contabiliza el carrito de compras
                        $producto = array(
                            'ID'=>$ID,
                            'NOMBRE'=>$NOMBRE,
                            'CANTIDAD'=>$CANTIDAD,
                            'PRECIO'=>$PRECIO
                        );
                        $_SESSION['CARRITO'][$NumeroProductos]=$producto;
                        $mensaje="Producto agregado al carrito";
                    }
                    //$mensaje = print_r($_SESSION,true);
                    
                break;

                case "Eliminar":
                if(is_numeric(openssl_decrypt($_POST['id'],COD,KEY))){
                        $ID = openssl_decrypt($_POST['id'],COD,KEY);

                        foreach($_SESSION['CARRITO'] as $indice=>$producto){
                                if($producto['ID']==$ID){
                                    unset($_SESSION['CARRITO'][$indice]);
                                    echo "<script> alert('Elemento borrado..');</script>";


                                }


                        }

                    }else{
                        $mensaje ="Upss.. ID incorecto &nbsp;".$ID."<br/>";
                        }  

                break;
                

           
        }
   

    }


?>