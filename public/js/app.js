
document.addEventListener("DOMContentLoaded", function () {

    const deleteForms = document.querySelectorAll(".delete-form");

    deleteForms.forEach(function (form) {

        form.addEventListener("submit", function (event) {

            const confirmed = confirm(
                "Are you sure you want to delete this task?"
            );

            if (!confirmed) {
                event.preventDefault();
            }

        });

    });

    const completeForms =
        document.querySelectorAll(".complete-form");

    completeForms.forEach(function (form) {

        form.addEventListener("submit", function () {

            const button =
                form.querySelector("button");

            if (button) {

                button.disabled = true;
                button.textContent = "Completing...";
                button.style.opacity = "0.6";

            }

        });

    });

    const taskForms =
        document.querySelectorAll(".task-form");

    taskForms.forEach(function (form) {

        form.addEventListener("submit", function () {

            const button =
                form.querySelector(".primary-button");

            if (button) {

                button.disabled = true;
                button.textContent = "Saving...";
                button.style.opacity = "0.7";

            }

        });

    });

});

