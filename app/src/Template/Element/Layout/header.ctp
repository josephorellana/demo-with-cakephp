<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Logo</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu">
            <span class="navbar-toggler-icon"></span>
        </button>
        <p class="mb-0 ms-auto me-3 text-end welcome-text">Hola <?= h($authUser['name']) ?></p>
        <?= $this->Html->link('Cerrar sesión', ['controller' => 'Auth', 'action' => 'logout'], ['class' => 'btn btn-outline-light']) ?>
    </div>
</nav>