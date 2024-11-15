$(() => {

    $('#pjax-form-order').on('change', '#order-check', function() {
        $('#order-outpost_id option:first').prop('selected', true);

        const select = $('#order-outpost_id');
        const comment = $('#order-comment');

        select.removeClass('is-valid is-invalid');
        comment.removeClass('is-valid is-invalid');

        if ($(this).prop('checked')) {
            select.prop('disabled', true);
            comment.prop('disabled', false);
        } else {
            select.prop('disabled', false);
            comment.prop('disabled', true);
            comment.prop('value', '');
        }
    });
    
});