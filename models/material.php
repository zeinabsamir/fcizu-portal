<?php
  class Material {
    public $id;
    public $courseId;
    public $teacherId;
    public $description;
    public $fileURL;
    public $createdAt;

    public function __construct($id, $courseId, $teacherId, $description, $fileURL, $createdAt) {
      $this->id = $id;
      $this->courseId = $courseId;
      $this->teacherId = $teacherId;
      $this->description = $description;
      $this->fileURL = $fileURL;
      $this->createdAt = $createdAt;
    }

    public static function create($courseId, $teacherId, $description, $fileURL) {
      $query = "INSERT INTO course_materials (course_id, teacher_id, description, file_url, created_at)
                VALUES ('$courseId', '$teacherId', '$description', '$fileURL', now())";

      if(mysql_query($query)) {
        return new Material(null, $courseId, $teacherId, $description, $fileURL, null);
      } else {
        $_SESSION['notice'] = "Material error: ".mysql_error()."\n";
      }
    }

    public static function all($courseId) {
      $list = [];

      $query = "SELECT * from course_materials WHERE course_id='$courseId' ORDER BY created_at DESC";
      $result = mysql_query($query);

      if (mysql_num_rows($result) > 0) {
        while($material = mysql_fetch_array($result)) {
          $list[] = new Material($material['id'], $material['course_id'],
                                 $material['teacher_id'], $material['description'],
                                 $material['file_url'], $material['created_at']);
        }
      }

      return $list;
    }

    public static function find($materialId) {
      $query = "SELECT * FROM course_materials WHERE id='$materialId' LIMIT 1";
      $result = mysql_query($query);
      $material = mysql_fetch_array($result);

      return new Material($material['id'], $material['course_id'],
                          $material['teacher_id'], $material['description'],
                          $material['file_url'], $material['created_at']);
    }

    public static function delete($materialId) {
      // Check if the record exists
      if($material = Material::find($materialId)) {
        $query = "DELETE FROM course_materials WHERE id='$material->id'";
        if(mysql_query($query)) {
          return true;
        } else {
          echo "error".mysql_error()."\n";
        }
      } else {
        return false;
      }
    }

  }
?>

