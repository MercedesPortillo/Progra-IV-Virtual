<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Convertir numeros naturales a romanos...</title>
</head>
<body>
    <form action="numeros_naturales_a_romanos.php"method="POST">
        <table border="1" cellpadding="5" cellspacing="0">
            <thead>
                <tr>
                    <td colspan="2">CONVERTIR NUMEROS NATURALES A ROMANOS * HASTA 100</td>
                </tr>   
            </thead>    
            <tbody> 
                <tr>
                 <td><label for="txtinicio">INICIO</label></td>
                 <td><input type="txt" name="txtinicio" id="txtinicio"
                     required pattern="[0-9]{1,2}"></td>
                </tr> 
                <tr>
                <td><label for="txtfin">FIN</label></td>
                    <td><input type="text" name="txtfin" id="txtfin" 
                         required pattern="[0-9]{1,2}"></td>
                </tr>
                </tbody>
                <tfoot>
                <tr>
                   <td colspan="2">
                       <input type="submit" value="CONVERTIR">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        RESPUESTA:     

                <?php
                  if( $_POST ){
                    $inicio = $_POST['txtinicio'];
                    $fin = $_POST['txtfin'];

                  if( $inicio>$fin ){
                echo "El numero $inicio NO puede ser mayor que $fin";
                    exit;
            }
                //echo "RANGO $inicio - $fin";

               $obj = new convertir_numeros_naturales_a_romanos();
                echo $obj->convertir($inicio, $fin);
           }

            class convertir_numeros_naturales_a_romanos{
                public function convertir($inicio, $fin){
                    $unidades = ['', 'I', 'II', 'II', 'IV', 'V', 'VI','VII', 'VII', 'IX'];
                    $especiales = [11=>'XI', 12=>'XII', 13=>'XIII', 14=>'XIV',15=>'XV', 16=>'XVI', 17=>'XVII', 18=>'XVIII',
                                  19=>'XIX', 21=>'XXI', 22=>'XXII', 23=>'XXIII',24=>'XXIV', 25=>'XXV', 26=>'XXVI', 27=>'XXVII',
                                  28=>'XXVIII', 29=>'XXIX', 100=>'C'];
                    $decenas = ['', 'X', 'XX', 'XXX', 'XL', 'L', 'LX','LXX', 'LXXX', 'XC'];
                       $respuesta = '<br>';

                       for($i=$inicio; $i<=$fin; $i++){
                           $numromano = '';
                        if( strlen( $i )==1 ){//1,2,3,4...
                           $numromano = $unidades[$i];
                   }
                   if( strlen( $i )==2 ){//11,12,25,35,45
                        if( ($i>10 && $i<20) || ($i>20 && $i<30) ){//11,12,13,14,15..., 21,22,23,24...
                             $numromano = $especiales[$i];
                        }else {//20,30,31,32,... 40,41,42,43,44,...,50,51...
                              $numArray = str_split($i); //$i = 20=> [0=>2,1=>0]
                              $numDecenas = $decenas[ $numArray[0] ];
                              $numUnidades = $unidades[ $numArray[1] ];
                              $numromano = $numDecenas . ( strlen($numUnidades)>0 ? : '' ) . $numUnidades; 
                        } 
                   }
                   $respuesta .= "$i = $numromano<br>";
               }
               return $respuesta;
            }
       }
       ?>
      </td>
   </tr>
   </tfoot>
</table>
</form>
