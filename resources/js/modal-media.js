document.addEventListener("DOMContentLoaded", function () {
    document
        .querySelectorAll(".openMediaModal")
        .forEach((button) => button.addEventListener("click", openMediaModal));

    document
        .querySelectorAll(".closeMediaModal")
        .forEach((button) => button.addEventListener("click", closeMediaModal));

    document
        .querySelectorAll(".select-media")
        .forEach((button) =>
            button.addEventListener("click", (event) =>
                selectMedia(event, button.dataset.id, button.dataset.url)
            )
        );

    function openMediaModal() {
        document.getElementById("mediaModal").classList.remove("d-none");
    }

    function closeMediaModal() {
        document.getElementById("mediaModal").classList.add("d-none");
    }

    function selectMedia(event, id, url) {
        event.preventDefault();
        document.getElementById("media_id").value = id;
        document.getElementById("media_preview").src = url;
        closeMediaModal();
    }
});
