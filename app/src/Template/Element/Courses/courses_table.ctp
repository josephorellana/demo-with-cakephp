<div class="card card-primary">
    <div class="card-header">

        <div class="row">
        <span class="col-8 text-start">
                <?php if( !empty($this->Paginator->params()) ): ?>
                    <?= $this->Paginator->counter(['format' => __('Página {{page}} de {{pages}}, mostrando {{current}} de {{count}} registros.')]) ?>
                <?php else: ?>
                    Mostrando <?= h($totalCourses) ?> registros
                <?php endif; ?>
            </span>
        <div class="col-4 text-end">
            <?= $this->Html->link('<i class="bi bi-plus"></i> Agregar Curso', ['controller' => 'Courses', 'action' => 'add'], ['escape' => false, 'class' => 'btn btn-sm btn-success']) ?>
            </div>
        </div>
    </div>
    <div class="card-block">
        <table cellpadding="0" cellspacing="0" class="table table-striped">
            <thead>
                <tr class="row">
                    <th scope="col" class="text-center col"><?= $this->Paginator->sort('name', 'Curso') ?></th>
                    <th scope="col" class="text-center col"><?= $this->Paginator->sort('start_date', 'Fecha de inicio') ?></th>
                    <th scope="col" class="text-center col"><?= $this->Paginator->sort('end_date', 'Fecha de término') ?></th>
                    <th scope="col" class="text-center col-sm-3"><?= $this->Paginator->sort('is_enabled', 'Habilitado') ?></th>
                    <th scope="col" class="actions text-center col-sm-2">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($courses as $course): ?>
                <tr class="row">
                    <td class="col"><?= h($course->name) ?></td>
                    <td class="text-center col"><?= (!empty($course->start_date)) ? date('d-m-Y', strtotime($course->start_date)) : '-' ?></td>
                    <td class="text-center col"><?= (!empty($course->end_date)) ? date('d-m-Y', strtotime($course->end_date)) : '-' ?></td>
                    <td class="text-center col-sm-3"><?= ($course->is_enabled) ? '<span class="badge text-bg-success">Habilitado</span>': '<span class="badge text-bg-secondary">Deshabilitado</span>' ?></td>
                    <td class="actions text-center col-sm-2">
                        <?= $this->Html->link(
                            '<i class="bi bi-eye"></i>',
                            ['action' => 'view', $course->id],
                            ['class' => 'btn btn-sm btn-primary', 'title' => 'Ver', 'escape' => false]
                            ) ?>
                        <?= $this->Html->link(
                            '<i class="bi bi-pencil-square"></i>',
                            ['action' => 'edit', $course->id],
                            ['class' => 'btn btn-sm btn-warning', 'title' => 'Editar', 'escape' => false]
                            ) ?>
                        <?= $this->Form->postLink(
                            '<i class="bi bi-trash"></i>', 
                            ['action' => 'delete', $course->id], 
                            ['confirm' => __('Estás seguro que deseas eliminar el curso {0}?', $course->name), 'class' => 'btn btn-sm btn-danger', 'title' => 'Eliminar', 'escape' => false]
                            ) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<?= $this->element('pagination') ?>