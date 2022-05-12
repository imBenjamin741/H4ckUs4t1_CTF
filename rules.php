<?php 
session_start();
require "inc/functions.php";
$conn = db_connect();

$title = "Rules h4ckus4t1";
require "inc/head.php";
?>
<body>
    <nav id="nav">
        <?php require "inc/navbar.php"; ?>
    </nav>  
    <div id="main" class="rules-main">
        <div class="rules-container">
            <h1>Rules</h1>
            <h4><b>Do NOT:</b></h4>
            <ul>
                <li class="cross">Share flags with or give help to other participants</li>
                <li class="cross">Use automated scanning and probing tools such as Nmap, Gobuster, Dirb, sqlmap, etc. <i>unless specified in the challenge description</i></li>
                <li class="cross">Attempt to (or succeed at) DoSing or DDoSing any infrastructure or other participants.</li>
                <li class="cross">Try to brute force flag submissions - it will not work</li>
                <li class="cross">Hoard flags. Any user that solves multiple challenges but doesn't turn in the flag until the last moment to trick others into thinking they will win will be punished. <b>If you're really good enough to win, you don't need to do this.</b></li>
            </ul>
            <br>
            <h4>Notes:</h4>
            <ul>
                <li class="arrow">The flag format is <code>ITT{example_flag}</code></li>
                <li class="arrow">All flags are case sensitive unless specified.</li>
                <li class="arrow">Scoring is dynamic and decreases in value as more participants solve the problem. Most challenges start at 500 points.</li>
                <li class="arrow">Each problem has a tag telling you whether it's "Easy", "Medium", or "Hard" - these may not be perfect, but they are generally correct.</li>
                <li class="arrow">If any challenges are broken, you feel the flag you have is correct, or you have any other questions, please reach out to an admin on our Discord.</li>
                <li class="arrow">If you do anything that we believe to be directly against the spirit of the competition, we reserve the right to remove anyone at any point. Please don't make us do that. This is for your learning and benefit.</li>
            </ul>
        </div>
    </div>
    <div id="footer">
        <?php require "inc/footer.php"; ?>
    </div>
</body>
</html>