<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $title ?></title>

    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>

</head>
<body>
<h2>Admin page</h2>
<nav>
    <ul>
        <a href="<?php echo ConfigApp::mainPath();?>">Home page</a>
    </ul>
</nav>
<?php
$host = $_SERVER['HTTP_HOST'];
$request = $_SERVER['REQUEST_URI'];
$actionEdit = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$host" . "/bookcat2/admin/edit.php";
?>

<ul>
    <a href="<?php echo $_SERVER['REQUEST_URI']; ?>?add"><button>Add Book</button></a>
</ul>

<table>
    <?php foreach ($allBooks as $book) : ?>
        <form action="<?php echo $actionEdit; ?>" method="post">
            <input type="hidden" name="book[id]" value="<?php echo $book['book']['id'] ?>">
            <div>
                <h5>Title: </h5>
                <textarea name="book[title]" cols="" rows=""><?php echo $book['book']['title']; ?></textarea>
                <h5>Description: </h5>
                <textarea name="book[description]" cols="13"
                          rows="3"><?php echo $book['book']['description']; ?></textarea>
                <h5>Price: </h5><textarea name="book[price]" cols="13"
                                          rows="3"><?php echo $book['book']['price']; ?></textarea>
                <p>
                    <select name="author">
                        <?php foreach ($allAuthors as $author) : ?>
                        <?php ConfigApp::dd($author);?>
                            <option value="<?php echo $author['id']?> " <?php if($author['id'] == $book['book']['id']){?>selected<?php }?>><?php echo $author['title'];?></option>
                        <?php endforeach; ?>
                    </select>
                </p>

                <p>
                    <select name="category">
                        <?php foreach ($allCategories as $category) : ?>
                            <option value="<?php echo $category['id']; ?>" <?php if($category['id'] == $book['book']['id']){?>selected<?php }?>><?php echo $category['title'];?></option>
                        <?php endforeach; ?>
                    </select>
                </p>

                <p>
                    <button>Edit Book</button>
                </p>
            </div>
        </form>
        <p>
            <a href="?delete=<?php echo $book['book']['id'];?>"><button>Delete book</button></a>
        </p>
        <hr>
    <?php endforeach; ?>
</table>
</body>
</html>