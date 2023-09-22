<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>CSS3 Matching Game</title>
        <link rel="stylesheet" href="<?= base_url('public/assets/css/matchgame.css'); ?>" />
    </head>
    <body>
        <header>
            <h1>CSS3 Matching Game</h1>
        </header>
        <section id="game">
            <div id="cards">
                <div class="card">
                    <div class="face front"></div>
                    <div class="face back"></div>
                </div>
                <!-- .card -->
            </div>
            <!-- #cards -->
        </section>
        <!-- #game -->
        <footer>
            <p>This is an example of creating a matching game with CSS3.</p>
        </footer>
        <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
        <script src="<?= base_url('public/assets/js/matchgame.js'); ?>"></script>
    </body>
</html>
