<?php
if (empty($_SERVER['HTTP_REFERER'])) {
    header('HTTP/1.0 403 Forbidden');
    echo "Forbidden: You don't have permission to access this resource.";
    exit();
}
require_once $_SERVER['DOCUMENT_ROOT'] . "/cvhvn/autoload.php";

if ($_POST['code']  && $_POST['item'] || $_POST['item'] === '0' && $_POST['count'] && $_POST['hsd']) {
    if (isset($user['is_admin'])) {
        $code = ($_POST['code']);
        $itema = ($_POST['item']);
        $count = ($_POST['count']);
        $option_id = ($_POST['option_id']);
        $param_option = ($_POST['param_option']);
        $hsd = ($_POST['hsd']);
        if (count($_POST["option_id"]) > 0) {
            $data = array();
            for ($i = 0; $i < count($_POST["option_id"]); $i++) {
                if (trim($_POST["option_id"][$i] != '') || $_POST['option_id'] === '0' ) {
                    $id = isset($_POST["option_id"][$i])  ? $_POST["option_id"][$i] : 30;
                    $param = isset($_POST["param_option"][$i]) ? $_POST["param_option"][$i] : 0;
                    $item = array(
                        "id" => $id,
                        "param" => $param
                    );
                    $data[] = $item;
                }
            }
            $option = json_encode($data);
            if ($option == "[]") {
                $dataz = array(
                    "id" => 30,
                    "param" => 0
                );
                $option = json_encode([$dataz]);
            }
        }

        $soluong = isset($_POST["soluong"]) ? $_POST["soluong"] : 1;
        $itemz = array(
            "id" => $itema,
            "soluong" => $soluong
        );
        if ($code == 'rd') {
            $code = rand_string(6);
        }
        $itemz = json_encode([$itemz]);
        $table = "cvh_giftcode";
        $data = array(
            "id" => null,
            "code" => $code,
            "luot" => $count,
            "item" => $itemz,
            "option" => $option,
            "status" => true,
            "hsd" => $hsd,
            "time" => time()
        );
        $CVH->insert($table, $data);
        $CVH->Ex(true, "Thêm gift code " . $code . " thành công!");
    } else {
        $CVH->Ex(false, "Địt mẹ mày cút ngay!");
    }

} else {
    $CVH->Ex(false, "Vui lòng nhập đầy đủ thông tin!");
}
?>