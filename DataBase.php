<?php

class DataBase
{
    public $connection;


    public function __construct($host="localhost", $user="root", $password ="")
    {
        //nawiązanie połączenia
        $this->connection = mysqli_connect($host, $user, $password);

        //stworzenie bazy Libray
        $sql = "CREATE DATABASE Library";
        if(mysqli_query($this->connection, $sql)){
//            echo "Database created";
        }else{
//            echo "Error! Couldn't create database";
        };

        //nawiązanie połączenia z bazą Library
        $this->connection = mysqli_connect($host, $user, $password, "Library");
        //stworzenie tabel


    }

    public function fillDataBase()
    {
        $sql = "CREATE TABLE UserType(
                id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
                type VARCHAR(30) NOT NULL UNIQUE
                )";

        $this->isQueryExecute($sql);

        $sql = "CREATE TABLE User(
                UserType_FK INT NOT NULL,
                email VARCHAR(30) NOT NULL PRIMARY KEY,
                name VARCHAR(30) NOT NULL,
                surname VARCHAR(30) NOT NULL,
                birth_date DATE NOT NULL, 
                password VARCHAR(30) NOT NULL,
                FOREIGN KEY (UserType_FK) REFERENCES UserType (id))";

        $this->isQueryExecute($sql);

        $sql = "CREATE TABLE BookType(
                id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
                type VARCHAR(30) NOT NULL UNIQUE
                )";

        $this->isQueryExecute($sql);

        $sql = "CREATE TABLE Book(
                BookType_FK INT NOT NULL,
                User_FK varchar(20),
                id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
                title VARCHAR(30) NOT NULL,
                author VARCHAR(40) NOT NULL,
                year INT NOT NULL,
                FOREIGN KEY (BookType_FK) REFERENCES BookType(id),
                FOREIGN KEY (User_FK) REFERENCES User(email)
                )";

        $this->isQueryExecute($sql);

        $sql = "INSERT INTO
        UserType(type) VALUES
               ('Employee'),
               ('Member')";

        $this->isQueryExecute($sql);

        $sql = "INSERT INTO
        User(UserType_FK, email, name, surname, birth_date, password) VALUES
               (1, 'zuzelek@op.pl', 'Zuzelka', 'Doe', STR_TO_DATE('1-01-1995', '%d-%m-%Y'), 'qwerty'),
               (1, 'lessi@op.pl', 'Less', 'Bing', STR_TO_DATE('1-01-2000', '%d-%m-%Y'), 'lessi1'),
               (1, 'karol@gmail.com', 'Karol', 'Kowalski', STR_TO_DATE('1-01-1980', '%d-%m-%Y'), 'karol')";

        $this->isQueryExecute( $sql);

        $sql = "INSERT INTO
        BookType(type) VALUES
               ('moral'),
               ('horror'),
               ('criminal')";

        $this->isQueryExecute($sql);

        $sql = "INSERT INTO
        Book(BookType_FK, User_FK, title, author, year) VALUES
               (1, null, '1Q84', 'Haruki Murakami', 1989),
               (2, null, 'Shining', 'Stephen King', 1999),
               (3, null, 'Killer', 'John Doe', 2019)";

        $this->isQueryExecute($sql);
        $_SESSION['initialize'] = true;
    }

    public function dropDataBase($data_base){
        $sql = "DROP DATABASE $data_base";
        $this->isQueryExecute($sql);
    }



    public function addUser($user_type_FK, $email, $name, $surname, $birth_date, $password)
    {

        $sql = "INSERT INTO
        User(UserType_FK, email, name, surname, birth_date, password) VALUES
               ('$user_type_FK', '$email', '$name', '$surname', STR_TO_DATE('$birth_date', '%d-%m-%Y'), '$password')";

        return $this->isQueryExecute($sql);
    }

    public function addBook($book_type_FK, $title, $author, $year, $user_email, $password)
    {
        $user = $this->getUser($user_email, $password);
        if($user[0] == 1){
            $sql = "INSERT INTO
            Book(BookType_FK, User_FK, title, author, year) VALUES
                ('$book_type_FK', null , '$title', '$author', '$year')";

            return $this->isQueryExecute($sql);
        }

        echo "Nie masz uprawnień";
        return false;


    }

    public function borrowBook($book_id, $user_email)
    {
        $book = $this->getBook($book_id);
        if($book[1]){
            echo "Książka już jest wypożyczona";
            return false;
        }

        $sql = "UPDATE Book
                SET User_FK = '$user_email'
                WHERE id = $book_id";

        return $this->isQueryExecute($sql);

    }

    public function getBook($book_id)
    {
        $sql = "SELECT *
                FROM Book
                WHERE id=$book_id";

        $result = $this->isQueryExecute($sql);
        $row=mysqli_fetch_row($result);
//        print_r($row);
        return $row;

    }

    public function getBookByTitle($title)
    {
        $table = [];
        $sql = "SELECT Book.id, Book.User_FK, Book.title, Book.author, Book.year, BookType.type
                FROM Book INNER JOIN BookType ON Book.BookType_FK = BookType.id
                WHERE Book.title = '$title'";
        $result = $this->isQueryExecute($sql);
        while($row=mysqli_fetch_row($result)){
            $table[] = $row;
        }
        return $table;

    }

    public function getBooksByType($type)
    {
        $table = [];
        $sql = "SELECT Book.id, Book.User_FK, Book.title, Book.author, Book.year, BookType.type
                FROM Book INNER JOIN BookType ON Book.BookType_FK = BookType.id
                WHERE BookType.type = '$type'";
        $result = $this->isQueryExecute($sql);
        while($row=mysqli_fetch_row($result)){
            $table[] = $row;
        }
        return $table;

    }

    public function getBooks()
    {
    $table = [];
    $sql = "SELECT Book.id, Book.User_FK, Book.title, Book.author, Book.year, BookType.type
                FROM Book INNER JOIN BookType ON Book.BookType_FK = BookType.id";

    $result = $this->isQueryExecute($sql);
    while($row=mysqli_fetch_row($result)){
        $table[] = $row;
    }
//        print_r($table);
    return $table;

    }

    public function getBooksbyUser($user_id)
    {
        $table = [];
        $sql = "SELECT Book.id, Book.User_FK, Book.title, Book.author, Book.year, BookType.type
                FROM BookType INNER JOIN Book ON Book.BookType_FK = BookType.id 
                INNER JOIN User ON Book.User_FK = User.email 
                WHERE User.email = '$user_id'";

        $result = $this->isQueryExecute($sql);
        while($row=mysqli_fetch_row($result)){
            $table[] = $row;
        }
        return $table;

    }

    public function getBookById($book_id)
    {
        $table = [];
        $sql = "SELECT *
                FROM Book
                WHERE id = $book_id";

        $result = $this->isQueryExecute($sql);
        while($row=mysqli_fetch_row($result)){
            $table[] = $row;
        }
        return $table;

    }

    public function getBookTypes()
    {
        $table = [];
        $sql = "SELECT *
                FROM BookType";

        $result = $this->isQueryExecute($sql);
        while($row=mysqli_fetch_row($result)){

            $table[] = $row[1];

        }

        return $table;

    }


    public function getUser($user_email, $password)
    {
        $table = [];
        $sql = "SELECT *
                FROM User
                WHERE email='$user_email' AND password = '$password'";

        $result = $this->isQueryExecute($sql);
        $row=mysqli_fetch_row($result);
//        print_r($row);
        return $row;

    }



    public function getUsers()
    {
            $table = [];
            $sql = "SELECT email, name, surname, birth_date, t.type
                FROM User u INNER JOIN UserType t on u.UserType_FK = t.id";

            $result = $this->isQueryExecute($sql);
            while($row=mysqli_fetch_row($result)){
                $table[] = $row;
            }
//            print_r($table);
            return $table;


    }


    public function isBorrowed($book_id)
    {
        $books = $this->getBookById($book_id);

        foreach ($books as $book) {
            if ($book[1]) {
                return true;
            }
            return false;
        }
    }

    public function changePassword($user_id, $new_password)
    {
        $sql = "UPDATE user
                SET password = '$new_password'
                WHERE email = '$user_id'";
        if($this->isQueryExecute($sql)){
            return True;
        };
    }

    private function isQueryExecute($sql)
    {
        if($result = mysqli_query($this->connection, $sql)){
//            echo "Query execute succesfull " . "\n";
            return $result;
        } else{
//            echo "Query not execute " . mysqli_error($this->connection). "\n";
            return false;
        }
    }
}