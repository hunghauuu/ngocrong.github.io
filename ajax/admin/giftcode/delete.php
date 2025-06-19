<?php
if (empty($_SERVER['HTTP_REFERER'])) {
    header('HTTP/1.0 403 Forbidden');
    echo "Forbidden: You don't have permission to access this resource.";
    exit();
}
require_once $_SERVER['DOCUMENT_ROOT'] . "/cvhvn/autoload.php";

if (!$user['is_admin']) {
    header("Location: /");
    exit;
} else {
    if ($_POST['type'] == 'Del_Gift') {
        $id = abs($_POST['id']);
        if (isset($id)) {
            mysqli_query($CVH->connect_db(), "DELETE FROM `cvh_giftcode` WHERE `id`='" . $id . "'");
            $CVH->Ex(true, "Xóa giftcode thành công!");
        } else {
            $CVH->Ex(true, "Giftcode không tồn tại!");
        }
    }
}
?>