<h1><?php echo $data['title'];?></h1>
<div class="row">

    <div class="col col-lg-3"></div>
    <div class="col col-lg-6">
        <?php flash('post_success'); 
                flash('post_err');?>

 <form action="<?php echo URL_ROOT;?>posts/add" method="POST" class="form-group" name="form1" enctype="multipart/form-data">
 <div class="mb-3">
   <label for="exampleInputImage" class="form-label">Image *</label>
   <input type="file" name="image" class="form-control <?php echo (!empty($data['error']['img_err'])) ? 'is-invalid' : ''; ?>" >
   <span class="invalid-feedback"><?php echo $data['error']['img_err'];?></span>
 </div>
  <div class="mb-3">
    <label for="exampleInputBody1" class="form-label">Body *</label>
   <textarea cols="30" rows="10" class="form-control <?php echo (!empty($data['error']['body_err'])) ? 'is-invalid' : ''; ?>" id="exampleInputBody1" name="body1"></textarea>
        <span class="invalid-feedback"><?php echo $data['error']['body_err'];?></span>
  </div>
  <button type="submit" class="btn btn-primary btn-block" name="submit">Submit</button>
</form>
    </div>

    <div class="col col-lg-3"></div>


</div>