<?php 
class UploadPDF {
    private $target_dir; //$targetDir = "uploads/";
    private $filename; //$fileName = basename($_FILES["pdf"]["name"]);
    protected $target_filepath; //$targetFilePath = $targetDir . $fileName;
    private $filetype;
    private $upload_post_submit;//$_POST["submit"]
    private $upload_file; //$_FILES["pdf"]
    private $status_msg;
    protected $show_status_msg = true;
    protected $allowed_types = array('pdf');

    public function __construct($target_dir,$upload_post_submit,$upload_file){
        $this->target_dir = $target_dir;
        $this->upload_post_submit = $upload_post_submit;
        $this->upload_file = $upload_file;
        $this->filename = basename($upload_file["name"]);
        $this->target_filepath = $target_dir . $this->filename;
    }

    public function checkSubmitted(){
        if(isset($this->upload_post_submit) && !empty($this->upload_file["name"])){
            return true;
        }
        $this->statusMsg = 'Por favor, selecione um arquivo PDF para processar!';
        return false;
    }

    public function checkAllowedTypes(){
        $fileType = pathinfo($this->target_filepath,PATHINFO_EXTENSION);
        if(in_array($fileType, $this->allowed_types)){
            return true;
        }
        $this->status_msg = 'Desculpa, só arquivos PDF são aceitos. Verifique novamente!';
        return false;
    }

    public function useUploadedFile(){
        if($this->checkAllowedTypes() && $this->checkSubmitted()){
            $this->status_msg = <<<EOT
            O arquivo de nome ".$this->filename. " foi subido com sucesso!
            Você pode verificar o arquivo processado no seguinte diretório -> $this->target_filepath
            EOT;
        }
        $this->show_status_msg ? print($this->status_msg) : '';
        return $this->upload_file["tmp_name"];
    }

     /**
     * Get the value of target_dir
     */ 
    public function getTarget_dir()
    {
        return $this->target_dir;
    }

    /**
     * Set the value of target_dir
     *
     * @return  self
     */ 
    public function setTarget_dir($target_dir)
    {
        $this->target_dir = $target_dir;

        return $this;
    }

    /**
     * Get the value of filename
     */ 
    public function getFilename()
    {
        return $this->filename;
    }

    /**
     * Set the value of filename
     *
     * @return  self
     */ 
    public function setFilename($filename)
    {
        $this->filename = $filename;

        return $this;
    }

    /**
     * Get the value of target_filepath
     */ 
    public function getTarget_filepath()
    {
        return $this->target_filepath;
    }

    /**
     * Set the value of target_filepath
     *
     * @return  self
     */ 
    public function setTarget_filepath($target_filepath)
    {
        $this->target_filepath = $target_filepath;

        return $this;
    }

    /**
     * Get the value of filetype
     */ 
    public function getFiletype()
    {
        return $this->filetype;
    }

    /**
     * Set the value of filetype
     *
     * @return  self
     */ 
    public function setFiletype($filetype)
    {
        $this->filetype = $filetype;

        return $this;
    }

    /**
     * Get the value of upload_post_submit
     */ 
    public function getUpload_post_submit()
    {
        return $this->upload_post_submit;
    }

    /**
     * Set the value of upload_post_submit
     *
     * @return  self
     */ 
    public function setUpload_post_submit($upload_post_submit)
    {
        $this->upload_post_submit = $upload_post_submit;

        return $this;
    }

    /**
     * Get the value of upload_file
     */ 
    public function getUpload_file()
    {
        return $this->upload_file;
    }

    /**
     * Set the value of upload_file
     *
     * @return  self
     */ 
    public function setUpload_file($upload_file)
    {
        $this->upload_file = $upload_file;

        return $this;
    }

    /**
     * Get the value of status_msg
     */ 
    public function getStatus_msg()
    {
        return $this->status_msg;
    }

    /**
     * Set the value of status_msg
     *
     * @return  self
     */ 
    public function setStatus_msg($status_msg)
    {
        $this->status_msg = $status_msg;

        return $this;
    }

       /**
     * Get the value of allowed_types
     */ 
    public function getAllowed_types()
    {
        return $this->allowed_types;
    }

    /**
     * Set the value of allowed_types
     *
     * @return  self
     */ 
    public function setAllowed_types($allowed_types)
    {
        $this->allowed_types = $allowed_types;

        return $this;
    }
}

class UploadImage extends UploadPDF {

    public function checkAllowedTypes(){
        $fileType = pathinfo($this->target_filepath,PATHINFO_EXTENSION);
        if(in_array($fileType, $this->allowed_types)){
            return true;
        }
        $this->status_msg = 'Só são aceitos arquivos com extensão JPG, JPEG ou PNG';
        return false;
    }

}
?>
