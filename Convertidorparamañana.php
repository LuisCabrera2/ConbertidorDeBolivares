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
    abstract class ConvertidorMoneda {
        protected $tasaCambio;

        public function __construct($tasaCambio) {
            $this->tasaCambio = $tasaCambio;
        }

        abstract protected function convertir($monto);
    }

    class BolivarADolar extends ConvertidorMoneda {
        public function __construct($tasaCambio) {
            parent::__construct($tasaCambio);
        }

        protected function convertir($monto) {
            return $monto * $this->tasaCambio;
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $monto = $_POST["ConvertidorBolivarADolar"];
        if (is_numeric($monto)) {
            $tasaCambio = 0.00012;
            $convertidor = new BolivarADolar($tasaCambio);
            $conversion = $convertidor->convertir($monto);
            echo "El monto en dólares es: " . $conversion;
        } else {
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
      
