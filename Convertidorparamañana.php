<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Convertidor de Bolívares a Dólares</title>
    <style>
        input[type="text"],
        input[type="submit"] {
            margin-top: 8px;
            padding: 8px;
            width: 80%;
            border: 1px solid #ddd;
            border-radius: 4px;
            text-align: center;
        }

        input[type="submit"] {
            margin-top: 20px;
            padding: 10px;
            width: 100%;
            border: none;
            background-color: #007BFF;
            color: white;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <h2>Convertidor de Bolívares a Dólares</h2>

    <?php
    // Verificar si se ha enviado el formulario
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Obtener el monto ingresado por el usuario
        $monto = $_POST["ConvertidorBolivarADolar"];

        // Verificar si se ingresó un valor numérico válido
        if (is_numeric($monto)) {
            // Realizar la conversión de bolívares a dólares (considerando una tasa de cambio fija)
            $tasaCambio = 0.029;  // Tasa de cambio: 1 bolívar = 0.00012 dólares
            $conversion = $monto * $tasaCambio;

            // Mostrar el resultado de la conversión
            echo "El monto en dólares es: " . $conversion;
        } else {
            // Mostrar un mensaje de error si el monto ingresado no es válido
            echo "Por favor, ingresa un valor numérico válido.";
        }
    }
    ?>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <section>
            <input type="text" name="ConvertidorBolivarADolar" placeholder="Introduce el Monto a Convertir">
        </section>
        <input type="submit" value="Convertir">
    </form>
</body>
</html>