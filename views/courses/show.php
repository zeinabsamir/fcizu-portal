<div class="col-lg-3 col-md-4 col-sm-5 col-lg-offset-2 col-md-offset-2 col-sm-offset-2 text-center">
  <div class="form-box">
    <div class="row ">
      <div class="col-lg-12">
        <form>
          <div class="row">
            <div class="col-lg-12">
              <div class="form-element">
                <h3 class="text-center"><?php echo $course->title; ?></h3>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12">
              <div class="form-element form-group">
                Code <h4><?php echo $course->code; ?></h4>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12">
              <div class="form-element form-group">
                Faculty <h4><?php echo $course->faculty; ?></h4>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12">
              <div class="form-element form-group">
                Department <h4><?php echo $course->department; ?></h4>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12">
              <div class="form-element form-group">
                <?php if(CoursesHelper::checkSubscription($course->id, $_SESSION['currentUserID'])) { ?>
                  <a class="btn btn-default" href="?controller=courses&action=unsubscribe&course_id=<?php echo $course->id; ?>&user_id=<?php echo $_SESSION['currentUserID']; ?>">Unubscribe</a>
                <?php } else { ?>
                  <a class="btn btn-default" href="?controller=courses&action=subscribe&course_id=<?php echo $course->id; ?>&user_id=<?php echo $_SESSION['currentUserID']; ?>">Subscribe</a>
                <?php } ?>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
