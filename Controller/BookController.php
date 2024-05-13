<?php

//controller tra ve html khi nguoi dung la admin, nguoc lại chi tra ve du lieu .json
//admin duoc su dung cac chuc nang them, sua, xoa. Nguoc lai thi chi duoc xem thong tin

class BookController {
    public function __construct()
    {}

    public function get() {
        //ko can
        die();
    }

    public function post() {
        if(isset($_POST["action"])) {
            $action = $_POST["action"];
            switch($action) {
                case "add":
                    $this->addBook();
                    break;
                case "update":
                    $this->updateBook();
                    break;
                case "delete":
                    $$this->deleteBook();
                    break;
                case "detail":
                    $this->getBookDetail();
                    break;
                case "getBookByPage":
                    $this->getBookByPage();
                    break;
                
                
                
            }
        }
    }

    //them, xoa, sua, tim kiem, loc, lay sach theo trang

    public function getBookByPage() {
        if(isset($_GET["page"])) {
            $page = $_GET["page"];
            $books = BookModel::getBookByPage($page);
            echo json_encode($books);
        }
    }

    public function getBookBySearch() {
        if(isset($_GET["search"])) {
            $search = $_GET["search"];
            $books = BookModel::getBookBySearch($search);
            echo json_encode($books);
        }
    } 



    

}
?>