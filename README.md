# Hangman Game

#### Epicodus PHP Week 1-Hangman Game, 2/9/2017

#### By Benjamin T. Seaver and Erica Wright

## Description

This is a guessing game where the user will take turns guessing letters in a secret word. The player has a set number of wrong guesses to find the word, otherwise they will be hanged!

## Setup/Installation Requirements
* Clone project
* run `composer install --prefer-source --no-interaction` from project root
* start PHP in web folder to use Silex

## Known Bugs
* No known bugs

## Support and contact details
* No support

## Technologies Used
* PHP
* composer
* Silex
* Twig
* HTML
* CSS
* JavaScript
* jQuery
* Bootstrap
* git

## Copyright (c)
* 2017 Benjamin T. Seaver and Erica Wright

## License
* MIT

## Specifications
* Phase 0 - Set up Silex / Twig Framework

* Phase 1 - Focus on Backend Functions - Assume word "flabbergasted" and max wrong guesses of 7

|Behavior|Input|Output|
|--------|-----|------|
| Show underscores | flabbergasted | _ _ _ _ _ _ _ _ _ _ _ _ _ |
| Correct Letter | b | show 2 b's |
| Incorrect Letter | i | show wrong guess count 1 |
| Repeated guess | b (or i) | error message |
| Repeated correct guesses | (other letters) | reveal more correct letters |
| Finish word | all letters guessed | winning message |
| Max wrong guesses | q etc. | losing message |

* Phase 2 - Create engaging front End with existing backend functionality

* End specifications
