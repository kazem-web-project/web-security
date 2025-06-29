document.addEventListener("DOMContentLoaded", function () {
    const starContainer = document.getElementById("star-rating");
    const hiddenInput = document.getElementById("stars");

    let selected = 0;

    for (let i = 1; i <= 5; i++) {
        const star = document.createElement("i");
        star.className = "fa fa-star fa-2x text-secondary me-1";
        star.style.cursor = "pointer";
        star.dataset.value = i;

        star.addEventListener("click", function () {
            selected = parseInt(this.dataset.value);
            hiddenInput.value = selected;

            document.querySelectorAll("#star-rating i").forEach((s, idx) => {
                s.classList.toggle("text-warning", idx < selected);
                s.classList.toggle("text-secondary", idx >= selected);
            });
        });

        starContainer.appendChild(star);
    }
});
