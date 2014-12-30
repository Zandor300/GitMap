<?php
include_once 'meta/connect.php';

global $connection;

if (isset($_SERVER['REDIRECT_URL'])) {
    $parts = explode('/', $_SERVER['REDIRECT_URL']);
    array_shift($parts);
    $url_name = $parts[1];
    $query = "SELECT id FROM users WHERE username='" . $url_name . "';";
    $result = mysqli_query($connection, $query);
    $data = mysqli_fetch_array($result);
    $_GET['id'] = $data['id'];
}
$id = $_GET['id'];

$sql = "SELECT * FROM users WHERE id='" . $id . "';";
$result = mysqli_query($connection, $sql);
if ($result == false)
    exit('Error code users <br>' . mysqli_error($connection));
$row = mysqli_fetch_assoc($result);
$user = $row['username'];

$page = "user";
$title = $user;
include_once 'template/head.php';
?>

    <br><br>
    <div class="jumbotron jumbotron-page">
        <div class="container">
            <h1><?php echo $user; ?></h1>
        </div>
    </div>

    <div class="container content">
        <div class="row">

            <div class="col-md-3">
                <img src="<?php echo getConfig('root') . $row['avatar']; ?>" width="100%" class="img-rounded" alt="<?php echo $user; ?>">
                <h1><b><?php echo $row['fullname']; ?></b><br><small><?php echo $user; ?></small></h1>
            </div>

            <div class="col-md-9">
                <?php
                $reposql = "SELECT * FROM repositories WHERE user='" . $id . "';";
                $reporesult = mysqli_query($connection, $reposql);
                if ($reporesult == false)
                    exit('Error code repositories <br>' . mysqli_error($connection));
                ?>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><b>Repositories</b></h3>
                    </div>
                    <?php
                    while($reporow = mysqli_fetch_assoc($reporesult)) {
                        $tagsql = "SELECT * FROM tags WHERE id='" . $reporow['tag'] . "';";
                        $tagresult = mysqli_query($connection, $tagsql);
                        if ($tagresult == false)
                            exit('Error code tag <br>' . mysqli_error($connection));
                        $tagrow = mysqli_fetch_assoc($tagresult);
                        ?>
                        <div class="panel-body">
                            <a href="<?php echo getConfig('root'); ?><?php echo $row['username']; ?>/<?php echo $reporow['name']; ?>">
                                <?php if($reporow['logo'] != "") { ?>
                                    <div class="pull-left" style="padding-right: 5px">
                                        <img src="<?php echo getConfig('root') . $reporow['logo']; ?>" width="130" class="img-rounded" alt="<?php echo $reporow['name']; ?>">
                                    </div>
                                <?php } ?>
                            </a>
                            <a href="<?php echo getConfig('root'); ?><?php echo $row['username']; ?>/<?php echo $reporow['name']; ?>" style="font-size: 50px;"><?php echo $reporow['name']; ?></a>
                            <p><?php echo $reporow['desc']; ?></p>
                            <p><span class="label label-primary" style="background-color: <?php echo $tagrow['color']; ?>;"><?php echo $tagrow['name']; ?></span></p>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>

        </div>
    </div>

<?php
include_once 'template/footer.php';
?>