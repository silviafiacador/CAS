/* Um Service Worker é um script que seu navegador 
executa em segundo plano, separado da página da Web, 
possibilitando recursos que não precisam de 
uma página da Web ou de interação do usuário.*/

var CACHE_NAME = 'CAS-static-v1';

self.addEventListener('install', function (event) {
  event.waitUntil(
    caches.open(CACHE_NAME).then(function (cache) {
      return cache.addAll([

      '/',
      '/index.html',
      '/scripts/app.js',
      '/estilo/estiloCas.css',
      '/imagens/cas.png',
      '/imagens/cas2x.png',
      '/imagens/cas4x.png'
      ]);
    })
  )
});


self.addEventListener('activate', function activator(event) {
  event.waitUntil(
    caches.keys().then(function (keys) {
      return Promise.all(keys
        .filter(function (key) {
          return key.indexOf(CACHE_NAME) !== 0;
        })
        .map(function (key) {
          return caches.delete(key);
        })
      );
    })
  );
});


self.addEventListener('fetch', function (event) {
  event.respondWith(
    caches.match(event.request).then(function (cachedResponse) {
      return cachedResponse || fetch(event.request);
    })
  );
});

