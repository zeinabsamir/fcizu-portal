<h2><?= $course->title ?> Materials</h2>

<br>

<?php if ($_SESSION['currentUserRole'] == 'teacher') { ?>
  <div class="text-center">
    <form enctype="multipart/form-data" action="/?controller=materials&action=create&course_id=<?= $_GET['course_id'] ?>" method="post" class="form-inline">

      <div class="form-element form-group">
        <label>Add New File </label>
        <input type="file" name="file_url" class="form-control"></input>
      </div>

      <div class="form-element form-group">
        <input type="text" name="description" class="form-control" placeholder="Description"></input>
      </div>

      <div class="form-element form-group">
        <input type="submit" name="createMaterialSubmit" value="Upload" class="btn btn-default">
      </div>
    </form>
  </div>
<?php } ?>

<br>

<?php foreach($materials as $material) { ?>
  <div class="panel panel-default">
    <div class="panel-body">
      <b>
        <?= UsersHelper::fullName($material->teacherId) ?> &middot;
        <?= date_format(date_create($material->createdAt), "Y/m/d h:i a") ?>
        </b>
          |
          <a href="/?controller=materials&action=download&material_id=<?= $material->id ?>">
            Download
          </a>
        <?php if ($_SESSION['currentUserRole'] == 'teacher') { ?>
          |
          <a href="/?controller=materials&action=destroy&material_id=<?= $material->id ?>&course_id=<?= $_GET['course_id'] ?>">
            Delete
          </a>
        <?php } ?>

      <p>
        <?= $material->description ?>
      </p>
    </div>
  </div>
<?php } ?>
