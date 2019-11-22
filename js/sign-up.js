/*var check_pass = function() {
  if (document.getElementById('pass').value ==
    document.getElementById('re_pass').value) {
    document.getElementById('pass').style.border-color = 'green';
    document.getElementById('re_pass').style.border-color = 'green';
  } else {
    document.getElementById('pass').style.border-color = 'red';
    document.getElementById('re_pass').style.border-color = 'red';
  }
}*/

$('#pass, #re_pass').on('keyup', function () {
  if ( $('#pass').val() != $('#re_pass').val() ){
    $('#message').html('Not Matching').css('color', 'red');
    $('#pass').attr('class', 'invalid');
  } else 

    $('#message').html('Matching').css('color', 'green');
    $('#pass').attr('class', 'valid');
});