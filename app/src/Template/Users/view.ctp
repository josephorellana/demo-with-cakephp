<section>
    <h1>Detalles de usuario</h1>
</section>

<section>
<h3><?= h($user->name) . ' ' . h($user->paternal_last_name) ?></h3>
    <table class="table table-hover table-striped">
        <tr>
            <th scope="row">Nombre</th>
            <td><?= h($user->name) ?></td>
        </tr>
        <tr>
            <th scope="row">Apellido paterno</th>
            <td><?= h($user->paternal_last_name) ?></td>
        </tr>
        <tr>
            <th scope="row">Apellido materno</th>
            <td><?= h($user->maternal_last_name) ?></td>
        </tr>
        <tr>
            <th scope="row">Correo electrónico</th>
            <td><?= h($user->email) ?></td>
        </tr>
        <tr>
            <th scope="row">Rol</th>
            <td><?= $user->has('role') ? $this->Html->link($user->role->name, ['controller' => 'Roles', 'action' => 'view', $user->role->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row">Usuario activo</th>
            <td><?= ($user->is_active) ? '<span class="badge text-bg-success">Activo</span>': '<span class="badge text-bg-secondary">Deshabilitado</span>' ?></td>
        </tr>
    </table>
    <div class="related">
        <h4>Cursos inscritos</h4>
        <?php if (!empty($user->enrollments)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Create At') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Course Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->enrollments as $enrollments): ?>
            <tr>
                <td><?= h($enrollments->id) ?></td>
                <td><?= h($enrollments->create_at) ?></td>
                <td><?= h($enrollments->user_id) ?></td>
                <td><?= h($enrollments->course_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Enrollments', 'action' => 'view', $enrollments->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Enrollments', 'action' => 'edit', $enrollments->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Enrollments', 'action' => 'delete', $enrollments->id], ['confirm' => __('Are you sure you want to delete # {0}?', $enrollments->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</section>
