<div class="col-lg-3 col-md-4 col-sm-5 col-lg-offset-2 col-md-offset-2 col-sm-offset-2 text-center">
  <div class="form-box">
    <div class="row ">
      <div class="col-lg-12">
        <form action="" method="post" enctype="multipart/form-data">
          <div class="row">
            <div class="col-lg-12 ">
              <div class="form-element">
                <h3 class="text-center">Edit</h3>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12">
              <div class="form-element form-group">
                <input type="email" name="email" class="form-control" placeholder="<?= $user->email ?>">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12 ">
              <div class="form-element form-group">
                <input type="password" name="password" class="form-control" placeholder="<?= $user->password ?>">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12 ">
              <div class="form-element form-group">
                <input type="text" name="firstName" class="form-control" placeholder="<?= $user->firstName ?>">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12 ">
              <div class="form-element form-group">
                <input type="text" name="lastName" class="form-control" placeholder="<?= $user->lastName ?>">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12 ">
              <div class="form-element form-group">
                <input type="text" name="faculty" class="form-control" placeholder="<?= $user->faculty ?>">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12 center-block ">
              <div class="form-element form-group">
                <input type="submit" name="editSubmit" value="Edit" class="btn btn-default">
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
