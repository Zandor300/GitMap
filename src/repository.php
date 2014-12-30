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
$name = $row['name'];

$usersql = "SELECT * FROM users WHERE id='" . $row['user'] . "';";
$userresult = mysqli_query($connection, $usersql);
if ($userresult == false)
    exit('Error code users <br>' . mysqli_error($connection));
$userrow = mysqli_fetch_assoc($userresult);
$user = $userrow['username'];

$tagsql = "SELECT * FROM tags WHERE id='" . $row['tag'] . "';";
$tagresult = mysqli_query($connection, $tagsql);
if ($tagresult == false)
    exit('Error code tag <br>' . mysqli_error($connection));
$tagrow = mysqli_fetch_assoc($tagresult);

$buildsql = "SELECT * FROM builds WHERE repository='" . $row['id'] . "';";
$buildresult = mysqli_query($connection, $buildsql);
if ($buildresult == false)
    exit('Error code tag <br>' . mysqli_error($connection));

$tab = "";
if(isset($_GET['tab']))
    $tab = $_GET['tab'];

$page = "repo";
$title = $user . " / " . $name;
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
            <h4><span class="label label-primary" style="background-color: <?php echo $tagrow['color']; ?>;"><?php echo $tagrow['name']; ?></span> <?php echo $row['desc']; ?></h4>
        </div>
    </div>

    <div class="container content">
        <div class="row">

            <div class="col-xs-2 pull-right">
                <ul class="nav nav-tabs tabs-right" style="height:100%;"><!-- 'tabs-right' for right tabs -->
                    <?php $url = getConfig('root') . $user . '/' . $name; ?>
                    <li class="<?php if($tab == "") { ?>active<?php } ?>">
                        <a href="<?php echo $url; ?>"><span class="glyphicon glyphicon-align-justify" aria-hidden="true"></span> Code</a>
                    </li>
                    <li class="<?php if($tab == "issues") { ?>active<?php } ?>">
                        <a href="<?php echo $url; ?>?tab=issues"><span class="glyphicon glyphicon-flash" aria-hidden="true"></span> Issues</a>
                    </li>
                    <li class="<?php if($tab == "wiki") { ?>active<?php } ?>">
                        <a href="<?php echo $url; ?>?tab=wiki"><span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span> Wiki</a>
                    </li>
                    <li class="<?php if($tab == "builds") { ?>active<?php } ?>">
                        <a href="<?php echo $url; ?>?tab=builds"><span class="glyphicon glyphicon-road" aria-hidden="true"></span> Builds</a>
                    </li>
                    <br><br>
                </ul>
            </div>

            <div class="col-md-10">
                <?php if($tab == "") { ?>
                    <h1>Code</h1>
                <?php } else if($tab == "issues") { ?>
                    <h1>Issues</h1>
                <?php } else if($tab == "wiki") { ?>
                    <h1>Wiki</h1>
                <?php } else if($tab == "builds") { ?>
                    <h1>Builds</h1>
                    <table class="table">
                        <tr>
                            <th>Build number</th>
                            <th>Status</th>
                            <th>Version</th>
                        </tr>
                        <?php while($buildrow = mysqli_fetch_assoc($buildresult)) { ?>
                            <tr>
                                <td><?php echo $buildrow['buildnumber']; ?></td>
                                <td><?php echo $buildrow['status']; ?></td>
                                <td></td>
                            </tr>
                        <?php } ?>
                    </table>
                <?php } ?>
            </div>

        </div>
    </div>

<?php
include_once 'template/footer.php';
?>