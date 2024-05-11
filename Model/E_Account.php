<?php 
class Entity_Account {
    public $id;
    public $username;
    public $email;
    public $password;
    public $role;
    public $status;

    public function __construct($_id, $_username, $_email, $_password, $_role, $_status) {
        $this->id = $_id;
        $this->username = $_username;
        $this->email = $_email;
        $this->password = $_password;
        $this->role = $_role;
        $this->status = $_status;
    }
}

?>