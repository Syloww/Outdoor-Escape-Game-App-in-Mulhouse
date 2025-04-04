<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles/dialogue.css">
</head>

<body>
    <div class="pigeon-container">
        <img src="/images/pigeon.png" alt="pigeon" class="pigeon">
    </div>
    <div class="dialogue-box">
        <span id="dialogue-text"></span>
    </div>

    <script>
        const phrases = [
            "Before I tell you my story, come and see me at the mirror door.",
            "Here I am in front of the Mirror Gate... Did you know that this place has quite a history? It all began in 1852 with Madame Koechlin, a great lady of Mulhouse. She set up the Comités de Patronage to help people in their own homes. In 1923, this district became the Patronage du Quartier Sud, then in 1957, the Centre Social Pont d'Altkirch, thanks to Madame Dolfus. It was a place for care and meetings...",
            "...but today it's also a place where some mad scientists put this tracking collar on me! I've managed to escape from their lab, but to really be free, I have to deactivate three modules hidden around Mulhouse. And guess what? The first is right here, in this garden full of mysteries. So let's get on with the adventure!"
        ];
        
        const dialogueElement = document.getElementById('dialogue-text');
        let phraseIndex = 0;
        let charIndex = 0;
        
        function typeWriter() {
            if (phraseIndex < phrases.length) {
                if (charIndex < phrases[phraseIndex].length) {
                    dialogueElement.innerHTML += phrases[phraseIndex].charAt(charIndex);
                    charIndex++;
                    setTimeout(typeWriter, 50); // Augmenté à 50ms entre chaque lettre (au lieu de 20)
                } else {
                    // Passage à la phrase suivante après 1 seconde (au lieu de 0.5)
                    phraseIndex++;
                    charIndex = 0;
                    if (phraseIndex < phrases.length) {
                        setTimeout(typeWriter, 1000); // Délai augmenté à 1s entre les phrases
                        dialogueElement.innerHTML = ''; // Efface la boîte de dialogue
                    }
                }
            }
        }
        
        // Démarrer l'animation après le chargement de la page
        window.onload = function() {
            setTimeout(typeWriter, 500); // Délai avant de commencer inchangé
        };
    </script>
</body>

</html>