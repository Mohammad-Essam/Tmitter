
let textarea = document.getElementById('tweetArea');
textarea.addEventListener('input', function() {
    textarea.style.height = "";
    textarea.style.height = Math.max(textarea.scrollHeight, 50) + "px";
});
console.log(textarea)
