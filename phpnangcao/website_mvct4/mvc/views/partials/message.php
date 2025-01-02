<?php if (isset($data['message']) && !empty($data['message'])): ?>
    <div class="message-container">
        <?php foreach ($data['message'] as $msg): ?>
            <div class="alert">
                <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                <?php echo $msg; ?>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>
