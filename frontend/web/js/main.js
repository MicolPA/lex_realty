console.log('hola');

$(".ubicacion").prepend("<option value=''>Todas</option>");
$(".ubicacion").prepend("<option value='' selected>Ubicación</option>");

$(".calificacion").prepend("<option value=''>Todas</option>");
$(".calificacion").prepend("<option value='' selected>Calificación</option>");

$(".tipo").prepend("<option value=''>Todos</option>");
$(".tipo").prepend("<option value='' selected>Tipo</option>");


jQuery('input[type=file]').change(function(){
	console.log('aqui');
 	var filename = jQuery(this).val().split('\\').pop();
 	var idname = jQuery(this).attr('id');
 	console.log(jQuery(this));
 	console.log(filename);
 	console.log(idname);
 	jQuery('div.field-'+idname+' label').html("<span class='text-success font-12'>CARGADA</span>");
 	// jQuery('div.field-'+idname+' label').attr("style", 'padding-left:1rem !important;padding-right: 1rem !important');
});

function buscar(id){
	$("#"+id).submit();
}
// $("#myCarousel img").on('click', function(){
//   console.log($(this).attr('src'));
//   imgBigger($(this).attr('src'));
// })

function imgBigger(url){

      swal({
          title: "",
          text: '',
          button: false,
          icon: url,
        });

  }

$("#metros").bind('keyup', function(){
	$("#pies").val($("#metros").val() * 3.28084);
})


$('#myCarousel').carousel({
  interval: 5500
});
$('#carousel-thumbs').carousel({
  interval: false
});

// handles the carousel thumbnails
// https://stackoverflow.com/questions/25752187/bootstrap-carousel-with-thumbnails-multiple-carousel
$('[id^=carousel-selector-]').click(function() {
  var id_selector = $(this).attr('id');
  var id = parseInt( id_selector.substr(id_selector.lastIndexOf('-') + 1) );
  $('#myCarousel').carousel(id);
});
// Only display 3 items in nav on mobile.
if ($(window).width() < 575) {
  $('#carousel-thumbs .row div:nth-child(4)').each(function() {
    var rowBoundary = $(this);
    $('<div class="row mx-0">').insertAfter(rowBoundary.parent()).append(rowBoundary.nextAll().addBack());
  });
  $('#carousel-thumbs .carousel-item .row:nth-child(even)').each(function() {
    var boundary = $(this);
    $('<div class="carousel-item">').insertAfter(boundary.parent()).append(boundary.nextAll().addBack());
  });
}
// Hide slide arrows if too few items.
if ($('#carousel-thumbs .carousel-item').length < 2) {
  $('#carousel-thumbs [class^=carousel-control-]').remove();
  $('.machine-carousel-container #carousel-thumbs').css('padding','0 5px');
}
// when the carousel slides, auto update
$('#myCarousel').on('slide.bs.carousel', function(e) {
  var id = parseInt( $(e.relatedTarget).attr('data-slide-number') );
  $('[id^=carousel-selector-]').removeClass('selected');
  $('[id=carousel-selector-'+id+']').addClass('selected');
});
// when user swipes, go next or previous
// $('#myCarousel').swipe({
//   fallbackToMouseEvents: true,
//   swipeLeft: function(e) {
//     $('#myCarousel').carousel('next');
//   },
//   swipeRight: function(e) {
//     $('#myCarousel').carousel('prev');
//   },
//   allowPageScroll: 'vertical',
//   preventDefaultEvents: false,
//   threshold: 75
// });

// $(document).on('click', '[data-toggle="lightbox"]', function(event) {
//   event.preventDefault();
//   $(this).ekkoLightbox();
// });


// $('#myCarousel .carousel-item img').on('click', function(e) {
//   var src = $(e.target).attr('data-remote');
//   if (src) $(this).ekkoLightbox();
// });


document.getElementById('fecha').type= 'text';
document.getElementById('fecha').addEventListener('blur',function(){
  document.getElementById('fecha').type= 'text';
});
document.getElementById('fecha').addEventListener('focus',function(){
  document.getElementById('fecha').type= 'date';
});

function showSearch(type){

  if (type == 2) {
    $(".div_propiedades").hide();
    $(".div_pre_construccion").show();
  }else{
    $(".div_propiedades").show();
    $(".div_pre_construccion").hide();
  }
}

function formVerify(id){
  if ($("#formularios-nombre").val() != '' && $("#formularios-identificacion").val() != '' && $("#formularios-direccion").val() != '' && $("#formularios-ocupacion").val() != '' && $("#formularios-correo").val() != '') {
    $("#inputfile").prop('required', 'required');
    $("#inputfile2").prop('required', 'required');
    $(".div-titles-2").attr('class', 'form-group mb-0 div-titles-2');
    $(".div-form").css({'height': '1px', 'visibility': 'hidden'});
    $(".div-files").show();
    $(".btn-continue").hide();
    $(".div-big-auto").css('height', '630px');
    $(".d-count").css('height', '1075px');
    $(".content-titulos").attr('style', 'margin-top:-8rem');
  }else{
    swal('Alerta', 'Favor llenar todos los campos', 'warning');
  }
}

function formSubmit(id) {

  if ($("#"+id)[0].checkValidity()){
    swal({
      title: "",
      text: name,
      icon: '/frontend/web/images/loading-buffering.gif',
      closeOnClickOutside: false,
      buttons: [""],
      className: 'swal-loading'
    });

    $('#'+id).submit();
  }else{
      swal('Alerta', 'Favor llenar todos los campos', 'warning');
      $("#"+id)[0].reportValidity();
  }
}

window.addEventListener('load',function(){

  document.getElementById('fecha').type= 'text';

  document.getElementById('fecha').addEventListener('blur',function(){
    document.getElementById('fecha').type= 'text';
  });

  document.getElementById('fecha').addEventListener('focus',function(){
    document.getElementById('fecha').type= 'date';
  });

});