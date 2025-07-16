<?php
$code = $_GET['code'] ?? 'desconocido';
?>
<!DOCTYPE html>
<html>
<head>
  <title>Estado de eliminación</title>
</head>
<body>
  <h1>Estado de la solicitud de eliminación de datos</h1>
  <p>Tu solicitud fue recibida correctamente.</p>
  <p><strong>Código de confirmación:</strong> <?php echo htmlspecialchars($code); ?></p>
  <p>Los datos asociados a tu cuenta han sido eliminados (simulación).</p>
</body>
</html>
