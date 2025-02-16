<div class="card card-primary">
    <div class="card-header">

        <div class="row">
            <span class="col-8 text-start">
                <?php if( !empty($this->Paginator->params()) ): ?>
                    <?= $this->Paginator->counter(['format' => __('Página {{page}} de {{pages}}, mostrando {{current}} de {{count}} registros.')]) ?>
                <?php else: ?>
                    Mostrando <?= h($totalUsers) ?> registros
                <?php endif; ?>
            </span>
            <div class="col-4 text-end">
            <?= $this->Html->link('<i class="bi bi-plus"></i> Agregar Usuario', ['controller' => 'Users', 'action' => 'add'], ['escape' => false, 'class' => 'btn btn-sm btn-success']) ?>
            </div>
        </div>
    </div>
    <div class="card-block">
        <table cellpadding="0" cellspacing="0" class="table table-striped">
            <thead>
                <tr class="row">
                    <th scope="col" class="text-center col"><?= $this->Paginator->sort('name', 'Nombre') ?></th>
                    <th scope="col" class="text-center col"><?= $this->Paginator->sort('paternal_last_name', 'Apellido paterno') ?></th>
                    <th scope="col" class="text-center col"><?= $this->Paginator->sort('maternal_last_name', 'Apellido materno') ?></th>
                    <th scope="col" class="text-center col-sm-3"><?= $this->Paginator->sort('email', 'Correo electrónico') ?></th>
                    <th scope="col" class="text-center col"><?= $this->Paginator->sort('is_active', 'Activo') ?></th>
                    <th scope="col" class="actions text-center col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                <tr class="row">
                    <td class="col"><?= h($user->name) ?></td>
                    <td class="col"><?= h($user->paternal_last_name) ?></td>
                    <td class="col"><?= h($user->maternal_last_name) ?></td>
                    <td class="col-sm-3"><?= h($user->email) ?></td>
                    <td class="text-center col"><?= ($user->is_active) ? '<span class="badge text-bg-success">Activo</span>': '<span class="badge text-bg-secondary">Deshabilitado</span>' ?></td>
                    <td class="actions text-center col">
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
                            ['confirm' => __('¿Estás segurto que deseas eliminar el usuario {0} {1}?', $user->name, $user->paternal_last_name), 'class' => 'btn btn-sm btn-danger', 'title' => 'Eliminar', 'escape' => false]
                            ) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<?= $this->element('pagination') ?>