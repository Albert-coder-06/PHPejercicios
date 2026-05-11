<?php
    include_once 'User.php';
    include_once 'MissingValueException.php';

    class UserFactory {

        public static function createFromState (array $userData) {
            try {
                $dataValidated = static::validateData($userData);

                $userHydrated = new User($dataValidated['id'], $dataValidated['name'], $dataValidated['email']);

                return $userHydrated;
            } catch (\Throwable $th) {
                return $th->getMessage();
            }
        }

        private static function validateData (array $userData) {
            $data = ['id' => 0, 'name' => '', 'email' => ''];

            foreach($data as $key => $value) {
                if (!isset($userData[$key])) {
                    throw new MissingValueException("Falta el " . $key . " del usuario");
                } else {
                    $data[$key] = $userData[$key];
                }
            }

            return $data;
        }
    }
?>