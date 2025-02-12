<div class="collapse d-md-block" id="sidebar">
    <ul class="nav flex-column">
        <li class="nav-item">
            <i class="bi bi-house-fill"></i> <?= $this->Html->link('Inicio', ['controller' => 'Users', 'action' => 'home']) ?>
        </li>
        <?php if( $authUser['role']['name'] === 'ADMIN' ): ?>
        <li class="nav-item">
            <i class="bi bi-people-fill"></i> <?= $this->Html->link('Usuarios', ['controller' => 'Users', 'action' => 'index']) ?>
        </li>
        <li class="nav-item">
            <i class="bi bi-book-fill"></i> <?= $this->Html->link('Cursos', ['controller' => 'Courses', 'action' => 'index']) ?>
        </li>
        <?php endif; ?>
        <li class="nav-item">
            <i class="bi bi-person-fill"></i> <?= $this->Html->link('Mis datos', ['controller' => 'Users', 'action' => 'view', $authUser['id']]) ?>
        </li>
    </ul>
</div>