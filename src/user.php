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

$page = "user";
$user = $row['username'];

$page = "index";
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
                        ?>
                        hi
                        <div class="panel-body">
                            <a href="<?php echo getConfig('root'); ?><?php echo $row['username']; ?>/<?php echo $reporow['name']; ?>" style="font-size: 50px;"><?php echo $reporow['name']; ?></a>
                        </div>
                    <?php
                    }
                    ?>
                    <hr>
                    <div class="panel-body">
                        <a href="<?php echo getConfig('root'); ?><?php $row['username']; ?>/Repo" style="font-size: 50px;">Repo</a>
                    </div>
                </div>
            </div>

        </div>
    </div>

<?php
include_once 'template/footer.php';
?>