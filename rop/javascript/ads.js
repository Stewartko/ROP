let image = document.getElementById('image');

let images = ['media/ad1.png', 'media/ad1.png', 'media/ad1.png'];

setInterval(function(){
    let random = Math.floor(Math.random() * 3);
    image.src = images[random];
}, 2000);