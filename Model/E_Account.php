<?php 
class Entity_Account {
    public $id;
    public $username;
    public $password;
    public $phone;
    public $fullName;
    public $email;
    public $roleId;
    public $status;

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
}

?>