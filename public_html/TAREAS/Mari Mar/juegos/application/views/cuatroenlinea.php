<html>
    <head>
        <title>Cuatro en raya</title>
    </head>
    <body>
        <form method="post">
            <div align="center">
                <p style="font-size:35px;"><b>CUATRO EN LÍNEA</b></p>

                <table>
                    <tr>
                        <th></th>
                        <?php
                            for($i=1;$i<=$action;$i++)
                            {
                        ?>
                            <th width="40" align="center"><?=$i?></th>
                        <?php
                            }
                        ?>
                    </tr>
                    <?php
                        for($i=1;$i<=$action;$i++)
                        {
                    ?>
                        <tr>
                            <th width="40" align="center"><?=$i?></th>
                             <?php
                                for($j=1;$j<=$action;$j++)
                                {
                            ?>
                                <!-- Construimos las diferentes celdas de la tabla -->
                                <td width="40" align="center"><?=$arrayTabla[$i-1][$j-1]?></td>

                                <!-- Enviamos los datos en campos ocultos para recargar la matriz de datos -->
                                <input type="hidden" name="<?="fila_".$i."_col_".$j?>" value="<?=$arrayTabla[$i-1][$j-1]?>"/>
                            <?php
                                }
                            ?>
                        </tr>
                    <?php
                        }
                    ?>
                </table>

                <p font-size="15">Elige casilla:</p>
                <table>
                    <tr>
                        <td>Columna:</td>
                        <td><input type="text" name="columna" size="20"/></td>
                    </tr>
                    <tr><td colspan="4" align="center"><input type="submit" value="INSERTA"/></td></tr>
                </table>

                <p style="font-size:20px;color:RED;"><b><?=$texto?></b></p>
                <p style="font-size:20px;color:RED;"><b><?=$texto_jugada?></b></p>
            </div>
        </form>
    </body>
</html>

