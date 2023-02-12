


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

 // enabling the submit buttons
function enable(id){
    document.getElementById(id).disabled = false;
}

function checkUrl(address, id){
    
    var url = document.getElementById(address).value;

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

