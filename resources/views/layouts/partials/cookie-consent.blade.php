{{-- Cookie consent banner + settings dialog. Rendered on every page. --}}
<div id="clpCcBanner" class="clp-cc clp-cc-banner" role="region" aria-label="Cookie notice" hidden>
  <div class="clp-cc-banner__inner">
    <p class="clp-cc-banner__text">
      We use cookies. Necessary cookies keep the site working. With your permission we also use
      analytics cookies (Google Analytics 4, Microsoft Clarity) to understand how the site is used,
      and marketing cookies (Meta Pixel) to measure our advertising. You can accept, reject, or
      choose which ones to allow. See our
      <a href="{{ route('privacy.policy') }}">Privacy Policy</a>.
    </p>

    <div class="clp-cc-actions">
      <button type="button" id="clpCcSettings" class="clp-cc-btn clp-cc-btn--link">Cookie settings</button>
      <button type="button" id="clpCcRejectAll" class="clp-cc-btn">Reject all</button>
      <button type="button" id="clpCcAcceptAll" class="clp-cc-btn clp-cc-btn--primary">Accept all</button>
    </div>
  </div>
</div>

<div id="clpCcModal" class="clp-cc clp-cc-modal" role="dialog" aria-modal="true" aria-labelledby="clpCcModalTitle" hidden>
  <div class="clp-cc-modal__panel">
    <h2 class="clp-cc-modal__title" id="clpCcModalTitle">Cookie settings</h2>
    <p class="clp-cc-modal__intro">
      Choose which cookies you allow. You can change this at any time using the
      &ldquo;Cookie settings&rdquo; link in the footer. Full detail is in our
      <a href="{{ route('privacy.policy') }}">Privacy Policy</a>.
    </p>

    <div class="clp-cc-group">
      <div class="clp-cc-group__head">
        <p class="clp-cc-group__name">Necessary</p>
        <label class="clp-cc-toggle">
          <input type="checkbox" checked disabled aria-label="Necessary cookies, always on">
          <span>Always on</span>
        </label>
      </div>
      <p class="clp-cc-group__desc">
        Needed for the site to work: your session, the security token on forms, and remembering
        this cookie choice. These cannot be switched off.
      </p>
    </div>

    <div class="clp-cc-group">
      <div class="clp-cc-group__head">
        <p class="clp-cc-group__name">Analytics</p>
        <label class="clp-cc-toggle">
          <input type="checkbox" id="clpCcAnalytics" aria-label="Allow analytics cookies">
          <span>Allow</span>
        </label>
      </div>
      <p class="clp-cc-group__desc">
        Google Analytics 4 and Microsoft Clarity, used to see which pages people use and where they
        get stuck. Nothing is loaded from these services until you allow this.
      </p>
    </div>

    <div class="clp-cc-group">
      <div class="clp-cc-group__head">
        <p class="clp-cc-group__name">Marketing</p>
        <label class="clp-cc-toggle">
          <input type="checkbox" id="clpCcMarketing" aria-label="Allow marketing cookies">
          <span>Allow</span>
        </label>
      </div>
      <p class="clp-cc-group__desc">
        Meta (Facebook) Pixel on the homepage, used to measure our advertising. Nothing is sent to
        Meta and no connection to Meta is made until you allow this. Rejecting it does not affect
        your reading in any way.
      </p>
    </div>

    <div class="clp-cc-modal__actions">
      <button type="button" id="clpCcClose" class="clp-cc-btn clp-cc-btn--link">Close</button>
      <button type="button" id="clpCcModalRejectAll" class="clp-cc-btn">Reject all</button>
      <button type="button" id="clpCcModalAcceptAll" class="clp-cc-btn">Accept all</button>
      <button type="button" id="clpCcSave" class="clp-cc-btn clp-cc-btn--primary">Save choices</button>
    </div>
  </div>
</div>
