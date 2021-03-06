(function () {
    "use strict";

    var testCrossOriginError;

    if (navigator.userAgent.search(" Chrome/") !== -1) {
        testCrossOriginError = function (message, url, line) {
            return url === "" && line === 0 && message === "Script error.";
        };
    } else if (navigator.userAgent.slice(0, 6) === 'Opera/') {
        testCrossOriginError = function (message, url, line) {
            return message === "Uncaught exception: DOMException: NETWORK_ERR";
        };
    }

    if (typeof (brackets) !== "undefined" ||
            document.location.href.substr(0, 7) !== "file://" ||
            !testCrossOriginError) {
        return;
    }

    var previousErrorHandler = window.onerror;

    function handleError(message, url, line) {
        if (!testCrossOriginError(message, url, line)) {
            if (previousErrorHandler) {
                return previousErrorHandler(message, url, line);
            }
            return;
        }

        alert("Oops! This application doesn't run in browsers yet.\n\nIt is built in HTML, but right now it runs as a desktop app so you can use it to edit local files. Please use the application shell in the following repo to run this application:\n\ngithub.com/adobe/brackets-shell");

        window.onerror = previousErrorHandler;
    }

    window.onerror = handleError;
}());