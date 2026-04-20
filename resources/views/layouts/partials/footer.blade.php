<footer class="footer-strip container-fluid px-lg-5 text-center">

  @php
    $showBankText = in_array(Route::currentRouteName(), [
      'sales.page',
      'privacy.policy',
      'terms.service',
      'contact.us',
      'about.us',
      'disclaimer',
    ]);
  @endphp
  @if($showBankText)
    <p class="footer-bank-text"><em>
      ClickBank is the retailer of products on this site. CLICKBANK® is a registered trademark of Click Sales Inc., a Delaware corporation located at 1444 S. Entertainment Ave., Suite 410 Boise, ID 83709, USA and used by permission. ClickBank's role as retailer does not constitute an endorsement, approval or review of these products or any claim, statement or opinion used in promotion of these products.</em></p>
  @endif
  
  <p class="footer-tems">
    <a href="{{ route('privacy.policy') }}">Privacy Policy</a> | <a href="{{ route('terms.service') }}">Terms of Service</a> | <a href="{{ route('disclaimer') }}">Disclaimer</a> | <a href="{{ route('contact.us') }}">Contact Us</a> | <a href="{{ route('about.us') }}">About Us</a>
  </p>
 
  <p class="footer-copy">© {{ date('Y') }} thecosmiclifepath.com | ALL RIGHTS RESERVED</p>
</footer>
