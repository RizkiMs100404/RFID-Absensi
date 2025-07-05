<?php if (session()->getFlashdata('alert')): 
  $alert = session()->getFlashdata('alert');
  $type = $alert['type'] ?? 'info';
  $colorMap = [
    'success' => '#38a169', // green
    'error'   => '#e53e3e', // red
    'warning' => '#dd6b20', // orange
    'info'    => '#3182ce'  // blue
  ];
  $bgColor = $colorMap[$type] ?? '#3182ce';
?>
<style>
  .custom-alert {
    position: fixed;
    top: 20px;
    left: 50%;
    transform: translateX(-50%);
    min-width: 300px;
    max-width: 90%;
    background-color: white;
    border-left: 6px solid <?= $bgColor ?>;
    box-shadow: 0 4px 6px rgba(0,0,0,0.1);
    padding: 16px 20px;
    color: #333;
    font-family: sans-serif;
    border-radius: 5px;
    z-index: 9999;
    animation: slideDown 0.3s ease-out;
  }

  .custom-alert strong {
    color: <?= $bgColor ?>;
  }

  .custom-alert .close-btn {
    position: absolute;
    right: 12px;
    top: 8px;
    cursor: pointer;
    font-size: 18px;
    color: #666;
  }

  @keyframes slideDown {
    from {
      transform: translate(-50%, -30px);
      opacity: 0;
    }
    to {
      transform: translate(-50%, 0);
      opacity: 1;
    }
  }
</style>

<div class="custom-alert">
  <span class="close-btn" onclick="this.parentElement.style.display='none';">&times;</span>
  <strong><?= ucfirst($type) ?>!</strong> <?= esc($alert['message']) ?>
</div>

<script>
  setTimeout(() => {
    const alertBox = document.querySelector('.custom-alert');
    if (alertBox) alertBox.style.display = 'none';
  }, 4000); // Auto close after 4 seconds
</script>
<?php endif; ?>
