const marz = document.querySelectorAll("#marz");
const from = document.querySelector("#from");
const to = document.querySelector("#to");
const search = document.querySelector("#search");
const karmandakan = document.querySelectorAll("#karmand");
const sarparshtyarkan = document.querySelectorAll("#sarparshtyar");
const loc = window.location;

const debounce = _.debounce;

const form = document.querySelector("#form");

const redirect = (e, property = null) => {
    form.submit();
    // let query = {
    //     from: null,
    //     to: null,
    //     search: null,
    // };

    // form.karmand?.forEach((karmand, index) => {
    //     if (karmand.checked) {
    //         query[`karmand[${index}]`] = karmand.value;
    //     }
    // });
    // form.sarparshtyar?.forEach((sarparshtyar, index) => {
    //     if (sarparshtyar.checked) {
    //         query[`sarparshtyar[${index}]`] = sarparshtyar.value;
    //     }
    // });
    // form.marz?.forEach((marz, index) => {
    //     if (marz.checked) {
    //         query[`marz[${index}]`] = marz.value;
    //     }
    // });

    // query.from = form.from.value;
    // query.to = form.to.value;
    // query.search = form.search.value;

    // let slaw = new URLSearchParams(query);
    // console.log(slaw.toString());

    // let params = new URLSearchParams(loc.search);

    // params.set(property, e.target.value);

    // window.location.replace(loc.origin + loc.pathname + "?" + slaw.toString());
};

sarparshtyarkan.forEach((sarparshtyar, index) => {
    sarparshtyar.addEventListener("change", (e) =>
        redirect(e, `sarparshtyar[${index}]`)
    );
});

karmandakan.forEach((karmand, index) => {
    karmand.addEventListener("change", (e) => redirect(e, `karmand[${index}]`));
});
marz.forEach((marz, index) => {
    marz.addEventListener("change", (e) => redirect(e, `marz[${index}]`));
});

to.addEventListener("change", (e) => redirect(e, "to"));
from.addEventListener("change", (e) => redirect(e, "from"));
search.addEventListener(
    "keyup",
    debounce((e) => redirect(e, "search"), 500)
);
