<?php
// 1. INCLUIR FPDF
require('librerias/fpdf/fpdf.php'); 

// 2. ¡CRUCIAL! INCLUIR EL ARCHIVO DE CONEXIÓN
// **VERIFICA LA RUTA** si conecta.php está en otra carpeta. Si está en la raíz, esta línea es correcta.
include('conecta.php'); 
// Ahora tienes la variable $conexion disponible

// 3. Recoger datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $c_paciente = $_POST['codigo_paciente'];
    $c_medicamento = $_POST['codigo_medicamento'];
    $c_doctor = $_POST['codigo_doctor'];
    $dosis = $_POST['dosis'];

    // 4. Consulta de Datos Usando PGSQL Funciones (pg_query_params)
    
    // a. Datos del PACIENTE
    $sql_paciente = "SELECT nombre, edad FROM paciente WHERE codigo = $1";
    // Usamos $conexion, no $pdo
    $result_p = pg_query_params($conexion, $sql_paciente, array($c_paciente));
    $paciente = pg_fetch_assoc($result_p); 

    // b. Datos del MEDICAMENTO
    $sql_medicamento = "SELECT nombre, presentacion FROM medicamento WHERE codigo = $1";
    $result_m = pg_query_params($conexion, $sql_medicamento, array($c_medicamento));
    $medicamento = pg_fetch_assoc($result_m);

    // c. Datos del DOCTOR
    $sql_doctor = "SELECT nombre, especialidad FROM doctor WHERE codigo = $1";
    $result_d = pg_query_params($conexion, $sql_doctor, array($c_doctor));
    $doctor = pg_fetch_assoc($result_d);

    // Verificar que se encontraron todos los datos
    if (!$paciente || !$medicamento || !$doctor) {
        // En lugar de die(), podríamos redirigir con un mensaje de error.
        die("Error: Uno o más códigos (Paciente, Medicamento o Doctor) son incorrectos. " . pg_last_error($conexion));
    }
    
    // 5. Generación del PDF (Código FPDF aquí)
    
    $pdf = new FPDF();
    $pdf->AddPage();
    // ... (El resto de tu código FPDF para dibujar la receta va aquí) ...
    // Asegúrate de que las líneas 17 en adelante (donde estaba $pdo) usen ahora las variables $paciente, $medicamento, $doctor.
    
    $pdf->Output('I', 'receta_final.pdf');

} else {
    header("Location: form_receta.php");
    exit;
}
?>