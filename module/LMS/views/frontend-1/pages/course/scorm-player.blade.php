@extends('frontend-1.layout.app')
@section('content')
    <main>
        <main>
            <style>
                body, html {
                    margin: 0;
                    padding: 0;
                    width: 100%;
                    height: 100%;
                }
                .container {
                    position: relative;
                    width: 100%;
                    height: 100%;
                }
                iframe {
                    width: 100%;
                    height: 100vh;
                    border: none;
                }

                @media (max-width: 768px) { /* Adjust the max-width to target mobile devices as needed */
                    .mobile-iframe {
                        width: 100%;
                        height: 100%;
                    }
                }
            </style>
            <section class="pt-0">
                <div class="container">
                    <div class="card border">
                        <div class="card-body">
                            <div id="valid-iframes"></div>
                            <div class="card-body d-flex justify-content-center">
                                <button class="btn btn-primary btn-sm rounded" onclick="toggleFullscreen()"><i class="fas fa-fw fa-expand"></i> Fullscreen</button>
                            </div>
                        </div>
                    </div>
                </div>

            </section>
        </main>
        <!-- Back to top -->
        <div class="back-top"><i class="bi bi-arrow-up-short position-absolute top-50 start-50 translate-middle"></i></div>
    </main>

        <script>
        function checkIframe(url) {
            return new Promise((resolve, reject) => {
                const xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function() {
                    if (xhr.readyState === 4) {
                        if (xhr.status === 200) {
                            resolve(url);
                        } else {
                            reject(url);
                        }
                    }
                };
                xhr.open('GET', url);
                xhr.send();
            });
        }

        function loadValidIframes() {
            const iframes = [
                '{{ url('/') }}/scorm_packages/{{ $link }}/story.html',
                '{{ url('/') }}/scorm_packages/{{ $link }}/scormcontent/index.html'
            ];

            const validIframesContainer = document.getElementById('valid-iframes');

            iframes.forEach(url => {
                checkIframe(url)
                    .then(validUrl => {
                        const iframe = document.createElement('iframe');
                        iframe.src = validUrl;
                        iframe.classList.add('mobile-iframe');
                        validIframesContainer.appendChild(iframe);
                    })
                    .catch(invalidUrl => {
                        console.error('Iframe at ' + invalidUrl + ' not found.');
                    });
            });
        }

        loadValidIframes();

        function toggleFullscreen() {
            var iframe = document.querySelector('#valid-iframes iframe');

            if (iframe) {
                if (iframe.requestFullscreen) {
                    iframe.requestFullscreen();
                } else if (iframe.mozRequestFullScreen) {
                    iframe.mozRequestFullScreen();
                } else if (iframe.webkitRequestFullscreen) {
                    iframe.webkitRequestFullscreen();
                } else if (iframe.msRequestFullscreen) {
                    iframe.msRequestFullscreen();
                }
            } else {
                console.error('Iframe element not found.');
            }
        }


        </script>
@endsection
