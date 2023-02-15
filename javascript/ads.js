let image = document.getElementById('image');

let images = ['media/ad1.png', 'media/apple-iphone-11-500x500.jpg', 'media/screen_protector.jpg'];

setInterval(function(){
    let random = Math.floor(Math.random() * 3);
    image.src = images[random];
}, 2000);