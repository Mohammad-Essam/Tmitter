function tweet(context){
    let xhr = new XMLHttpRequest()
    let url = `/tweets/store`
    xhr.open('POST', url, true)
    xhr.setRequestHeader('Content-type', 'application/json; charset=UTF-8')
    xhr.setRequestHeader('X-CSRF-TOKEN',document.getElementsByName('csrf')[0].content)
    data = {"tweet": context.parentElement.parentElement.childNodes[1].value};

    console.log(data);
    xhr.send(JSON.stringify(data));
    xhr.onload = function () {
        // console.log(xhr.responseText,xhr);
        element = document.createElement('div');
        element.innerHTML = xhr.responseText;
        // const parser = new DOMParser();
        // const htmlDoc = parser.parseFromString(xhr.responseText, 'text/html');
        // console.log(htmlDoc);
        tw = element.querySelector('.tweet')
        tweetsContainer = document.querySelector('.tweets');
        // tweetsContainer.insertBefore(tweetsContainer.firstChild,tw);
        tweetsContainer.prepend(tw);


        if(xhr.status === 201) {
            context.parentElement.parentElement.childNodes[1].value = "";
        }
        else if(xhr.status == 200)
        {
            //nothing happened in dataqbase.
            // alert("connection error")
        }
    }
}
