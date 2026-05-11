<?php
    //Entorno global de la aplicacion para manejo de excepciones y pura estructura MVC (Controladors)

    //NOTA IMPORTANTE no se aplica correctamente y del todo la estructura MVC (NO LIARSE)

    include_once 'PaymentProcessor.php';

    class App {

        private PaymentProcessor $paymentProcessor;

        public function __construct()
        {
            $this->paymentProcessor = new PaymentProcessor();
        }

        public function processNewTransaction(float $amount, string $currency) {
            try {
                $response = $this->paymentProcessor->process($amount, $currency);

                return $response;

            } catch (InvalidArgumentException $error) {

                http_response_code(422);

                $response = [
                    'transaction_id' => null,
                    'status' => 'error',
                    'message' => $error->getMessage(),
                    'timestamp' => new DateTime('NOW')->format('Y-m-d H:i:s')
                ];

                return json_encode($response);

            }
        }
    }

?>