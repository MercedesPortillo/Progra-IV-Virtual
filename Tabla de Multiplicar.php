<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generacion de Tabla de Multiplicar</title>
</head>
<body>
    <form action="tabla de multiplicar.php" method="POST">
        <table border="1" cellpadding="4" cellspacing="0">
            <thead>
                <tr>
                   <td colspan="2">TABLAS DE MULTIPLICAR</td>
                </tr>
            </thead>
            <tbody>    
                <tr>
                    <td><label for="txtntabla">Tabla:</label></td>
                    <td><input type="text" name="txtntabla" id="txtntabla"
                    required pattern="[1-9]{1}"></td>
                </tr> 
                <tr>
                    <td colspan="2">
                        <input type="submit" value="Generar Tabla">
                    </td> 
                </tr>     
            </tbody> 
            <tfoot>
                <tr>
                    <td colspan="2">
                        Respuesta:
                        <?php
                            if($_POST){
                                $ntabla = $_POST['txtntabla'];
                               /* for( $i=1; $i<=10; $i++){
                                    echo "$ntabla x $i = ".($ntabla*$i) . '<br>';
                                }*/
                                $tabla = new tablas();
                                echo $tabla->generar_tabla($ntabla);
                            }
                        class tablas{
                            public function generar_tabla($ntabla){
                                $respuesta = '<br>';
                                for($i=1; $i<=10; $i++){
                                $respuesta .=  "$ntabla x $i = ". ($ntabla*$i).'<br>';
                                }
                                return $respuesta;
                            }
                        }  

                        ?>
                    </td>    
                </tr>
            </tfoot> 
        </table>
     </from>  
</body>
</html>