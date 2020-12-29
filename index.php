<!DOCTYPE html>
<html lang="ja">

<?php
error_reporting(E_ALL & ~E_NOTICE);
?>

<?php

// headは全ページ共通
get_template_part('part/head/index');
//bodyは分岐
get_template_part('part/body/index');

?>

</html>