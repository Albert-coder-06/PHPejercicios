<?php

    class PaymentProcessor {

        private array $payments = [];

        private const ACCEPTED_CURRENCY = ['EUR', 'USD'];

        public function process(float $amount, string $currency) {

            //Informacion de la transaccion nueva
            $newTransaction = [
                'transaction_id' => 0,
                'status' => '',
                'message' => '',
                'timestamp' => '',
                'currency' => ''
            ];

            if (!in_array(strtoupper($currency), self::ACCEPTED_CURRENCY)) throw new InvalidArgumentException("La moneda seleccionada no es valida o aceptada");
            else $newTransaction['currency'] = strtoupper($currency);
            
            if ($amount <= 0) throw new InvalidArgumentException("El monto debe de ser mayor de 0");           

            //Gestion de estados segun la cantidad
            if ($amount > 1000.00) {
                $newTransaction['status'] = 'pending';
            } else {
                $newTransaction['status'] = 'success';
            }

            //Obtener ultimo id de la lista de transacciones
            $newTransaction['transaction_id'] = $this->getLastIdOfTransactions() + 1;
            $newTransaction['message'] = "Pago procesado correctamente";
            $newTransaction['timestamp'] = new DateTime('NOW')->format('Y-m-d H:i:s');

            //Formateo de la respuesta a JSON para respuestas entre sistemas
            $formatedResponse = $this->formatResponse($newTransaction);

            if ($formatedResponse) {
                $this->payments[] = $newTransaction;
                //Añadir log al sistema sobre la transaccion
                $addLog = $this->generateLog($newTransaction);
                return $formatedResponse;

            }
            else throw new InvalidArgumentException("No se ha podido devolver la respuesta correctamente formateada");
            
        }

        /**
         * Formatea la informacion de la informacion de la 
         */
        private function formatResponse (array $transactionData) {
            $currency = $transactionData['currency'];

            if (!$currency) return false;

            switch ($currency) {
                case 'EUR':
                    $transactionData['currency'] = '€';
                    break;
                case 'USD':
                    $transactionData['currency'] = '$';
                    break;
                    
                default:
                    # code...
                    break;
            }

            return json_encode($transactionData);

        }

        private function getLastIdOfTransactions() {
            if (empty($this->payments)) return 0;

            $lastRecord = $this->payments[count($this->payments) - 1];

            //Otra forma
            // $lastRecord = end($this->payments);

            return $lastRecord['transaction_id'];

        }

        private function generateLog(array $transactionData) {

            $year = date('Y');
            $month = date('m');
            $day = date('d');
            $directory = __DIR__."/logs/$year/$month";

            if (!is_dir($directory)) {
                mkdir($directory, 0777, true);
            }
            
            $fileName = "$directory/$day.txt";

            $logContent = "ID: ". $transactionData['transaction_id'] . "\n" . 
                        "Message: " . $transactionData['message'] . "\n" .
                        "Date: " . $transactionData['timestamp'] . "\n" . 
                        "Status: " . $transactionData['status'] . "\n" . 
                        "Currency: " . $transactionData['currency'] . "\n\n";


            return file_put_contents($fileName, $logContent, FILE_APPEND);
        
        }

    }

?>