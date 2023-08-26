<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- header ჩასვი -->
    <?php
    //see where to go.
    $action = isset($_GET['sa']) ? $_GET['sa'] : 'user'; //if su means go to etc. submit.php, otherwise user.php
    include 'pages/'.$action.'.php';
    ?>
    <!-- footer ჩასვი -->
</body>
</html>