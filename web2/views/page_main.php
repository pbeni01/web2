<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Beadando</title>
        <link rel="stylesheet" type="text/css" href="<?php echo SITE_ROOT?>css/main_style.css">
        <?php if($viewData['style']) echo '<link rel="stylesheet" type="text/css" href="'.$viewData['style'].'">'; ?>
    </head>
    <body>
        <header>
            <div id="user">
<?php if (isset($_SESSION['userfirstname']) && !empty($_SESSION['userfirstname'])): ?>
    Bejelentkezett: <?php echo $_SESSION['userlastname'] . ' ' . $_SESSION['userfirstname'] . ' (' . $_SESSION['username'] . ')'; ?>
<?php endif; ?>

            </div>
            <h1 class="header">Web-beadando</h1>
        </header>
        <nav>
            <?php echo Menu::getMenu($viewData['selectedItems']); ?>
        </nav>
        <section>
            <?php if($viewData['render']) include($viewData['render']); ?>
        </section>
    </body>
</html>
