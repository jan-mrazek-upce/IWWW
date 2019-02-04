
<div id="header-web-title">Honza tech tips</div>

<nav id="headnav">
    <a href="<?= BASE_URL ?>">Home</a>

    <?php if (Authentication::getInstance()->hasIdentity()) : ?>
        <?php if (Authentication::getInstance()->getIdentity()["role"] == 1) : ?>
            <a href="<?= BASE_URL . "?page=users" ?>">Read all user</a>
        <?php endif; ?>
        <a class="logout" href="<?= BASE_URL . "?page=logout" ?>">Logout</a>
    <?php else : ?>
        <a class="login" href="<?= BASE_URL . "?page=login" ?>">Login</a>
    <?php endif; ?>

</nav>




