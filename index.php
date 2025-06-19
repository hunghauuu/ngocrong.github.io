<?php
$database_file = $_SERVER['DOCUMENT_ROOT'] . '/cvhvn/database.php';
if (!file_exists($database_file)) {
    header('Location: /install');
    exit;
}
require_once $_SERVER['DOCUMENT_ROOT'] . "/cvhvn/autoload.php";
require_once $_SERVER["DOCUMENT_ROOT"].'/theme/head.php'; 
$request = isset($_GET['request']) ? $_GET['request'] : '';
?>
<main id="app" class="app app-boxed-layout rounded rounded-4 cvh-margin">
    <?php
	require_once $_SERVER["DOCUMENT_ROOT"].'/theme/header.php';
	
    switch ($request) {
		case '':
			require_once $_SERVER["DOCUMENT_ROOT"].'/pages/home.php';
			break;
		case 'home':
			require_once $_SERVER["DOCUMENT_ROOT"].'/pages/home.php';
			break;
		case 'gioi-thieu':
			require_once $_SERVER["DOCUMENT_ROOT"].'/pages/about.php';
			break;
		case 'dien-dan':
			require_once $_SERVER["DOCUMENT_ROOT"].'/pages/blog.php';
			break;
		case 'dang-nhap':
			require_once $_SERVER["DOCUMENT_ROOT"].'/pages/login.php';
			break;
		case 'dang-ky':
			require_once $_SERVER["DOCUMENT_ROOT"].'/pages/register.php';
			break;
		case 'nap-tien':
			require_once $_SERVER["DOCUMENT_ROOT"].'/pages/recharge.php';
			break;
		case 'quen-mat-khau':
			require_once $_SERVER["DOCUMENT_ROOT"].'/pages/forgot-password.php';
			break;
		case 'topic':
			require_once $_SERVER["DOCUMENT_ROOT"].'/pages/topic.php';
			break;
		case 'chat':
			require_once $_SERVER["DOCUMENT_ROOT"].'/pages/live-chat.php';
			break;
		case 'shop':
			require_once $_SERVER["DOCUMENT_ROOT"].'/pages/shop.php';
			break;
		case 'lich-su-mua':
			require_once $_SERVER["DOCUMENT_ROOT"].'/pages/history_shop.php';
			break;
		default:
			http_response_code(404);
			require_once $_SERVER["DOCUMENT_ROOT"].'/pages/404.php';
			break;
	}
	?>
</main>
<?php 
require_once $_SERVER["DOCUMENT_ROOT"].'/theme/footer.php';
require_once $_SERVER["DOCUMENT_ROOT"].'/theme/setting.php'; 
require_once $_SERVER["DOCUMENT_ROOT"].'/theme/end.php'; 
?>