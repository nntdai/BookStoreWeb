<?php
include_once("Model/E_Role.php");
include_once("./util/DatabaseConnection.php");
class Model_Role {
    public function getRoleList() {
        $roleList = array();
        //get from database
        $sql = "SELECT * FROM vaitro";
        $con = DatabaseConnection::getInstance();
        $result = $con->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $roleList[$row["maVaiTro"]] = new Entity_Role($row["maVaiTro"], $row["tenVaiTro"]);
            }
        }
        return $roleList;
    }
    public function getRoleDetail($roleid) {
        $roleList = $this->getRoleList();
        return $roleList[$roleid];
    }
    public function addRole($rolename, $roledescription) {
        
    }
    public function updateRole($roleid, $rolename, $roledescription) {
        
    }
    public function deleteRole($roleid) {
        
    }

}
?>