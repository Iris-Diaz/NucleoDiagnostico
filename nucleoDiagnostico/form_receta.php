<?php
session_start();
// Asegúrate de que el código del doctor se guarde en esta variable
$codigo_doctor = $_SESSION['user_id'] ?? 0; 
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Receta Médica</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <link rel="stylesheet" href="form.css"> 
</head>
<body>
    <div class="container">
        <div class="form-card">
            
            <div class="form-header">
                <div class="header-icon">
                    <i class="fas fa-file-medical"></i> 
                </div>
                <h2>Generar Receta Médica</h2>
                <p class="subtitle">Complete los campos con los códigos de la consulta.</p>
            </div>
            
            <form action="generar_receta.php" method="POST">
                
                <div class="form-grid">
                    
                    <div class="form-group full-width">
                        <label for="codigo_paciente" class="form-label">
                            <i class="fas fa-user-injured"></i> Código del Paciente: <span class="required">*</span>
                        </label>
                        <div class="input-wrapper">
                            <i class="input-icon fas fa-id-card"></i>
                            <input type="number" id="codigo_paciente" name="codigo_paciente" class="form-control" required placeholder="Ingrese el código del paciente">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="codigo_medicamento" class="form-label">
                            <i class="fas fa-pills"></i> Código del Medicamento: <span class="required">*</span>
                        </label>
                        <div class="input-wrapper">
                            <i class="input-icon fas fa-hashtag"></i>
                            <input type="number" id="codigo_medicamento" name="codigo_medicamento" class="form-control" required placeholder="Ingrese código de la tabla medicamento">
                        </div>
                    </div>
                     <div class="form-group">
                        <label for="codigo_doctor" class="form-label">
                            <i class="fas fa-pills"></i> Código del doctor: <span class="required">*</span>
                        </label>
                        <div class="input-wrapper">
                            <i class="input-icon fas fa-hashtag"></i>
                            <input type="number" id="codigo_doctor" name="codigo_doctor" class="form-control" required placeholder="Ingrese código de la tabla doctor">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="dosis" class="form-label">
                            <i class="fas fa-file-prescription"></i> Dosis / Instrucciones: <span class="required">*</span>
                        </label>
                        <div class="input-wrapper">
                            <i class="input-icon fas fa-syringe"></i>
                            <input type="text" id="dosis" name="dosis" class="form-control" required placeholder="Ej: Tomar una tableta cada 8 horas por 5 días">
                        </div>
                    </div>
                    
                </div> <input type="hidden" name="codigo_doctor" value="<?php echo htmlspecialchars($codigo_doctor); ?>">

                <div class="button-group">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-file-pdf"></i> Generar PDF de Receta
                    </button>
                    
                    <a href="menu_doc.php" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Volver al Menú
                    </a>
                </div>
            </form>
            
        </div> </div> </body>
</html>