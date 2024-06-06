<?php

namespace App\Traits;

trait UploudFile
    {
        public function upload($image, $path){
            $imgExt= $image->getClientOriginalExtension();
            $fileName = time() . '.' . $imgExt;
            $path = 'assets/images';
            $image->move($path, $fileName);
            return $fileName;
        }
    }
