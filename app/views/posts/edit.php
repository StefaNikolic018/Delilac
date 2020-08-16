<h1><?php echo $data['title'];?></h1>
<div class="row">

    <div class="col col-lg-3"></div>
    <div class="col col-lg-6">
        <?php flash('post_success'); 
                flash('post_err');?>

 <form action="<?php echo URL_ROOT.'posts/edit/'.$data['post']->postId;?>" method="POST" class="form-group" name="form1">
  <div class="mb-3">
    <label for="exampleInputTitle" class="form-label">Title *</label>
    <input type="text" class="form-control <?php echo (!empty($data['error']['title_err'])) ? 'is-invalid' : ''; ?>" id="exampleInputTitle1" aria-describedby="titleHelp" name="title1" value="<?php echo $data['post_title'] ? $data['post_title'] : ''; ?>">
    <span class="invalid-feedback"><?php echo $data['error']['title_err'];?></span>
  </div>
  <div class="mb-3">
    <label for="exampleInputBody1" class="form-label">Body *</label>
   <textarea cols="30" rows="10" class="form-control <?php echo (!empty($data['error']['body_err'])) ? 'is-invalid' : ''; ?>" id="exampleInputBody1" name="body1"><?php echo $data['post_body'] ? $data['post_body'] : ''; ?></textarea>
        <span class="invalid-feedback"><?php echo $data['error']['body_err'];?></span>
  </div>
  <button type="submit" class="btn btn-primary btn-block" name="submit">Submit</button>
</form>
    </div>

    <div class="col col-lg-3"></div>


</div>