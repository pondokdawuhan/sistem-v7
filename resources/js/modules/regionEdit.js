export class RegionEdit {
    constructor(){
const provinsiStudent = document.querySelector('#dataStudent').getAttribute('data-provinsiStudent')
const kotakabStudent = document.querySelector('#dataStudent').getAttribute('data-kotakabStudent')
const kecamatanStudent = document.querySelector('#dataStudent').getAttribute('data-kecamatanStudent')
const desaStudent = document.querySelector('#dataStudent').getAttribute('data-desaStudent')

const inputProvinsi = document.querySelector("#provinsi")
const inputKotaKab = document.querySelector("#kotakab")
const inputKecamatan = document.querySelector("#kecamatan")
const inputDesa = document.querySelector("#desa")

inputProvinsi.innerHTML = `<option value="`+provinsiStudent+`">`+provinsiStudent+`</option>`
inputKotaKab.innerHTML = `<option value="`+kotakabStudent+`">`+kotakabStudent+`</option>`
inputKecamatan.innerHTML = `<option value="`+kecamatanStudent+`">`+kecamatanStudent+`</option>`
inputDesa.innerHTML = `<option value="`+desaStudent+`">`+desaStudent+`</option>`

   
fetch(`https://bustanulmutaallimin.github.io/api-wilayah-indonesia/api/provinces.json`)
.then(response => response.json())
.then(provinces => provinces.forEach(province => {
        if(province.name == provinsiStudent) {
            
            inputProvinsi.innerHTML += `<option value="`+province.name+`" data-provinsi="`+province.id+`" selected class="text-slate-700 dark:text-white text-xs md:text-base">`+province.name+`</option>`    
        } else {
        inputProvinsi.innerHTML += `<option value="`+province.name+`" data-provinsi="`+province.id+`" class="text-slate-700 dark:text-white text-xs md:text-base">`+province.name+`</option>`
        }    
}));



inputProvinsi.addEventListener('change', function() {
    const idProvinsi = $("#provinsi option:selected").data("provinsi")
    inputKotaKab.innerHTML = `<option value="">Pilih Kota / Kabupaten</option>` 
    fetch(`https://bustanulmutaallimin.github.io/api-wilayah-indonesia/api/regencies/`+idProvinsi+`.json`)
.then(response => response.json())
.then(regencies => regencies.forEach(regence => {
    inputKotaKab.innerHTML += `<option value="`+regence.name+`" data-kotakab="`+regence.id+`" class="text-slate-700 dark:text-white text-xs md:text-base">`+regence.name+`</option>`
}))});



inputKotaKab.addEventListener('change', function() {
    const idKotaKab = $("#kotakab option:selected").data("kotakab")
    inputKecamatan.innerHTML = `<option value="">Pilih Kecamatan</option>` 
    fetch(`https://bustanulmutaallimin.github.io/api-wilayah-indonesia/api/districts/`+idKotaKab+`.json`)
.then(response => response.json())
.then(districts => districts.forEach(district => {
    inputKecamatan.innerHTML += `<option value="`+district.name+`" data-kecamatan="`+district.id+`" class="text-slate-700 dark:text-white text-xs md:text-base">`+district.name+`</option>`
}))});



inputKecamatan.addEventListener('change', function() {
    const idKecamatan = $("#kecamatan option:selected").data("kecamatan")
    inputDesa.innerHTML = `<option value="">Pilih Desa/Kelurahan</option>` 
    fetch(`https://bustanulmutaallimin.github.io/api-wilayah-indonesia/api/villages/`+idKecamatan+`.json`)
    .then(response => response.json())
    .then(villages => villages.forEach(village => {
        inputDesa.innerHTML += `<option value="`+village.name+`" class="text-slate-700 dark:text-white text-xs md:text-base">`+village.name+`</option>`
    }));    
});
    }}

