<!DOCTYPE html>
<html>
<head>
    <title>Convertidor de Bolívares a Dólares</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 300px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        h2 {
            text-align: center;
        }

        input[type="number"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #007BFF;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
        }

        .result {
            margin-top: 20px;
            text-align: center;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Convertidor de Bolívares a Dólares</h2>

        <?php
        class ConvertidorMoneda {
            private $tasaCambio;

            public function __construct($tasaCambio) {
                $this->tasaCambio = $tasaCambio;
            }

            public function convertir($monto) {
                return $monto * $this->tasaCambio;
            }
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $monto = $_POST["monto"];
            if (is_numeric($monto)) {
                $tasaCambio = 0.029;
                $convertidor = new ConvertidorMoneda($tasaCambio);
                $conversion = $convertidor->convertir($monto);
                echo '<div class="result">El monto en dólares es: $' . $conversion . '</div>';
            } else {
                echo '<div class="result">Por favor, ingresa un valor numérico válido.</div>';
            }
        }
        ?>

        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <input type="number" name="monto" placeholder="Introduce el monto en bolívares" required>
            <input type="submit" value="Convertir">
        </form>
    </div>
</body>
</html>
