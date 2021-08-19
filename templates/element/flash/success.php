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
<div class="message success" style="color:#198754;font-size:14px;text-align:center;font-weight:bold"  onclick="this.classList.add('hidden')"><?= $message ?></div>
