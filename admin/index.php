<?php
$database_file = $_SERVER['DOCUMENT_ROOT'] . '/cvhvn/database.php';
if (!file_exists($database_file)) {
    header('Location: /install');
    exit;
}
require_once $_SERVER['DOCUMENT_ROOT'] . "/cvhvn/autoload.php";
if(!isset($user['is_admin'])){
header("Location: /");
exit;
}
require_once $_SERVER["DOCUMENT_ROOT"].'/admin/theme/head.php'; 

$request = isset($_GET['request']) ? $_GET['request'] : 'home';

?>
<div id="app" class="app">
    <?php
	require_once $_SERVER["DOCUMENT_ROOT"].'/admin/theme/header.php';
    switch ($request) {
        case 'home':
        case '/':
			require_once $_SERVER["DOCUMENT_ROOT"].'/admin/pages/home.php';
			break;
        
        case 'users-manager':
            require_once $_SERVER["DOCUMENT_ROOT"].'/admin/pages/users-manager.php';
            break;

        case 'recharge':
            require_once $_SERVER["DOCUMENT_ROOT"].'/admin/pages/recharge.php';
            break;

        case 'manager-post':
            require_once $_SERVER["DOCUMENT_ROOT"].'/admin/pages/manager-post.php';
            break;

        case 'admin-post':
            require_once $_SERVER["DOCUMENT_ROOT"].'/admin/pages/poster/admin-post.php';
            break;

        case 'giftcode':
            require_once $_SERVER["DOCUMENT_ROOT"].'/admin/pages/giftcode.php';
            break;

        case 'setting':
            require_once $_SERVER["DOCUMENT_ROOT"].'/admin/pages/setting.php';
            break;

        case 'edit-poster':
            require_once $_SERVER["DOCUMENT_ROOT"].'/admin/pages/poster/edit-post.php';
            break;

        case 'download-manager':
            require_once $_SERVER["DOCUMENT_ROOT"].'/admin/pages/download/download-manager.php';
            break;

        case 'edit-download':
            require_once $_SERVER["DOCUMENT_ROOT"].'/admin/pages/download/edit-download.php';
            break;

        case 'add-shop':
            require_once $_SERVER["DOCUMENT_ROOT"].'/admin/pages/add-shop.php';
            break;

        default:
			http_response_code(404);
			require_once $_SERVER["DOCUMENT_ROOT"].'/admin/pages/home.php';
			break;
	}
    ?>
</div>
<?php 
require_once $_SERVER["DOCUMENT_ROOT"].'/admin/theme/footer.php';
require_once $_SERVER["DOCUMENT_ROOT"].'/admin/theme/end.php'; 
?>