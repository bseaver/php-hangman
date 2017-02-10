<?php
    date_default_timezone_set('America/Los_Angeles');
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Hangman.php";

    session_start();
    define('JOB_SESSION_KEY', 'hangman_game');
    if (empty($_SESSION[JOB_SESSION_KEY])) {
        $_SESSION[JOB_SESSION_KEY] = array();
    }

    $app = new Silex\Application();

    $app['debug'] = true;

    $app->register(
        new Silex\Provider\TwigServiceProvider(),
        array('twig.path' => __DIR__.'/../views')
    );

    $app->get('/', function() use ($app) {
        return "Welcome to hangman!";
    });


    $app->get('/test', function() {
        $hangman = new Hangman("flabbergasted", 7);
        $output = "";

        $hangman->guessALetter("b");
        $output .= "<br> guessed b";

        $hangman->guessALetter("i");
        $output .= "<br> guessed i";
        if ($hangman->isLastGuessADuplicate()) {
            $output .= "<br> Last guess was a duplicate, you ...";
        }

        $hangman->guessALetter("i");
        $output .= "<br> guessed i";
        if ($hangman->isLastGuessADuplicate()) {
            $output .= "<br> Last guess was a duplicate, you ...";
        }

        $hangman->guessALetter("f");
        $hangman->guessALetter("l");
        $hangman->guessALetter("a");
        $hangman->guessALetter("e");
        $hangman->guessALetter("r");
        $hangman->guessALetter("g");
        $hangman->guessALetter("s");
        $hangman->guessALetter("t");
        $hangman->guessALetter("d");

        if ($hangman->didIWin()) {
            $output .= "<br> You have won!";
        } else {
            $output .= "<br> Keep Guessing!";
        }

        $output .= "<br> wrongGuessCount = " . $hangman->wrongGuessCount();
        $output .= "<br> wordGuessedSoFar = " . $hangman->wordGuessedSoFar();

        $output .= "<br><br><br>";
        $hangman = new Hangman("catnip", 7);

        $hangman->guessALetter("a");
        $hangman->guessALetter("b");
        $hangman->guessALetter("c");
        $hangman->guessALetter("d");
        $hangman->guessALetter("e");
        $hangman->guessALetter("f");
        $hangman->guessALetter("g");
        $hangman->guessALetter("h");
        $hangman->guessALetter("i");
        $hangman->guessALetter("j");
        $hangman->guessALetter("k");
        $hangman->guessALetter("l");


        if ($hangman->didIWin()) {
            $output .= "<br> You have won!";
        } else {
            $output .= "<br> Keep Guessing!";
        }

        if ($hangman->didILose()) {
            $output .= "<br> You lost! (sucker...)";
        }

        $output .= "<br> wrongGuessCount = " . $hangman->wrongGuessCount();
        $output .= "<br> wordGuessedSoFar = " . $hangman->wordGuessedSoFar();



        return "{ $output }";
    });

        return $app;

?>
