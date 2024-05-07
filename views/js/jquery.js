$(document).ready(function () {
  // hide searchButton
  $('#searchButton').hide();

  // event keyword
  $('#keyword').on('keyup', function () {
    // display loading
    $('.loader').show();

    // ajax load
    // $('#container').load('ajax/mahasiswa.php?keyword=' + $('#keyword').val());

    // $.get()
    $.get('ajax/mahasiswa.php?keyword=' + $('#keyword').val(), function (data) {
      $('#container').html(data);
      $('.loader').hide();
    });
  });
});
