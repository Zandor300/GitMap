<?php
include_once 'meta/connect.php';

global $connection;

if (isset($_SERVER['REDIRECT_URL'])) {
    $parts = explode('/', $_SERVER['REDIRECT_URL']);
    array_shift($parts);
    $url_name = $parts[2];
    $query = "SELECT id FROM repositories WHERE name='" . $url_name . "';";
    $result = mysqli_query($connection, $query);
    $data = mysqli_fetch_array($result);
    $_GET['id'] = $data['id'];
}
$id = $_GET['id'];

$sql = "SELECT * FROM repositories WHERE id='" . $id . "';";
$result = mysqli_query($connection, $sql);
if ($result == false)
    exit('Error code repositories <br>' . mysqli_error($connection));
$row = mysqli_fetch_assoc($result);

$page = "repo";
$name = $row['name'];

$usersql = "SELECT * FROM users WHERE id='" . $row['user'] . "';";
$userresult = mysqli_query($connection, $usersql);
if ($userresult == false)
    exit('Error code users <br>' . mysqli_error($connection));
$userrow = mysqli_fetch_assoc($userresult);

$user = $userrow['username'];

$tab = "";

$page = "index";
include_once 'template/head.php';
?>

    <br><br>
    <div class="jumbotron jumbotron-page">
        <div class="container">
            <?php if($row['logo'] != "") { ?>
                <div class="pull-left" style="padding-right: 5px">
                    <img src="<?php echo getConfig('root') . $row['logo']; ?>" height="130" class="img-rounded" alt="<?php echo $name; ?>">
                </div>
            <?php } ?>
            <h1><?php echo '<a href="' . getConfig('root') . $user . '">' . $user . '</a> / ' . $name; ?></h1>
            <h4><?php echo $row['desc']; ?></h4>
        </div>
    </div>

    <div class="container content">
        <div class="row">

            <div class="col-md-9">
                -Files-
            </div>

            <div class="col-md-3">
                <div class="tab-content">
                    <a href="#" class="tab-pane <?php if($tab == "") { ?>active<?php } ?>">Files</a>
                    <a href="#" class="tab-pane <?php if($tab == "issues") { ?>active<?php } ?>">Issues</a>
                </div>

                <div class="tab-content">
                    <div class="tab-pane active" id="home">Home Tab.</div>
                    <div class="tab-pane" id="profile">Profile Tab.</div>
                    <div class="tab-pane" id="messages">Messages Tab.</div>
                    <div class="tab-pane" id="settings">Settings Tab.</div>
                </div>
            </div>

        </div>
    </div>

<?php
include_once 'template/footer.php';
?>