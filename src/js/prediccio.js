/* Variables globals */
let prediccioComaques = [];

document.addEventListener('DOMContentLoaded', getTemp);

/* Agafem les dades del xml de la url */
function getTemp(){
    fetch("https://static-m.meteo.cat/content/opendata/ctermini_comarcal.xml")
        .then( response => { return response.text();})
        .then( src => new window.DOMParser().parseFromString(src, "text/xml"))
        .then( data => readData(data))
        .catch( error => {
            console.log(error);
        })
}

/* Recorrem el xml, creem objectes de cada comarca amb les seves dades i insertem cada objecte al array 'prediccioComaques' */
function readData(xml){

    const altPirineu = ["L'Alt Urgell","L'Alta Ribagorça","La Cerdanya","El Pallars Sobirà","La Val d'Aran"];
    const comarques = Array.from(xml.getElementsByTagName('comarca'));
    const prediccions = Array.from(xml.getElementsByTagName('prediccio'));
    const simbol = Array.from(xml.getElementsByTagName('simbol'));
    const precipitacio = Array.from(xml.getElementsByTagName('precipitacio'));
    const acumulacio = Array.from(xml.getElementsByTagName('acumulacio'));
    const intensitat = Array.from(xml.getElementsByTagName('intensitat'));
    const calamarsa = Array.from(xml.getElementsByTagName('calamarsa'));
    
    comarques.forEach( comarca => {
        if(altPirineu.includes(comarca.getAttribute('nomCOMARCA'))){
            prediccions.forEach( prediccio => {
                if(prediccio.getAttribute('idcomarca') == comarca.getAttribute('id')){

                    const infoComarca = {
                        id: prediccio.getAttribute('idcomarca'),
                        nom: comarca.getAttribute('nomCOMARCA'),
                        capital: comarca.getAttribute('nomCAPITALCO'),
                        data: prediccio.firstElementChild.getAttribute('data'),
                        simbolmati: prediccio.firstElementChild.getAttribute('simbolmati'),
                        simboltarda: prediccio.firstElementChild.getAttribute('simboltarda'),
                        nom_simbolmati: getTimesFromArrays(simbol, prediccio.firstElementChild.getAttribute('simbolmati').slice(0, -4),"mati"),
                        nom_simboltarda: getTimesFromArrays(simbol, prediccio.firstElementChild.getAttribute('simboltarda').slice(0, -4),"tarda"),
                        tempmax: prediccio.firstElementChild.getAttribute('tempmax'),
                        tempmin: prediccio.firstElementChild.getAttribute('tempmin'),
                        probcalamati: getTimesFromArrays(calamarsa, prediccio.firstElementChild.getAttribute('probcalamati'),"mati"),
                        probcalatarda: getTimesFromArrays(calamarsa, prediccio.firstElementChild.getAttribute('probcalatarda'),"tarda"),
                        probprecipitaciomati: getTimesFromArrays(precipitacio, prediccio.firstElementChild.getAttribute('probprecipitaciomati'),"mati"),
                        probprecipitaciotarda: getTimesFromArrays(precipitacio, prediccio.firstElementChild.getAttribute('probprecipitaciomati'),"tarda"),
                        intensitatprecimati: getTimesFromArrays(intensitat, prediccio.firstElementChild.getAttribute('intensitatprecimati'),"mati"),
                        intensitatprecitarda: getTimesFromArrays(intensitat, prediccio.firstElementChild.getAttribute('intensitatprecimati'),"tarda"),
                        precipitacioacumuladamati: getTimesFromArrays(acumulacio, prediccio.firstElementChild.getAttribute('precipitacioacumuladamati'),"mati"),
                        precipitacioacumuladatarda: getTimesFromArrays(acumulacio, prediccio.firstElementChild.getAttribute('precipitacioacumuladamati'),"tarda"),
                        dema_data: prediccio.firstElementChild.nextElementSibling.getAttribute('data'),
                        dema_simbolmati: prediccio.firstElementChild.nextElementSibling.getAttribute('simbolmati'),
                        dema_simboltarda: prediccio.firstElementChild.nextElementSibling.getAttribute('simboltarda'),
                        dema_tempmax: prediccio.firstElementChild.nextElementSibling.getAttribute('tempmax'),
                        dema_tempmin: prediccio.firstElementChild.nextElementSibling.getAttribute('tempmin'),
                        dema_probcalamati: getTimesFromArrays(calamarsa, prediccio.firstElementChild.nextElementSibling.getAttribute('probcalamati'),"mati"),
                        dema_probcalatarda: getTimesFromArrays(calamarsa, prediccio.firstElementChild.nextElementSibling.getAttribute('probcalatarda'),"tarda"),
                        dema_probprecipitaciomati: getTimesFromArrays(precipitacio, prediccio.firstElementChild.nextElementSibling.getAttribute('probprecipitaciomati'),"mati"),
                        dema_probprecipitaciotarda: getTimesFromArrays(precipitacio, prediccio.firstElementChild.nextElementSibling.getAttribute('probprecipitaciomati'),"tarda"),
                        dema_intensitatprecimati: getTimesFromArrays(intensitat, prediccio.firstElementChild.nextElementSibling.getAttribute('intensitatprecimati'),"mati"),
                        dema_intensitatprecitarda: getTimesFromArrays(intensitat, prediccio.firstElementChild.nextElementSibling.getAttribute('intensitatprecimati'),"tarda"),
                        dema_precipitacioacumuladamati: getTimesFromArrays(acumulacio, prediccio.firstElementChild.nextElementSibling.getAttribute('precipitacioacumuladamati'),"mati"),
                        dema_precipitacioacumuladatarda: getTimesFromArrays(acumulacio, prediccio.firstElementChild.nextElementSibling.getAttribute('precipitacioacumuladamati'),"tarda")
                    }
                    prediccioComaques = [...prediccioComaques,infoComarca];
                }
            }) 
        }
    });
    console.log(prediccioComaques);
    createHtml(prediccioComaques);
}

