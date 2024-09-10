function showToast(message, duration, bgColor, textColor) {
    var toastContainer = document.createElement("div");
    toastContainer.textContent = message;
    toastContainer.style.position = "fixed";
    // toastContainer.style.bottom = "90%";
    toastContainer.style.top = "10px";
    // toastContainer.style.right = "2%";
    toastContainer.style.left = "50%";
    toastContainer.style.transform = "translateX(-50%)";
    toastContainer.style.backgroundColor = bgColor;
    toastContainer.style.color = textColor;
    toastContainer.style.padding = "10px 20px";
    toastContainer.style.fontSize = "16px";
    toastContainer.style.borderRadius = "5px";
    toastContainer.style.zIndex = 9999;
    toastContainer.style.textShadow = "2px 2px 4px rgba(0, 0, 0, 0.5)";
    toastContainer.style.boxShadow = "0px 4px 8px rgba(0, 0, 0, 0.3)";
    document.body.appendChild(toastContainer);
    setTimeout(function () {
        document.body.removeChild(toastContainer);
    }, duration);
}
