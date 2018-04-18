<?php

include_once 'Book.php';

class BookRepository
{

    public $connection;

    public function __construct()
    {
        $this->connection = new ConnectionMySql();
    }

    public function getAll()
    {
        $query = 'SELECT `books`.`id`, `books`.title, `books`.`description`, `books`.`price`,  
                    GROUP_CONCAT(DISTINCT `categories`.`title`) as `category_title`, 
                    GROUP_CONCAT(DISTINCT `authors`.`title`) as `author_title`
                      FROM `books`
                      LEFT JOIN `books_categories` ON `books_categories`.`book_id` = `books`.`id`
                      LEFT JOIN `categories` ON `categories`.id = `books_categories`.`category_id`
                      LEFT JOIN `books_authors` ON `books_authors`.`book_id` = `books`.`id`
                      LEFT JOIN `authors` ON `authors`.id = `books_authors`.`author_id`
                      GROUP BY `books`.`id`';

        $res = mysqli_query($this->connection->getConnection(), $query);
        if (!$res) {
            return false;
        }
        $data = [];
        for ($i = 0; $i < mysqli_num_rows($res); $i++) {
            $all = mysqli_fetch_array($res, MYSQLI_ASSOC);

            $task = new Book();
            $task->setBook([
                'id' => $all['id'],
                'title' => $all['title'],
                'description' => $all['description'],
                'price' => $all['price']
            ]);
            $author = new Author();
            $author->setAuthor([
                'title' => $all['author_title']
            ]);
            $category = new Category();
            $category->setCategory([
                'title' => $all['category_title']
            ]);
            $data[$i]['book'] = $task->getBook();
            $data[$i]['author'] = $author->getAuthor();
            $data[$i]['category'] = $category->getCategory();
        }
        return $data;
    }

    public function getAllById($id)
    {
        $query = "SELECT `books`.`id`, `books`.title, `books`.`text`, `books`.`price`,  
                    GROUP_CONCAT(DISTINCT `categories`.`title`) as `category_title`, 
                    GROUP_CONCAT(DISTINCT `authors`.`title`) as `author_title`
                      FROM `books`
                      LEFT JOIN `books_categories` ON `books_categories`.`book_id` = `books`.`id`
                      LEFT JOIN `categories` ON `categories`.id = `books_categories`.`category_id`
                      LEFT JOIN `books_authors` ON `books_authors`.`book_id` = `books`.`id`
                      LEFT JOIN `authors` ON `authors`.id = `books_authors`.`author_id`
                      WHERE books.id = '$id'";

        $res = mysqli_query($this->connection->getConnection(), $query);
        if (!$res) {
            return false;
        }
        $data = [];
        $all = mysqli_fetch_array($res, MYSQLI_ASSOC);
        $task = new Book();
        $task->setBook([
            'id' => $all['id'],
            'title' => $all['title'],
            'text' => $all['text'],
            'price' => $all['price']
        ]);
        $author = new Author();
        $author->setAuthor([
            'title' => $all['author_title']
        ]);
        $category = new Category();
        $category->setCategory([
            'title' => $all['category_title']
        ]);
        $data['bookById'] = $task->getBook();
        $data['author'] = $author->getAuthor();
        $data['category'] = $category->getCategory();

        return $data;
    }

    public function deleteById($id)
    {
        $query = "DELETE FROM `books_authors` WHERE `book_id` = '$id'";
        $res = mysqli_query($this->connection->getConnection(), $query);
        $query = "DELETE FROM `books_categories` WHERE `book_id` = '$id'";
        $res = mysqli_query($this->connection->getConnection(), $query);
        $query = "DELETE FROM `books` WHERE `id` = '$id'";
        $res = mysqli_query($this->connection->getConnection(), $query);
        return $res;

    }

    public function getAllByFilter($authors, $categories)
    {
        $query = "SELECT `books`.`id`, `books`.title, `books`.`description`, `books`.`price`, 
GROUP_CONCAT(DISTINCT `categories`.`title`) as `category_title`, 
GROUP_CONCAT(DISTINCT `authors`.`title`) as `author_title` 
FROM `books` 
LEFT JOIN `books_categories` ON `books_categories`.`book_id` = `books`.`id` 
LEFT JOIN `categories` ON `categories`.id = `books_categories`.`category_id` 
LEFT JOIN `books_authors` ON `books_authors`.`book_id` = `books`.`id` 
LEFT JOIN `authors` ON `authors`.id = `books_authors`.`author_id`";

        if (isset($authors) && !empty($authors) && isset($categories) && !empty($categories))
        {
            $query .= "WHERE authors.title = '$authors' AND categories.title = '$categories'" ;
        } elseif (isset($categories) && !empty($categories))
        {
            $query .= "WHERE categories.title = '$categories'";
        } elseif (isset($authors) && !empty($authors))
        {
            $query .= "WHERE authors.title = '$authors'";
        }

        $query .= "GROUP BY `books`.`id`";

//WHERE authors.title = '$authors' AND categories.title = '$categories'";

        $res = mysqli_query($this->connection->getConnection(), $query);
        if (!$res) {
            return false;
        }
        $data = [];
        for ($i = 0; $i < mysqli_num_rows($res); $i++) {
            $all = mysqli_fetch_array($res, MYSQLI_ASSOC);

            $task = new Book();
            $task->setBook([
                'id' => $all['id'],
                'title' => $all['title'],
                'description' => $all['description'],
                'price' => $all['price']
            ]);
            $author = new Author();
            $author->setAuthor([
                'title' => $all['author_title']
            ]);
            $category = new Category();
            $category->setCategory([
                'title' => $all['category_title']
            ]);
            $data[$i]['book'] = $task->getBook();
            $data[$i]['author'] = $author->getAuthor();
            $data[$i]['category'] = $category->getCategory();
        }
        return $data;
    }

}