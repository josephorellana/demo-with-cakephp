<?php if ( !empty($this->Paginator->params()) && $this->Paginator->params()['pageCount'] > 1 ): ?>
    <?php
        $this->Paginator->setTemplates([
            'nextActive' => '<li class="page-item mt-2"><a class="page-link" href="{{url}}">{{text}}</a></li>',
            'nextDisabled' => '<li class="page-item disabled mt-2"><a class="page-link" href="#">{{text}}</a></li>',
            'prevActive' => '<li class="page-item mt-2"><a class="page-link" href="{{url}}">{{text}}</a></li>',
            'prevDisabled' => '<li class="page-item disabled mt-2"><a class="page-link" href="#">{{text}}</a></li>',
            'number' => '<li class="page-item mt-2"><a class="page-link" href="{{url}}">{{text}}</a></li>',
            'current' => '<li class="active page-item mt-2"><a class="page-link" href="">{{text}}</a></li>'
        ]);
    ?>
    <nav aria-label="Page navigation" class="mt-2">
        <ul class="pagination justify-content-center flex-wrap">
            <?= $this->Paginator->prev('Anterior') ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next('Siguiente') ?>
        </ul>
    </nav>
<?php endif; ?>