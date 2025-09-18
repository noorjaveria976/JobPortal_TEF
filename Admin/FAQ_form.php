<?php
session_start();
include "config/db.php";

// Default values
$faq = [
    'id'=>'',
    'question'=>'',
    'answer'=>''
];

// Edit mode
if(isset($_GET['id'])){
    $id = intval($_GET['id']);
    $res = $conn->query("SELECT * FROM faqs WHERE id=$id");
    if($res->num_rows>0){
        $faq = $res->fetch_assoc();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
<title><?= $faq['id'] ? 'Edit FAQ' : 'Add FAQ' ?></title>

<link rel="stylesheet" href="assets/css/app.min.css">
<link rel="stylesheet" href="assets/bundles/summernote/summernote-bs4.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php include('includes/source.html'); ?>
</head>
<body>
<div id="app">
<div class="main-wrapper main-wrapper-1">
<?php include('includes/navbar.php'); ?>
<?php include('includes/sidebar.html'); ?>

<div class="main-content">
<section class="section">
<div class="row">
<div class="col-12">
      <div class="card shadow-sm card-primary">
            <div class="card-header h5">
<?= $faq['id'] ? 'Edit FAQ' : 'Add FAQ' ?>
</div>
<div class="card-body">
<form method="POST" action="faq_save.php">
<input type="hidden" name="id" value="<?= $faq['id'] ?>">
<div class="row">
    <!-- Question -->
    <div class="col-md-6 mb-3">
        <label>Question</label>
        <textarea name="question" class="summernote-simple"><?= htmlspecialchars($faq['question']) ?></textarea>
    </div>
    <!-- Answer -->
    <div class="col-md-6 mb-3">
        <label>Answer</label>
        <textarea name="answer" class="summernote-simple"><?= htmlspecialchars($faq['answer']) ?></textarea>
    </div>
</div>
<button type="submit" class="btn btn-success"><?= $faq['id'] ? 'Update' : 'Add' ?> FAQ</button>
<a href="FAQ_table.php" class="btn btn-secondary">Cancel</a>
</form>
</div>
</div>
</div>
</div>
</section>
</div>
<?php include('includes/footer.php'); ?>
</div>
</div>

<!-- Summernote JS -->
<script src="assets/bundles/summernote/summernote-bs4.js"></script>
<script>
$(document).ready(function() {
    $('.summernote-simple').summernote({
        height: 200,
        toolbar: [
            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['font', ['strikethrough', 'superscript', 'subscript']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['insert', ['link', 'picture']],
            ['view', ['codeview']]
        ]
    });
});
</script>

<script src="assets/js/scripts.js"></script>
<script src="assets/js/custom.js"></script>
</body>
</html>
