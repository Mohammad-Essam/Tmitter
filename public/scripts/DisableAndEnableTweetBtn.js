document.getElementById("tweetArea").addEventListener('input', function() {
   if(this.value.length > 0)
    {
        document.getElementById("tweetBtn").disabled = false;   
        if(document.getElementById("tweetBtn").classList.contains("btn-disabled"))
        {
            document.getElementById("tweetBtn").classList.remove("btn-disabled");
        }
     }
    else
    {
        document.getElementById("tweetBtn").disabled = true;
        document.getElementById("tweetBtn").classList.add("btn-disabled");
    }
});
document.getElementById("tweetBtn").classList.add("btn-disabled");