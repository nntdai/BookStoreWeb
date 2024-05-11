<?php
class RoleController {
    public function invoke() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $this->post();
        }
        else {
            $this->get();
        }
    }

    public function get() {
        if(isset($_GET["roleid"])) {
            $modelRole = new Model_Role();
            $role = $modelRole->getRoleDetail($_GET["roleid"]);

            include_once("View/RoleDetail.php");
        }
        else {
            $modelRole = new Model_Role();
            $roleList = $modelRole->getRoleList();

            include_once("View/RoleList.php");
        }
    }

    public function post() {
        if(isset($_POST["action"])) {
            if($_POST["action"] == "add") {
                $modelRole = new Model_Role();
                $json = $modelRole->addRole($_POST["rolename"], $_POST["roledescription"]);
                echo json_encode($json);
            }
            if($_POST["action"] == "update") {
                $modelRole = new Model_Role();
                $json = $modelRole->updateRole($_POST["roleid"], $_POST["rolename"], $_POST["roledescription"]);
                echo json_encode($json);
            }
            if($_POST["action"] == "delete") {
                $modelRole = new Model_Role();
                $json = $modelRole->deleteRole($_POST["roleid"]);
                echo json_encode($json);
            }
            if($_POST["action"] == "detail") {
                $modelRole = new Model_Role();
                $json = $modelRole->getRoleDetail($_POST["roleid"]);
                echo json_encode($json);
            }
        }
    }
}
?>