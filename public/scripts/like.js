function like(context, tweet_id){
    let xhr = new XMLHttpRequest()
    let url = `/tweets/${tweet_id}/like`
    xhr.open('POST', url, true)
    xhr.setRequestHeader('Content-type', 'application/json; charset=UTF-8')

    //i needed to add the csrf token as a header to be working
    //the csrf token is stored in the meta element and retrieved from there by the
    //next line
    xhr.setRequestHeader('X-CSRF-TOKEN',document.getElementsByName('csrf')[0].content)
    xhr.send();
    xhr.onload = function () {

        if(xhr.status === 201) {
            // action refelcted on the database
            //like
            context.parentElement.childNodes[3].classList.remove('hidden')
            context.parentElement.childNodes[1].classList.add('hidden')
            context.parentElement.childNodes[5].classList.add('hovered-red')
            //increment by one
            context.parentElement.childNodes[5].innerHTML = +context.parentElement.childNodes[5].innerHTML + 1;

        }
        else if(xhr.status == 200)
        {
            //nothing happened in dataqbase.
            alert("connection error")
        }
    }
}



function unlike(context, tweet_id){
    let xhr = new XMLHttpRequest()
    let url = `/tweets/${tweet_id}/unlike`
    xhr.open('POST', url, true)
    xhr.setRequestHeader('Content-type', 'application/json; charset=UTF-8')

    xhr.setRequestHeader('X-CSRF-TOKEN',document.getElementsByName('csrf')[0].content)
    xhr.send();
    xhr.onload = function () {

        if(xhr.status === 201) {
            // action refelcted on the database
        context.parentElement.childNodes[1].classList.remove('hidden')
        context.parentElement.childNodes[3].classList.add('hidden')
        context.parentElement.childNodes[5].classList.remove('hovered-red')
        context.parentElement.childNodes[5].innerHTML = +context.parentElement.childNodes[5].innerHTML - 1;
        }
        else if(xhr.status == 200)
        {
            //nothing happened in dataqbase.
            alert('connection error')
        }
    }
}



