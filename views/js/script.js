// console.log('js ok');

var keyword = document.getElementById('keyword');
var searchButton = document.getElementById('searchButton');
var container = document.getElementById('container');

keyword.addEventListener('keyup', function () {
  //   console.log('event ok');
  //   create ajax object
  var xhr = new XMLHttpRequest();

  //   check ajax
  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4 || xhr.status === 400) {
      //   console.log(xhr.responseText);
      container.innerHTML = xhr.responseText;
    }
  };

  xhr.onerror = function () {
    console.error('Error making the AJAX request.');
  };

  //   execution ajax
  xhr.open('GET', 'ajax/mahasiswa.php?keyword=' + keyword.value, true);
  xhr.send();
});
