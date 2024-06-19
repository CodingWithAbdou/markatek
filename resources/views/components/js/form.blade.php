<script>
    function loaderStart(btn) {
        btn.attr('disabled', true);
        btn.find('.text').addClass('d-none');
        btn.find('.btn-loader').removeClass('d-none');
    }

    function loaderEnd(btn) {
        btn.attr('disabled', false);
        btn.find('.text').removeClass('d-none');
        btn.find('.btn-loader').addClass('d-none');
    }

    function showValidationError(form, index, value) {
        form.find("input[name='" + index + "'][type=file]").parents('.error-here').append(
            '<div class="invalid-feedback d-block">' + value + '</div');
        form.find("input[name='" + index + "'][type!=file]").parent().append('<div class="invalid-feedback d-block">' +
            value + '</div');
        form.find("select[name='" + index + "']").parent().append('<div class="invalid-feedback d-block">' + value +
            '</div');
        form.find("textarea[name='" + index + "']").parent().append('<div class="invalid-feedback d-block">' + value +
            '</div');
        form.find("input[name='" + index + "[]'][type=file]").parents('.error-here').append(
            '<div class="invalid-feedback d-block">' + value + '</div');
        form.find("input[name='" + index + "[]'][type!=file]").parent().append(
            '<div class="invalid-feedback d-block">' + value + '</div');
        form.find("select[name='" + index + "[]']").parent().append('<div class="invalid-feedback d-block">' + value +
            '</div');
        form.find("textarea[name='" + index + "[]']").parent().append('<div class="invalid-feedback d-block">' + value +
            '</div');
    }

    function HideValidationError(form) {
        form.find('.invalid-feedback').remove();
    }
</script>

{{-- <script>
    function loaderStart(btn) {
        btn.attr('disabled', true);
        btn.find('.text').addClass('d-none');
        btn.find('.btn-loader').removeClass('d-none');
    }

    function loaderEnd(btn) {
        btn.attr('disabled', false);
        btn.find('.text').removeClass('d-none');
        btn.find('.btn-loader').addClass('d-none');
    }

    function showValidationError(form, index, value) {
        form.find("input[name='" + index + "'][type=file]").parents('.error-here').append(
            '<div class="block text-xs text-red-600 invalid-feedback">' + value + '</div');
        form.find("input[name='" + index + "'][type!=file]").parent().append(
            '<div class="block text-xs text-red-600 invalid-feedback">' + value + '</div');
        form.find("select[name='" + index + "']").parent().append(
            '<div class="block text-xs text-red-600 invalid-feedback">' + value +
            '</div');
        form.find("textarea[name='" + index + "']").parent().append(
            '<div class="block text-xs text-red-600 invalid-feedback">' + value +
            '</div');
        form.find("input[name='" + index + "[]'][type=file]").parents('.error-here').append(
            '<div class="block text-xs text-red-600 invalid-feedback">' + value + '</div');
        form.find("input[name='" + index + "[]'][type!=file]").parent().append(
            '<div class="block text-xs text-red-600 invalid-feedback">' + value + '</div');
        form.find("select[name='" + index + "[]']").parent().append(
            '<div class="block text-xs text-red-600 invalid-feedback">' + value +
            '</div');
        form.find("textarea[name='" + index + "[]']").parent().append(
            '<div class="block text-xs text-red-600 invalid-feedback">' +
            value + '</div');
    }



    function HideValidationError(form) {
        form.find('.invalid-feedback').remove();
    }
</script> --}}
