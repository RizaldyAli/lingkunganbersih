$(document).on("click", 'button[data-action="reset-password"]', function() {
    const modal = $(this).data("modal");
    const email = $(this).data("email");
    $(document).find(modal).find('input[name="email"]').val(email);
    $(modal).modal("show");
});