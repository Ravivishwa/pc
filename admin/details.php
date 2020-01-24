<?php include_once 'downloader/codepitch/autoload.php'; ?>
<?php
$user = codepitch_get_user(1);
echo $user['asp_id'];