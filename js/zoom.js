function openLightbox(src) {
  const lightbox = document.getElementById("imageLightbox");
  const img = document.getElementById("lightboxImage");
  img.src = src;
  lightbox.style.display = "flex";
}

function closeLightbox() {
  const lightbox = document.getElementById("imageLightbox");
  const img = document.getElementById("lightboxImage");
  lightbox.style.display = "none";
  img.src = "";
}

document.addEventListener("DOMContentLoaded", () => {
  const zoomableImages = document.querySelectorAll(".zoomable-image");
  if (zoomableImages.length > 0) {
    // Inject lightbox HTML only if needed
    const lightboxHTML = `
      <div id="imageLightbox" class="lightbox-overlay" onclick="closeLightbox()">
        <span class="lightbox-close" onclick="closeLightbox()">×</span>
        <img class="lightbox-image" id="lightboxImage" src="" alt="Zoomed">
      </div>`;
    document.body.insertAdjacentHTML('beforeend', lightboxHTML);
  }

  zoomableImages.forEach(img => {
    img.style.cursor = 'zoom-in';
    img.addEventListener("click", e => {
      e.stopPropagation();
      openLightbox(img.src);
    });
  });
});
