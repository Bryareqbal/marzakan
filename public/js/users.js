const role = document.querySelector("#role");
const sarparshtyar = document.querySelector("#sarparshtyar");
const marz = document.querySelector("#marz");

const value = parseInt(role.value);
console.log(value);
if (value === 2 || value === 4) {
    marz.style.display = "flex";
    sarparshtyar.style.display = "none";
} else if (value === 3) {
    marz.style.display = "none";
    sarparshtyar.style.display = "flex";
} else {
    marz.style.display = "none";
    sarparshtyar.style.display = "none";
}

role.addEventListener("change", function (e) {
    const value = parseInt(e.target.value);
    if (value === 2 || value === 4) {
        marz.style.display = "flex";
        sarparshtyar.style.display = "none";
    } else if (value === 3) {
        marz.style.display = "none";
        sarparshtyar.style.display = "flex";
    } else {
        marz.style.display = "none";
        sarparshtyar.style.display = "none";
    }
});
