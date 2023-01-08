
function start(){
    document.getElementById('submit').addEventListener("click", checkUrl, false);
}

const isValidUrl = urlString=> {
    let url;
    try { 
          url =new URL(urlString); 
    }
    catch(e){ 
      return false; 
    }
    return url.protocol === "http:" || url.protocol === "https:";
}

function checkUrl(){
    console.log("here dawg");
    var url = document.getElementById('url').innerHTML;
    if(isValidUrl(url)){
        console.log('Url is correct');
        document.getElementById('results').innerHTML = url;
    }
}


window.addEventListener("load", start, false);

// if(window.XMLHttpRequest)
//     request = new XMLHttpRequest();
// else
//     request = new ActiveXObject("Microsoft.XMLHTTP");
// request.open('GET', 'http://www.mozilla.org', false);
// request.send(); // there will be a 'pause' here until the response to come.
// // the object request will be actually modified
// if (request.status === 404) {
//     alert("The page you are trying to reach is not available.");
// }