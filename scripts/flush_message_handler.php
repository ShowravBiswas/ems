<?php
if (isset($_SESSION['flash_message'])) {
    $flash = $_SESSION['flash_message'];
    $message = $flash['message'];
    $type = $flash['type']; // 'success', 'error', etc.
    displayFlashMessage($flash,$message,$type);
    unset($_SESSION['flash_message']);
}
?>