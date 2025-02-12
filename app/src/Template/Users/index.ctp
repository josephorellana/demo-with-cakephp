<section class="mb-5 mt-3">
    <h1>Usuarios</h1>
    <hr>
</section>

<section>
    <div class="container mb-3 px-0">
        <div class="row px-0">
            <div class="col-11 px-0 mx-0">
                <input type="text" id="search-user" class="form-control mx-0" placeholder="Ingrese nombre, apellido o correo electrónico (ingrese al menos 3 caracteres)">
            </div>
            <div class="col-1 text-center text-bg-success rounded-end py-0">
                <i class="bi bi-search my-0 align-middle"></i>
            </div>
        </div>
    </div>
</section>

<section class="section" id="ajax-load">
    <div class="row" id="ajax-replace">
            <?= $this->element('Users/users_table') ?>
    </div>
</section>

<script>
$(document).ready(function() {
    const csrfToken = $('meta[name="csrfToken"]').attr('content'); // Obtener el CSRF Token

    $('#search-user').on('keyup', function() {
        const query = $(this).val();

        if( query.length > 2 || query.length < 1)
        {
            $.ajax({
                url: "<?= $this->Url->build(['controller' => 'Users', 'action' => 'search']) ?>",
                type: "GET",
                data: { search: query },
                headers: {
                    'X-CSRF-Token': csrfToken // Enviar el token en los headers
                },
                success: function(response) {
                    $('#ajax-replace').html(response);
                },
                error: function(xhr, status, error) {
                    console.error("Error en AJAX:", status, error);
                }
            });
        }
    });
});
</script>
