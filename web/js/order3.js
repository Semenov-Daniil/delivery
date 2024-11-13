$(() => {

    $('#form-order').on('change', '#order-check', function() {
        $('#order-outpost_id option:first').prop('selected', true);

        if ($(this).prop('checked')) {
            $("#order-outpost_id").prop('disabled', true);
            $("#order-comment").prop('disabled', false);

            $('#order-outpost_id').removeClass('is-invalid');
            $('#order-comment').removeClass('is-valid');

        } else {
            $("#order-comment").prop('value', '');
            $("#order-comment").prop('disabled', true);
            $("#order-outpost_id").prop('disabled', false);

            $('#order-comment').removeClass('is-invalid');
            $('#order-outpost_id').removeClass('is-valid');
        }
    });
    
});