<?php

namespace App\Services;

class FileService {

    public function upload($file, $path)
    {
        $name = $file->getClientOriginalName();
        $fileName = time() . '_' . $name;
        $file->move($path . '/', $fileName);
        return $fileName;
    }
}
