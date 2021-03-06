<div class="col-lg-3 col-md-4 col-sm-5 col-lg-offset-6 col-md-offset-2 col-sm-offset-2 text-center">
  <div class="form-box">
    <div class="row ">
      <div class="col-lg-12 ">
        <form action="" method="post" enctype="multipart/form-data">
          <div class="row">
            <div class="col-lg-12 ">
              <div class="form-element">
                <h3 class="text-center">Register</h3>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12">
              <div class="form-element form-group">
                <input type="email" name="email" class="form-control" placeholder="Email">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12 ">
              <div class="form-element form-group">
                <input type="password" name="password" class="form-control" placeholder="Password">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12 ">
              <div class="form-element form-group">
                <input type="text" name="firstName" class="form-control" placeholder="First Name">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12 ">
              <div class="form-element form-group">
                <input type="text" name="lastName" class="form-control" placeholder="Last Name">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12 ">
              <div class="form-element form-group">
                <input type="text" name="department" class="form-control" placeholder="Department">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12 ">
              <div class="form-element form-group">
                <input type="date" name="dateOfBirth" class="form-control" placeholder="Date of Birth">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12 ">
              <div class="form-element form-group">
                <div id="chooseRole" class="btn-group" data-toggle="buttons">
                  <label class="btn btn-default active">
                    <input type="radio" name="userRole" value="student" checked> Student
                  </label>
                  <label class="btn btn-default">
                    <input type="radio" name="userRole" value="teacher"> Teacher
                  </label>
                </div>
              </div>
            </div>
          </div>
          <div hidden id="teacherVerifier" class="row">
            <div class="col-lg-12">
              <div class="form-element form-group">
                <input type="text" name="teacherCode" class="form-control" placeholder="Teacher Code">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12 center-block ">
              <div class="form-element form-group">
                <input type="submit" name="registerSubmit" value="Register" class="btn btn-default">
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  $("#chooseRole :input").change(function() {
      var choosenRole = $(this).val();
      if(choosenRole === 'teacher') {
        $("#teacherVerifier").show();
      } else {
        $("#teacherVerifier").hide();
      }
  });
</script>
