<html>
    <head>
        <title>Formulario</title>
        <link rel="stylesheet" href="estilos.php">
    </head>

    <body>
        <div class="barra">PaYa!</div>
        <div class="contenedor">
            <form action="index.php" method="POST">
                Nombre:
                <input type="text"  name="nombre">
                <p>
                Apellido:
                <input type="text"  name="apellido">
                <p>
                Direccion: 
                <input type="text"  name="direccion">
                <p>
                Fecha de nacimiento:
                <input type="date" name="fecha">
                <p>
                Genero:
                <input type="radio" name="genero" value="H"> Hombre
                <input type="radio" name="genero" value="M">  Mujer
                <p>
                <input type="hidden" value="true" name="enviar">
                <input type="submit" value="Enviar">

            </form>
        </div>

        <?php
            $con=mysqli_connect('localhost','root','','paya');
            if(!empty($_POST['enviar']) && $_POST['enviar']=="true"){
                if(empty($_POST['nombre']) || empty($_POST['apellido']) || empty($_POST['direccion']) || empty($_POST['fecha']) || empty($_POST['genero'])){
                ?>
                    <div class="mensaje"><em>Es obligatorio rellenar todos los campos</em></div>        
                <?php
                }
                else{
                $sql="INSERT INTO usuarios VALUES(null,'".$_POST["nombre"]."','".$_POST["apellido"]."','".$_POST["direccion"]."','".$_POST["fecha"]."','".$_POST["genero"]."')";
                $resultado1=mysqli_query($con,$sql);   
                }
            }
        ?>

        <?php 
            $con = mysqli_connect('localhost','root','','paya');
            if ($con) {
	            $consulta = "SELECT * FROM usuarios";
	            $resultado = mysqli_query($con,$consulta);
	            if ($resultado) {
		            while ($row = $resultado->fetch_array()) {
	                    $id = $row['ID'];
	                    $nombre = $row['Nombre'];
	                    $apellido = $row['Apellido'];
	                    $direccion = $row['Direccion'];
                        $fecha = $row['Fecha de nacimiento'];
                        $genero = $row['Genero'];
                        ?>

        <div class="tabla">
        	<p>
                <font face="Monospace"><table bgcolor="white">
                <tr>
                <th width="50px">ID</th>
                <th width="150px">Nombre</th>
                <th width="150px">Apellido</pre></th> 
                <th width="300px">Direccion</th>
                <th width="250px">Fecha de nacimiento</th>
                <th width="75px">Genero</th>
                </tr>
                <tr>
                <th><?php echo $id ?></th>
                <th><?php echo $nombre ?></th>
                <th><?php echo $apellido ?></th> 
                <th><?php echo $direccion ?></th>
                <th><?php echo $fecha ?></th>
                <th><?php echo $genero ?></th>
                </tr>
                </table>
        	</p>
        </div>

	    <?php
	                }
	            }
            }
        ?>
    </body>
</html>