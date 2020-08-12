$(".custom-file-input").on("change", function() {
    var file = $(this).val().split("\\").pop();
    $(this).siblings(".custom-file-label").addClass("selected").html(file);
});

function filetype() {
    var file = document.getElementById("file").value;
    var dot = file.lastIndexOf(".") + 1;
    var file_extension = file.substr(dot, file.length).toLowerCase();
    if (file_extension != "csv" && file_extension != "xml" && file_extension !="xlsx" && file_extension != "json" && file_extension != "xls" && file_extension != "txt") {
        alert("Only csv,xml,xlsx,xls,json and txt formats are allowed!");
        $("#file").val('');
    }
}

function fileselected() {
    var file = document.getElementById("file").value;
    var dot = file.lastIndexOf(".") + 1;
    var file_extension = file.substr(dot, file.length).toLowerCase();

    var file_convert_extension = document.getElementById("convert_option").value;
    if (file_convert_extension == file_extension || file_convert_extension == '') {
        if (file_convert_extension == '') {
            alert("Pick a format to convert to.");
        } else {
            alert("Can't convert the file to the same format!");
            $("#convert_option").val('');
        }
    }
}