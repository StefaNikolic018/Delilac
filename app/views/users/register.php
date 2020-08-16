<div class="row">
    <div class="col-lg-3 col-md-2"></div>
    <div class="col-lg-6 col-md-8">
    <div class="card py-3 px-3 mt-3 bg-light">
    <div class="card card-header text-center text-dark"><h1><b><?php echo $data['title']; ?> <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person-plus" fill="black" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M11 14s1 0 1-1-1-4-6-4-6 3-6 4 1 1 1 1h10zm-9.995-.944v-.002.002zM1.022 13h9.956a.274.274 0 0 0 .014-.002l.008-.002c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664a1.05 1.05 0 0 0 .022.004zm9.974.056v-.002.002zM6 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0zm4.5 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/>
  <path fill-rule="evenodd" d="M13 7.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0v-2z"/>
</svg></b></h1></div>
    <form method="POST" action="<?php echo URL_ROOT;?>users/register">
  <div class="mb-3">
    <label for="exampleInputName1" class="form-label">Name*</label>
    <input type="text" class="form-control <?php echo (!empty($data['error']['name_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['name'] ? $data['name'] : ''; ?>" id="exampleInputEmail1" aria-describedby="emailHelp" name="name">
    <span class="invalid-feedback"><?php echo $data['error']['name_err'];?></span>
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address*</label>
    <input type="email" class="form-control <?php echo (!empty($data['error']['email_err'])) ? 'is-invalid' : ''; ?>" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" value="<?php echo $data['email'] ? $data['email'] : ''; ?>">
    <?php if(empty($data['error']['email_err'])){ ?>
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
    <?php } else { ?>
    <span class="invalid-feedback"><?php echo $data['error']['email_err'];?></span>  
    <?php } ?>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password*</label>
    <input type="password" class="form-control <?php echo (!empty($data['error']['password_err'])) ? 'is-invalid' : ''; ?>" id="exampleInputPassword1" name="password">
        <span class="invalid-feedback"><?php echo $data['error']['password_err'];?></span>
  </div>
    <div class="mb-3">
    <label for="exampleInputPassword_Confirm1" class="form-label">Confirm password*</label>
    <input type="password" class="form-control <?php echo (!empty($data['error']['confirm_password_err'])) ? 'is-invalid' : ''; ?>" id="exampleInputPassword1" name="confirm_password">
        <span class="invalid-feedback"><?php echo $data['error']['confirm_password_err'];?></span>
  </div>
  <button type="submit" class="btn btn-success btn-block" name="submit">Register</button>
  <span >Do you have an account ?<a href="<?php echo URL_ROOT;?>users/login" class="nav-link" style="display:inline-block;"> Login</a></span>
</form>
</div>
    </div>
    <div class="col-lg-3 col-md-2"></div>

</div>