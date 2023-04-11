<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Лабораторная работа 4</title>
    <link rel="stylesheet" href="css/my_rest.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php require "blocks/header.php" ?>


    <section class="examples-section" id="examples">
        <div class="container">
            <h2 class="container__heading">Введите уравнение типа a + b = c</h2>
            <form action="" method="POST">
                <input type="text" name="equation" class="input" placeholder="a + b = c">
                <button type="submit" class="get-answer">Посчитать</button>
            </form>


            <div>
                <p class="answer">
                <?php

                if (!empty($_POST)) {
                    $str = $_POST['equation'];
                    $str = str_replace(' ', '', $str);
                    $str = strtolower($str);
                    $arr_equation = explode('=', $str);
                    $result = $arr_equation[1];
                    if (strpos($arr_equation[0], '+') !== false) {
                        $operand = '+';
                    }
                    if (strpos($arr_equation[0], '-') !== false) {
                        $operand = '-';
                    }
                    if (strpos($arr_equation[0], '*') !== false) {
                        $operand = '*';
                    }
                    if (strpos($arr_equation[0], '/') !== false) {
                        $operand = '/';
                    }

                    // equatation split
                    if ($operand == '+') {
                        $equatation = explode('+', $arr_equation[0]);
                    }
                    if ($operand == '-') {
                        $equatation = explode('-', $arr_equation[0]);
                    }
                    if ($operand == '*') {
                        $equatation = explode('*', $arr_equation[0]);
                    }
                    if ($operand == '/') {
                        $equatation = explode('/', $arr_equation[0]);
                    }

                    // counting
                    if ($operand == '+') {
                        if ($equatation[0] == 'x') {
                            $x = (int)$result - (int)$equatation[1];
                        } elseif ($equatation[1] == 'x') {
                            $x = (int)$result - (int)$equatation[0];
                        } elseif($result == 'x') {
                            $x = (int)$equatation[0] + (int)$equatation[1];
                        }
                    } elseif ($operand == '-') {
                        if ($equatation[0] == 'x') {
                            $x = (int)$result + (int)$equatation[1];
                        } elseif ($equatation[1] == 'x') {
                            $x = (int)$equatation[0] - (int)$result;
                        } elseif($result == 'x') {
                            $x = (int)$equatation[0] - (int)$equatation[1];
                        }
                    } elseif ($operand == '*') {
                        if ($equatation[0] == 'x') {
                            $x = (int)$result / (int)$equatation[1];
                        } elseif ($equatation[1] == 'x') {
                            $x = (int)$result / (int)$equatation[0];
                        } elseif($result == 'x') {
                            $x = (int)$equatation[0] * (int)$equatation[1];
                        }
                    } elseif ($operand =='/') {
                        if ($equatation[0] == 'x') {
                            $x = (int)$result * (int)$equatation[1];
                        } elseif ($equatation[1] == 'x') {
                            $x = (int)$equatation[0] / (int)$result;
                        } elseif($result == 'x') {
                            $x = (int)$equatation[0] / (int)$equatation[1];
                        }
                    }
               
                    echo $x;
                }
                ?>
                </p>
            </div>
        </div>
    </section>
    <?php require "blocks/footer.php" ?>
</body>

</html>