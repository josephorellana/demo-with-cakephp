<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand d-none d-md-block" href="#">Logo</a>

        <div class="dropdown d-md-none">
            <button class="btn btn-outline-light dropdown-toggle" type="button" id="sidebarMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                Menú
            </button>
            <ul class="dropdown-menu" aria-labelledby="sidebarMenuButton">
                <li>
                    <?= $this->Html->link(
                        '<i class="bi bi-house-fill"></i> Inicio', 
                        ['controller' => 'Users', 'action' => 'home'], 
                        ['class' => 'dropdown-item', 'escape' => false]
                        ) ?>
                </li>
                <?php if( $authUser['role']['name'] === 'ADMIN' ): ?>
                <li>
                    <?= $this->Html->link(
                        '<i class="bi bi-people-fill"></i> Usuarios', 
                        ['controller' => 'Users', 'action' => 'index'], 
                        ['class' => 'dropdown-item', 'escape' => false]
                        ) ?>
                </li>
                <li>
                    <?= $this->Html->link(
                        '<i class="bi bi-book-fill"></i> Cursos', 
                        ['controller' => 'Courses', 'action' => 'index'], 
                        ['class' => 'dropdown-item', 'escape' => false]
                        ) ?>
                </li>
                <?php endif; ?>
                <li>
                    <?= $this->Html->link(
                        '<i class="bi bi-person-fill"></i> Mis datos', 
                        ['controller' => 'Users', 'action' => 'view', $authUser['id']], 
                        ['class' => 'dropdown-item', 'escape' => false]
                        ) ?>
                </li>
            </ul>
        </div>

        <p class="mb-0 ms-auto me-3 text-end welcome-text">Hola <?= h($authUser['name']) ?></p>
        <?= $this->Html->link('Cerrar sesión', ['controller' => 'Auth', 'action' => 'logout'], ['class' => 'btn btn-outline-light']) ?>
    </div>
</nav>
