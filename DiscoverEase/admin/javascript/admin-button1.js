function showIframe(iframeNumber, button) {
    for (let i = 1; i <= 4; i++) {
        const iframe = document.getElementById(`iframe${i}`);
        iframe.style.display = "none";
    }

    const selectedIframe = document.getElementById(`iframe${iframeNumber}`);
    selectedIframe.style.display = "block";

}


var signout = document.getElementById('signout');

signout.addEventListener('click', function() {
    window.location.href = "../admin/login-page/login.php";
});

document.addEventListener("DOMContentLoaded", function () {
    const iframes = document.querySelectorAll("iframe");

    iframes.forEach(function (iframe, index) {
        iframe.addEventListener("click", function () {
            // Set the iframe source to itself to trigger a reload
            iframe.src = iframe.src;
        });
    });
});
