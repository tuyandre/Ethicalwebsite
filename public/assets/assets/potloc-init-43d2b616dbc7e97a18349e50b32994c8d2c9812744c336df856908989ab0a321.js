(function () {
  if (window.__POTLOC_INIT__) {
    return;
  }

  var module = {};

  window.__POTLOC_INIT__ = module;

  /*
   *******************
   * General *
   *******************
   */

  /**
   * Basic method to add EventListeners
   */
  module.addEventListener = function addEventListener(el, eventName, handler) {
    if (el.addEventListener) {
      el.addEventListener(eventName, handler);
    } else {
      el.attachEvent("on" + eventName, function () {
        handler.call(el);
      });
    }
  };

  /**
   * Basic method to add Classes
   */
  module.addClass = function addClass(el, className) {
    if (el.classList) {
      el.classList.add(className);
    } else {
      el.className += " " + className;
    }
  };

  /**
   * Basic method to remove Classes
   */
  module.removeClass = function removeClass(el, className) {
    if (el.classList) {
      el.classList.remove(className);
    } else {
      el.className = el.className.replace(
        new RegExp(
          "(^|\\b)" + className.split(" ").join("|") + "(\\b|$)",
          "gi"
        ),
        " "
      );
    }
  };

  /**
   * Basic forEach method
   */
  module.forEach = function forEach(array, callback) {
    for (var i = 0; i < array.length; i++) {
      callback(array[i], i);
    }
  };

  /**
   * Basic some method
   */
  module.some = function some(array, callback) {
    for (var i = 0; i < array.length; i++) {
      if (callback(array[i], i)) {
        return true;
      }
    }

    return false;
  };

  /**
   * Document ready method
   * Yes... We used jQuery code: https://github.com/jquery/jquery/blob/1.12-stable/src/core/ready.js
   */
  // eslint-disable-next-line complexity
  module.ready = function ready(callback) {
    // Catch cases where $(document).ready() is called
    // after the browser event has already occurred.
    // Support: IE6-10
    // Older IE sometimes signals "interactive" too soon
    if (
      document.readyState === "complete" ||
      (document.readyState !== "loading" && !document.documentElement.doScroll)
    ) {
      // Handle it asynchronously to allow scripts the opportunity to delay ready
      window.setTimeout(function () {
        module.ready(callback);
      }, 1);

      // Standards-based browsers support DOMContentLoaded
    } else if (document.addEventListener) {
      // Use the handy event callback
      document.addEventListener("DOMContentLoaded", callback);

      // A fallback to window.onload, that will always work
      window.addEventListener("load", callback);

      // If IE event model is used
    } else {
      // Ensure firing before onload, maybe late but safe also for iframes
      document.attachEvent("onreadystatechange", callback);

      // A fallback to window.onload, that will always work
      window.attachEvent("onload", callback);

      // If IE and not a frame
      // continually check to see if the document is ready
      var top = false;

      try {
        top = window.frameElement === null && document.documentElement;
        // eslint-disable-next-line no-empty
      } catch (e) {}

      if (top && top.doScroll) {
        (function doScrollCheck() {
          try {
            // Use the trick by Diego Perini
            // http://javascript.nwbox.com/IEContentLoaded/
            top.doScroll("left");
          } catch (e) {
            return window.setTimeout(doScrollCheck, 50);
          }

          // and execute any waiting functions
          return window.setTimeout(function () {
            module.ready(callback);
          }, 1);
        })();
      }
    }
  };

  /*
   *******************
   * Browser support *
   *******************
   */

  /**
   * UA Version matcher 1
   */
  module.getFirstMatch = function getFirstMatch(regexp, ua) {
    var match = ua.match(regexp);

    return parseFloat(match && match.length > 0 && match[1]) || "";
  };

  /**
   * UA Version matcher 2
   */
  module.getSecondMatch = function getSecondMatch(regexp, ua) {
    var match = ua.match(regexp);

    return parseFloat(match && match.length > 1 && match[2]) || "";
  };

  /**
   * Method that checks checks whether browsers are compatible or not
   */
  // eslint-disable-next-line complexity
  module.isBrowserSupported = function isBrowserSupported() {
    // https://stackoverflow.com/a/9851769
    // https://github.com/lancedikson/bowser

    var SUPPORTED_VERSIONS = {
      chrome: 72,
      edge: 17,
      firefox: 65,
      safari: 11
    };

    var commonVersionIdentifier = /version\/(\d+(\.?_?\d+)+)/i;
    var currentVersion;
    var ua = navigator.userAgent;

    // Opera 8.0+
    var isOpera =
      (!!window.opr && !!window.opr.addons) ||
      !!window.opera ||
      navigator.userAgent.indexOf(" OPR/") >= 0;

    // Firefox 1.0+
    var isFirefox = typeof InstallTrigger !== "undefined";

    // Safari 3.0+ "[object HTMLElementConstructor]"
    var isSafari =
      /constructor/i.test(window.HTMLElement) ||
      (function (p) {
        return p.toString() === "[object SafariRemoteNotification]";
      })(
        !window["safari"] ||
          (typeof safari !== "undefined" && window.safari.pushNotification)
      );

    // Internet Explorer 6-11
    var isIE = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

    // Edge 20+
    var isEdge = !isIE && !!window.StyleMedia;

    // Chrome 1 - 71
    var isChrome = !isOpera && !isEdge && !!window.chrome;

    // Set currentVersion

    if (isChrome) {
      currentVersion = module.getFirstMatch(
        /(?:chrome|crios|crmo)\/(\d+(\.?_?\d+)+)/i,
        ua
      );
    }

    if (isFirefox) {
      currentVersion = module.getFirstMatch(
        /(?:firefox|iceweasel|fxios)[\s/](\d+(\.?_?\d+)+)/i,
        ua
      );
    }

    if (isSafari) {
      currentVersion = module.getFirstMatch(commonVersionIdentifier, ua);
    }

    if (isEdge) {
      currentVersion = module.getSecondMatch(
        /edg([ea]|ios)\/(\d+(\.?_?\d+)+)/i,
        ua
      );
    }

    return (
      (isChrome && currentVersion >= SUPPORTED_VERSIONS.chrome) ||
      (isFirefox && currentVersion >= SUPPORTED_VERSIONS.firefox) ||
      (isSafari && currentVersion >= SUPPORTED_VERSIONS.safari) ||
      (isEdge && currentVersion >= SUPPORTED_VERSIONS.edge)
    );
  };

  /*
   *******************
   * Cookies support *
   *******************
   */

  /**
   * Method that checks whether cookies are enabled or not
   */
  module.isCookieEnabled = function isCookieEnabled() {
    var cookieName = "potloc_cookie_test=";

    return module.some(
      [
        // If cookie is enable it should work with at least one
        cookieName + "1; SameSite=Strict; Secure",
        cookieName + "1; SameSite=Strict",
        cookieName + "1; Secure",
        cookieName + "1"
      ],
      function cookieCheck(cookie) {
        try {
          document.cookie = cookie;

          var isEnabled = document.cookie.indexOf(cookieName) !== -1;

          document.cookie = cookie + "; expires=Thu, 01-Jan-1970 00:00:01 GMT";

          return isEnabled;
        } catch (e) {
          return false;
        }
      }
    );
  };

  /*
   *******************
   * App stability *
   *******************
   */

  var onceStableStack = [];

  function emitStable() {
    module.forEach(onceStableStack, function (callback) {
      callback();
    });

    onceStableStack = [];

    // Display error message if something is not working
    setTimeout(function () {
      var loadingEl = document.getElementById("potloc-react-init__loading");
      var errorEl = document.getElementById("potloc-react-init__error");

      if (loadingEl && errorEl) {
        loadingEl.style.display = "none";
        errorEl.style.display = "block";
      }
    }, 5 * 1000);
  }

  module.onceStable = function onceStable(callback) {
    onceStableStack[onceStableStack.length] = callback;
  };

  /**
   * Method that sets localStorage when a user accepts the unstable conditions
   */
  module.approveUnstableExperience = function approveUnstableExperience() {
    var nowTime = String(new Date().getTime());

    window.localStorage.setItem(
      "potlocInitUnstableExperienceApproved",
      nowTime
    );
    emitStable();
  };

  /**
   * Method that hides all support DOM elements
   */
  module.hideSupport = function hideSupport() {
    document.getElementById("root-support").style.display = "none";
    document.getElementById("browser-support").style.display = "none";
  };

  /**
   * Method that adds an event listener on the Unstable Condition confirmation button
   */
  module.setApprovedUnstableButton = function setApprovedUnstableButton() {
    module.addEventListener(
      document.getElementById("approved-unstable"),
      "click",
      function () {
        module.approveUnstableExperience();
        module.hideSupport();
      }
    );
  };

  /**
   * Method that displays the root-support DOM element
   */
  module.showRootSupport = function showRootSupport() {
    document.getElementById("root-support").style.display = "block";
  };

  module.noCookie = false;

  /**
   * Method that enable the cookie-support flag
   */
  module.showCookieSupport = function showCookieSupport() {
    module.noCookie = true;
  };

  /**
   * Method that displays the browser-support DOM element
   */
  module.showBrowserSupport = function showBrowserSupport() {
    module.showRootSupport();
    document.getElementById("browser-support").style.display = "block";
    module.setApprovedUnstableButton();
  };

  /*
   *******************
   * Checklist *
   *******************
   */
  var checkList = {
    isBrowserSupported: false,
    isCookieEnabled: true
  };

  /**
   * Method that sets checkist
   */
  module.setCheckList = function setCheckList(checkName, flag) {
    checkList[checkName] = flag;
  };

  /**
   * Method that checks whether the unstable experience is approved or not
   */
  module.isUnstableExperienceApproved = function isUnstableExperienceApproved() {
    var approvedTime = window.localStorage.getItem(
      "potlocInitUnstableExperienceApproved"
    );

    if (!approvedTime) {
      return false;
    }

    approvedTime = Number(approvedTime);
    var nowTime = new Date().getTime();
    var differenceTime = nowTime - approvedTime;
    var DAY_TIME = 86400000;
    var WEEK_TIME = DAY_TIME * 7;

    if (differenceTime > WEEK_TIME) {
      return false;
    }

    return true;
  };

  /**
   * Method that performs checks
   */
  module.check = function check() {
    if (checkList.isCookieEnabled && !module.isCookieEnabled()) {
      return module.showCookieSupport();
    }

    if (module.isUnstableExperienceApproved()) {
      return emitStable();
    }

    if (checkList.isBrowserSupported && !module.isBrowserSupported()) {
      return module.showBrowserSupport();
    }

    return emitStable();
  };

  /*
   *******************
   * Init *
   *******************
   */

  /**
   * Method that calls check when DOM is loaded
   */
  module.ready(module.check);

  (function addClassOnBody() {
    setTimeout(function () {
      var bodyEl = document.querySelector("body");
      var htmlEl = document.querySelector("html");

      if (bodyEl && htmlEl) {
        module.addClass(bodyEl, "global-potloc-init");
        module.addClass(htmlEl, "global-potloc-init");
      } else {
        addClassOnBody();
      }
    }, 10);
  })();
})();
