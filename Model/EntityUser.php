<?php
    class EntityUser {
        private $id;
        private $username;
        private $password;
        private $phone;
        private $fullName;
        private $email;
        private $roleId;
        private $status;

        public function __construct($id, $username, $password, $email, $roleId, $status, $phone, $fullName) {
            $this->id = $id;
            $this->username = $username;
            $this->password = $password;
            $this->email = $email;
            $this->roleId = $roleId;
            $this->status = $status;
            $this->phone = $phone;
            $this->fullName = $fullName;
        }

        public function getId() {
            return $this->id;
        }

        public function getUsername() {
            return $this->username;
        }

        public function getPassword() {
            return $this->password;
        }

        public function getEmail() {
            return $this->email;
        }

        public function getRoleId() {
            return $this->roleId;
        }

        public function getStatus() {
            return $this->status;
        }

        public function getPhone() {
            return $this->phone;
        }

        public function getFullName() {
            return $this->fullName;
        }
    }
?>