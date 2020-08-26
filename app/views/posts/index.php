<div class="row">
<div class="col-lg-6 col-md-6 col-sm-6">
</div>
<div class="col-lg-6 col-md-6 col-sm-6">
  <!-- <a href="<?php echo URL_ROOT;?>posts/add" class="btn btn-primary float-right"> 
<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-shift-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M7.27 2.047a1 1 0 0 1 1.46 0l6.345 6.77c.6.638.146 1.683-.73 1.683H11.5v3a1 1 0 0 1-1 1h-5a1 1 0 0 1-1-1v-3H1.654C.78 10.5.326 9.455.924 8.816L7.27 2.047z"/>
</svg> Add Post
</a> -->
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal">
  <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-shift-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M7.27 2.047a1 1 0 0 1 1.46 0l6.345 6.77c.6.638.146 1.683-.73 1.683H11.5v3a1 1 0 0 1-1 1h-5a1 1 0 0 1-1-1v-3H1.654C.78 10.5.326 9.455.924 8.816L7.27 2.047z"/>
</svg> Add Post
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-center" id="exampleModalLabel">Add post</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
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
      </div>
    </div>
  </div>
</div>
</div>
</div>
<br>
<?php flash('post_success'); ?>
<?php flash('post_err'); ?>
<div class="row">
<div class="col-lg-3 col-md-2"></div>
<div class="col-lg-6 col-md-8">
<?php if($_GET['url']==('posts'||'posts/')): ?>
<?php if(!empty($data['posts']) && count($data['posts'])>=1): ?>
<?php foreach($data['posts'] as $post): ?>
<!-- <div class="card bg-info text-dark text-center">
<div class="card card-header"></div>
<div class="card card-body"><h3></h3></div>
<div class="card card-footer">php echo $post->user_id; </div> -->

<div class="card mb-3">
  <div class="card card-header">
    <div class="dropdown">
      <h3 style="display: inline-block"><a href="#" style="text-decoration:none; color:inherit"><?php echo $post->name; ?></a></h3>
  <button class="btn btn-secondary dropdown-toggle float-right" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">
  </button>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <li><a class="dropdown-item" href="#">Report</a></li>
    <li><a class="dropdown-item" href="#">Unfollow</a></li>
    <li><a class="dropdown-item" href="#">Mute</a></li>
  </ul>
</div>
  </div>
  <div class="text-center">
    <img src="./public/img/<?php echo $post->img;?>" class="card-img-top img-fluid" alt="img" style="max-width:400px; max-height:400px;">
  </div>
  <div class="card-body">
    <p class="mb-0 mt-0">
      <!-- LIKE -->
      <h4 style="display: inline-block; color:inherit" class="mr-3"><a href="#" style="text-decoration:none; color:inherit"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-heart" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
      <path fill-rule="evenodd" d="M8 2.748l-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z"/>
    </svg></a></h4>
    <!-- COMMENT -->
    <h4 style="display: inline-block; color:inherit" class="mr-3"><a href="#" style="text-decoration:none; color:inherit"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chat-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" d="M14 1H2a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h2.5a2 2 0 0 1 1.6.8L8 14.333 9.9 11.8a2 2 0 0 1 1.6-.8H14a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM2 0a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h2.5a1 1 0 0 1 .8.4l1.9 2.533a1 1 0 0 0 1.6 0l1.9-2.533a1 1 0 0 1 .8-.4H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
</svg></a></h4>
<!-- SHARE -->
<h4 style="display: inline-block; color:inherit" ><a href="#" style="text-decoration:none; color:inherit"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-right-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
  <path fill-rule="evenodd" d="M7.646 11.354a.5.5 0 0 1 0-.708L10.293 8 7.646 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0z"/>
  <path fill-rule="evenodd" d="M4.5 8a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5z"/>
</svg></a></h4>
</p>
    <h5 class="card-title"><b><a href="#" style="text-decoration:none; color:inherit;"><?php echo $post->name;?></a></b> <?php echo $post->body;?></h5>
    <p class="card-text"><small class="text-muted"><?php echo $post->created; ?> </small> 
  </div>
</div>
<?php endforeach; ?>
<?php endif; ?>
<?php endif ?>

</div>