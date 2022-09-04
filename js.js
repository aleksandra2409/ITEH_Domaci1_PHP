$(function () {
    pretraziFilm();
    sortirajFilmove();
});

function pretraziFilm() {

    $(document).on('keyup', '#pretrazi-polje', function () {

        let vrednost = this.value;

        $.ajax(
            {
                url: 'pretraziFilm.php',
                method: 'post',
                data: { vrednost: vrednost },
                success: function (data) {
                    {
                        $('#body-table').html(data);
                    }
                }
            }
        )
    })

}

function sortirajFilmove() {

    $(document).on('click', 'th', function () {

        let column_id = $(this).attr('id');
        let sort = $(this).attr('value');

        $.ajax({
            url: 'sortirajFilmove.php',
            method: 'post',
            data: { column_id: column_id, sort: sort },

            success: function (data) {
                $('#tabela').html(data);
            }
        })

    })


}