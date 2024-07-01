<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Video Capture</title>
</head>
<body>
<div>
    <video id="video" width="640" height="480" autoplay></video>
    <button id="startButton">Start Streaming</button>
</div>

<script>
    const video = document.getElementById('video');
    const startButton = document.getElementById('startButton');

    startButton.addEventListener('click', async () => {
        const stream = await navigator.mediaDevices.getUserMedia({ video: true });
        video.srcObject = stream;

        // Here you can add code to send the video stream to your server
    });
</script>
</body>
</html>
