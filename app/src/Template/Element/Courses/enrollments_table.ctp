<?php if (!empty($course->enrollments)): ?>
    <table class="table table-hover table-striped">
        <tr>
            <th scope="col">Nombre</th>
            <th scope="col">Apellido paterno</th>
            <th scope="col">Apellido materno</th>
            <?php if( $authUser['role']['name'] === 'ADMIN' ): ?>
                <th scope="col" class="actions">Acciones</th>
            <?php endif; ?>
        </tr>
        <?php foreach ($course->enrollments as $enrollment): ?>
        <tr>
            <td><?= h($enrollment->user->name) ?></td>
            <td><?= h($enrollment->user->paternal_last_name) ?></td>
            <td><?= h($enrollment->user->maternal_last_name) ?></td>
            <?php if( $authUser['role']['name'] === 'ADMIN' ): ?>
                <td class="actions">
                    <?= $this->Html->link(
                        '<i class="bi bi-eye"></i>',
                        ['controller' => 'Users', 'action' => 'view', $enrollment->user->id],
                        ['class' => 'btn btn-sm btn-primary', 'title' => 'Ver', 'escape' => false]
                        ) ?>
                    <?= $this->Form->postLink(
                        '<i class="bi bi-trash"></i>', 
                        ['controller' => 'Courses', 'action' => 'deleteEnrollment', 'userId' => $enrollment->user->id, 'courseId' => $course->id], 
                        ['confirm' => __('¿Está seguro que desa quitar a {0} {1} de este curso?', $enrollment->user->name, $enrollment->user->paternal_last_name), 'class' => 'btn btn-sm btn-danger', 'title' => 'Eliminar', 'escape' => false]
                        ) ?>
                </td>
            <?php endif; ?>
        </tr>
        <?php endforeach; ?>
    </table>
<?php endif; ?>