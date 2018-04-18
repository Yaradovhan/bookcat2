<?php

include_once 'Author.php';

class AuthorRepository
{

    public $connection;

    public function __construct()
    {
        $this->connection = new ConnectionMySql();
    }

    public function getAll()
    {
        $query = "SELECT id, title FROM authors";
        $res = mysqli_query($this->connection->getConnection(), $query);
        if (!$res) {
            return false;
        }
        for ($i = 0; $i < mysqli_num_rows($res); $i++) {
            $all = mysqli_fetch_array($res, MYSQLI_ASSOC);
            $authors = new Author();
            $authors->setAuthor([
                'id' => $all['id'],
                'title' => $all['title']
            ]);
            $data[$i] = $authors->getAuthor();
        }
        return $data;
    }

    public function getById($id)
    {

    }

}