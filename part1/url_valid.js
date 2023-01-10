
function start(){
    document.getElementById('button').addEventListener("click", checkUrl, false);
    // document.getElementById('button').addEventListener("click", disable, false);

}


function isValidUrl(string) {
    var res = string.match(/(http(s)?:\/\/.)?(www\.)?[-a-zA-Z0-9@:%._\+~#=]{2,256}\.[a-z]{2,6}\b([-a-zA-Z0-9@:%_\+.~#?&//=]*)/g);
    return (res !== null)
};


function isURL(str) {

    // if(window.XMLHttpRequest)
    
    // request = new XMLHttpRequest();
    // else
    //     request = new ActiveXObject("Microsoft.XMLHTTP");
    // request.open('GET', str, false);
    // request.send(); // there will be a 'pause' here until the response to come.
    // // the object request will be actually modified
    // if (request.status === 404) {
    //     return false;
    // }

    var request = new XMLHttpRequest();  
    request.open('GET', str, true);
    request.onreadystatechange = function(){
        if (request.status === 404) {  
            return false;
        }  
        
    };
    try{

    }
    catch(e){}

    return true;
    
}

function existsFile(url) {
    var http = new XMLHttpRequest();
    http.open('HEAD', url, false);
    http.send();
    return http.status!=404;
 }

function disable(){
    document.getElementById("sumbit").disable = true;
}

function checkUrl(){

    
    var url = document.getElementById('url').value;
    console.log(url);
    console.log(isValidUrl(url));

    if(isValidUrl(url)){
        document.getElementById('results').innerHTML = url;
        document.getElementById('submit').disabled = false;
    }
    else{
        console.log('Url is incorrect');
    }
}


window.addEventListener("load", start, false);

