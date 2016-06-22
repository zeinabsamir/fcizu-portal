<?php
  class FileUploader {
    public static function upload_file($fieldName, $targetDir) {
      // check and create if the target folder does not exist
      if (!file_exists($targetDir)) {
          mkdir($targetDir, 0777, true);
      }

      if (!empty($_FILES["$fieldName"]["name"])) {
        $fileName = $_FILES["$fieldName"]["name"];
        $tmpName = $_FILES["$fieldName"]["tmp_name"];
        $targetPath = $targetDir.$fileName;

        move_uploaded_file($tmpName, $targetPath);

        return $targetPath;
      }
    }

    // Add timestamp to the uploaded file name to make it unique
    public static function upload_file_fancy($fieldName, $targetDir) {
      if (!file_exists($targetDir)) {
          mkdir($targetDir, 0777, true);
      }

      if (!empty($_FILES["$fieldName"]["name"])) {
        $fileName = pathinfo($_FILES["$fieldName"]["name"], PATHINFO_FILENAME);
        $tmpName = $_FILES["$fieldName"]["tmp_name"];
        $ext = pathinfo($_FILES["$fieldName"]["name"], PATHINFO_EXTENSION);

        $newFileName = $fileName."_".time().".".$ext;
        $targetPath = $targetDir.$newFileName;

        move_uploaded_file($tmpName, $targetPath);

        return $targetPath;
      }
    }
  }
?>
