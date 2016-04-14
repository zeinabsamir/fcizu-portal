<h2><?= $course->title ?> Announcements</h2>

<br>

<?php if ($_SESSION['currentUserRole'] == 'teacher') { ?>
  <div class="text-center">
    <form action="/?controller=announcements&action=create&course_id=1" method="post" class="form-inline">
      <div class="form-element form-group">
        <textarea type="text" name="content" class="form-control" cols="50" placeholder="Add New Announcement ..."></textarea>
      </div>

      <div class="form-element form-group">
        <input type="submit" name="createAnnouncementSubmit" value="Create" class="btn btn-default">
      </div>
    </form>
  </div>
<?php } ?>

<br>

<?php foreach($announcements as $announcement) { ?>
  <div class="panel panel-default">
    <div class="panel-body">
      <b>
        <?= UsersHelper::fullName($announcement->teacherId) ?> &middot;
        <?= date_format(date_create($announcement->createdAt), "Y/m/d h:i a") ?>
      </b>
      <p>
        <?= $announcement->content ?>
      </p>
    </div>
  </div>
<?php } ?>
