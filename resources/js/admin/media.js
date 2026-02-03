/* ====================================================================
  Dynamically switches a file input between Image and Video mode
  based on selected media type..
=======================================================================*/
function changeMediaType(target) {
    const targetFieldId = target.getAttribute("data-targetId");
    const targetField = document.querySelector(`#${targetFieldId}`);
    const targetFieldLabel = document.querySelector(
        `#${targetFieldId}-media-label`,
    );
    const labelText1 = targetFieldLabel.querySelector(".dynamic-text1");
    const labelText2 = targetFieldLabel.querySelector(".dynamic-text2");
    const targetFieldPreviewSection = document.querySelector(
        `#${targetFieldId}-preview`,
    );

    if (!targetFieldId || !targetField || !targetFieldPreviewSection) return;
    targetFieldPreviewSection.innerHTML = "";

    let mediaType = target.value;

    if (mediaType === "video") {
        targetField.accept = "video/*";
        targetField.value = "";

        labelText1.innerText = "Click to upload video";
        labelText2.innerText = "(MP4, MOV, AVI)";
    } else {
        targetField.accept = "image/*";
        targetField.value = "";

        labelText1.innerText = "Click to upload image";
        labelText2.innerText = "(PNG, JPG, GIF)";
    }
}

/* ====================================================================
  toggles play/pause for a video when its button is clicked.
=======================================================================*/
function playVideo(target) {
    let targetVideoId = target.getAttribute("data-targetId");
    let targetVideo = document.querySelector(`#${targetVideoId}`);
    let playBtn = target.querySelector(".play-btn");
    let pauseBtn = target.querySelector(".pause-btn");

    if (!targetVideo) return;

    if (!targetVideo.paused && !targetVideo.ended) {
        targetVideo.pause();
        playBtn.classList.remove("hidden");
        pauseBtn.classList.add("hidden");
    } else {
        targetVideo
            .play()
            .then(() => {
                if (targetVideo.requestFullscreen) {
                    targetVideo.requestFullscreen();
                } else if (targetVideo.webkitRequestFullscreen) {
                    targetVideo.webkitRequestFullscreen(); // Safari
                } else if (targetVideo.msRequestFullscreen) {
                    targetVideo.msRequestFullscreen(); // IE/Edge
                }

                playBtn.classList.add("hidden");
                pauseBtn.classList.remove("hidden");
            })
            .catch((err) => console.error("Error playing video:", err));
    }

    /* ====================================================================
      Updates the play/pause button state when the user exits fullscreen by 
      checking whether the video is still playing or has been paused.
     =======================================================================*/
    function updateButtonOnFullscreenChange() {
        const isFullScreen =
            document.fullscreenElement === targetVideo ||
            document.webkitFullscreenElement === targetVideo ||
            document.msFullscreenElement === targetVideo;

        if (!isFullScreen) {
            if (targetVideo.paused || targetVideo.ended) {
                playBtn.classList.remove("hidden");
                pauseBtn.classList.add("hidden");
            } else {
                playBtn.classList.add("hidden");
                pauseBtn.classList.remove("hidden");
            }
        }
    }

    document.addEventListener(
        "fullscreenchange",
        updateButtonOnFullscreenChange,
    );
    document.addEventListener(
        "webkitfullscreenchange",
        updateButtonOnFullscreenChange,
    );
    document.addEventListener(
        "msfullscreenchange",
        updateButtonOnFullscreenChange,
    );
}
export { changeMediaType, playVideo };
