<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="HandheldFriendly" content="true">
    <meta name="format-detection" content="telephone=no">
    <meta name="theme-color" content="#000">
    <link rel="manifest" href="manifest.json">


    <meta name="description" content="Preloader animé pour une meilleure expérience utilisateur">
    <title>Preloader Animé</title>
    <link rel="stylesheet" href="styles/index.css">
</head>

<body>
    <div id="titre">
        <h3>Discorvering</h3>
        <h1>test</h1>
    </div>
    <a href="salim.php">Ballerouge</a>


    <a href="dialogue.php">
        <svg xmlns="http://www.w3.org/2000/svg" width="122" height="122" viewBox="0 0 122 122" fill="none">
            <path
                d="M96 52.3397C102.667 56.1887 102.667 65.8113 96 69.6603L51 95.641C44.3333 99.49 36 94.6788 36 86.9808L36 35.0192C36 27.3212 44.3333 22.51 51 26.359L96 52.3397Z"
                fill="#D9D9D9" />
            <circle cx="61" cy="61" r="58" stroke="white" stroke-width="6" />
        </svg>
    </a>

    <div class="building-container">
        <img src="/images/bat.png" alt="Bâtiments" class="building-img">
    </div>

    <div class="church-container">
        <img src="/images/eglise.png" alt="Église" class="church-img">
    </div>

    <section class="preloader">
        <div class="preloader-content">
            <div class="preloader-item sound-item">
                <svg xmlns="http://www.w3.org/2000/svg" fill="#FFF" viewBox="0 0 16 16">
                    <path
                        d="M11.536 14.01A8.47 8.47 0 0 0 14.026 8a8.47 8.47 0 0 0-2.49-6.01l-.708.707A7.48 7.48 0 0 1 13.025 8c0 2.071-.84 3.946-2.197 5.303z" />
                    <path
                        d="M10.121 12.596A6.48 6.48 0 0 0 12.025 8a6.48 6.48 0 0 0-1.904-4.596l-.707.707A5.48 5.48 0 0 1 11.025 8a5.48 5.48 0 0 1-1.61 3.89z" />
                    <path
                        d="M10.025 8a4.5 4.5 0 0 1-1.318 3.182L8 10.475A3.5 3.5 0 0 0 9.025 8c0-.966-.392-1.841-1.025-2.475l.707-.707A4.5 4.5 0 0 1 10.025 8M7 4a.5.5 0 0 0-.812-.39L3.825 5.5H1.5A.5.5 0 0 0 1 6v4a.5.5 0 0 0 .5.5h2.325l2.363 1.89A.5.5 0 0 0 7 12zM4.312 6.39 6 5.04v5.92L4.312 9.61A.5.5 0 0 0 4 9.5H2v-3h2a.5.5 0 0 0 .312-.11" />
                </svg>
                <h3>Allumez le son !</h3>
            </div>

            <div class="preloader-item location-item">
                <svg xmlns="http://www.w3.org/2000/svg" fill="#fff" viewBox="0 0 16 16">
                    <path
                        d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A32 32 0 0 1 8 14.58a32 32 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10" />
                    <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4m0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                </svg>
                <h3>Activez votre localisation !</h3>
            </div>
        </div>
    </section>


    <script>
        /* Le SW en premier pour éviter les problèmes */
        if ('serviceWorker' in navigator) {
            navigator.serviceWorker.register('sw.js');
        }
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Durée totale du preloader (6 secondes)
            const preloaderDuration = 6000;
            // Délai avant l'apparition des bâtiments après la fin du preloader (500ms)
            const buildingsDelay = 500;

            setTimeout(() => {
                // Cache le preloader avec une transition
                const preloader = document.querySelector('.preloader');
                preloader.classList.add('hide');

                // Attend que la transition du preloader soit terminée
                setTimeout(() => {
                    // Ajoute la classe qui déclenche les animations des bâtiments
                    document.body.classList.add('show-buildings');
                }, buildingsDelay);

            }, preloaderDuration);
        });
    </script>
</body>

</html>