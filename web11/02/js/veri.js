
$(function () {
    veri();

    $("#drag-box").on("mouseenter", ".drag-item", function () {
        $(this).draggable({
            revert: "invalid",
            cursor: "move",
        });
    });

    $("#userans").droppable({
        accept: ".drag-item",
        drop: (event, ui) => {
            userans.push(parseInt($(ui.draggable).text()));
            $("#userans").text(userans.join(" "));
            $(ui.draggable).remove();
        }
    });
});
function veri() {
    ans = [],userans = [];
    $("#drag-box").empty();
    $("#userans").text("");

    for (let i = 0; i < 4; i++) {
        const num = Math.floor(Math.random() * 9) + 1;
        ans.push(num);
        $("#drag-box").append(`<div class="drag-item">${num}</div>`);
    }
    ans.sort((a, b) => a - b);
}