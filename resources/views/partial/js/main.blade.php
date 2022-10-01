  <script async src="https://www.googletagmanager.com/gtag/js?id=G-GBZ3SGGX85"></script>
  <script>
      window.dataLayer = window.dataLayer || [];

      function gtag() {
          dataLayer.push(arguments);
      }
      gtag("js", new Date());

      gtag("config", "G-GBZ3SGGX85");
  </script>
  <!-- Google Tag Manager -->
  <script>
      (function(w, d, s, l, i) {
          w[l] = w[l] || [];
          w[l].push({
              "gtm.start": new Date().getTime(),
              event: "gtm.js"
          });
          var f = d.getElementsByTagName(s)[0],
              j = d.createElement(s),
              dl = l != "dataLayer" ? "&l=" + l : "";
          j.async = true;
          j.src = "https://www.googletagmanager.com/gtm.js?id=" + i + dl;
          f.parentNode.insertBefore(j, f);
      })(window, document, "script", "dataLayer", "GTM-NXZMQSS");
  </script>
  <script src="{{ asset('vendors/scripts/core.js') }}"></script>
  <script src="{{ asset('vendors/scripts/script.min.js') }}"></script>
  <script src="{{ asset('vendors/scripts/process.js') }}"></script>
  <script src="{{ asset('vendors/scripts/layout-settings.js') }}"></script>
  <script src="{{ asset('src/plugins/apexcharts/apexcharts.min.js') }}"></script>
  <script src="{{ asset('src/plugins/datatables/js/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('src/plugins/datatables/js/dataTables.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('src/plugins/datatables/js/dataTables.responsive.min.js') }}"></script>
  <script src="{{ asset('src/plugins/datatables/js/responsive.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('vendors/scripts/dashboard3.js') }}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.js"></script>

  @include('sweetalert::alert')
