import "./bootstrap";

import Alpine from "alpinejs";

window.Alpine = Alpine;

Alpine.start();
var btnCopy = document.getElementById("btnCopy");
if (btnCopy != null) {
    btnCopy.onclick = function () {
        var copyText = document.getElementById("copyUrl");
        copyText.select();
        copyText.setSelectionRange(0, 99999);
        navigator.clipboard.writeText(copyText.value);
        btnCopy.innerHTML = "Copied ";
        const iconCopied = document.createElement("i");
        iconCopied.classList.add("fas", "fa-clipboard-check");
        btnCopy.appendChild(iconCopied);
        const copyDefault = document.createElement("i");
        copyDefault.classList.add("fas", "fa-copy");
        setTimeout(function () {
            btnCopy.innerHTML = "Copy ";
            btnCopy.appendChild(copyDefault);
        }, 1500);
    };
}
