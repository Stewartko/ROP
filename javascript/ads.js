let image = document.getElementById('image');

let images = ['media/reklamka1.jpg', 'media/reklamka2.jpg', 'media/ad1.png'];

setInterval(function(){
    let random = Math.floor(Math.random() * 3);
    image.src = images[random];
}, 2000);