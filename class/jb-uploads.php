<?php 

class jbUploads { 

function uploads($file){
    $uploadDir = "uploads/"; // Yüklenen fotoğrafların saklanacağı dizin
    $uploadedFile = $file["info-photo"]["tmp_name"];
    $fileName = uniqid() . "-" . $file["info-photo"]["name"];
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
        echo "Fotoğraf başarıyla yüklendi: " . $uploadPath;

        return $uploadPath;
    } else {
        echo "Fotoğraf yükleme hatası.";
    }

}


}




?>