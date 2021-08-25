<?php
require('../../../common/library.php');
require('../../../common/constant.php');

if (isset($_POST['orderNumber']) && $_POST['orderNumber'] != "" && isset($_POST['claimReason']) && $_POST['claimReason'] != "" && isset($_POST['claimShortDescp']) && $_POST['claimShortDescp'] != "" && isset($_POST['claimLongDescp']) && $_POST['claimLongDescp'] != "") {

    $orderNumber = $_POST['orderNumber'];
    $claimReason = $_POST['claimReason'];
    $claimShortDescp = htmlentities($_POST['claimShortDescp'], ENT_QUOTES);
    $claimLongDescp = htmlentities($_POST['claimLongDescp'], ENT_QUOTES);

    $inserted_id = $obj->insert("claims", "`order_number`, `reason`, `short_description`, `long_description`,`claim_status`,`createdon`", "'$orderNumber','$claimReason','$claimShortDescp','$claimLongDescp',0,now()");
    
    $obj->ClaimInitiate($_SESSION['LOGIN_EMAIL']);

    if ($inserted_id != "") {
        if (isset($_FILES["claimPhoto"]) && $_FILES["claimPhoto"]['name'] != "") {

            $images = $_FILES["images"];
            $type = array(
                "image/gif",
                "image/png",
                "image/jpeg",
                "image/jpg"
            );
            $max_size = 2 * 1024 * 1024;
            $path = "../../../images/claims/";
            $db_path = "images/claims/";

            $images_path = $obj->multiple_upload_file($images, $type, $max_size, $path);

            foreach ($images_path as $key => $value) {
                $obj->insert("claims_image", "`claim_id`, `image`, `createdon`", "'$inserted_id','$db_path$value','$today'");
            }
        }
    }
    $data['response'] = "y";
    $data['message'] = "Claims initiated successfully";
    echo json_encode($data);
} else {
    $data['response'] = "n";
    $data['message'] = "All field required";
    echo json_encode($data);
}
