<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

require_once __DIR__ . "/../controller/UsuarioDAO.php";
require_once __DIR__ . "/BancoDeDados.php";

if($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['submit'])) {
    if(isset($_FILES['fotoPerfil']) && $_FILES['fotoPerfil']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['fotoPerfil']['tmp_name'];
        $fileName = $_FILES['fotoPerfil']['name'];
        $fileSize = $_FILES['fotoPerfil']['size'];
        $fileType = $_FILES['fotoPerfil']['type'];
        $uploadDir = __DIR__ . "/../view/assets/perfil-usuario/foto/";

        $mimeTypes = ['image/jpeg', 'image/png', 'image/gif'];
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $mimeType = finfo_file($finfo, $fileTmpPath);
        finfo_close($finfo);

        if(!in_array($mimeType, $mimeTypes)) {
            die("Error: Tipo de arquivo não permitido!");
        }

        $maxFileSize = 5 * 1024 * 1024;
        if($fileSize > $maxFileSize) {
            die("Error: O arquivo é maior que o limite de 5MB.");
        }

        $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);
        $newFileName = uniqid('img_', true) . '.' . $fileExtension;

        $destPath = $uploadDir . $newFileName;

        if (!file_exists($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }

        if(move_uploaded_file($fileTmpPath, $destPath)) {
            echo "Sucesso! O arquivo foi enviado para: " . htmlspecialchars($dest_path);

            $banco = new BancoDeDados();
            $dao = new UsuarioDAO($banco);

            $dados = [
                "foto" => $newFileName
            ];

            if($dao->inserirDados("usuario", $dados, $_SESSION['usuarioId'])) {
                header("Location: " . $_SERVER['PHP_SELF']);
                exit();
            }
        } else {
            echo "Erro: Não foi possível mover o arquivo para o destino.";
        } 
    } else {
            switch ($_FILES['fotoPerfil']['error']) {
                case UPLOAD_ERR_INI_SIZE:
                    $message = "O arquivo excede a diretiva upload_max_filesize no php.ini.";
                    break;
                case UPLOAD_ERR_FORM_SIZE:
                    $message = "O arquivo excede a diretiva MAX_FILE_SIZE especificada no formulário HTML.";
                    break;
                case UPLOAD_ERR_PARTIAL:
                    $message = "O upload do arquivo foi feito apenas parcialmente.";
                    break;
                case UPLOAD_ERR_NO_FILE:
                    $message = "Nenhum arquivo foi enviado.";
                    break;
                case UPLOAD_ERR_NO_TMP_DIR:
                    $message = "Faltando uma pasta temporária.";
                    break;
                case UPLOAD_ERR_CANT_WRITE:
                    $message = "Falha ao escrever o arquivo em disco.";
                    break;
                case UPLOAD_ERR_EXTENSION:
                    $message = "Uma extensão do PHP interrompeu o upload do arquivo.";
                    break;
                default:
                    $message = "Erro de upload desconhecido.";
                    break;
            }
            die($message);
        }
}
?>