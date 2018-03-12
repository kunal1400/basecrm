<?php
include_once("dbinit.php");
include_once("bussiness/Client.php");
session_start();
header ('Content-type: text/html; charset=utf8');
pr_dump("post",$_POST);
pr_dump("get",$_POST);
pr_dump("FILES",$_FILES);

die();
if($_POST['q']=="upload") {

    receivefile($_POST['clientid'],"clientdocument");

}

function receivefile($clientid,$paramname){

    pr_dump("save",$_FILES);
    try {
        // Undefined | Multiple Files | $_FILES Corruption Attack
        // If this request falls under any of them, treat it invalid.
        if ( !isset($_FILES[$paramname]['error']) || is_array($_FILES[$paramname]['error']) ) { throw new RuntimeException('Invalid parameters.'); }

        // Check $_FILES[$paramname]['error'] value.
        switch ($_FILES[$paramname]['error']) {
            case UPLOAD_ERR_OK: {break;}
            case UPLOAD_ERR_NO_FILE: throw new RuntimeException('No file sent.');
            case UPLOAD_ERR_INI_SIZE:case UPLOAD_ERR_FORM_SIZE:throw new RuntimeException('Exceeded filesize limit.');
            default: throw new RuntimeException('Unknown errors.');
        }

        // You should also check filesize here.
        if ($_FILES[$paramname]['size'] > 1000000) {
            throw new RuntimeException('Exceeded filesize limit.');
        }

        // DO NOT TRUST $_FILES[$paramname]['mime'] VALUE !!
        // Check MIME Type by yourself.
        $finfo = new finfo(FILEINFO_MIME_TYPE);
        if (false === $ext = array_search( $finfo->file($_FILES[$paramname]['tmp_name']), array( 'jpg' => 'image/jpeg', 'png' => 'image/png', 'gif' => 'image/gif', ), true )) { throw new RuntimeException('Invalid file format.'); }

        // You should name it uniquely.
        // DO NOT USE $_FILES[$paramname]['name'] WITHOUT ANY VALIDATION !!
        // On this example, obtain safe unique name from its binary data.
        $destname=sprintf('./uploads/%s.%s', sha1_file($_FILES[$paramname]['tmp_name']), $ext ) ;
        if (!move_uploaded_file( $_FILES[$paramname]['tmp_name'],$destname )) { throw new RuntimeException('Failed to move uploaded file.'); }

        fastquery("update client set documentsavename=$destname where id=$clientid");

        echo 'File is uploaded successfully.';

    } catch (RuntimeException $e) { echo $e->getMessage();}

}