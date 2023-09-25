<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>CSS3 Matching Game</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel="stylesheet" href="<?= base_url('public/assets/css/matchgame.css'); ?>" />
    </head>
    <body>
        <header>
        </header>
        
        <section id="game" class="bg-light mb-3">
            <div id="cards">
                <div class="card bg-light">
                    <div class="face front"></div>
                    <div class="face back"></div>
                </div>
                <!-- .card -->
            </div>
            <!-- #cards -->
        </section>

        <div class="row align-items-center justify-content-around w-25 mb-3">
            <div class="col d-flex align-items-center alert alert-light m-2">
                <i class="me-2 fa-solid fa-stopwatch"></i>
                <div id="playtime">0s</div>
            </div>
            <div class="col d-flex align-items-center alert alert-light m-2">
                <i class="me-2 fa-solid fa-arrow-pointer"></i>
                <div id="flipcount">0x</div>
            </div>
            <div class="col d-flex align-items-center alert alert-light m-2">
                <i class="me-2 fa-solid fa-circle-check"></i>
                <div id="matchprogress">0/6</div>
            </div>
            <button id="refreshButton" type="button" class="col btn btn-block btn-primary alert alert-primary m-2"><i class="fa-solid fa-repeat"></i></button>
        </div>

        <!-- Form -->
        <form id="sumbitForm" class="row justify-content-center mb-3">
            <div class="col-auto">
                <input type="text" class="form-control" id="username" placeholder="Enter username...">
            </div>
            <div class="col-auto">
                <button id="submitButton" type="submit" class="btn btn-success mb-3">Submit</button>
            </div>
        </form>

        <!-- Leaderboard -->
        <table class="table table-striped w-25">
            <thead>
                <tr>
                    <th><i class="fa-solid fa-ranking-star"></i></th>
                    <th><i class="fa-solid fa-user"></i></th>
                    <th><i class="fa-solid fa-stopwatch"></i></th>
                    <th><i class="fa-solid fa-arrow-pointer"></i></th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1;?>
                <?php foreach($leaderboard as $l): ?>
                <tr>
                    <th>#<?= $i; ?></th>
                    <td><?= $l->username; ?></td>
                    <td><?= $l->time; ?></td>
                    <td><?= $l->flip; ?></td>
                    <?php $i++; ?>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <!-- #game -->
        <footer>
            <p class="fw-bold">Credits: </p>
            <p>303 Aditya | 308 Regnito | 309 Ahmad | 314 M. Yusrizal</p>
        </footer>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <script src="https://kit.fontawesome.com/039daba6d2.js" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
        <script src="<?= base_url('public/assets/js/matchgame.js'); ?>"></script>
    </body>
</html>
