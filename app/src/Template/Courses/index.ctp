<section>
    <h1>Cursos</h1>
</section>

<section class="section" id="ajax-load">
    <div class="row" id="ajax-replace">
            <div class="card card-primary">
                <div class="card-header">

                    <div class="row">
                        <span class="col-8 text-start"><?= $this->Paginator->counter(['format' => __('Página {{page}} de {{pages}}, mostrando {{current}} de {{count}} registros.')]) ?></span>
                        <div class="col-4 text-end">
                        <?= $this->Html->link('<i class="bi bi-plus"></i> Agregar Curso', ['controller' => 'Courses', 'action' => 'add'], ['escape' => false, 'class' => 'btn btn-sm btn-success']) ?>
                        </div>
                    </div>
                </div>
                <div class="card-block">
                    <table cellpadding="0" cellspacing="0" class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('start_date') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('end_date') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('is_active') ?></th>
                                <th scope="col" class="actions"><?= __('Actions') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($courses as $course): ?>
                            <tr>
                                <td><?= h($course->name) ?></td>
                                <td><?= (!empty($course->start_date)) ? h($course->start_date) : '-' ?></td>
                                <td><?= (!empty($course->end_date)) ? h($course->end_date) : '-' ?></td>
                                <td><?= ($course->is_active) ? '<span class="badge text-bg-success">Activo</span>': '<span class="badge text-bg-secondary">Deshabilitado</span>' ?></td>
                                <td class="actions">
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
    </div>
</section>