
const axios = require('axios');
const accessToken = '36f6015954d934153806239ed9aba0e6b7de1e51';
const apiUrl = 'https://digital.provath.org/api/tags'
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


const getTags = async () =>{
  return await axios({
    const result = await axios.get(`{apiUrl}`);
  })
}
