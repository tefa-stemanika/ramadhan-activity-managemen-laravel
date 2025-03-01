import "./bootstrap";

document.querySelectorAll("#navbar-toggle").forEach((element) => {
    element.addEventListener("click", () => {
        document
            .getElementById("navbar-menu-mobile")
            .classList.toggle("hidden");
    });
});

import Chart from "chart.js/auto";
window.Chart = Chart;
