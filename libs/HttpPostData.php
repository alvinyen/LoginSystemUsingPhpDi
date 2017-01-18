<?php

namespace LoginSystemUsingPhpDi\libs;
include_once "HttpData.php" ;
use \LoginSystemUsingPhpDi\libs\HttpData ;


class HttpPostData implements HttpData
{
    protected $contentType = null ;
    const CONTENT_TYPE_FORM_DATA = "application/x-www-form-urlencoded" ;
    const CONTENT_TYPE_JSON = "application/json" ;

    public function __construct(string $contentType)
    {
        $this->contentType = $contentType ;
    }

    public function parse():array
    {
        $httpPostDataArray = [] ;
        switch ($this->contentType) {
            case self::CONTENT_TYPE_FORM_DATA :
                $httpPostDataArray = $_POST ;
                break ;
            case self::CONTENT_TYPE_JSON :
                $httpPostDataArray = json_decode(file_get_contents('php://input'), true); // true means decode to assoc
                break ;
            default :
                echo 'no content type been matched.' ;
        }
        return $httpPostDataArray ;
    }
}