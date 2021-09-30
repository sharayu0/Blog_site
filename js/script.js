
$(document).ready(function () {
    $(".navbar").click(function () {
        var x = $(window).width();
        if (x < 850) {
            $(".minimize").toggle();
        }
    });
});

$(document).resize(function () {
    $(".navbar").click(function () {
        var x = $(window).width();
        if (x < 850) {
            $(".minimize").toggle();
        }
    });
});


const toggle = document.getElementById("toggle");
toggle.onclick = function () {
    toggle.classList.toggle("active");
    document.body.classList.toggle('dark_theme');
}

