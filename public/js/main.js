//jQuery ready
$(function () {
    $(".dete-confirm-box").click(function (event) {
        var x = confirm("Are you sure you want to delete?");
        if (x) {
            return true;
        } else {
            event.preventDefault();
            return false;
        }
    });
});
     