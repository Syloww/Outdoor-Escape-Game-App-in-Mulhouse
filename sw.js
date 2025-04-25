var version = 'v1:0:28'; // Version du cache

self.addEventListener("install", function(event) {
  self.skipWaiting();
  event.waitUntil(
    caches.open(version + 'fundamentals')
      .then(function(cache) {
        return cache.addAll([
          '/',                  // Page d'accueil
          '/index.html',        // Fichier principal
          '/manifest.json',     // Manifest de l'application
          '/salim.html',
		  '/sakina.html',
		  '/sacha.html',
		  '/dialogue.html'

        ]);
      })
      .catch(function(err) {
        console.error('Erreur pendant le cache des fichiers :', err);
      })
  );
});

self.addEventListener("fetch", function(event) {
  // On filtre les requêtes HTTP GET
  if (event.request.url.startsWith('http') && event.request.method === 'GET') {
    event.respondWith(
      caches.match(event.request)
        .then(function(cached) {
          var networked = fetch(event.request)
            .then(fetchedFromNetwork, unableToResolve)
            .catch(unableToResolve);

          return cached || networked;

          function fetchedFromNetwork(response) {
            // Clone et stocke la réponse dans le cache
            var cacheCopy = response.clone();
            caches.open(version + 'pages')
              .then(function(cache) {
                cache.put(event.request, cacheCopy);
              });
            return response;
          }

          function unableToResolve() {
            return new Response("<h1>Cette ressource n'est pas disponible hors ligne</h1>", {
              status: 503,
              statusText: 'Service Unavailable',
              headers: new Headers({
                'Content-Type': 'text/html'
              })
            });
          }
        })
    );
  }
});

self.addEventListener("activate", function(event) {
  event.waitUntil(
    caches.keys()
      .then(function(keys) {
        return Promise.all(
          keys
            .filter(function(key) {
              return !key.startsWith(version);
            })
            .map(function(key) {
              return caches.delete(key);
            })
        );
      })
  );
});
