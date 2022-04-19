


document.addEventListener('DOMContentLoaded', updateData);

function getTemp(xml){
    const parent = document.querySelector('.results');
    const pathImg = "https://static-m.meteo.cat/assets-w3/images/meteors/estatcel/";

    const altPirineu = ["L'Alt Urgell","L'Alta Ribagorça","La Cerdanya","El Pallars Sobirà","La Val d'Aran"];
    const comarques = Array.from(xml.getElementsByTagName('comarca'));
    const prediccio = Array.from(xml.getElementsByTagName('prediccio'));
    const simbol = Array.from(xml.getElementsByTagName('simbol'));
    
    
    for(let i=0; i<=comarques.length -1; i++){
        let comarca = comarques[i].attributes[1].value;
        if(altPirineu.includes(comarca)){
            //console.log("--" + comarques[i].getAttribute('id'));
            //console.log("--" + comarques[i].getAttribute('nomCOMARCA'));

            let nomComarca = comarques[i].getAttribute('nomCOMARCA');

            if(prediccio[i].getAttribute('idcomarca') == comarques[i].getAttribute('id')){
                //console.log(prediccio[i]);
                console.log(prediccio[i].firstElementChild);

                let box = `
                    <div class="col-12 col-md-4">
                        <div class="comarca-box">
                            <h3 class="comarca-name">${nomComarca}</h3>
                            <p class="d-flex justify-content-between comarca-capital"><span class="text-muted">Capital:</span>${comarques[i].getAttribute('nomCAPITALCO')}</p>
                            <p class="d-flex justify-content-between comarca-date"><span class="text-muted">Data:</span>${prediccio[i].firstElementChild.getAttribute('data')}</p>
                            <hr>
                            <p class="d-flex justify-content-between comarca-date"><span class="">Matí:</span></p>
                            <div class="d-flex justify-content-between comarca-date">
                                <div>
                                    <p><span class="">ds:</span></p>
                                    <p><span class="">Tarda:</span></p>
                                </div>
                                <img src="${pathImg + prediccio[i].firstElementChild.getAttribute('simbolmati')}" alt="">
                            </div>
                            <p class="d-flex justify-content-between comarca-date"><span class="">Tarda:</span></p>
                            <p class="d-flex justify-content-between comarca-date"><img src="${pathImg + prediccio[i].firstElementChild.getAttribute('simboltarda')}" alt=""></p>
                        </div>
                    </div>
                `;
                
                parent.innerHTML += box;
            }
            
        }
    }
    

}

function updateData(){

    fetch("https://static-m.meteo.cat/content/opendata/ctermini_comarcal.xml")
        .then( response => { return response.text();})
        .then( src => new window.DOMParser().parseFromString(src, "text/xml"))
        .then( data => { return data; })
        .then( work => getTemp(work))
        .catch( error => {
            console.log(error);
        })
}