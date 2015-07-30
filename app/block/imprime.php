<?php
session_start();
if (isset($_GET["nom"])) {
   $id_session=session_id($_GET['session_id']);
   $tempo=exec('wkhtmltopdf http://127.0.0.1' . $_GET["nom"] . ' /tmp/' . $id_session . '.pdf',$reponse);
   $filename = '/tmp/' . $id_session . '.pdf';
   $content = file_get_contents($filename);
   header("Content-Disposition: inline; filename=$filename");
   header("Content-type: application/pdf");
   header('Cache-Control: private, max-age=0, must-revalidate');
   header('Pragma: public');
   echo $content;
}