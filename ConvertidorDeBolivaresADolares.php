<!DOCTYPE html>
<html lang="en">
<head>
    <title>Conversor de Monedas</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f5f5f5;
        }
        form {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1);
            width: 300px;
            text-align: center;
        }
        h1 {
            text-transform: uppercase;
            color: #007BFF;
        }
        label {
            display: block;
            text-align: left;
            margin-top: 20px;
        }
        input[type="text"], select {
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
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        p {
            margin-top: 20px;
            color: #333;
        }
    </style>
</head>
<body>
    <form method="post">
    <h1>Conversor de Monedas</h1>

    <label for="bolivares">Ingrese la cantidad en Bolívares:</label>
    <input type="text" id="bolivares" name="bolivares" value="">

    <?php
    class CurrencyConverter {
        private $conversionRate;

        public function __construct($conversionRate) {
            $this->conversionRate = $conversionRate;
        }

        public function convert($bolivares) {
            // Eliminar las comas del número ingresado
            $bolivares = str_replace(',', '', $bolivares);

            if(empty($bolivares)) {
                echo "<p>Por favor, ingrese un valor.</p>";
            } else {
                $amount = $bolivares / $this->conversionRate;
                echo "<p>" . number_format($bolivares, 2) . " bolívar(es) equivalen a " . round($amount, 2) . " dólares.</p>";
            }
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $bolivares = $_POST["bolivares"];
        $converter = new CurrencyConverter(34.90);  // Asegúrate de actualizar esta tasa según el valor actual
        $converter->convert($bolivares);
    }
    ?>

    <input type="submit" name="boton" value="Convertir">

    </form>
</body>
</html>