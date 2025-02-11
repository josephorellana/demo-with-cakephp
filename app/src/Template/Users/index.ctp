<section>
    <h1>Usuarios</h1>
</section>

<section class="section" id="ajax-load">
    <div class="row" id="ajax-replace">
            <div class="card card-primary">
                <div class="card-header">

                    <div class="row">
                        <span class="col-8 text-start"><?= $this->Paginator->counter(['format' => __('Página {{page}} de {{pages}}, mostrando {{current}} de {{count}} registros.')]) ?></span>
                        <div class="col-4 text-end">
                        <?= $this->Html->link('<i class="bi bi-plus"></i> Agregar Usuario', ['controller' => 'Users', 'action' => 'add'], ['escape' => false, 'class' => 'btn btn-sm btn-success']) ?>
                        </div>
                    </div>
                </div>
                <div class="card-block">
                    <table cellpadding="0" cellspacing="0" class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('paternal_last_name') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('maternal_last_name') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('email') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('is_active') ?></th>
                                <th scope="col" class="actions"><?= __('Actions') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($users as $user): ?>
                            <tr>
                                <td><?= h($user->name) ?></td>
                                <td><?= h($user->paternal_last_name) ?></td>
                                <td><?= h($user->maternal_last_name) ?></td>
                                <td><?= h($user->email) ?></td>
                                <td><?= ($user->is_active) ? '<span class="badge text-bg-success">Activo</span>': '<span class="badge text-bg-secondary">Deshabilitado</span>' ?></td>
                                <td class="actions">
                                    <?= $this->Html->link(
                                        '<i class="bi bi-eye"></i>',
                                        ['action' => 'view', $user->id],
                                        ['class' => 'btn btn-sm btn-primary', 'title' => 'Ver', 'escape' => false]
                                        ) ?>
                                    <?= $this->Html->link(
                                        '<i class="bi bi-pencil-square"></i>',
                                        ['action' => 'edit', $user->id],
                                        ['class' => 'btn btn-sm btn-warning', 'title' => 'Editar', 'escape' => false]
                                        ) ?>
                                    <?= $this->Form->postLink(
                                        '<i class="bi bi-trash"></i>', 
                                        ['action' => 'delete', $user->id], 
                                        ['confirm' => __('Are you sure you want to delete # {0}?', $user->id), 'class' => 'btn btn-sm btn-danger', 'title' => 'Eliminar', 'escape' => false]
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