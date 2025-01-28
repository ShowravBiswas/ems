<?php
    function displayFlashMessage($flash,$message,$type) {
        echo "<script type='text/javascript'>
        Toastify({
            text: '$message',
            backgroundColor: '" . ($type == 'success' ? '#28a745' : '#dc3545') . "',
            duration: 5000, // Toast stays for 5 seconds
            gravity: 'top', // Top of the page
            position: 'right', // Right of the page
            stopOnFocus: true
        }).showToast();
    </script>";

    }

    function flash_message_handler()
    {
        if (isset($_SESSION['flash_message'])) {
            $flash = $_SESSION['flash_message'];
            $message = $flash['message'];
            $type = $flash['type']; // 'success', 'error', etc.
            displayFlashMessage($flash,$message,$type);
            unset($_SESSION['flash_message']);
        }
    }

    function escape_html($value) {
        return htmlspecialchars($value ?? '', ENT_QUOTES, 'UTF-8');
    }

    function escape_url($url) {
        return filter_var($url, FILTER_SANITIZE_URL);
    }

    function escape_json($data) {
        return json_encode($data, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT);
    }

    function formatEventDateTime($datetime) {
        $date = new DateTime($datetime);
        return $date->format('F j, Y') . " At " . $date->format('g:iA');
    }

?>