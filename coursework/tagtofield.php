<form action="" class="form-add" method="post">
    <div class="add">
        <label for="tag">Хэштег</label>
        <input type="text" name="tag" id="tag">
        <label for="field">Область знаний</label>
        <input type="text" name="field" id="field">
        <button type="submit" class="submit">Добавить связь</button>
    </div>
</form>

<?php
include 'connect.php';

if (!empty($_POST)) {
    // Получаем введенные данные из формы
    $tag = $_POST["tag"];
    $field = $_POST["field"];

    // Проверяем, существует ли уже такой хэштег и область знаний
    $tagResult = $conn->query("SELECT * FROM hashtag WHERE name = '$tag'");
    $fieldResult = $conn->query("SELECT * FROM field WHERE name = '$field'");

    if ($tagResult->num_rows == 0 || $fieldResult->num_rows == 0) {
        // Если такого хэштега или области знаний нет, выводим сообщение об ошибке
        echo "Такой хэштег или область знаний не существует.";
    } else {
        // Получаем ID хэштега и области знаний
        $tagRow = $tagResult->fetch_assoc();
        $tagId = $tagRow["id"];

        $fieldRow = $fieldResult->fetch_assoc();
        $fieldId = $fieldRow["id"];

        // Проверяем, существует ли уже связь между хэштегом и областью знаний
        $linkResult = $conn->query("SELECT * FROM tagtofield WHERE id_tag = '$tagId' AND id_field = '$fieldId'");

        if ($linkResult->num_rows > 0) {
            // Если связь уже существует, выводим сообщение об ошибке
            echo "Данная связь уже существует.";
        } else {
            // Добавляем связь между хэштегом и областью знаний в таблицу tagtofield
            $sql = "INSERT INTO tagtofield (id_tag, id_field) VALUES ('$tagId', '$fieldId')";
            if ($conn->query($sql) === TRUE) {
                echo "Связь добавлена успешно!";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    }

    // Закрываем соединение с базой данных
    $conn->close();
}
?>
