function isHDRCompatible() {
	if (window.matchMedia("(dynamic-range: high)").matches) {
		return true;
	}
	return false;
}

document.addEventListener("DOMContentLoaded", () => {
  const hdrVideo = document.querySelector("#bright");
  const sdrVideo = document.querySelector("#fallback");

  if (isHDRCompatible()) {
    hdrVideo.classList.add("show");
  } else {
    sdrVideo.classList.add("show");
  }
});
