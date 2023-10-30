<?php
include('system/config.php');

$table_name = 'record';
$sql = "SELECT * FROM $table_name ORDER BY time ASC";
$result = $conn->query($sql);

if (!$result->num_rows > 0) {
    echo "No records found.";
}

function timeAgo($timestamp)
{
    $current_time = time();
    $time_diff = $current_time - ($timestamp / 1000);

    if ($time_diff < 60) {
        return "Just now";
    } elseif ($time_diff < 3600) {
        $minutes = floor($time_diff / 60);
        return $minutes . " minute" . ($minutes > 1 ? "s" : "") . " ago";
    } elseif ($time_diff < 86400) {
        $hours = floor($time_diff / 3600);
        return $hours . " hour" . ($hours > 1 ? "s" : "") . " ago";
    } else {
        $days = floor($time_diff / 86400);
        return $days . " day" . ($days > 1 ? "s" : "") . " ago";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CSS3 Matching Game</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/matchgame.css" />
</head>

<body>
    <!-- Splash Screen -->
    <div class="splash">
        <h1 class="splash-header">Memory Game</h1>
    </div>

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
            <div class="playtime">0s</div>
        </div>
        <div class="col d-flex align-items-center alert alert-light m-2">
            <i class="me-2 fa-solid fa-arrow-pointer"></i>
            <div class="flipcount">0x</div>
        </div>
        <div class="col d-flex align-items-center alert alert-light m-2">
            <i class="me-2 fa-solid fa-circle-check"></i>
            <div id="matchprogress">0/6</div>
        </div>
        <button id="refreshButton" type="button" class="col btn btn-block btn-primary alert alert-primary m-2"><i class="fa-solid fa-repeat"></i></button>
    </div>

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary mb-3" id="inputModalButton" data-bs-toggle="modal" data-bs-target="#inputModal">
        Open Input Modal
    </button>

    <div class="modal fade" id="inputModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered" aria-hidden="false">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title row align-items-center justify-content-center">
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!-- Form -->
                <form id="sumbitForm" class="row justify-content-center mb-3">
                    <div class="modal-body">
                        <div class="col d-flex align-items-center alert alert-light m-2">
                            <i class="me-2 fa-solid fa-stopwatch"></i>
                            <div class="playtime">0s</div>
                        </div>
                        <div class="col d-flex align-items-center alert alert-light m-2">
                            <i class="me-2 fa-solid fa-arrow-pointer"></i>
                            <div class="flipcount">0x</div>
                        </div>
                        <div class="d-grid gap-2 p-2">
                            <input type="text" class="form-control" id="username" placeholder="Enter username...">
                            <button id="submitButton" type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </div>
                    <div class="modal-footer d-grid">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Leaderboard -->
    <table class="table table-striped w-25">
        <thead>
            <tr>
                <th><i class="fa-solid fa-ranking-star"></i></th>
                <th><i class="fa-solid fa-user"></i></th>
                <th><i class="fa-solid fa-stopwatch"></i></th>
                <th><i class="fa-solid fa-arrow-pointer"></i></th>
                <th><i class="fa-solid fa-calendar-days"></i></th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php while ($row = $result->fetch_assoc()):?>
            <tr>
                <td><?= $i; ?></td>
                <?php $i++; ?>
                <td><?= $row['username']; ?></td>
                <td><?= $row['time']; ?></td>
                <td><?= $row['flip']; ?></td>
                <td><?= timeAgo($row['created_at']); ?></td>
            </tr>
            <?php endwhile; ?>
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
    <script src="js/matchgame.js"></script>
    <script>
        var splashScreen = document.querySelector('.splash');
        splashScreen.addEventListener('click', () => {
            splashScreen.style.opacity = 0;
            setTimeout(() => {
                splashScreen.classList.add('hidden')
            }, 610)
        })
    </script>

</body>

</html>