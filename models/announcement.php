<?php
  class Announcement {
    public $id;
    public $content;
    public $courseId;
    public $teacherId;
    public $createdAt;

    public function __construct($id, $content, $courseId, $teacherId, $createdAt) {
      $this->id = $id;
      $this->content = $content;
      $this->courseId = $courseId;
      $this->teacherId = $teacherId;
      $this->createdAt = $createdAt;
    }

    public static function create($content, $courseId, $teacherId) {
      $query = "INSERT INTO announcements (content, course_id, teacher_id, created_at)
                VALUES ('$content', '$courseId', '$teacherId', now())";

      if(mysql_query($query)) {
        return new Announcement(null, $content, $courseId, $teacherId, null);
      } else {
        $_SESSION['notice'] = "Announcement error: ".mysql_error()."\n";
      }
    }

    public static function all($courseId) {
      $list = [];

      $query = "SELECT * from announcements WHERE course_id='$courseId' ORDER BY created_at DESC";
      $result = mysql_query($query);

      if (mysql_num_rows($result) > 0) {
        while($announcement = mysql_fetch_array($result)) {
          $list[] = new Announcement($announcement['id'], $announcement['content'],
                                     $announcement['course_id'],
                                     $announcement['teacher_id'],
                                     $announcement['created_at']);
        }
      }

      return $list;
    }

    public static function find($announcementId) {
      $query = "SELECT * FROM announcements WHERE id='$announcementId' LIMIT 1";
      $result = mysql_query($query);
      $announcement = mysql_fetch_array($result);

      return new Announcement($announcement['id'], $announcement['content'],
                              $announcement['course_id'],
                              $announcement['teacher_id'],
                              $announcement['created_at']);
    }

    public static function delete($announcementId) {
      // Check if the record exists
      if($announcement = Announcement::find($announcementId)) {
        $query = "DELETE FROM announcements WHERE id='$announcement->id'";
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

