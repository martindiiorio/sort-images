$( document ).ready(function() {
  dragAndDrop();
  counter();
});

//Edit & Delete Actions
function editThumbBtn(e) {
  e.preventDefault();
  // Edit description. Max chars 300!
  var newDesciptionValue = prompt("Please complete image description.\n(max chars 300)");
  var newDesciptionValueRestrict = newDesciptionValue.substring(0,300);
  window.event.target.parentElement.children[0].innerHTML = newDesciptionValueRestrict;
};
function deleteThumbBtn(e) {
  e.preventDefault();
  // Delet onlick item
  window.event.target.parentNode.parentNode.parentNode.remove();
  counter();
};

//Sort Items by Drag&Drop
function dragAndDrop() {
  var _dragContent = $("#sortable");

  _dragContent.sortable();
  _dragContent.disableSelection();
};

// Items Counter
function counter() {
  var itemsContainer = document.querySelector("#sortable").childElementCount;
  document.querySelector("#counter").innerHTML = "Number of items: " + itemsContainer;
}

// Image Size Client Validation
var _URL = window.URL || window.webkitURL;

$(".inputFile").change(function(e) {
  var file, img;

  if ((file = this.files[0])) {
    img = new Image();
    img.onload = function(e) {
      if (this.width != 320 && this.height != 320) {
        $('input:submit').prop('disabled', true);
        alert("Image upload fail!\nResolution allowed: 320px x 320px.\nTry Again :)")
      } else if (this.width == 320 && this.height == 320) {
        $('input:submit').prop('disabled', false);
      }
    };
    img.src = _URL.createObjectURL(file);
  }
});
