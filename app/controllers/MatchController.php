<?php

require_once "../app/models/Career.php";

class MatchController {

    public function interest()
    {
        require "../app/views/match/interest.php";
    }

    public function skill()
    {
        session_start();

        $_SESSION['interest'] = $_POST['interest'];

        require "../app/views/match/skill.php";
    }

    public function result()
    {
        session_start();

        $_SESSION['skill'] = $_POST['skill'];

        $interest = $_SESSION['interest'];
        $skill = $_SESSION['skill'];

        $career = new Career();

        $careers = $career->matchCareer($interest,$skill);

        require "../app/views/match/result.php";
    }
}