<?php

class Book implements JsonSerializable {

    private $id;
    private $name;
    private $autor;
    private $description;

    public function __construct() {

        $this->id = -1;
        $this->name = "";
        $this->autor = "";
        $this->description = "";
    }

    public function setName($newName) {
        $this->name = $newName;
    }

    public function setAutor($newAutor) {
        $this->autor = $newAutor;
    }

    public function setDescription($newDescription) {
        $this->description = $newDescription;
    }

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getAutor() {
        return $this->autor;
    }

    public function getDescription() {
        return $this->description;
    }

    static public function create(mysqli $connection, $name, $autor, $description) {


        $sql = "INSERT INTO Book(name, autor, description)"
                . "VALUES ('$name', '$autor', '$description')";

        $result = $connection->query($sql);
        if ($result == true) {
            $this->id = $connection->insert_id;
            $this->name = $name;
            $this->autor = $autor;
            $this->description = $description;

            return true;
        } else {

            return false;
        }
    }

    public function deleteFromDB(mysqli $connection, $id) {


        $sql = "DELETE FROM Book WHERE id=$id";
        $result = $connection->query($sql);
        if ($result == true) {

            return true;
        }
        return false;
    }

    static public function loadFromDB(mysqli $connection, $id) {

        $sql = "SELECT * FROM Book WHERE id=$id";

        $result = $connection->query($sql);

        if ($result == true && $result->num_rows == 1) {

            $row = $result->fetch_assoc();
            $loadedBook = new Book();
            $loadedBook->id = $id;
            $loadedBook->name = $row['name'];
            $loadedBook->autor = $row['autor'];
            $loadedBook->description = $row['description'];

            return $loadedBook;
        }

        return null;
    }

    public function update(mysqli $connection, $id, $name, $autor, $description) {

        $sql = "UPDATE Book SET name='$name',autor='$autor',description='$description'  
                WHERE id=$id";

        $result = $connection->query($sql);

        if ($result == true) {
            $this->name = $name;
            $this->autor = $autor;
            $this->description = $description;
            return true;
        } else {
            return false;
        }
    }

    static public function loadAllBooks(mysqli $connection) {

        $sql = "SELECT * FROM Book";
        $ret = [];

        $result = $connection->query($sql);
        if ($result == true && $result->num_rows != 0) {
            foreach ($result as $row) {

                $loadedBook = new Book();
                $loadedBook->id = $row['id'];
                $loadedBook->name = $row['name'];
                $loadedBook->autor = $row['autor'];
                $loadedBook->description = $row['description'];

                $ret[] = $loadedBook;
            }
        }

        return $ret;
    }

    public function jsonSerialize() {
        return[
            'id' => $this->id,
            'name' => $this->name,
            'autor' => $this->autor,
            'description' => $this->description
        ];
    }

}
