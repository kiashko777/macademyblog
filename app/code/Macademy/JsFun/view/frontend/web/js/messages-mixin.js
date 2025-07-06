define([], function () {
    "use strict";

    return function (originalMessages) {
        originalMessages.defaults.hideTimeout = 2000;
        return originalMessages;
    }
})
