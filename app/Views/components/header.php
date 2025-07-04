<!-- app/Views/components/header.php -->
<header class="header">
  <div class="container">
    <div class="left">
       
      <img src="<?= base_url('images/logo.png') ?>" alt="Logo" class="logo">
      <span class="brand"><strong>SISTEM INFORMASI</strong> CLASS A</span>
    </div>
<?php
  $currentPath = service('uri')->getSegment(1);
?>
<nav class="nav">
  <a href="<?= base_url('/') ?>" class="<?= $currentPath == '' ? 'active' : '' ?>">Home</a>
  <a href="<?= base_url('about') ?>" class="<?= $currentPath == 'about' ? 'active' : '' ?>">About</a>
  <a href="<?= base_url('team') ?>" class="<?= $currentPath == 'team' ? 'active' : '' ?>">Team</a>
  <a href="<?= base_url('gallery') ?>" class="<?= $currentPath == 'gallery' ? 'active' : '' ?>">Gallery</a>
  <a href="<?= base_url('guide') ?>" class="<?= $currentPath == 'guide' ? 'active' : '' ?>">Guide</a>
</nav>
  </div>
</header>

