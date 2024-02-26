

function apiResponse() {

    let ico = document.getElementById("userData").value;

    console.log(ico)
    
    fetch('https://ares.gov.cz/ekonomicke-subjekty-v-be/rest/ekonomicke-subjekty/<ICO>')
        .then((response) => response.json())
        .then((data) => console.log(data))

        
}