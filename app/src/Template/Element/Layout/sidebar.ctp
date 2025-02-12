<div class="collapse d-md-block sidebar bg-light text-dark p-3" id="sidebar">
    <ul class="nav flex-column">
        <li class="nav-item">
            <?= $this->Html->link('<i class="bi bi-house-fill"></i> Inicio', 
                ['controller' => 'Users', 'action' => 'home'], 
                ['class' => 'nav-link text-dark', 'escape' => false]) ?>
        </li>
        <?php if( $authUser['role']['name'] === 'ADMIN' ): ?>
        <li class="nav-item">
            <?= $this->Html->link('<i class="bi bi-people-fill"></i> Usuarios', 
                ['controller' => 'Users', 'action' => 'index'], 
                ['class' => 'nav-link text-dark', 'escape' => false]) ?>
        </li>
        <li class="nav-item">
            <?= $this->Html->link('<i class="bi bi-book-fill"></i> Cursos', 
                ['controller' => 'Courses', 'action' => 'index'], 
                ['class' => 'nav-link text-dark', 'escape' => false]) ?>
        </li>
        <?php endif; ?>
        <li class="nav-item">
            <?= $this->Html->link('<i class="bi bi-person-fill"></i> Mis datos', 
                ['controller' => 'Users', 'action' => 'view', $authUser['id']], 
                ['class' => 'nav-link text-dark', 'escape' => false]) ?>
        </li>
    </ul>
</div>
