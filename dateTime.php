<?php

    class CustomDateTime {

        public function getDiff(string $fecha) {
            $fechaToDateTime = DateTime::createFromFormat('Y-m-d H:i:s', $fecha);

            if (!$fechaToDateTime) {
                return "El formato de la fecha no es valida";
            }

            $diff = $fechaToDateTime->diff(new DateTime('NOW'));

            if ($diff->y > 0) {
                return $diff->format('Hace %y años');
            }

            if ($diff->m > 0) {
                return $diff->format("Hace %m meses");
            }

            if ($diff->d > 0) {
                return $diff->format("Hace %d días");
            }

            if ($diff->h > 0) {
                return $diff->format("Hace %h horas");
            }

            if ($diff->i > 0) {
                return $diff->format("Hace %i minutos");
            }

            if ($diff->s > 0) {
                return "Justo ahora";
            }

            

        }

    }

    $dateTimeInstance = new CustomDateTime();

    echo $dateTimeInstance->getDiff('2024-01-01 12:00:00');


?>


