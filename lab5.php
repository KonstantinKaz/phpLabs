<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Лабораторная работа 5</title>
    <link rel="stylesheet" href="css/my-reset.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php require "blocks/header.php" ?>
    <?php
    function isnum($x)
    {
        if (!$x)
            return false;
        if (is_string($x) && ($x[0] == '.' || $x[0] == '0'))
            return false;
        if (is_string($x) && $x[strlen($x) - 1] == '.')
            return false;

        for ($i = 0, $point_count = false; $i < strlen($x); $i++) {
            if (
                is_string($x) &&
                $x[$i] != '0' && $x[$i] != '1' && $x[$i] != '2' && $x[$i] != '3' &&
                $x[$i] != '4' && $x[$i] != '5' && $x[$i] != '6' && $x[$i] != '7' &&
                $x[$i] != '8' && $x[$i] != '9' && $x[$i] != '.'
            )
                return false;
            if (is_string($x) && $x[$i] == '.') {
                if ($point_count)
                    return false;
                else
                    $point_count = true;
            }
        }
        return true;
    }
    function calculate($val)
    {
        if (!$val)
            return 'Выражение не задано!';
        if (isnum($val))
            return $val;
        $args = explode('+', $val);

        if (count($args) > 1) {
            $sum = 0;
            for ($i = 0; $i < count($args); $i++) {
                $arg = calculate($args[$i]);
                if (!isnum($arg))
                    return $arg;
                $sum += $arg;
            }
            return $sum;
        }
        $args = explode('-', $val);
        if (count($args) > 1) {
            $razn = calculate($args[0]);
            for ($i = 1; $i < count($args); $i++) {
                $arg = calculate($args[$i]);
                if (!isnum($arg))
                    return $arg;
                $razn -= $arg;
            }
            return $razn;
        }

        $args = explode('*', $val);
        if (count($args) > 1) {
            $sup = 1;
            for ($i = 0; $i < count($args); $i++) {
                $arg = calculate($args[$i]);

                if (!isnum($arg))
                    return 'Неправильная форма числа!';
                $sup *= $arg;
            }
            return $sup;
        }
        $args = explode('/', $val);
        if (count($args) > 1) {
            $del = calculate($args[0]);
            for ($i = 1; $i < count($args); $i++) {
                $arg = calculate($args[$i]);

                if (!isnum($arg))
                    return 'Неправильная форма числа!(деление)';
                $del /= $arg;
            }
            return $del;
        }
        return 'Недопустимые символы в выражении';
    }
        function SqValidator($val)
        {
            $open = 0;
            for ($i = 0; $i < strlen($val); $i++) {
                if ($val[$i] == '(')
                    $open++;
                else
                    if ($val[$i] == ')') {
                        $open--;
                        if ($open < 0)
                            return false;
                    }
            }
            if ($open !== 0)
                return false;
            return true;
        }

    

    function calculateSq($expression) { 
        if (!SqValidator($expression)) 
            return 'Неправильная расстановка скобок'; 
        while (strpos($expression, '(') !== false) {  
            $open = strrpos($expression, '(');  
            $close = strpos($expression, ')', $open);  
            // if ($close === false) { 
            // return 'Неправильная расстановка скобок'; 
            // } 
            $inside = substr($expression, $open + 1, $close - $open - 1);  
            $resultInside = calculate($inside);  
            $expression = substr_replace($expression, $resultInside, $open, $close - $open + 1);  
        } 
    
        if(strpos($expression, '(') === false && strpos($expression, ')') === false) { 
            return calculate($expression); 
        } 
    }
    ?>

    <main>
        <form action="" method="POST">
            <div class="calculator">
                <input type="text" placeholder="0" class="result input" name="equatation">
                <p class="result output">
                    <?php
                    if (!empty($_POST)) {
                        $equatation = $_POST['equatation'];
                        echo calculateSq($equatation);
                    }
                    ?>
                </p>

                <button type="button" class="calculator-key bracket1" value="(">&#40;</button>
                <button type="button" class="calculator-key bracket2" value=")">&#41;</button>
                <button type="button" class="calculator-key" value="AC">AC</button>
                <button type="button" class="calculator-key" value="C">C</button>

                <button type="button" class="calculator-key" value="7">7</button>
                <button type="button" class="calculator-key" value="8">8</button>
                <button type="button" class="calculator-key" value="9">9</button>
                <button type="button" class="calculator-key" value="+">+</button>

                <button type="button" class="calculator-key" value="4">4</button>
                <button type="button" class="calculator-key" value="5">5</button>
                <button type="button" class="calculator-key" value="6">6</button>
                <button type="button" class="calculator-key" value="-">-</button>

                <button type="button" class="calculator-key" value="1">1</button>
                <button type="button" class="calculator-key" value="2">2</button>
                <button type="button" class="calculator-key" value="3">3</button>
                <button type="button" class="calculator-key" value="*">&times;</button>

                <button type="button" class="calculator-key" value="0">0</button>
                <button type="button" class="calculator-key" value=".">.</button>
                <button type="button" class="calculator-key" value="/">&divide;</button>
                <button type="submit" class="calculator-key" value="=">=</button>

            </div>
        </form>
    </main>

    <?php require "blocks/footer.php" ?>
    <script type="text/javascript" src="lab5.js"></script>
</body>

</html>