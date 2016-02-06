<header class="navbar navbar-bright navbar-fixed-top" role="banner">
  <div class="container">
    <div class="navbar-header">
      <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a href="/" class="navbar-brand">FCI-ZU PORTAL</a>
    </div>
    <nav class="collapse navbar-collapse" role="navigation">
      <ul class="nav navbar-nav">
        <?php
          if($_SESSION['currentUserID']) {
        ?>
          <li>
            <a href="?controller=users&action=show&id=<?= $_SESSION['currentUserID'] ?>">Profile</a>
          </li>
          <li>
            <a href="?controller=users&action=edit&id=<?= $_SESSION['currentUserID'] ?>">Edit</a>
          </li>
          <li>
            <a href="?controller=users&action=logout">Sign out</a>
          </li>
        <?php } else { ?>
          <li>
            <a href="?controller=users&action=login">Login</a>
          </li>
        <?php } ?>
      </ul>
    </nav>
  </div>
</header>
<br><br><br><br>
