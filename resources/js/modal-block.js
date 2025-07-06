document.addEventListener("DOMContentLoaded", function () {
    // 🧩 Ouvre n'importe quelle modal
    document.querySelectorAll(".openCustomModal").forEach((button) => {
        button.addEventListener("click", () => {
            const targetId = button.getAttribute("data-target");
            const modal = document.getElementById(targetId);
            if (modal) modal.classList.remove("d-none");
        });
    });

    // 🔒 Ferme n'importe quelle modal
    document.querySelectorAll(".closeCustomModal").forEach((button) => {
        button.addEventListener("click", () => {
            const targetId = button.getAttribute("data-target");
            const modal = document.getElementById(targetId);
            if (modal) modal.classList.add("d-none");
        });
    });
});
