document.addEventListener('DOMContentLoaded', (event) => {
    var toggler = document.getElementsByClassName("caret");
    var tree = document.getElementById("tree");
    var i;

    for (i = 0; i < toggler.length; i++) {
        toggler[i].addEventListener("click", function() {
            this.parentElement.querySelector(".nested").classList.toggle("active");
            this.classList.toggle("caret-down");
            tree.scrollTo(0, tree.scrollHeight);
        });
    }
})