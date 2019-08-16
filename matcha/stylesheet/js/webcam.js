navigator.getUserMedia = (navigator.getUserMedia ||
    navigator.webkitGetUserMedia ||
    navigator.mozGetUserMedia ||
    navigator.msGetUserMedia);

var constraints = {
    video: true,
    audio: false
};
var video_statut = true;
var image_statut = false;

var current;
var PosX = 200;
var PosY = 200;

var width = 275;

if (navigator.getUserMedia)
    navigator.getUserMedia(constraints, successCallback, errorCallback);
else
    console.error("getUserMedia not supported");

function successCallback(localMediaStream) {
    var video = document.querySelector('video');
    video.src = window.URL.createObjectURL(localMediaStream);
    video.play();
};

function errorCallback(err) {
    video_statut = false;
    console.log("error : " + err);
};

function Shot() {
    if (video_statut == true || image_statut == true) {
        var video = document.querySelector('video');
        var canvas = document.createElement('canvas');
        var context = canvas.getContext('2d');
        var filter = document.querySelector('input[name = "img_filter"]:checked');
        if (filter) {
            canvas.width = 640;
            canvas.height = 480;
            cv = document.getElementById("canvas");
            if(cv.firstChild)
                cv.insertBefore(canvas, cv.firstChild);
            else
                cv.appendChild(canvas);

            if (document.getElementById('image').src) {
                var image = new Image();
                image.src = document.getElementById('image').src;
                context.drawImage(image, 0, 0, 640, 480);
            } else
                context.drawImage(video, 0, 0, 640, 480);

            var img = new Image();
            img.src = filter.value;
            context.drawImage(img, PosX, PosY, width, width);

            var data = canvas.toDataURL('image/png');
            canvas.setAttribute('src', data);
            document.getElementById('img').value = data;

            var fd = new FormData(document.forms["form"]);
            var httpr = new XMLHttpRequest();
            httpr.open('POST', 'dropimg.php', true);
            httpr.send(fd);
        } else
            alert("Vous devez d'abord selectionner un filtre.");
    } else
        alert("Vous devez d'abord activer votre webcam ou choisir une image.");
}

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        image = document.getElementById('image');
        reader.onload = function(e) {
            image.style.display = "";
            image.setAttribute('src', e.target.result);
            image.height = 480;
            image.width = 640;
            document.getElementById('video').style.display = "none";
        };

        reader.readAsDataURL(input.files[0]);
    }
    image_statut = true;
}

function myimage(img_url) {
    if ((video_statut == true || image_statut == true) && img_url) {
        current = img_url;
        var element = document.getElementById("filtercanvas");
        if (element)
            element.parentNode.removeChild(element);
        var canvas = document.createElement('canvas');
        var context = canvas.getContext('2d');
        canvas.width = 640;
        canvas.height = 480;
        canvas.draggable = true;
        canvas.id = "filtercanvas";
        canvas.addEventListener("click", getClickPosition, false);
        document.getElementById("canvasvideo").appendChild(canvas);
        var img = new Image();
        img.src = document.getElementById(img_url).value;
        context.drawImage(img, PosX, PosY, width, width);
    }
}

function getClickPosition(e) {
    if (current) {
        var rect = document.getElementById('canvasvideo').getBoundingClientRect();
        PosX = e.clientX - rect.left - (width / 2);
        PosY = e.clientY - rect.top - (width / 2);
        myimage(current);
    }
}