<?php


namespace ImageOptimizer\TypeGuesser;


class ExtensionTypeGuesser implements TypeGuesser
{

    /**
     * @param string $filepath
     * @return string Image file type, value of one of the TYPE_* const
     */
    public function guess($filepath)
    {
        $ext = amopt_strtolower(ammina_pathinfo($filepath, PATHINFO_EXTENSION));

        switch($ext) {
            case 'png':
                return self::TYPE_PNG;
            case 'gif':
                return self::TYPE_GIF;
            case 'jpg':
            case 'jpeg':
                return self::TYPE_JPEG;
            case 'svg':
                return self::TYPE_SVG;
            default:
                return self::TYPE_UNKNOWN;
        }
    }
}