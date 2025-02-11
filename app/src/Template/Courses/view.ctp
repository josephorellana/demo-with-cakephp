<section>
    <h1>Detalles de curso</h1>
</section>

<section>
<h3><?= h($course->name) ?></h3>
    <table class="table table-hover table-striped">
        <tr>
            <th scope="row">Nombre</th>
            <td><?= h($course->name) ?></td>
        </tr>
        <tr>
            <th scope="row">Fecha de inicio</th>
            <td><?= (!empty($course->start_date)) ? date('d-m-Y', strtotime($course->start_date)) : '' ?></td>
        </tr>
        <tr>
            <th scope="row">Fecha de término</th>
            <td><?= (!empty($course->end_date)) ? date('d-m-Y', strtotime($course->end_date)) : '' ?></td>
        </tr>
        <tr>
            <th scope="row">Estado</th>
            <td><?= ($course->is_enabled) ? '<span class="badge text-bg-success">Habilitado</span>': '<span class="badge text-bg-secondary">Deshabilitado</span>' ?></td>
        </tr>
    </table>
    <div class="row">
        <h4>Descripción</h4>
        <?= $this->Text->autoParagraph(h($course->description)); ?>
    </div>
    <div class="related">
        <h4>Inscritos</h4>
        <?php if (!empty($course->enrollments)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Create At') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Course Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($course->enrollments as $enrollments): ?>
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



