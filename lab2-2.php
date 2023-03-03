<!doctype html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" href="css/my_reset.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body class="body">
    <?php
    include('blocks/header.php');
    ?>

    <main class='lab2 get-headers'>
        <div class='get-headers__wrapper container'>
            <h2 class='get-headers__title'>Get headers</h2>
            <label>
                <textarea name="getHeaders" cols="60" rows="30">
                        <?php
                        print_r(get_headers("http://htmlbook.ru/practical/tekst-dlya-galochki"));
                        ?>
                    </textarea>
            </label>
        </div>
    </main>

    <footer class="footer">
        <?php
        include('blocks/footer.php');
        ?>
    </footer>

</body>

</html>