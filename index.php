<h1> Take Photo </h1>


<!-- Stream video via webcam -->
<div class="video-wrap">
    <video id="video" playsinline autoplay></video>
</div>

<!-- Trigger canvas web API -->
<div class="controller">
    <button id="snap">Capture</button>
</div>

<!-- Video Snapshot -->
<canvas id="canvas" width="640" height="480"></canvas>

<!-- Save Captured Image -->
<form method="POST" action="upload_image.php">
    <input id="image_URI" name="image_URI" type="text" placeholder="DataURL Here">
    <input id="image_name" name="image_name" type="text" placeholder="Image Name" value="imageX">
    <button id="save_image" name="save_image" type="submit" value="Submit">Save Image</button>
</form>

<script>
    //https://www.youtube.com/watch?v=sL5-FhULalM

    'use strict';

    const video = document.getElementById('video');
    const canvas = document.getElementById('canvas');
    const snap = document.getElementById('snap');
    const errorMsgElement = document.getElementById('spanErrorMsg');

    const constraints = {
        audio: false,
        video: true
    };

    async function init(){
        try{
            const stream = await navigator.mediaDevices.getUserMedia(constraints);
            handleSuccess(stream);
        }
        catch(e){
            errorMsgElement.innerHTML = `navigator.getUserMedia.error:${e.toString()}`;
        }
    }

    // Success
    function handleSuccess(stream){
        window.stream = stream;
        video.srcObject = stream;
    }

    //Initialise 
    init();


    //Draw Image
    let context = canvas.getContext('2d');

    snap.addEventListener("click", function(){
        context.drawImage(video, 0, 0, 640, 480);
        const myCanvas = document.querySelector("#canvas");
        const dataURI = myCanvas.toDataURL();
        document.getElementById("image_URI").value = dataURI;
    });
    
</script>
