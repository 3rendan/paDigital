
const axios = require('axios');
const app = require('express');
const accessToken = '36f6015954d934153806239ed9aba0e6b7de1e51';

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
function hello(){
  console.log("hello");
}
function getTags() {
    axios('http://digital.provath.org/api/tags')
    .then(res => console.log(res.data))
    .catch(error => console.error(error))
  }
