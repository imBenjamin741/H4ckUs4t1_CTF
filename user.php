<?php 
require_once "inc/init.php";

$user_id = isset($_GET["username"]) ? get_user_id_from_username($conn, $_GET["username"]) : (isset($_SESSION["user_id"]) ? $_SESSION["user_id"] : NULL);
$username = get_username_from_id($conn, $user_id);
$team_name = get_user_team_name($conn, $user_id);

if (!$user_id && !isset($_SESSION["user_id"])) exit(header("Location: login.php"));
if (!is_account_active($conn, $user_id)) exit(header("Location: ".basename($_SERVER['PHP_SELF'])));

$title = "Account - H4ckUs4t1 CTF";
require "inc/head.php";
?>
<body>
    <nav id="nav">
        <?php require "inc/navbar.php"; ?>
    </nav>  
    <div id="main" class="user">
    <?php if (!isset($_GET["action"])) {
        if ($user_id) { ?>    
            <form method="GET" class="generic-form">
                <h2 class="title">User</h2>
                <div class="info-box">
                    <h3>Username: </h3>
                    <h4><?php echo $username; ?></h4>
                </div>
                <?php if ($user_id == $_SESSION["user_id"]): ?>
                    <div class="info-box">
                        <h3>Email address: </h3>
                        <h4><?php echo get_user_email($conn, $user_id); ?></h4>
                    </div>
                <?php endif; ?>
                <?php if ($team_name): ?>
                    <div class="info-box">
                        <h3>Team: </h3>
                        <a class="link" href="team.php?team_name=<?php echo $team_name; ?>"><?php echo $team_name; ?></a>
                    </div>
                <?php endif; ?>
                <div class="info-box">
                    <h3>Score: </h3>
                    <h4><?php echo get_user_score($conn, $user_id); ?></h4>
                </div>
                <div class="info-box">
                    <h3>Last login: </h3>
                    <h4><?php echo date('Y-m-d', strtotime(get_user_last_login($conn, $user_id))); ?></h4>
                </div>
                <?php if ($solves = get_user_solves($conn, $user_id)) : ?> 
                    <div class="solves-container">
                        <h3 style="display: inline-block;">Solves: </h3><br>
                        <?php foreach ($solves as $solve) : ?>
                            <div class="solve">
                                <div class="challenge-name"><?php echo $solve["challenge_name"]; ?></div>
                                <div class="points"><?php echo $solve["points"]; ?></div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?> 
            </form>
        <?php }
    } else exit(header("Location: ".basename($_SERVER['PHP_SELF']))); ?>
    </div>
    <div id="footer">
        <?php require "inc/footer.php"; ?>
    </div>
</body>
</html>