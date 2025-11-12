<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Insertar Nuevo Empleado</title>
  <link rel="stylesheet" href="Styles/form.css">
</head>
<body>
  <div class="card">
    <h2>Insertar Nuevo Empleado</h2>
    <form action="acciones/insertar_empleado_action.php" method="post">
      <label>Nombre completo:</label>
      <input type="text" name="nombre" required>

      <label>Dirección:</label>
      <input type="text" name="direccion" required>

      <label>Teléfono:</label>
      <input type="text" name="telefono" required>

      <label>Fecha de nacimiento:</label>
      <input type="date" name="fecha_nacimiento" required>

      <label>Sexo (M/F):</label>
      <input type="text" name="sexo" maxlength="1" required>

      <label>Sueldo:</label>
      <input type="number" name="sueldo" step="0.01" required>

      <label>Turno:</label>
      <input type="text" name="turno" required>

      <label>Contraseña:</label>
      <input type="password" name="contrasena" required>

      <button type="submit">Guardar Empleado</button>
      <a href="menu.php" class="back-btn">Volver al menú</a>
    </form>
  </div>
</body>
</html>