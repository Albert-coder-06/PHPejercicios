<?php

    class Permisos {
        

        private const USERROLES = [
            'client' => ['READ'],
            'vendor' => ['READ', 'WRITE', 'DELETE'],
            'admin' => ['ADMIN']
        ];


        public function isUserAuthorised($user, $permiso) {
            $userRoles = $user['roles'] ?? ['client'];
            $permiso = strtoupper($permiso);

            foreach($userRoles as $role) {

                $roleLower = strtolower($role);

            
                if (isset(self::USERROLES[$role])) {
                    
                    $permisosDelRol = self::USERROLES[$roleLower];


                    if (in_array('ADMIN', $permisosDelRol)) {
                        return true;
                    };

                    if (in_array($permiso, $permisosDelRol)) {
                        return true;
                    };


                }


                
            }

            return false;
        }

    }

$middleWare = new Permisos();


$usuario = ['roles' => ['vendor']];

echo "<p>El usuario esta " . $middleWare->isUserAuthorised($usuario, 'write') ? "Autorizado" : "Denegado" . " para realizar esta accion </p>";

?>