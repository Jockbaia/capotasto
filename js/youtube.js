    // 2. This code loads the IFrame Player API code asynchronously.
    var tag = document.createElement('script');

    tag.src = "https://www.youtube.com/iframe_api";
    var firstScriptTag = document.getElementsByTagName('script')[0];
    firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
    // 3. This function creates an <iframe> (and YouTube player)
    //    after the API code downloads.
    var player;

    function onYouTubeIframeAPIReady() {
        let videoId = document.getElementById("player").innerHTML;
        document.getElementById("player").innerHTML = '';
        player = new YT.Player('player', {
            height: '200',
            width: '300',
            playerVars: {
                'controls': 0,
                'modestbranding': 1,
                'autohide': 1,
                'showinfo': 0,
                'playsinline': 1
            },
            videoId: videoId,
            events: {
                'onReady': onPlayerReady,
                'onStateChange': onPlayerStateChange
            }
        });
        var slider = document.getElementById("myRange");
        var sliderMobile = document.getElementById("myRange-mobile");
        slider.min = 0;
        slider.step = 1;
        sliderMobile.min = 0;
        sliderMobile.step = 1;

    }
    // 4. The API will call this function when the video player is ready.
    function onPlayerReady(event) {
        // event.target.playVideo();
    }

    function play() {
        player.playVideo();
        var slider = document.getElementById("myRange");
        var sliderMobile = document.getElementById("myRange-mobile");
        slider.max = player.getDuration();
        slider.value = player.getCurrentTime();
        sliderMobile.max = player.getDuration();
        sliderMobile.value = player.getCurrentTime();
        setInterval(updateTiming, 1000);
    }

    function updateTiming(seconds = player.getCurrentTime()) {
        let slider = document.getElementById("myRange");
        let min = document.getElementById("min");
        let sec = document.getElementById("sec");

        let sliderMobile = document.getElementById("myRange-mobile");
        let minMobile = document.getElementById("min-mobile");
        let secMobile = document.getElementById("sec-mobile");

        let time = seconds;
        let min_value = Math.floor(player.getCurrentTime() / 60);
        let sec_value = Math.floor(player.getCurrentTime() % 60);
        slider.value = player.getCurrentTime();
        sliderMobile.value = player.getCurrentTime();
        min.innerText = pad(min_value, 2);
        sec.innerText = pad(sec_value, 2);
        minMobile.innerText = pad(min_value, 2);
        secMobile.innerText = pad(sec_value, 2);
    }

    function pad(n, width, z) {
        z = z || '0';
        n = n + '';
        return n.length >= width ? n : new Array(width - n.length + 1).join(z) + n;
    }

    function pause() {
        player.pauseVideo();
    }

    function seek(seconds) {
        player.seekTo(seconds, true);
        updateTiming(seconds);
    }

    function backward() {
        player.seekTo(player.getCurrentTime() - 10, true);
        updateTiming(player.getCurrentTime() - 10);
    }

    function forward() {
        player.seekTo(player.getCurrentTime() + 10, true);
        updateTiming(player.getCurrentTime() + 10);
    }

    // 5. The API calls this function when the player's state changes.
    //    The function indicates that when playing a video (state=1),
    //    the player should play for six seconds and then stop.

    var done = false;

    function onPlayerStateChange(event) {
        let play = document.getElementById("play-button");
        let pause = document.getElementById("pause-button");
        let playMobile = document.getElementById("play-button-mobile");
        let pauseMobile = document.getElementById("pause-button-mobile");
        if (event.data == YT.PlayerState.PLAYING) {
            play.style.display = 'none';
            pause.style.display = 'inline-block';
            playMobile.style.display = 'none';
            pauseMobile.style.display = 'inline-block';
        } else if (event.data == YT.PlayerState.PAUSED) {
            play.style.display = 'inline-block';
            pause.style.display = 'none';
            playMobile.style.display = 'inline-block';
            pauseMobile.style.display = 'none';
        }
    }

    /*
             function seekVideo() {
                 console.log("CYA");
                 var l = document.querySelectorAll('span[id^="time_"]');
                 var rev = [].slice.call(l, 0).reverse();
                 var found = false;
                 for (let i = 0; i < rev.length; i++) {
                     if (!found){
                         let ts = parseInt(rev[i].id.split("_")[1]);
                         if (player.getCurrentTime < ts) {
                           found = true;
                           rev[i-1].style.textDecoration = 'underline';
                           rev[i].style.textDecoration = 'none';
                       }
                     } else {
                         rev[i].style.textDecoration = 'none';
                     }
                 }

             }*/