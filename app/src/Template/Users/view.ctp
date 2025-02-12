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
    <hr>
    <div class="related">
        <h4>Cursos inscritos</h4>
        <div class="dropdown mb-3">
            <input type="text" id="course-search" class="form-control" placeholder="Inscribir en curso: Ingrese nombre del curso" autocomplete="off">
            <ul class="dropdown-menu w-100" id="course-search-result"></ul>
        </div>

        <?php if (!empty($user->enrollments)): ?>
        <table class="table table-hover table-striped">
            <tr>
                <th scope="col">Curso</th>
                <th scope="col" class="actions">Acciones</th>
            </tr>
            <?php foreach ($user->enrollments as $enrollment): ?>
            <tr>
                <td><?= h($enrollment->course->name) ?></td>
                <td class="actions">
                <?= $this->Html->link(
                    '<i class="bi bi-eye"></i>',
                    ['controller' => 'Course', 'action' => 'view', $enrollment->course->id],
                    ['class' => 'btn btn-sm btn-primary', 'title' => 'Ver', 'escape' => false]
                    ) ?>
                <?= $this->Form->postLink(
                    '<i class="bi bi-trash"></i>', 
                    ['controller' => 'Courses', 'action' => 'deleteEnrollment', 'userId' => $user->id, 'courseId' => $enrollment->course->id], 
                    ['confirm' => __('¿Está seguro que desa quitar el curso {0}?', $enrollment->course->name), 'class' => 'btn btn-sm btn-danger', 'title' => 'Eliminar', 'escape' => false]
                    ) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</section>
