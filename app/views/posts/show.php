<?php flash('post_err');
      flash('post_success'); ?>
<div class="row">
<div class="col-lg-6 col-md-6 col-sm-6">
    <a href="<?php echo URL_ROOT;?>posts/" class="btn bg-dark text-light"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-file-post" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M4 1h8a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2zm0 1a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H4z"/>
  <path d="M4 5.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-.5.5h-7a.5.5 0 0 1-.5-.5v-7z"/>
  <path fill-rule="evenodd" d="M4 3.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z"/>
</svg><?php echo strtoupper($data['title']); ?></a>
</div>
<div class="col-lg-6 col-md-6 col-sm-6">
  <a href="<?php echo URL_ROOT;?>posts/add" class="btn btn-primary float-right"> 
<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-shift-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M7.27 2.047a1 1 0 0 1 1.46 0l6.345 6.77c.6.638.146 1.683-.73 1.683H11.5v3a1 1 0 0 1-1 1h-5a1 1 0 0 1-1-1v-3H1.654C.78 10.5.326 9.455.924 8.816L7.27 2.047z"/>
</svg> Add Post
</a>
</div>
</div>
<br>
<div class="row">
<div class="col-lg-3 col-md-2"></div>
<div class="col-lg-6 col-md-8">
<div class="card mb-3">
  <img src="./public/img/<?php echo $data['post']->img; ?>" class="card-img-top" alt="img">
  <div class="card-body">
    <h5 class="card-title"><?php echo $data['post']->title;?></h5>
    <p class="card-text"><?php echo $data['post']->body;?></p>
    <p class="card-text"><small class="text-muted">Written By: <?php echo $data['post']->name; ?> On: <?php echo $data['post']->created; ?> </small>
    <hr>
    <?php if($data['post']->userId==$_SESSION['user_id']): ?>
        <a href="<?php echo URL_ROOT;?>posts/edit/<?php echo $data['post']->postId;?>" class="btn btn-success">Edit</a>
        <form action="<?php echo URL_ROOT;?>posts/delete/<?php echo $data['post']->postId;?>" class="float-right" style="display:inline; margin:0px;padding:0px;">
        <input type="submit" value="Delete" class="btn btn-danger float-right">
        </form>
    <?php endif; ?>
  </div>
</div>
