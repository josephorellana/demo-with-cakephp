<?php if (!empty($user->enrollments)): ?>
    <table class="table table-hover table-striped">
        <tr>
            <th scope="col">Curso</th>
            <?php if( $authUser['role']['name'] === 'ADMIN' ): ?>
                <th scope="col" class="actions text-center">Acciones</th>
            <?php endif; ?>
        </tr>
        <?php foreach ($user->enrollments as $enrollment): ?>
        <tr>
            <td><?= h($enrollment->course->name) ?></td>
            <?php if( $authUser['role']['name'] === 'ADMIN' ): ?>
                <td class="actions text-center">
                <?= $this->Html->link(
                    '<i class="bi bi-eye"></i>',
                    ['controller' => 'Courses', 'action' => 'view', $enrollment->course->id],
                    ['class' => 'btn btn-sm btn-primary', 'title' => 'Ver', 'escape' => false]
                    ) ?>
                <?= $this->Form->postLink(
                    '<i class="bi bi-trash"></i>', 
                    ['controller' => 'Courses', 'action' => 'deleteEnrollment', 'userId' => $user->id, 'courseId' => $enrollment->course->id, 'fromUser' => true], 
                    ['confirm' => __('¿Está seguro que desa quitar el curso {0}?', $enrollment->course->name), 'class' => 'btn btn-sm btn-danger', 'title' => 'Eliminar', 'escape' => false]
                    ) ?>
                </td>
            <?php endif; ?>
        </tr>
        <?php endforeach; ?>
    </table>
<?php endif; ?>