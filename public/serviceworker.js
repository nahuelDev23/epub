var staticCacheName = "pwa-v" + new Date().getTime();
var filesToCache = [
    '/offline',
    '/pdf',
    '/',
    '/pdf/1',
    '/css/app.css',
    '/js/app.js',
    '/reader/css/normalize.css',
    '/reader/css/popup.css',
    '/reader/css/annotations.css',
    '/reader/css/main.css',
    '/reader/js/epub.js',
    '/reader/js/epub.min.map',
    '/reader/js/reader.js',
    '/reader/js/reader.js.map',
    '/reader/js/libs/jquery.min.js',
    '/reader/js/libs/zip.min.js',
    '/reader/js/libs/screenfull.min.js',
    '/images/icons/icon-72x72.png',
    '/images/icons/icon-96x96.png',
    '/images/icons/icon-128x128.png',
    '/images/icons/icon-144x144.png',
    '/images/icons/icon-152x152.png',
    '/images/icons/icon-192x192.png',
    '/images/icons/icon-384x384.png',
    '/images/icons/icon-512x512.png',
];

// Cache on install
self.addEventListener("install", event => {
    this.skipWaiting();
    event.waitUntil(
        caches.open(staticCacheName)
            .then(cache => {
                return cache.addAll(filesToCache);
            })
    )
});

// Clear cache on activate
self.addEventListener('activate', event => {
    event.waitUntil(
        caches.keys().then(cacheNames => {
            return Promise.all(
                cacheNames
                    .filter(cacheName => (cacheName.startsWith("pwa-")))
                    .filter(cacheName => (cacheName !== staticCacheName))
                    .map(cacheName => caches.delete(cacheName))
            );
        })
    );
});

// Serve from Cache
self.addEventListener("fetch", event => {
    event.respondWith(
        caches.match(event.request)
            .then(response => {
                return response || fetch(event.request);
            })
            .then(function(response) {
                cache.put(event.request, response.clone());
                return response;
              })
            .catch(() => {
                return caches.match('offline');
            })
    )
});

// const swScriptUrl = new URL(self.location);

// Get URL objects for each client's location.
// self.clients.matchAll({includeUncontrolled: true}).then(clients => {
//     for (const client of clients) {
//         let nuevas = new URL(client.url).href;
//         filesToCache.push(nuevas);
//     }
// });