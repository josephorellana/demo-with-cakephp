<?php if (!isset($params['escape']) || $params['escape'] !== false): ?>
    <div class="toast align-items-center text-bg-danger border-0 position-fixed bottom-0 end-0 p-2 mb-5 me-3" style="z-index: 9999;" role="alert" aria-live="assertive" aria-atomic="true" id="toast-message">
    <div class="d-flex">
        <div class="toast-body">
            <?= h($message) ?>
        </div>
        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    </div>
<?php endif; ?>