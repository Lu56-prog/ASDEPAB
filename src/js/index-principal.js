function togglePlayPause(video) {
    if (video.paused) {
      video.play();
    } else {
      video.pause();
    }
  }
  
  document.addEventListener("DOMContentLoaded", function () {
    var isReload = performance.getEntriesByType("navigation")[0].type === "reload";
    if (!sessionStorage.getItem("modalShown") || isReload) {
      var myModal = new bootstrap.Modal(document.getElementById('ModalInicio'));
      myModal.show();
      sessionStorage.setItem("modalShown", "true");
    }
  });
  