
$(document).ready(function () {

  uploadImage()

  function uploadImage() {
    var button = $('.images .pic')
    var uploader = $('<input type="file" accept="image/*" />')
    var images = $('.images')
    
    button.on('click', function () {
      uploader.click()
    })
    
    uploader.on('change', function (e) {
        var reader = new FileReader()
        reader.onloadend = function(event) {
          images.prepend('<div class="img" style="background-image: url(\'' + event.target.result + '\');" rel="'+ event.target.result  +'"><span>remove</span><input type="hidden" name="images[]" value="'+ event.target.result  +'"></div>')
        }
        reader.readAsDataURL(uploader[0].files[0])

      })
    
    images.on('click', '.img', function (event) {
      if ($(this).hasClass('saved')) {
        images.append('<input type="hidden" name="delete_images[]" value="'+ $(this).data('whatever') +'">')
        $(this).remove()
      } else { 
        $(this).remove()
      }
    })
  
  }
})