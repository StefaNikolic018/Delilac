<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
  <div class="container">
    <!-- IF LOGGED IN, CLICK ON LOGO IS LEADING TO POSTS PAGE-->
    <?php if(!isset($_SESSION['user_id'])): ?>
    <a class="navbar-brand" href="<?php echo URL_ROOT;?>"><img src="<?php echo LOGO_SRC; ?>" class="img img-fluid" alt="logo" width="150px"></a>
    <?php else: ?>
    <a class="navbar-brand" href="<?php echo URL_ROOT;?>posts/"><img src="<?php echo LOGO_SRC; ?>" class="img img-fluid" alt="logo" width="150px"></a>
    <?php endif; ?>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample07" aria-controls="navbarsExample07" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExample07">
      <ul class="navbar-nav mr-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="<?php echo URL_ROOT; ?>pages/about">About</a>
        </li>
      </ul>
        <ul class="navbar-nav ml-auto">
          <!-- IF LOGGED IN -->
          <?php if(isset($_SESSION['user_id'])): ?>
            <li class="nav-item ">
                <a href="<?php echo URL_ROOT; ?>users/profile" class="nav-link"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person-badge" fill="white" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M12 1H4a1 1 0 0 0-1 1v11.755S4 12 8 12s5 1.755 5 1.755V2a1 1 0 0 0-1-1zM4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H4z"/>
  <path fill-rule="evenodd" d="M8 11a3 3 0 1 0 0-6 3 3 0 0 0 0 6zM6 2.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5z"/>
</svg></a>
            </li>
            <br>
            <li class="nav-item">
                <a href="<?php echo URL_ROOT.'users/logout'; ?>" class="nav-link"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-x-circle" fill="orange" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
  <path fill-rule="evenodd" d="M11.854 4.146a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708-.708l7-7a.5.5 0 0 1 .708 0z"/>
  <path fill-rule="evenodd" d="M4.146 4.146a.5.5 0 0 0 0 .708l7 7a.5.5 0 0 0 .708-.708l-7-7a.5.5 0 0 0-.708 0z"/>
</svg></a>
            </li>
            <!-- IF NOT LOGGED IN -->
          <?php else: ?>
            <li class="nav-item active">
                <a href="<?php echo URL_ROOT; ?>users/login" class="nav-link"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-door-open" fill="white" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M1 15.5a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 0 1h-13a.5.5 0 0 1-.5-.5zM11.5 2H11V1h.5A1.5 1.5 0 0 1 13 2.5V15h-1V2.5a.5.5 0 0 0-.5-.5z"/>
  <path fill-rule="evenodd" d="M10.828.122A.5.5 0 0 1 11 .5V15h-1V1.077l-6 .857V15H3V1.5a.5.5 0 0 1 .43-.495l7-1a.5.5 0 0 1 .398.117z"/>
  <path d="M8 9c0 .552.224 1 .5 1s.5-.448.5-1-.224-1-.5-1-.5.448-.5 1z"/>
</svg></a>
            </li>
            <br>
            <li class="nav-item">
                <a href="<?php echo URL_ROOT.'users/register'; ?>" class="nav-link"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person-plus" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M11 14s1 0 1-1-1-4-6-4-6 3-6 4 1 1 1 1h10zm-9.995-.944v-.002.002zM1.022 13h9.956a.274.274 0 0 0 .014-.002l.008-.002c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664a1.05 1.05 0 0 0 .022.004zm9.974.056v-.002.002zM6 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0zm4.5 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/>
  <path fill-rule="evenodd" d="M13 7.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0v-2z"/>
</svg></a>
            </li>
          <?php endif;?>
        </ul>
    </div>
  </div>
</nav>