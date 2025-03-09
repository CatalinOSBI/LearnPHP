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
                echo $i . '|';
            }
        }
    }
    ?>

    <!-- Basic Function -->

    <form action="phpmenu.php" method="post">
        <label for="firstValue">First Value:</label>
        <input type="number" name="firstValue" id="firstValue">
        <label for="secondValue">Second Value:</label>
        <input type="number" name="secondValue" id="SecondValue">
        <button type="submit" name="addSubmit">Add</button>
    </form>

    <?php
    function addFunction($a, $b)
    {
        $result = $a + $b;
        echo $result;
    }

    if (isset($_POST['addSubmit'])) {
        if (!empty($_POST['firstValue'] || !empty($_POST['secondValue']))) {
            addFunction($_POST['firstValue'], $_POST['secondValue']);
        }
    }
    ?>

            <!-- Basic Sanitization -->

    <form action="phpmenu.php" method="post">
        <label for="sanExample">(Sanitised) Print:</label>
        <input name="sanExample" type="text" placeholder='<script>alert("test")</script>' id="sanExample">
        <button type="submit" name="sanSubmit">Echo (Sanitised)</button>
    </form>

    <?php

    if (isset($_POST["sanSubmit"])) {
        $sanText = $_POST['sanExample'];
        $sanitisedText = htmlspecialchars($sanText);
        $sanitisedText2 = strip_tags($sanText);

        echo '(1) '. $sanitisedText . '<br>';
        echo '(2) '. $sanitisedText2;
    }
    ?>

        <!-- Basic Validation -->

    <form action="phpmenu.php" method="post">
        <label for="valExample">(Validated) Print:</label>
        <input name="valExample" type="text" placeholder="example@gmail.com" id="valExample">
        <button type="submit" name="valSubmit">Echo (Validated)</button>
    </form>

    <?php
        if (isset($_POST['valSubmit'])) {
            if (!empty($_POST['valExample'])) {
                if (filter_var($_POST['valExample'],FILTER_VALIDATE_EMAIL)) {
                    $result = $_POST['valExample'];
                    echo $result . ' is a valid email';
                } else {   
                    echo 'email not valid';
                }
            }
        } 

    ?>

            <!-- Basic Class -->

    <form action="phpmenu.php" method="post">
        <label>Dog Class</label>
        <button type="submit" name="classSubmit">Echo Class</button>
    </form>

    <?php
    class Dog
    {
        private $breed;
        private $name;
        private $size;
        private $weight;

        public function __construct($breed, $name, $size, $weight) {
            $this->breed = $breed;
            $this->name = $name;
            $this->size = $size;
            $this->weight = $weight;
        }

        public function echoDog()
        {
            return 'Breed| '. $this->breed . '<br>'.
                   'Name| '. $this->name . '<br>'.
                   'Size| '. $this->size . '<br>'.
                   'Weight| '. $this->weight;
        }
    } 

    $rotweiller = new Dog('Rotweiller', 'Spike', 'Large', '50kg');

    if (isset($_POST['classSubmit'])) {
        echo $rotweiller->echoDog();
    }

    ?>

    

</body>

</html>