/**
 * Cookie consent for TheCosmicLifePath.com
 *
 * Nothing that is not strictly necessary is contacted before the visitor has
 * made a choice:
 *   - analytics consent  -> GA4 + Microsoft Clarity
 *   - marketing consent  -> Meta Pixel (homepage only)
 *
 * Loaded synchronously in <head> so that, for a returning visitor who already
 * consented, gtag config runs before the funnel events pushed at the bottom of
 * the page.
 */
(function () {
  'use strict';

  var CONFIG = window.CLP_CONSENT_CONFIG || {};
  var COOKIE_NAME = 'clp_cookie_consent';
  var COOKIE_VERSION = 1;
  var COOKIE_DAYS = 180;

  var state = null;      // { analytics: bool, marketing: bool } once chosen
  var loaded = { analytics: false, marketing: false };

  /* ------------------------------------------------------------------ */
  /* Cookie helpers (the consent cookie itself is strictly necessary)    */
  /* ------------------------------------------------------------------ */

  function readCookie() {
    var match = document.cookie.match(/(?:^|;\s*)clp_cookie_consent=([^;]*)/);

    if (!match) {
      return null;
    }

    try {
      var parsed = JSON.parse(decodeURIComponent(match[1]));

      if (!parsed || parsed.v !== COOKIE_VERSION) {
        return null;
      }

      return {
        analytics: parsed.analytics === true,
        marketing: parsed.marketing === true
      };
    } catch (error) {
      return null;
    }
  }

  function writeCookie(value) {
    var payload = encodeURIComponent(JSON.stringify({
      v: COOKIE_VERSION,
      necessary: true,
      analytics: value.analytics === true,
      marketing: value.marketing === true,
      ts: Math.floor(Date.now() / 1000)
    }));

    var expires = new Date(Date.now() + COOKIE_DAYS * 864e5).toUTCString();
    var secure = location.protocol === 'https:' ? '; Secure' : '';

    document.cookie = COOKIE_NAME + '=' + payload + '; Path=/; Expires=' + expires + '; SameSite=Lax' + secure;
  }

  /* ------------------------------------------------------------------ */
  /* GA4 - queue events until consent, then replay them in order        */
  /* ------------------------------------------------------------------ */

  var rawGtag = window.gtag || function () {
    (window.dataLayer = window.dataLayer || []).push(arguments);
  };
  var gaReady = false;
  var pendingEvents = [];

  window.gtag = function () {
    if (!gaReady && arguments[0] === 'event') {
      pendingEvents.push(Array.prototype.slice.call(arguments));
      return;
    }

    rawGtag.apply(null, arguments);
  };

  function loadScript(src, onLoad) {
    var script = document.createElement('script');
    script.async = true;
    script.src = src;

    if (onLoad) {
      script.addEventListener('load', onLoad);
    }

    (document.head || document.documentElement).appendChild(script);
  }

  function startAnalytics() {
    if (loaded.analytics) {
      return;
    }

    loaded.analytics = true;

    rawGtag('consent', 'update', {
      analytics_storage: 'granted'
    });

    if (CONFIG.ga4Id) {
      loadScript('https://www.googletagmanager.com/gtag/js?id=' + encodeURIComponent(CONFIG.ga4Id));

      rawGtag('js', new Date());
      rawGtag('config', CONFIG.ga4Id);
    }

    // Stop queueing either way: with GA4 configured the queued funnel events
    // are replayed in order, without it they are simply dropped.
    gaReady = true;

    while (pendingEvents.length) {
      var queued = pendingEvents.shift();

      if (CONFIG.ga4Id) {
        rawGtag.apply(null, queued);
      }
    }

    if (CONFIG.clarityId) {
      startClarity(CONFIG.clarityId);
    }
  }

  function startClarity(id) {
    (function (c, l, a, r, i) {
      c[a] = c[a] || function () { (c[a].q = c[a].q || []).push(arguments); };
      var t = l.createElement(r);
      t.async = 1;
      t.src = 'https://www.clarity.ms/tag/' + i;
      var y = l.getElementsByTagName(r)[0];
      y.parentNode.insertBefore(t, y);
    })(window, document, 'clarity', 'script', id);
  }

  /* ------------------------------------------------------------------ */
  /* Meta Pixel - homepage only, marketing consent only                  */
  /* ------------------------------------------------------------------ */

  function startMarketing() {
    rawGtag('consent', 'update', {
      ad_storage: 'granted',
      ad_user_data: 'granted',
      ad_personalization: 'granted'
    });

    if (loaded.marketing || !CONFIG.metaPixelEnabled || !CONFIG.metaPixelId) {
      return;
    }

    loaded.marketing = true;

    /* eslint-disable */
    !function (f, b, e, v, n, t, s) {
      if (f.fbq) return; n = f.fbq = function () {
        n.callMethod ? n.callMethod.apply(n, arguments) : n.queue.push(arguments);
      };
      if (!f._fbq) f._fbq = n; n.push = n; n.loaded = !0; n.version = '2.0'; n.queue = [];
      t = b.createElement(e); t.async = !0; t.src = v;
      s = b.getElementsByTagName(e)[0]; s.parentNode.insertBefore(t, s);
    }(window, document, 'script', 'https://connect.facebook.net/en_US/fbevents.js');
    /* eslint-enable */

    // No automatic advanced matching and no automatic event detection:
    // only the two events below are ever sent.
    window.fbq('set', 'autoConfig', false, CONFIG.metaPixelId);
    window.fbq('init', CONFIG.metaPixelId);
    window.fbq('track', 'PageView');
  }

  /* ------------------------------------------------------------------ */
  /* Applying a decision                                                 */
  /* ------------------------------------------------------------------ */

  function apply(choice) {
    if (choice.analytics) {
      startAnalytics();
    }

    if (choice.marketing) {
      startMarketing();
    }
  }

  function save(choice) {
    var previous = state;

    state = { analytics: choice.analytics === true, marketing: choice.marketing === true };
    writeCookie(state);

    // A tag already running in this page cannot be unloaded, so a withdrawal
    // takes effect with a reload. Granting applies immediately, no reload.
    var withdrew = previous
      && ((previous.analytics && !state.analytics) || (previous.marketing && !state.marketing));

    hideBanner();
    closeModal();

    if (withdrew) {
      location.reload();
      return;
    }

    apply(state);
  }

  /* ------------------------------------------------------------------ */
  /* UI                                                                  */
  /* ------------------------------------------------------------------ */

  var banner = null;
  var modal = null;

  function el(id) {
    return document.getElementById(id);
  }

  function showBanner() {
    if (banner) {
      banner.hidden = false;
    }
  }

  function hideBanner() {
    if (banner) {
      banner.hidden = true;
    }
  }

  function openModal() {
    if (!modal) {
      return;
    }

    var current = state || { analytics: false, marketing: false };
    var analytics = el('clpCcAnalytics');
    var marketing = el('clpCcMarketing');

    if (analytics) {
      analytics.checked = current.analytics === true;
    }

    if (marketing) {
      marketing.checked = current.marketing === true;
    }

    modal.hidden = false;
    document.addEventListener('keydown', onModalKeydown);

    var first = modal.querySelector('button, input:not([disabled])');
    if (first) {
      first.focus();
    }
  }

  function closeModal() {
    if (!modal) {
      return;
    }

    modal.hidden = true;
    document.removeEventListener('keydown', onModalKeydown);
  }

  function onModalKeydown(event) {
    if (event.key === 'Escape') {
      closeModal();

      if (!state) {
        showBanner();
      }
    }
  }

  function bind() {
    banner = el('clpCcBanner');
    modal = el('clpCcModal');

    var acceptAll = { analytics: true, marketing: true };
    var rejectAll = { analytics: false, marketing: false };

    [['clpCcAcceptAll', acceptAll], ['clpCcRejectAll', rejectAll],
     ['clpCcModalAcceptAll', acceptAll], ['clpCcModalRejectAll', rejectAll]]
      .forEach(function (pair) {
        var button = el(pair[0]);

        if (button) {
          button.addEventListener('click', function () { save(pair[1]); });
        }
      });

    var settings = el('clpCcSettings');
    if (settings) {
      settings.addEventListener('click', function () {
        hideBanner();
        openModal();
      });
    }

    var saveButton = el('clpCcSave');
    if (saveButton) {
      saveButton.addEventListener('click', function () {
        save({
          analytics: !!(el('clpCcAnalytics') && el('clpCcAnalytics').checked),
          marketing: !!(el('clpCcMarketing') && el('clpCcMarketing').checked)
        });
      });
    }

    var closeButton = el('clpCcClose');
    if (closeButton) {
      closeButton.addEventListener('click', function () {
        closeModal();

        if (!state) {
          showBanner();
        }
      });
    }

    // Any link or button marked up as a re-opener, e.g. in the footer.
    document.addEventListener('click', function (event) {
      if (!event.target || typeof event.target.closest !== 'function') {
        return;
      }

      var trigger = event.target.closest('[data-clp-cookie-settings], a[href="#cookie-settings"]');

      if (trigger) {
        event.preventDefault();
        hideBanner();
        openModal();
      }
    });

    if (!state) {
      showBanner();
    }
  }

  /* ------------------------------------------------------------------ */
  /* Boot                                                                */
  /* ------------------------------------------------------------------ */

  state = readCookie();

  if (state) {
    apply(state);
  }

  window.clpConsent = {
    get: function () {
      return state ? { necessary: true, analytics: state.analytics, marketing: state.marketing } : null;
    },
    open: openModal,
    hasMarketing: function () {
      return !!(state && state.marketing);
    }
  };

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', bind);
  } else {
    bind();
  }
})();
