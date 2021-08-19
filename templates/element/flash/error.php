<?php
/**
 * @var \App\View\AppView $this
 * @var array $params
 * @var string $message
 */
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>
<div class="message error" style="color:#AA2A0E;font-size:14px;text-align:center;font-weight:bold" onclick="this.classList.add('hidden');"><?= $message ?></div>
