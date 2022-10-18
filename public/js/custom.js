
$(document).ready(function () {
    $('.add_subject').click(function (e) {
        e.preventDefault();
        let name = $('#sub_name').val();
        console.log(name);
    });
});