<?php
	class FileUploader {
		private $file 		= null;
		private $filename 	= "";
		private $uploadDir 	= DIR_UPLOADS;
		public $srvFile		= "";
		public $errors 		= array();
        public $messages 	= array();

        public function __construct(){}

        public function getFile(){
        	return $this->file;
        }

        public function getFileName(){
			return $this->filename;
		}

		public function getUploadDir(){
			return $this->uploadDir;
		}

		public function getServerFile(){
			return $this->srvFile;
		}

		public function getMessages(){
			return $this->messages;
		}

		public function getErrors(){
			return $this->errors;
		}

		public function setFileName($string){
			$this->filename = $string;
		}

		public function setFileStream($stream){
			$this->file = $stream;
		}

        public function checkError($error_code){
            $msg = "";
            if(strcmp($error_code,"1") == 0)
                $msg = "El archivo subido excede la directiva upload_max_filesize en php.ini.";
            else if(strcmp($error_code,"2") == 0)
                $msg = "El archivo subido excede la directiva MAX_FILE_SIZE que fue especificada en el formulario HTML";
            else if(strcmp($error_code,"3") == 0)
                $msg = "El archivo subido fue sólo parcialmente cargado. ";
            else if(strcmp($error_code,"4") == 0)
                $msg = "Ningún archivo fue subido. ";
            else if(strcmp($error_code,"6") == 0)
                $msg = "Falta la carpeta temporal. Introducido en PHP 4.3.10 y PHP 5.0.3. ";
            else if(strcmp($error_code,"7") == 0)
                $msg = "No se pudo escribir el archivo en el disco. Introducido en PHP 5.1.0. ";
            return $msg;
        }

		public function uploadFileWithoutReplace($stream, $uploadDir){
			if (!empty($stream)) {
                $myFile = $stream;
                $fileTypes = unserialize(UPLOAD_FILE_TYPES);

                if ($myFile["error"] > 0) {
                    $this->errors[] = "Error: ".$this->checkError($myFile["error"]);
                    return "";
                }
                elseif ( in_array($myFile["type"], $fileTypes) ) {
                    
                    if($myFile["size"] < 3*MB){
                        // ensure a safe filename
                        $name = preg_replace("/[^A-Z0-9._-]/i", "_", $myFile["name"]);

                        // don't overwrite an existing file
                        $i = 0;
                        $parts = pathinfo($name);
                        while (file_exists($uploadDir . $name)) {
                            $i++;
                            $name = $parts["filename"] . "-" . $i . "." . $parts["extension"];
                        }

                        // preserve file from temporary directory
                        $success = move_uploaded_file($myFile["tmp_name"], $uploadDir . $name);
                        if (!$success) {
                           	$this->errors[] = "No se ha podido guardar el archivo ".$uploadDir . $name;
                            return false;
                        }

                        $this->srvFile = $uploadDir.$name;
                        $this->messages[] ="El archivo se ha guardado en ".$uploadDir . $name;

                        // set proper permissions on the new file
                        chmod($uploadDir . $name, 0644);
                        return true;
                    }
                    else {
                        $this->errors[] = "El tamaño no puede ser superior a 3MB";
                        return false;
                    }
                }
                else {
                    $this->errors[] = "Error el formato del archivo no es valido : ".$myFile["type"];
                    return false;
                }
            }
            else {
                $this->errors[] = "No se ha seleccionado ningun archivo";
                return false;
            }
		}

        public function uploadFileWithReplace($stream, $uploadDir){
            if (!empty($stream)) {
                $myFile = $stream;
                $fileTypes = unserialize(UPLOAD_FILE_TYPES);

                if ($myFile["error"] > 0) {
                    $this->errors[] = "Error ".$myFile["error"];
                    return "";
                }
                elseif ( in_array($myFile["type"], $fileTypes) ) {
                    
                    if($myFile["size"] < 3*MB){
                        // ensure a safe filename
                        $name = preg_replace("/[^A-Z0-9._-]/i", "_", $myFile["name"]);

                        // overwrite an existing file
                        if(file_exists($uploadDir . $name)){
                            $delete = unlink($uploadDir . $name);
                            if( !$delete ){
                                $this->errors[] = "No se ha podido sustituir el archivo, error de borrado";
                                return false;
                            }
                            else {
                                // preserve file from temporary directory
                                $success = move_uploaded_file($myFile["tmp_name"], $uploadDir . $name);
                                if (!$success) {
                                    $this->errors[] = "No se ha podido guardar el archivo ".$uploadDir . $name;
                                    return false;
                                }

                                $this->srvFile = $uploadDir.$name;
                                $this->messages[] ="El archivo se ha sobreescrito en ".$uploadDir . $name;

                                // set proper permissions on the new file
                                chmod($uploadDir . $name, 0644);
                                return true;
                            }
                        }
                        else {
                            // preserve file from temporary directory
                            $success = move_uploaded_file($myFile["tmp_name"], $uploadDir . $name);
                            if (!$success) {
                                $this->errors[] = "No se ha podido guardar el archivo ".$uploadDir . $name;
                                return false;
                            }

                            $this->srvFile = $uploadDir.$name;
                            $this->messages[] ="El archivo se ha guardado en ".$uploadDir . $name;

                            // set proper permissions on the new file
                            chmod($uploadDir . $name, 0644);
                            return true;
                        }   
                    }
                    else {
                        $this->errors[] = "El tamaño no puede ser superior a 3MB";
                        return false;
                    }
                }
                else {
                    $this->errors[] = "Error el formato del archivo no es valido : ".$myFile["type"];
                    return false;
                }
            }
            else {
                $this->errors[] = "No se ha seleccionado ningun archivo";
                return false;
            }
        }
	}
?>