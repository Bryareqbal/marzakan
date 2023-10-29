const marz = document.querySelector('#marz')
const karmand = document.querySelector('#karmand')
const sarparshtyar = document.querySelector('#sarparshtyar')

const loc = window.location


console.log(loc);

const redirect = (e, property = null) => {

    let params = new URLSearchParams(loc.search)

    params.set(property, e.target.value)
    window.location.replace(loc.origin + loc.pathname + '?' +params.toString())
}

sarparshtyar.addEventListener('change',(e) => redirect(e, 'sarparshtyar_id'))
karmand.addEventListener('change', (e) =>  redirect(e, 'karmand_id'))
marz.addEventListener('change', (e) =>  redirect(e, 'marz_id'))

