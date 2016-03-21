<div class="col-lg-3 col-md-4 col-sm-5 col-lg-offset-2 col-md-offset-2 col-sm-offset-2 text-center">
  <div class="form-box">
    <div class="row ">
      <div class="col-lg-12 ">
        <form action="" method="post" enctype="multipart/form-data">
          <div class="row">
            <div class="col-lg-12 ">
              <div class="form-element">
                <h3 class="text-center">Edit Course</h3>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12">
              <div class="form-element form-group">
                <input type="text" name="title" class="form-control" placeholder="<?= $course->title ?>">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12 ">
              <div class="form-element form-group">
                <input type="text" name="code" class="form-control" placeholder="<?= $course->code ?>">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12 ">
              <div class="form-element form-group">
                <input type="text" name="faculty" class="form-control" placeholder="<?= $course->faculty ?>">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12 ">
              <div class="form-element form-group">
                <input type="text" name="department" class="form-control" placeholder="<?= $course->department ?>">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12 center-block ">
              <div class="form-element form-group">
                <input type="submit" name="editCourseSubmit" value="Edit" class="btn btn-default">
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
