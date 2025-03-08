<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="menu.css">
</head>

<body>

    <!-- Simple Print -->

    <form action="phpmenu.php" method="post">
        <label for="printExample">Print:</label>
        <input name="printExample" type="text" id="printExample">
        <button type="submit" name="printSubmit">Echo</button>
    </form>

    <?php

    if (isset($_POST["printSubmit"])) {
        $text = $_POST['printExample'];
        echo $text;
    }
    ?>

        <!-- Loop Counter -->

    <form action="phpmenu.php" method="post">
        <label for="maxCount">Loop Counter:</label>
        <input id='maxCount' type="number" name="maxCount" placeholder="Number to count to">
        <button type="submit" name="countSubmit">Count</button>
    </form>

    <?php
    if (isset($_POST["countSubmit"])) {
        if (!empty($_POST['maxCount'])) {
            $maxCount = $_POST['maxCount'];

            for ($i = 0; $i <= $maxCount; $i++) {
                echo $i .'|';
            }
        }
    }
    ?>

</body>

</html>