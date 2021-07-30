$("#profileImage").click(function(e) {
    $("#imageUpload").click();
});
function fasterPreview(uploader) {
    if (uploader.files && uploader.files[0]) {
        $('#profileImage').attr('src',
            window.URL.createObjectURL(uploader.files[0]));
    }
}
$("#imageUpload").change(function() {
    fasterPreview(this);
});
// $(document).ready(function() {
//     var multipleCancelButton = new Choices('#choices-multiple-remove-button', {
//         removeItemButton: true,
//         maxItemCount: 5,
//         searchResultLimit: 5,
//         renderChoiceLimit: 5
//     });
// });