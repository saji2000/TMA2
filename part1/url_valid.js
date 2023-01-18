


// to ensure the address is correct
function isValidUrl(string) {
    var res = string.match(/(http(s)?:\/\/.)?(www\.)?[-a-zA-Z0-9@:%._\+~#=]{2,256}\.[a-z]{2,6}\b([-a-zA-Z0-9@:%_\+.~#?&//=]*)/g);
    return (res !== null)
};

// to ensure the http protocol
function isValidHttpUrl(string) {
    let url;
    try {
      url = new URL(string);
    } catch (_) {
      return false;
    }

    return url.protocol === "http:" || url.protocol === "https:";
}

function isURL(str) {

    var request;
    if(window.XMLHttpRequest)
        request = new XMLHttpRequest();
    else
        request = new ActiveXObject("Microsoft.XMLHTTP");
    request.open('GET', str, false);
    try{
        request.send(); // there will be a 'pause' here until the response to come.
    }
    catch(error){
        console.log(request);
    }
    // the object request will be actually modified
    if (request.status === 404) {
        alert("The page you are trying to reach is not available.");
    }
    
}

function existsFile(url) {
    var http = new XMLHttpRequest();
    http.open('HEAD', url, false);
    try{
        http.send();
    }
    catch(error){
        console.log(error);
    }
    return http.status!=404;
 }

 // enabling the submit buttons
function enable(id){
    document.getElementById(id).disabled = false;
}

function checkUrl(address, id){
    
    var url = document.getElementById(address).value;
    console.log(url);
    console.log("Old method:" + isValidUrl(url));
    console.log("New method:" + isValidHttpUrl(url));

    if(isValidUrl(url) && isValidHttpUrl(url)){
        enable(id);
    }
    else if(isValidUrl(url) && !isValidHttpUrl(url)){
        alert('Please add the proper http(s) protocol');
    }
    else{
        alert("Wrong address");
    }
}

