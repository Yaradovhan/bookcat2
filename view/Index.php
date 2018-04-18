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
<h2>Main page</h2>

<form action="" method="get">
    <div>
        <div>
            <p>Choose author:</p>
            <p>
                <select name="authors">
                    <option value="">None</option>
                    <?php foreach ($allAuthors as $key => $author) { ?>
                        <option value="<?php echo $author['title']; ?>"><?php echo $author['title']; ?></option>
                    <?php } ?>
                </select>
            </p>
        </div>
        <div>
            <p>Choose category:</p>
            <p>
                <select name="categories">
                    <option value="">None</option>
                    <?php foreach ($allCategories as $key => $category) { ?>
                        <option value="<?php echo $category['title']; ?>"><?php echo $category['title']; ?></option>
                    <?php } ?>
                </select>
            </p>
        </div>
    </div>
    <p>
        <button>Submit</button>
    </p>
</form>

<table>
    <?php foreach ($allBooks as $book) : ?>
        <div>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Price</th>
                <th>Author(s)</th>
                <th>Category(ies)</th>
                <th>Read more</th>
            </tr>
        </div>
        <div>
            <tr>
                <td><?php echo $book['book']['title'] ?></td>
                <td><?php echo $book['book']['description'] ?></td>
                <td><?php echo $book['book']['price'] ?></td>
                <td><?php echo $book['author']['title'] ?></td>
                <td><?php echo $book['category']['title'] ?></td>
                <td><a href="?book=<?php echo $book['book']['id'] ?>">Read more >></a></td>
            </tr>
        </div>
    <?php endforeach; ?>
</table>

<? //= ConfigApp::dd($allBooks) ?>
</body>
</html>
