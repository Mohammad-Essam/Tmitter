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
        element = document.createElement('div');
        element.innerHTML = xhr.responseText;
        tw = element.querySelector('.tweet')
        tweetsContainer = document.querySelector('.tweets');
        // tweetsContainer.insertBefore(tweetsContainer.firstChild,tw);
        tweetsContainer.prepend(tw);


        if(xhr.status === 201) {
            context.parentElement.parentElement.childNodes[1].value = "";
            console.log('clearing the text area')
        }
        else if(xhr.status == 200)
        {
            console.log('am not gonna cleaning')
            //nothing happened in dataqbase.
            // alert("connection error")
        }
    }
}
