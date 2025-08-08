// Service Worker for Gas Station System
const CACHE_NAME = 'gas-station-cache-v1';
const urlsToCache = [
  '/',
  '/dashboard/',
  '/dashboard/index.php',
  '/dashboard/assets/css/main.css',
  '/dashboard/assets/js/main.js',
  '/dashboard/assets/js/opt_modal.js',
  '/dashboard/extensions/bootstrap/css/bootstrap.min.css',
  '/dashboard/extensions/Jquery/jquery.js'
];

// Install event - cache resources
self.addEventListener('install', event => {
  event.waitUntil(
    caches.open(CACHE_NAME)
      .then(cache => {
        console.log('Opened cache');
        return cache.addAll(urlsToCache);
      })
  );
});

// Fetch event - serve from cache when offline
self.addEventListener('fetch', event => {
  event.respondWith(
    caches.match(event.request)
      .then(response => {
        // Return cached version or fetch from network
        return response || fetch(event.request);
      })
  );
});

// Activate event - clean up old caches
self.addEventListener('activate', event => {
  event.waitUntil(
    caches.keys().then(cacheNames => {
      return Promise.all(
        cacheNames.map(cacheName => {
          if (cacheName !== CACHE_NAME) {
            return caches.delete(cacheName);
          }
        })
      );
    })
  );
});
