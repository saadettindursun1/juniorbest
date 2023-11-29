<?php

class jbUploads
{

    function uploads($file, $name, $file_path)
    {
        $uploadDir = $file_path; // Yüklenen fotoğrafların saklanacağı dizin
        $uploadedFile = $file[$name]["tmp_name"];
        $fileName = uniqid() . "-" . $file[$name]["name"];
        $uploadPath = $uploadDir . $fileName;

        // Fotoğrafın geçerli bir resim dosyası olduğunu kontrol edin
        $imageFileType = strtolower(pathinfo($uploadPath, PATHINFO_EXTENSION));
        $allowedExtensions = array("jpg", "jpeg", "png", "gif");
        if (!in_array($imageFileType, $allowedExtensions)) {
            echo "Sadece JPG, JPEG, PNG ve GIF dosyaları yüklenebilir.";
            exit;
        }

        // Fotoğrafı yüklemek için move_uploaded_file kullanılır
        if (move_uploaded_file($uploadedFile, $uploadPath)) {

            return $uploadPath;
        } else {
            echo "Fotoğraf yükleme hatası.";
        }
    }
}
