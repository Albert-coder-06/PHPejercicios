<?php

    include_once 'UserFactory.php';
    include_once 'User.php';

    class App {
        private UserFactory $userFactory;

        public function __construct()
        {
            $this->userFactory = new UserFactory();
        }

        public function getHydratedUser(array $data) {
            $result = $this->userFactory->createFromState($data);

            return $result;
        }
    }

?>