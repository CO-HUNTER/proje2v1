"use strict";
/**
 *
 * ----------------------#
 *  ToriGadiCinderi      #
 * ----------------------#
 *
 * @version 1.3
 * @author Ahmet Bıyıklı
 *
 */
const ToriGadiCinderi = (function () {
    const nsettings = {
        type: "",
        duration: 0,
    };

    const psettings = {
        content: {
            header: "",
            icon: true,
        },
        property: {
            type: "",
            confirmButtons: true,
        },
    };

    /**
     * -----------------------*
     * Create html element
     * -----------------------*
     *
     * @param {HTMLElement} el Sayfada oluşturulacak olan html elementi
     * @param {CSSClass} cls Oluşturulacak olan elementin classı
     * @returns {HTMLElement}
     */
    function createHtmlElement(el, cls) {
        let htmlElement = document.createElement(el);
        cls ? (htmlElement.className = cls) : null;
        return htmlElement;
    }

    const init = () => {
        let parentElem = createHtmlElement("div", "alertMessageContainer");
        document.querySelector("body").appendChild(parentElem);
    };

    /**
     * -------------------------------*
     * Alert Notification Method
     * -------------------------------*
     *
     * @param {string} msg Parametre olarak gelen mesajı belirtilen alana yazar
     * @param {Object} param Alert nesnesinin ayarlarını içeren obje
     *
     */
    const notification = (msg, param) => {
        if (msg && param && typeof param === "object") {
            if (Object.controlInterface(nsettings, param)) {
                param.duration = param.duration ? param.duration : 2000;
                let alertErrorMessage = document.createElement("div");
                let msgContent = document.createElement("p");
                let icon = document.createElement("i");

                switch (param.type) {
                    case "error":
                        alertErrorMessage.classList.add("alertError");
                        icon.className = "fa fa-exclamation-circle";
                        break;

                    case "success":
                        alertErrorMessage.classList.add("alertSuccess");
                        icon.className = "far fa-check-circle";
                        break;
                }
                msgContent.innerText = msg;
                alertErrorMessage.appendChild(icon);
                alertErrorMessage.appendChild(msgContent);

                setTimeout(() => {
                    alertErrorMessage.classList.add("active");
                }, 10);

                document
                    .querySelector(".alertMessageContainer")
                    .appendChild(alertErrorMessage);

                setTimeout(() => {
                    alertErrorMessage.classList.add("hide");
                    alertErrorMessage.style.transform = "scale(0)";
                }, param.duration);

                setTimeout(() => {
                    alertErrorMessage.remove();
                }, param.duration + 800);
            }
        }
    };

    /**
     * --------------------------*
     * Alert Popup Method
     * --------------------------*
     *
     * @param {string} content Açılacak olan modalın Mesaj ve Başlık Kısmı
     * @param {Object} parameter Açılacak olan modalın tipi ve özellikleri
     * @param {Function} callback İsteğe bağlı çalışacak olan fonksiyon
     *
     */
    const popup = (options, parameter, callback) => {
        if (Object.controlInterface(psettings, parameter)) {
            //--- Create html element
            let alert__popup = createHtmlElement("div", "alert__popup");
            let popup__iconBx = createHtmlElement("div", "popup__iconBx");
            let popup__contentBx = createHtmlElement("div", "popup__contentBx");
            let confirm__buttonBx = createHtmlElement(
                "div",
                "confirm__buttonBx"
            );
            let buttonYes = createHtmlElement(
                "button",
                "confirm__button button__yes"
            );
            let buttonNo = createHtmlElement(
                "button",
                "confirm__button button__no"
            );
            let header = createHtmlElement("header");
            let h2 = createHtmlElement("h2");
            let p = createHtmlElement("p");
            let i = createHtmlElement("i", "fas fa-exclamation");
            let closePopup = createHtmlElement("i", "fas fa-times");
            let operation = "";

            buttonYes.dataset.functionType = "yes";
            buttonNo.dataset.functionType = "no";

            const { content, property } = parameter;

            p.innerText = options;
            h2.innerText = content.header;
            buttonYes.innerText = "EVET";
            buttonNo.innerText = "HAYIR";

            const deletePopup = () => {
                setTimeout(() => {
                    alert__popup.remove();
                }, 500);
                alert__popup.classList.remove("active");
            };

            //--- Add Page
            header.appendChild(h2);
            [header, p].forEach((elem) => popup__contentBx.appendChild(elem));
            popup__iconBx.appendChild(i);
            [buttonYes, buttonNo].forEach((elem) =>
                confirm__buttonBx.appendChild(elem)
            );
            [
                popup__iconBx,
                popup__contentBx,
                confirm__buttonBx,
                closePopup,
            ].forEach((elem) => alert__popup.appendChild(elem));

            setTimeout(() => {
                alert__popup.classList.add("active");
            }, 100);

            document.querySelector("body").appendChild(alert__popup);

            //--- Show Hide Elements
            if (!property.confirmButtons) {
                confirm__buttonBx.style.display = "none";
            }

            //--- Event Listener
            closePopup.addEventListener("click", () => {
                deletePopup();
            });

            [buttonYes, buttonNo].forEach((btn) => {
                btn.addEventListener("click", function () {
                    operation = this.getAttribute("data-function-type");
                    switch (operation) {
                        case "yes":
                            if (callback && typeof callback === "function") {
                                callback();
                                deletePopup();
                            }
                            break;

                        case "no":
                            deletePopup();
                            break;
                    }
                });
            });
        } else {
            console.log("adds");
        }
    };

    init();

    //--- Public
    return { notification, popup };
})();

const tori = ToriGadiCinderi;
