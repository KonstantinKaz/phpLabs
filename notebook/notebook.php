<?php
$active_menu = 'home';
$menu_items = array(
    'home' => 'Главная',
    'create' => 'Создать',
    'delete' => 'Удалить',
    'update' => 'Обновить'
);
?>
<ul>
<?php foreach ($menu_items as $page => $title) { ?>
    <li <?php if ($page == $active_menu) { echo 'class="active"'; } ?>>
        <a href="?page=<?php echo $page; ?>"><?php echo $title; ?></a>
    </li>
<?php } ?>
</ul>
<?php
if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 'home';
}

switch ($page) {
    case 'home':
        include 'home.php';
        break;
    case 'create':
        include 'create.php';
        break;
    case 'delete':
        include 'delete.php';
        break;
    case 'update':
        include 'update.php';
        break;
}
?>
