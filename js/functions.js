$(".custom-file-input").on("change", function() {
    var file = $(this).val().split("\\").pop();
    $(this).siblings(".custom-file-label").addClass("selected").html(file);
});

function filetype(){
    var file = document.getElementById("file").value;
    var dot = file.lastIndexOf(".") + 1;
    var file_extension = file.substr(dot, file.length).toLowerCase();
    if (file_extension != "csv" && file_extension != "xml" && file_extension !="xlsx" && file_extension != "json" && file_extension != "xls" && file_extension != "txt") {
        alert("Only csv,xml,xlsx,xls,json and txt formats are allowed!");
        $("#file").val('');
    }
}