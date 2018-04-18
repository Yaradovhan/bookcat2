<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $title ?></title>



</head>
<body>
<h2>Admin page</h2>
<nav>
    <ul>
        <a href="<?php echo ConfigApp::mainPath(); ?>">Home page</a>
    </ul>
    <ul>
        <a href="<?php echo ConfigApp::getBaseUrl();?>/index.php">Admin page</a>
    </ul>
</nav>

<?php
$host = $_SERVER['HTTP_HOST'];
$request = $_SERVER['REQUEST_URI'];
$actionAdd = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$host" . "/bookcat2/model/AddBook.php";
?>

<form action="<?php echo $actionAdd; ?>" method="post">
    <table>
        <div width="450px" id="form-wrapper">

            <tbody id="form-content">
            <tr>
                <td valign="top">
                    <label for="title">Book title</label>
                </td>
                <td valign="top">
                    <input class="inp" type="text" name="book[title]" required>
                </td>
            </tr>
            <tr>
                <td valign="top">
                    <label for="description">Book description</label>
                </td>
                <td valign="top">
                    <input class="inp" type="text" name="book[description]" required>
                </td>
            </tr>
            <tr>
                <td valign="top">
                    <label for="text">Book text</label>
                </td>
                <td valign="top">
                    <textarea class="inp" name="book[text]" required></textarea>
                </td>
            </tr>
            <tr>
                <td valign="top">
                    <label for="price">Book price</label>
                </td>
                <td valign="top">
                    <input class="inp" type="text" name="book[price]" required>
                </td>
            </tr>
            <tr>
                <td valign="top">
                    <label for="author">Author</label>
                </td>
                <td>
                    <select name="author[id]">
                        <?php foreach ($allAuthors as $key => $author) { ?>
                            <option value="<?php echo $author['id']; ?>"><?php echo $author['title']; ?></option>
                        <?php } ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td valign="top">
                    <label for="category">Category</label>
                </td>
                <td>
                    <select name="category[id]">
                        <?php foreach ($allCategories as $key => $category) { ?>
                            <option value="<?php echo $category['id']; ?>"><?php echo $category['title']; ?></option>
                        <?php } ?>
                    </select>
                </td>
            </tr>

            </tbody>
        </div>
        <tr>
            <td colspan="2" style="text-align:left">
                <input type="submit" value="Add Book">
            </td>
        </tr>
    </table>
</form>
</body>
</html>
