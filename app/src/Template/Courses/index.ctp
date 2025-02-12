<section>
    <h1>Cursos</h1>
</section>

<section>
    <div class="container mb-3 px-0">
        <div class="row px-0">
            <div class="col-11 px-0 mx-0">
                <input type="text" id="course-search" class="form-control mx-0" placeholder="Ingrese nombre del curso (ingrese al menos 3 caracteres)">
            </div>
            <div class="col-1 text-center text-bg-success rounded-end py-0">
                <i class="bi bi-search my-0 align-middle"></i>
            </div>
        </div>
    </div>
</section>

<section class="section" id="ajax-load">
    <div class="row" id="ajax-replace">
        <?= $this->element('Courses/courses_table') ?>
    </div>
</section>

<script>
$(document).ready(function() {
    const csrfToken = $('meta[name="csrfToken"]').attr('content'); // Obtener el CSRF Token

    $('#course-search').on('keyup', function() {
        const query = $(this).val();

        if( query.length > 2 || query.length < 1)
        {
            $.ajax({
                url: "<?= $this->Url->build(['controller' => 'Courses', 'action' => 'search']) ?>",
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