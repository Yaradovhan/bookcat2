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
<h2>Book page</h2>
<table>
        <tr>
            <th>Title</th>
            <th>Text</th>
            <th>Price</th>
            <th>Author(s)</th>
            <th>Category(ies)</th>
        </tr>
        <tr>
            <td><?php echo $bookById['bookById']['title'] ?></td>
            <td><?php echo $bookById['bookById']['text'] ?></td>
            <td><?php echo $bookById['bookById']['price'] ?></td>
            <td><?php echo $bookById['author']['title'] ?></td>
            <td><?php echo $bookById['category']['title'] ?></td>
        </tr>
</table>

<h2>Заказать книгу</h2>
<form action="contact.php" method="post">
    Ваш адрес:<br>
    <input type="text" name="cf_address"><br>
    Ф.И.О.<br>
    <input type="text" name="cf_fio"><br>
    Количество книг<br>
    <input type="text" name="cf_count"><br>
    <input type="hidden" name="cf_id" value="<?php echo $bookById['bookById']['id'] ?>"><br>
    <input type="submit" value="Заказать">
    <input type="reset" value="Очистить">
</form>

<?//= ConfigApp::dd($bookById) ?>
</body>
</html>
