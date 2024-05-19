<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css"
        integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600|Open+Sans:400,600,700" rel="stylesheet">
    <link rel="stylesheet" href="../css/easion.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.min.js"></script>
    <script src="../js/chart-js-config.js"></script>
    <title>Pleciplus</title>
    <style>
      .box {
        width: 100vw;
        height: 100vh;
        justify-content: center;
        display: flex;
        align-items: center;
      }
    </style>
</head>

<body>
    <div class="box">
      <div class="gif">
          <img src="../cat2.gif" alt="">
      </div>
      <div class="text">
        <audio controls autoplay src="../acc.mp3" id="audio">    </audio>

        <h3>pinjaman berhasil diajukan</h3>
        <p>menunggu acc dari admin</p>
        <a href="dashboard_pinjaman.php" class="btn btn-warning">kembali ke dashboard</a>
      </div>
   
    </div>
      <script>
        var audio = document.getElementById("audio");
        document.body.addEventListener('click', function () {
          if (audio.paused) {
                // Try to play the audio
                var playPromise = audio.play();
                
                // This catch block is necessary to handle browsers that block autoplay
                playPromise.catch(function(error) {
                    console.log('Autoplay was prevented:', error);
                    // Here you can provide instructions for the user to manually play the audio
                });
            }
        })
      </script>
  
</body>
</html>