<?php
session_start();

$_SESSION = array();
// sessionにcookieを使うかどうかの設定ファイルがある場合
// cookieの情報を削除するための処理
if (ini_set('session.use_cookies')) {
  $params = session_get_cookie_params();
  setcookie(session_name() . '', time() - 42000,
      $params['path'], $params['domain'], $params['secure'], $params['httponly']);
}
session_destroy();

// cookieに保存されたメールアドレスも削除
setcookie('email', '', time()-3600);

header('Location: login.php');
exit();