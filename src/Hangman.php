<?php
    class Hangman
    {
        private $word_to_guess;
        private $guessed_letters;
        private $max_wrong_guess_count;

        function __construct($new_word_to_guess, $new_max_guess_count)
        {
            $this->word_to_guess = $new_word_to_guess;
            $this->guessed_letters = array();
            $this->max_wrong_guess_count = $new_max_guess_count;
        }

        function wordGuessedSoFar()
        {
            $word_letters = str_split($this->word_to_guess);
            $output = "";
            foreach ($word_letters as $letter) {
                if (in_array($letter, $this->guessed_letters)) {
                    $output .= $letter . " ";
                } else {
                    $output .= "_ ";
                }
            }
            return $output;
        }

        function guessALetter($new_letter)
        {
            array_push($this->guessed_letters, $new_letter);
        }

        function wrongGuessCount()
        {
            $word_letters = str_split($this->word_to_guess);
            $wrong_score = 0;
            foreach ($this->guessed_letters as $letter) {
                if (!in_array($letter, $word_letters)) {
                    $wrong_score += 1;
                }
            }
            return $wrong_score;
        }

        function isLastGuessADuplicate()
        {

        }

    }
?>