/* Recorre cada array amb dades del xml, comparar amb l'ID de la comarca que volem i si es matí o tarda i retornem el valor de l'atribut corresponent */
function getTimesFromArrays(array,id,moment){
    let result = "";
    array.forEach( arr => {
        if(arr.getAttribute('id') === id){
            const attrArray = Array.from(arr.attributes);
            attrArray.forEach( attr => {
                if(attr.name.includes(moment) || attr.name == 'nomsimbol'){
                    result = attr.value;
                }
            })
        }
    });
    return result;
}

function createHtml(prediccioComaques){
    const parent = document.querySelector('.results');
    const pathImg = "https://static-m.meteo.cat/assets-w3/images/meteors/estatcel/";

    prediccioComaques.forEach( comarca => {
        let box = `
            <div class="col-12 col-md-6 col-lg-4">
                <div class="comarca-box">
                    <h3 class="comarca-name">${comarca.nom}</h3>
                    <p class="d-flex justify-content-between comarca-capital"><span class="text-muted">Capital:</span>${comarca.capital}</p>
                    <p class="d-flex justify-content-between"><span class="text-muted">Dia:</span>${comarca.data}</p>
                    <p class="d-flex justify-content-between"><span class="text-muted">Temp. Max:</span> ${comarca.tempmax}º</p>
                    <p class="d-flex justify-content-between"><span class="text-muted">Temp. Min:</span> ${comarca.tempmin}º</p>
                    <section>
                        <p class="mati-tarda_title"><span class="text-muted font-weight-bold">Matí:</span></p>
                        <div class="d-flex justify-content-between align-items-center comarca-date">
                            <div>
                                <p class="d-flex justify-content-center comarca-nom_simbol"><span class="text-capitalize">${comarca.nom_simbolmati}</span></p>
                            </div>
                            <div>
                                <img src="${pathImg + comarca.simbolmati}" alt="${comarca.nom_simbolmati}">
                            </div>
                        </div>
                        <div class="comarca-dades">
                            <p class="d-flex justify-content-between"><span class="text-muted">Prob. Calamarça:</span> ${comarca.probcalamati}</p>
                            <p class="d-flex justify-content-between"><span class="text-muted">Prob. Precipitació:</span> ${comarca.probprecipitaciomati}</p>
                            <p class="d-flex justify-content-between"><span class="text-muted">Intens. precipitació:</span> ${comarca.intensitatprecimati}</p>
                            <p class="d-flex justify-content-between"><span class="text-muted">Precipitacio acum.:</span> ${comarca.precipitacioacumuladamati}</p>
                        </div>
                    </section>
                    <section>
                        <p class="mati-tarda_title"><span class="text-muted font-weight-bold">Tarda:</span></p>
                        <div class="d-flex justify-content-between align-items-center comarca-date">
                            <div>
                                <p class="d-flex justify-content-center comarca-nom_simbol"><span class="text-capitalize">${comarca.nom_simboltarda}</span></p>
                            </div>
                            <div>
                                <img src="${pathImg + comarca.simboltarda}" alt="${comarca.nom_simboltarda}">
                            </div>
                        </div>
                        <div class="comarca-dades">
                            <p class="d-flex justify-content-between"><span class="text-muted">Prob. Calamarça:</span> ${comarca.probcalamati}</p>
                            <p class="d-flex justify-content-between"><span class="text-muted">Prob. Precipitació:</span> ${comarca.probprecipitaciomati}</p>
                            <p class="d-flex justify-content-between"><span class="text-muted">Intens. precipitació:</span> ${comarca.intensitatprecimati}</p>
                            <p class="d-flex justify-content-between"><span class="text-muted">Precipitacio acum.:</span> ${comarca.precipitacioacumuladamati}</p>
                        </div>
                    </section>
                </div>
            </div>
        `;
                
        parent.innerHTML += box;

    })
    
}