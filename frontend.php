<?php
    require_once 'SimpleXLSX.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>

  <title>NEU</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <meta name="description" content=""/>
  <link rel="icon" type="image/png" href=""/>
  <link rel="stylesheet" href="style.css">

<body>
    
    <header>
        <h1>Prueba Tecnica NEU</h1>
    </header>

    <section>
        <table>
            <tr>
                <th>id</th>
                <th>Sub-Array</th>
            </tr>

                <?php
                    if ( $xlsx = SimpleXLSX::parse('database.xlsx') ) {
                        $count = 0;
                        foreach( $xlsx->rows() as $r ) {
                            if($count > 0){
                                echo '<tr><td>'.implode('</td><td>', $r ).'</td></tr>';
                            }
                            $count = 1;
	                    }
                    } else {
                        echo SimpleXLSX::parseError();
                    }
                ?>
        </table>
    </section>
    
</body>
</html>
