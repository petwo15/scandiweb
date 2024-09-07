$(document).ready(function() {
    $('#productType').change(function() {
        $('.dynamic-field').addClass('d-none');
        let selectedType = $(this).val();
        if (selectedType) {
            $('#' + selectedType).removeClass('d-none');
        }
    });
});
