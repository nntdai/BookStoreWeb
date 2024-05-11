<?php
include_once("E_Student.php");
class Model_Student {
    public function __construct()
    {}

    public function getALlStudent() {
        return array(
            "1" => new Entity_Student(1, "Ho Quoc Toan", 22, "University of Science"),
            "2" => new Entity_Student(2, "Vu Cong Tan Tai", 23, "University of Science"),
            "3" => new Entity_Student(3, "Tran Cong Thach", 21, "University of Technology")
        );
    }

    public function getStudentDetail($stid) {
        $allStudent = $this->getAllStudent();
        return $allStudent[$stid];
    }
}
?>