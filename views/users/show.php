<div class="col-lg-3 col-md-4 col-sm-5 col-lg-offset-2 col-md-offset-2 col-sm-offset-2 text-center">
  <div class="form-box">
    <div class="row ">
      <div class="col-lg-12">
        <form>
          <div class="row">
            <div class="col-lg-12">
              <div class="form-element">
                <h3 class="text-center">Profile</h3>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12">
              <div class="form-element form-group">
                Email <h4><?php echo $user->email; ?></h4>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12">
              <div class="form-element form-group">
                Full Name <h4><?php echo $user->firstName . ' ' . $user->lastName; ?></h4>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12">
              <div class="form-element form-group">
                Department <h4><?php echo $user->department; ?></h4>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12">
              <div class="form-element form-group">
                Date of Birth <h4><?php echo $user->dateOfBirth; ?></h4>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
