<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $bil = 15;
    while ($bil <= 100) {
        if ($bil % 10 == 0) echo $bil. "<br />";
        $bil++;
    }
    ?>
</body>
</html>