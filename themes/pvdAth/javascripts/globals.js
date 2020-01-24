
$(()=> {

$(`#lightbox`).click(function(e) {
  e.preventDefault();
  // alert(localAccession);
  // $('#imagepreview').attr('src', $('#imageresource').attr('src'));
  $('#imageModal').dialog();
});
$(`#mobileLightbox`).click(function(e) {
  e.preventDefault();
  // alert(localAccession);
  // $('#imagepreview').attr('src', $('#imageresource').attr('src'));
  $('#imageModal').dialog();
});
$(`#closeModal`).click(function() {
  // e.preventDefault();
  $('#imageModal').dialog('close');
});



});
