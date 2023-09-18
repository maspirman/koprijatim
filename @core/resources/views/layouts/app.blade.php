<meta name="theme-color" content="#007bff">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
<meta name="apple-mobile-web-app-title" content="KopriJatim">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="manifest" href="{{ asset("assets/frontend/js/manifest.json") }}">

<script>
  if ('serviceWorker' in navigator) {
    navigator.serviceWorker.register('{{ asset("assets/frontend/js/service-worker.js") }}')
    .then(function(registration) {
        console.log('Service Worker registered with scope:', registration.scope);
    })
    .catch(function(error) {
        console.error('Service Worker registration failed:', error);
    });
}

</script>

