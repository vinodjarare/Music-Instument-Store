<?php

Class Database {
    private $server = "mysql:host=localhost;dbname=db1";
    private $username = "root";
    private $password = "";
    private $options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,);
    protected $conn;

    public function open() {
        try {
            $this->conn = new PDO($this->server, $this->username, $this->password, $this->options);
            return $this->conn;
        }
        catch (PDOException $e) {
            echo "There is some problem in connection: " .$e->getMessage();
        }
    }

    public function close() {
        $this->conn = null;
    }
}

$pdo = new Database();

?>
<?php 
  if(isset($_POST['submit'])) {
    $conn = $pdo->open();
    $string = $_POST['text'];
    try{
      $stmt = $conn->prepare("INSERT INTO staff (test) VALUES (:string)");
      $stmt->execute(['string'=>$string]);
      echo 'success';
      exit();
    }
    catch(PDOException $e) {
      echo $e->getMessage();
      exit();
    }
  }
?>
<?php 
  if(isset($_POST['submit2'])) {
    $conn = $pdo->open();
    $id = $_POST['id'];
    try{
      $stmt = $conn->prepare("SELECT * FROM staff WHERE id=:id");
      $stmt->execute(['id'=>$id]);
      $row = $stmt->fetch();

      echo $row['test'];
      exit();
    }
    catch(PDOException $e) {
      echo $e->getMessage();
      exit();
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="styledheet" href="libraries/froala/css/plugins/codemirror.min.css">
  <link rel="stylesheet" href="libraries/froala/css/third_party/font_awesome.min.css">
  <link rel="stylesheet" href="libraries/froala/css/froala_editor.pkgd.min.css">
  <link rel="styleheet" href="libraries/froala/css/froala_style.min.css">

  <script src="libraries/froala/js/plugins/codemirror.min.js"></script>
  <script src="libraries/froala/js/froala_editor.pkgd.min.js"></script>
  <script src="libraries/froala/js/plugins/xml.min.js"></script>
  <script src="libraries/froala/js/plugins/track_changes.min.js"></script>

  <title>Document</title>
</head>
<body>
  <form action="demo.php" method="post">
    <textarea name="text" id="froala-editor"></textarea>
    <input type="submit" value="Submit" name="submit">
  </form>
  <form action="demo.php" method="post">
    <label for="id">Enter ID</label>
    <input type="text" name="id">
    <input type="submit" value="View" name="submit2">
  </form>
</body>
<script>
  new FroalaEditor('#froala-editor',  {
	toolbarButtons: ['fullscreen', 'bold', 'italic', 'underline', 'strikeThrough', 'subscript', 'superscript', '|', 'fontFamily', 'fontSize', 'color', 'inlineStyle', 'paragraphStyle', '|', 'paragraphFormat', 'align', 'formatOL', 'formatUL', 'outdent', 'indent', 'quote', '-', 'insertLink', 'insertImage', 'insertVideo', 'insertFile', 'insertTable', '|', 'emoticons', 'specialCharacters', 'insertHR', 'selectAll', 'clearFormatting', '|', 'print', 'help', 'html', '|', 'undo', 'redo','trackChanges','markdown']
});
</script>
</html>