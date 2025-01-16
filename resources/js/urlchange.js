window.urlchange = function () {
    let link_id = document.getElementById("link_id");
    let link_show = document.getElementById("link_show");

    let link_array = link_show.href.split("/");
    link_array[link_array.length - 1] = link_id.value;

    link_show.href = link_array.join("/");
};
