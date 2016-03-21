<?php
  class TeacherCourse {
    public $id;
    public $courseId;
    public $teacherId;
    public $year;
    public $semester;
    public $createdAt;

    public function __construct($id, $courseId, $teacherId, $year, $semester,
                                $createdAt) {
      $this->id = $id;
      $this->courseId = $courseId;
      $this->teacherId = $teacherId;
      $this->year = $year;
      $this->semester = $semester;
      $this->createdAt = $createdAt;
    }

    public static function create($courseId, $teacherId) {
      $year = date('Y');
      $semester = TeacherCourse::currentSemester();

      $query = "INSERT INTO teaches (course_id, teacher_id, year, semester, created_at)
                VALUES ('$courseId', '$teacherId', '$year', '$semester', now())";

      if(mysql_query($query)) {
        return new TeacherCourse(null, $courseId, $teacherId,
                        $year, $semester, null);
      } else {
        $_SESSION['notice'] = "TeacherCourse error: ".mysql_error()."\n";
      }
    }

    public static function find($courseId, $teacherId) {
      $query = "SELECT * FROM teaches WHERE course_id='$courseId' AND teacher_id='$teacherId' LIMIT 1";
      $result = mysql_query($query);
      $teacherCourse = mysql_fetch_array($result);

      return new TeacherCourse($teacherCourse['id'], $teacherCourse['course_id'], $teacherCourse['teacher_id'],
                            $teacherCourse['year'], $teacherCourse['semester'],
                          $teacherCourse['created_at']);
    }

    public static function delete($courseId, $teacherId) {
      // Check if the record exists
      if($teacherCourse = TeacherCourse::find($courseId, $teacherId)) {
        $query = "DELETE FROM teaches WHERE id='$teacherCourse->id'";
        if(mysql_query($query)) {
          return true;
        } else {
          echo "error".mysql_error()."\n";
        }
      } else {
        return false;
      }
    }

    public static function isSubsribed($courseId, $teacherId) {
      $query = "SELECT * FROM teaches WHERE course_id='$courseId' AND teacher_id='$teacherId' LIMIT 1";
      $result = mysql_query($query);

      if(mysql_num_rows($result) == 1) {
        return true;
      } else {
        return false;
      }
    }

    public static function myCourses($teacherId) {
      $list = [];

      $query = "SELECT course_id from teaches WHERE teacher_id='$teacherId'";
      $result = mysql_query($query);

      if (mysql_num_rows($result) > 0) {
        while($courseId = mysql_fetch_array($result)) {
          $list[] = $courseId['course_id'];
        }
      }

      return $list;
    }

    private static function currentSemester() {
      $currentMonth = date('m');
      switch($currentMonth) {
        case '10':
        case '11':
        case '12':
        case '1':
          return '1';
          break;
        case '2':
        case '3':
        case '4':
        case '5':
          return '2';
          break;
      }
      return '0';
    }

  }
?>

