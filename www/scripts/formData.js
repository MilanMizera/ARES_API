
function closeModal() {
    var modal = document.getElementById('myModal');
    modal.style.display = 'none';
}


function apiResponse() {

    var modal = document.getElementById('myModal');
    modal.style.display = 'block';

    let ico = document.getElementById("userData").value;


    if (!ico) {

        let error = "Prosím vyplňte pole";
        var dataContainer = document.getElementById('dataContainer');
        dataContainer.innerHTML = '<p>' + error + '</p>';

    } else {

        let url = 'https://ares.gov.cz/ekonomicke-subjekty-v-be/rest/ekonomicke-subjekty/' + ico;

        fetch(url)
            .then((response) => response.json())
            .then((data) => {
                console.log(data)
                console.log(data.popis)

                let dataContainer = document.getElementById('dataContainer');
                dataContainer.innerHTML = "";

                if (data.popis) {

                    let description = document.createElement("p")
                    dataContainer.innerHTML += '<p id="error">' + "Chyba: " + 'OOPS! subjekt nenalezen.' + '</p>';
                    dataContainer.appendChild(description);

                } else if (!data.popis) {

                    let ico = document.createElement("p")
                    dataContainer.innerHTML += '<p id="js_corp_info">' + '<b>' + "IČO: " + '</b>' + data.ico + '</p>';
                    dataContainer.appendChild(ico);

                    let name = document.createElement("p")
                    dataContainer.innerHTML += '<p id="js_corp_info">' + '<b>' + "Obchodní jméno: " + '</b>' + data.obchodniJmeno + '</p>';
                    dataContainer.appendChild(name);



                    let creationDate = document.createElement("p")
                    dataContainer.innerHTML += '<p id="js_corp_info">' + '<b>' + "Datum vzniku: " + '</b>' + data.datumVzniku + '</p>';
                    dataContainer.appendChild(creationDate);
                }

            })
    }


}