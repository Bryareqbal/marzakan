const auto_div = document.querySelector("#auto_div");
const manual_div = document.querySelector("#manual_div");
const nickname = document.querySelector("#nickname");

const showAutoInput = () => {
    auto_div.classList.remove("hidden");
    auto_div.classList.add("grid");
    manual_div.classList.add("hidden");
    manual_div.classList.remove("grid");
};

const showManualInput = () => {
    auto_div.classList.add("hidden");
    auto_div.classList.remove("grid");
    manual_div.classList.remove("hidden");
    manual_div.classList.add("grid");
};
