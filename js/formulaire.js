let hotels = [];
let restos = [];
let gares = [];
let aeroports = [];
let sites = [];
// add sites
function addSite(){
    let nomSite = $("#sites").val();
    let cheminPhotos = $("#photos").val();
    sites.push({nomSite, cheminPhotos});
    $.post("add-sites.php", { sites },
    function(data) {
        $('#sites_results').html(data);
    });
    document.cookie = "sites_array = " + JSON.stringify(sites);
}
// add hotels when click on ajouter
function addHotel(){
   let  hotel = $("#hotels").val();
    hotels.push(hotel);
    $.post("add-hotels.php", { hotels },
    function(data) {
        $('#hotels_results').html(data);
    });
    document.cookie = "hotels_array = " + JSON.stringify(hotels);
}

// add restaurants when click on ajouter
function addResto(){
    let resto = $("#restos").val();
    restos.push(resto);
    $.post("add-restos.php", { restos },
    function(data) {
        $('#restos_results').html(data);
    });
    document.cookie = "restos_array = " + JSON.stringify(restos);
}

// add gares when click on ajouter
function addGare(){
    let gare = $("#gares").val();
    gares.push(gare);
    $.post("add-gares.php", { gares },
    function(data) {
        $('#gares_results').html(data);
    });
    document.cookie = "gares_array = " + JSON.stringify(gares);
}

// add airports when click on ajouter
function addAeroport(){
    let aeroport = $("#aeroports").val();
    aeroports.push(aeroport);
    $.post("add-aeroports.php", { aeroports },
    function(data) {
        $('#aeroports_results').html(data);
    });
    document.cookie = "aeroports_array = " + JSON.stringify(aeroports);
}

// get the selected value and get the list of countries in this continent in the database
let continentSelected  = "";
function selectContinent(){
    continentSelected =  $("#continent option:selected").text().toString();
    $.post("get-countries.php", { continentSelected: continentSelected },
    function(data) {
        $('#list-pays').html(data);
    });

}