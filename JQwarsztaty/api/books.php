<?php

require_once 'src/connection.php';
require_once 'src/book.php';


//if or switch

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['id']) && ($_GET['id'] > 0)) {
        
        $books = Book::loadFromDB($conn, $_GET['id']);
        echo json_encode($books);
        
    } else {
        
        $book = Book::loadAllBooks($conn);
        echo json_encode($book);
    }
} 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['name']) && isset($_POST['autor']) && isset($_POST['description'])
            && (trim($_POST['name']) != "") && (trim($_POST['autor']) != "") && (trim($_POST['description']) != "") ) {

        $name = $_POST['name'];
        $autor = $_POST['autor'];
        $description = $_POST['description'];
        
        $book = new Book();
        $book->create($conn, $name, $autor, $description);        
        echo json_encode($book);
    }
} 
if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
    
    parse_str(file_get_contents("php://input"), $del_vars);
    $book = Book::deleteFromDB($conn, $del_vars['id']);
    echo json_encode($book);
    
    
} 
if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
    
    parse_str(file_get_contents("php://input"), $put_vars);
    $id = $put_vars['id'];
    $name = $put_vars['name'];
    $autor = $put_vars['autor'];
    $description = $put_vars['description'];
    
    $book = new Book();
    $book->update($conn, $id, $name, $autor, $description);
    echo json_encode($book);
    
}