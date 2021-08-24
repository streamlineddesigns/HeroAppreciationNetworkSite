$(document).ready(function() {
    $(".search").ready(function() {
        $(this).removeClass("float-right");
        var html = 
        `
        <div class="input-group-text custom-group-text">
            <i class="bi bi-search"></i>
        </div>
        `;
        $(".search-input").before($.parseHTML(html));
    });
});