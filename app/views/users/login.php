<div class="row">
    <div class="col-lg-3 col-md-2"></div>
    <div class="col-lg-6 col-md-8">
    <div class="card py-3 px-3 mt-5 bg-light">
    <div class="card card-header text-center text-dark"><h1><b><?php echo $data['title']; ?> <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-door-open" fill="black" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M1 15.5a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 0 1h-13a.5.5 0 0 1-.5-.5zM11.5 2H11V1h.5A1.5 1.5 0 0 1 13 2.5V15h-1V2.5a.5.5 0 0 0-.5-.5z"/>
  <path fill-rule="evenodd" d="M10.828.122A.5.5 0 0 1 11 .5V15h-1V1.077l-6 .857V15H3V1.5a.5.5 0 0 1 .43-.495l7-1a.5.5 0 0 1 .398.117z"/>
  <path d="M8 9c0 .552.224 1 .5 1s.5-.448.5-1-.224-1-.5-1-.5.448-.5 1z"/>
</svg></b></h1></div>
    <?php flash('register_success');?>
    <?php flash('login_err');?>
    
    <form method="POST" action="<?php echo URL_ROOT;?>users/login">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" class="form-control <?php echo (!empty($data['error']['email_err'])) ? 'is-invalid' : ''; ?>" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" value="<?php echo $data['email'] ? $data['email'] : ''; ?>">
    <?php if(!empty($data['error']['email_err'])){ ?>
    <span class="invalid-feedback"><?php echo $data['error']['email_err'];?></span>  
    <?php } ?>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control <?php echo (!empty($data['error']['password_err'])) ? 'is-invalid' : ''; ?>" id="exampleInputPassword1" name="password">
        <span class="invalid-feedback"><?php echo $data['error']['password_err'];?></span>
  </div>
<div class="mb-3 input-group">
  <div class="input-group">
    <input class="form-check-input" type="checkbox" name="rememberMe" aria-label="Radio button for following text input"> &nbsp;Remember me
    </div>
    
</div>
  <button type="submit" class="btn btn-primary btn-block" name="submit">Login</button>
  <span>You need an account ?<a href="<?php echo URL_ROOT;?>users/register" class="nav-link" style="display:inline-block;">Register</a></span>
</form>
</div>
    </div>
    <div class="col-lg-3 col-md-2"></div>

</div>