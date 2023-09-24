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
            <div id="playtime">Playtime: 0 seconds</div>
            <div id="flipcount">Flip: 0</div>
            <div id="matchprogress">Match progress: 0/6</div>
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

        <!-- Form -->
        <form id="sumbitForm">
            <input type="text" id="username" placeholder="Enter username">
            <button type="button" id="submitButton">Submit</button>
        </form>

        <!-- Leaderboard -->
        <table border="1" style="text-align: center; margin: 0 auto;">
            <tr>
                <th>rank</th>
                <th>username</th>
                <th>time</th>
                <th>flip</th>
            </tr>
            <?php $i = 1;?>
            <?php foreach($leaderboard as $l): ?>
            <tr>
                <td><?= $i; ?></td>
                <td><?= $l->username; ?></td>
                <td><?= $l->time; ?></td>
                <td><?= $l->flip; ?></td>
                <?php $i++; ?>
            </tr>
            <?php endforeach; ?>
        </table>

        <!-- #game -->
        <footer>
            <p>This is an example of creating a matching game with CSS3.</p>
        </footer>
        <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
        <script src="<?= base_url('public/assets/js/matchgame.js'); ?>"></script>
    </body>
</html>
