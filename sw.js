/******************
	Pour mieux comprendre ce script, voir : https://css-tricks.com/serviceworker-for-offline/
*******************/

var version = 'v1:0:21';

self.addEventListener("install", function(event) {
	self.skipWaiting();
	event.waitUntil(
	caches.open(version + 'fundamentals')
      .then(function(cache) {
        return cache.addAll([
          '/',
          'index.php',
          'manifest.json',
		  'salim.php'
        ]);
      })
	);
});

self.addEventListener("fetch", function(event) {
  if (event.request.url.indexOf('http') === 0 && event.request.method == 'GET') {
	  event.respondWith(
		caches
		  .match(event.request)
		  .then(function(cached) {
			var networked = fetch(event.request)
			  .then(fetchedFromNetwork, unableToResolve)
			  .catch(unableToResolve);
			return cached || networked;

			function fetchedFromNetwork(response) {
			  var cacheCopy = response.clone();
			  caches.open(version + 'pages')
					.then(function add(cache) {
						cache.put(event.request, cacheCopy);
					});
			  return response;
			}

			function unableToResolve () {
			 
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
    caches
      .keys()
      .then(function (keys) {
        return Promise.all(
          keys
            .filter(function (key) {
              return !key.startsWith(version);
            })
            .map(function (key) {
              return caches.delete(key);
            })
        );
      })
  );
});
