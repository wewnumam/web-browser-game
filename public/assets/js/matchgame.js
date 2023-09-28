var matchingGame = {};
matchingGame.deck = [
    "cardAK",
    "cardAK",
    "cardAQ",
    "cardAQ",
    "cardAJ",
    "cardAJ",
    "cardBK",
    "cardBK",
    "cardBQ",
    "cardBQ",
    "cardBJ",
    "cardBJ",
];

const MATCH_PATTERN_COUNT = 6;
var currentMatchPatternCount = 0;
var flipCount = 0;

var startTime; // Variable to store the start time of the game
var timerInterval; // Variable to store the interval ID for the timer
var elapsedTime = 0;

$(function () {
    console.log(Date.now());
    $("#inputModalButton").hide();

    matchingGame.deck.sort(shuffle);
    for (var i = 0; i < 11; i++) {
        $(".card:first-child").clone().appendTo("#cards");
    }
    $("#cards")
        .children()
        .each(function (index) {
            var x = ($(this).width() + 20) * (index % 4);
            var y = ($(this).height() + 20) * Math.floor(index / 4);
            $(this).css(
                "transform",
                "translateX(" + x + "px) translateY(" + y + "px)"
            );
            // get a pattern from the shuffled deck
            var pattern = matchingGame.deck.pop();
            // visually apply the pattern on the card's back side.
            $(this).find(".back").addClass(pattern);
            // embed the pattern data into the DOM element.
            $(this).attr("data-pattern", pattern);
            // listen the click event on each card DIV element.
            $(this).click(selectCard);
        });
    
    function shuffle() {
        return 0.5 - Math.random();
    }

    function selectCard() {
        if (flipCount == 0 ) {
            startTimer();
        }

        flipCount++;
        $(".flipcount").text(flipCount + "x");

        // we do nothing if there are already two card flipped.
        if ($(".card-flipped").length > 1) {
            return;
        }
        $(this).addClass("card-flipped");
        // check the pattern of both flipped card 0.7s later.
        if ($(".card-flipped").length === 2) {
            setTimeout(checkPattern, 700);
        }
    }

    function checkPattern() {
        if (isMatchPattern()) {
            $(".card-flipped")
                .removeClass("card-flipped")
                .addClass("card-removed");
            $(".card-removed").bind("transitionend", removeTookCards);

            currentMatchPatternCount++;
            $("#matchprogress").text(currentMatchPatternCount + "/" + MATCH_PATTERN_COUNT);
            if (isGameDone()) {
                $("#inputModalButton").show();
                $("#inputModalButton").click();
                $(".playtime").text(elapsedTime + "s");
                $(".flipcount").text(flipCount + "x");
                clearInterval(timerInterval);
            }
        } else {
            $(".card-flipped").removeClass("card-flipped");
        }
    }

    function isMatchPattern() {
        var cards = $(".card-flipped");
        var pattern = $(cards[0]).data("pattern");
        var anotherPattern = $(cards[1]).data("pattern");
        return pattern === anotherPattern;
    }

    function isGameDone() {
        return currentMatchPatternCount >= MATCH_PATTERN_COUNT;
    }

    function removeTookCards() {
        $(".card-removed").remove();
    }

    // Function to start the timer
    function startTimer() {
        startTime = new Date().getTime();
        timerInterval = setInterval(updateTimer, 1000); // Update timer every second
    }

    // Function to update and display the playtime
    function updateTimer() {
        var currentTime = new Date().getTime();
        elapsedTime = Math.floor((currentTime - startTime) / 1000); // Calculate elapsed time in seconds
        $(".playtime").text(elapsedTime + "s");
    }

    $('#submitButton').click(function () {
        var record = {
            'username': $('#username').val(),
            'time': elapsedTime,
            'flip': flipCount,
            'created_at': Date.now()
        };

        if (isGameDone()) {
            $.ajax({
                url: 'index.php/record', // Replace with your server endpoint
                method: 'POST',
                data: record, // Data to send to the server
                success: function (response) {
                    // Handle the server response if needed
                    console.log(record);
                },
                error: function (xhr, status, error) {
                    // Handle errors if any
                    console.log('SUBMIT FAILED');
                }
            });
            
            $("#inputModalButton").hide();
            location.reload();
        }
    });

    $("#refreshButton").click(function() {
        // Reload or refresh the page
        location.reload();
      });
});
