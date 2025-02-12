<?php if ( !empty($this->Paginator->params()) && $this->Paginator->params()['pageCount'] > 1 ): ?>
    <?php
        $this->Paginator->setTemplates([
            'nextActive' => '<li class="page-item"><a class="page-link" href="{{url}}">{{text}}</a></li>',
            'nextDisabled' => '<li class="page-item disabled"><a class="page-link" href="#">{{text}}</a></li>',
            'prevActive' => '<li class="page-item"><a class="page-link" href="{{url}}">{{text}}</a></li>',
            'prevDisabled' => '<li class="page-item disabled"><a class="page-link" href="#">{{text}}</a></li>',
            'number' => '<li class="page-item"><a class="page-link" href="{{url}}">{{text}}</a></li>',
            'current' => '<li class="active page-item"><a class="page-link" href="">{{text}}</a></li>'
        ]);
    ?>
    <nav aria-label="Page navigation">
        <ul class="pagination">
            <?= $this->Paginator->prev('Anterior') ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next('Siguiente') ?>
        </ul>
    </nav>
<?php endif; ?>