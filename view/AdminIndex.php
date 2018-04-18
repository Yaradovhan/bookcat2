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

<?php
$host = $_SERVER['HTTP_HOST'];
$request = $_SERVER['REQUEST_URI'];
$actionEdit = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$host" . "/bookcat2/admin/edit.php";
?>

<table>
    <?php foreach ($allBooks as $book) : ?>
    <form class="message" action="<?php echo $actionEdit; ?>" method="post">
        <input type="hidden" name="book[id]" value="<?php echo $book['book']['id'] ?>">
        <div>
 <h5>Title: </h5>
            <textarea name="" id="" cols="13" rows="3">
                <?php echo nl2br(htmlspecialchars($book['book']['title'])); ?>
            </textarea>
 <h5>Description: </h5>
            <textarea name="" id="" cols="13" rows="3">
                <?php echo nl2br(htmlspecialchars($book['book']['description'])); ?>
            </textarea>
 <h5>Price: </h5>
            <textarea name="" id="" cols="13" rows="3">
                <?php echo nl2br(htmlspecialchars($book['book']['price'])); ?>
            </textarea>
            <p>
                <select name="authors">
                    <?php foreach ($allAuthors as $key => $author) { ?>
                        <option value="<?php echo $author['title']; ?>"><?php echo $author['title']; ?></option>
                    <?php } ?>
                </select>
            </p>

            <p>
            <select name="categories">
                <?php foreach ($allCategories as $key => $category) { ?>
                    <option value="<?php echo $category['title']; ?>"><?php echo $category['title']; ?></option>
                <?php } ?>
            </select>
            </p>

            <p><button>Edit Book</button></p>
        <hr>
        </div>
    </form>
    <?php endforeach; ?>
</table>

<? //= ConfigApp::dd($allBooks) ?>
</body>
</html>
