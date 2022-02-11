$("#dataTable").on("click", ".button-show-food", function () {
    let name = $(this).data("name");
    let price = $(this).data("price");
    let category = $(this).data("category");
    let rating = $(this).data("rating");

    $("#show-food-modal").modal("show");
    $(".button-save").hide();
    $(".name").val(name);
    $(".name").prop("readonly", true);
    $(".price").val(price);
    $(".price").prop("readonly", true);
    $(".category").val(category);
    $(".category").prop("readonly", true);
    $(".rating").val(rating);
    $(".rating").prop("readonly", true);

    document.getElementById("exampleModalLabel").innerHTML = "Show Food Data";
});

$("#dataTable").on("click", ".button-update-food", function () {
    let name = $(this).data("name");
    let price = $(this).data("price");
    let category = $(this).data("category");
    let rating = $(this).data("rating");
    let id = $(this).data("id");
    console.log(name, ">>>>>");
    $("#show-food-modal").modal("show");
    $(".button-save").show();
    $(".name").val(name);
    $(".name").prop("readonly", false);
    $(".price").val(price);
    $(".price").prop("readonly", false);
    $(".category").val(category);
    $(".category").prop("readonly", false);
    $(".rating").val(rating);
    $(".rating").prop("readonly", false);
    $("#formActionUpdate").attr("action", `/api/foods/${id}`);
    document.getElementById("exampleModalLabel").innerHTML = "Update Food Data";
});

$("#dataTable").on("click", ".button-delete-food", function () {
    $("#formActionDelete").submit();
});

function clearForm() {
    document.getElementById("inputAddName").value = "";
    document.getElementById("inputAddPrice").value = "";
    document.getElementById("inputAddCategory").value = "";
    document.getElementById("inputAddRating").value = "";
    $(".button-save").show();
}
