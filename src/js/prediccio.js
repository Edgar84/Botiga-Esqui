


document.addEventListener('DOMContentLoaded', updateData);

function getTemp(doc){

    const altPirineu = ["L'Alt Urgell","L'Alta Ribagorça","La Cerdanya","El Pallars Sobirà","La Val d'Aran"];
    const comarques = Array.from(doc.getElementsByTagName('comarca'));
    const prediccio = Array.from(doc.getElementsByTagName('prediccio'));;
    
    for(let i=0; i<=comarques.length -1; i++){
        let comarca = comarques[i].attributes[1].value;
        if(altPirineu.includes(comarca)){
            console.log("--" + comarques[i].getAttribute('id'));
            console.log("--" + comarques[i].getAttribute('nomCOMARCA'));

            if(prediccio[i].getAttribute('idcomarca') == comarques[i].getAttribute('id')){
                console.log(prediccio[i]);
            }
        }
    }
    

}

function updateData(){

    fetch("https://static-m.meteo.cat/content/opendata/ctermini_comarcal.xml")
        .then( response => {
            return response.text();
        })
        .then( src => 
            new window.DOMParser().parseFromString(src, "text/xml"))
        .then( data => {
            return data; 
        })
        .then( work => getTemp(work))
        .catch( error => {
            console.log(error);
        })
}