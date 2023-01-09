
function start(){
    document.getElementById('button').addEventListener("click", checkUrl, false);
}

function isValidUrl(string) {
    let url;
    try {
      url = new URL(string);
    } catch (_) {
      return false;
    }
    return url.protocol === "http:" || url.protocol === "https:";
}

function isURL(str) {
    var pattern = new RegExp('^(https?:\\/\\/)?'+ // protocol
    '((([a-z\\d]([a-z\\d-]*[a-z\\d])*)\\.?)+[a-z]{2,}|'+ // domain name
    '((\\d{1,3}\\.){3}\\d{1,3}))'+ // OR ip (v4) address
    '(\\:\\d+)?(\\/[-a-z\\d%_.~+]*)*'+ // port and path
    '(\\?[;&a-z\\d%_.~+=-]*)?'+ // query string
    '(\\#[-a-z\\d_]*)?$','i'); // fragment locator
    return pattern.test(str);
  }

function checkUrl(){

    
    var url = document.getElementById('url').value;
    console.log(url);
    console.log(isValidUrl(url));

    if(isValidUrl(url)){
        console.log('Url is correct');
        document.getElementById('results').innerHTML = url;
    }
    else{
        console.log('Url is incorrect');
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