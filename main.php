<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'converter.php'; ?>
    <?php session_start(); ?>
    <?php $error_convert_to = (!empty($_SESSION['errors']['error_convert_to'])) ? $_SESSION['errors']['error_convert_to'] : ''; ?>
    <?php $error_file = (!empty($_SESSION['errors']['error_file'])) ? $_SESSION['errors']['error_file'] : ''; ?>
    <?php $error_all_empty = (!empty($_SESSION['errors']['error_all_empty'])) ? $_SESSION['errors']['error_all_empty'] : ''; ?>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <title>ConvertMe</title>
</head>
<body>
<?php $convert_options = ['json', 'csv', 'xml']; /* Additional options may be added in the future */ ?>
<div class="container h-100">
    <div class="row justify-content-center align-self-center">
        <h1>Convert.me</h1>
    </div>
    <form method="post" action="converter.php" enctype="multipart/form-data">
        <div class="custom-file">
            <input type="file" name="file_to_convert" class="custom-file-input" id="file" accept=".json,.csv,.xml" onchange="filetype()">
            <label class="custom-file-label" for="customFile">Drop or browse file</label>
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Convert to: </label>
            <select name="convert_options" id="convert_option" class="form-control" onchange="fileselected()">
                <option value=""></option>             
                <?php foreach($convert_options AS $convert_option): ?>
                    <?php $convert_selected = $_POST['convert_options']; ?>
                    <option value = <?php echo $convert_option; ?> <?php if ($convert_selected == $convert_options): ?> selected <?php endif; ?>> <?php echo $convert_option; ?></option>             
                <?php endforeach; ?>
            </select>
        </div>
        <?php if (!empty($error_all_empty)): ?>
            <div class="col-sm-3">
                <small class="text-danger">
                    <?php echo $error_all_empty; ?>
                </small>      
            </div>
        <?php endif; ?>            
        <div class="form-group">
            <input name="convert" type="submit" class="btn btn-primary" value="Convert file" >
        </div>
    </form>
</div>
<script type="text/javascript" src="js/functions.js"></script>
</body>
</html>


