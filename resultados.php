<?php
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: index.html");
    exit();
}

// Recuperar datos del cliente
$nombre = isset($_POST['nombre']) ? htmlspecialchars(trim($_POST['nombre'])) : 'No especificado';
$correo = isset($_POST['correo']) ? htmlspecialchars(trim($_POST['correo'])) : 'No especificado';

$destinos = isset($_POST['destinos']) && is_array($_POST['destinos']) ? $_POST['destinos'] : [];
$actividades = isset($_POST['actividades']) && is_array($_POST['actividades']) ? $_POST['actividades'] : [];
$servicios = isset($_POST['servicios']) && is_array($_POST['servicios']) ? $_POST['servicios'] : [];

// Calcular totales y total general
$totalDestinos = count($destinos);
$totalActividades = count($actividades);
$totalServicios = count($servicios);
$totalGeneral = $totalDestinos + $totalActividades + $totalServicios;
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resumen del Paquete Turístico</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 700px;
            margin: 30px auto;
            padding: 20px;
            background-color: #f4f7f9;
        }
        .contenedor {
            background: #ffffff;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }
        h1 { color: #1a5276; text-align: center; }
        h2 { color: #2874a6; border-bottom: 1px solid #d5dbdb; padding-bottom: 5px; margin-top: 25px; }
        .resumen-total {
            background-color: #eaf2f8;
            padding: 15px;
            border-left: 5px solid #2874a6;
            margin-top: 25px;
            font-size: 1.1em;
        }
        .btn-volver {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 18px;
            background-color: #2874a6;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        .btn-volver:hover { background-color: #1a5276; }
    </style>
</head>
<body>
    <div class="contenedor">
        <h1>Resumen de tu Paquete</h1>

        <!--Datos del cliente -->
        <h2>Datos del cliente</h2>
        <p><strong>Nombre completo:</strong> <?php echo $nombre; ?></p>
        <p><strong>Correo electrónico:</strong> <?php echo $correo; ?></p>

        <!--Destinos seleccionados -->
        <h2>Destinos turísticos seleccionados</h2>
        <?php if ($totalDestinos > 0): ?>
            <ul>
                <?php foreach ($destinos as $destino): ?>
                    <li><?php echo htmlspecialchars($destino); ?></li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p>No seleccionaste ningún elemento</p>
        <?php endif; ?>
        <p><strong>Total de destinos seleccionados:</strong> <?php echo $totalDestinos; ?></p>

        <!--Actividades seleccionadas -->
        <h2>Actividades turísticas seleccionadas</h2>
        <?php if ($totalActividades > 0): ?>
            <ul>
                <?php foreach ($actividades as $actividad): ?>
                    <li><?php echo htmlspecialchars($actividad); ?></li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p>No seleccionaste ningún elemento</p>
        <?php endif; ?>
        <p><strong>Total de actividades seleccionadas:</strong> <?php echo $totalActividades; ?></p>

        <!--Servicios adicionales seleccionados -->
        <h2>Servicios adicionales seleccionados</h2>
        <?php if ($totalServicios > 0): ?>
            <ul>
                <?php foreach ($servicios as $servicio): ?>
                    <li><?php echo htmlspecialchars($servicio); ?></li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p>No seleccionaste ningún elemento</p>
        <?php endif; ?>
        <p><strong>Total de servicios adicionales seleccionados:</strong> <?php echo $totalServicios; ?></p>

        <!--Total general -->
        <div class="resumen-total">
            <p><strong>Total general de elementos seleccionados:</strong> <?php echo $totalGeneral; ?></p>
        </div>

        <a href="index.html" class="btn-volver">← Personalizar otro paquete</a>
    </div>
</body>
</html>
