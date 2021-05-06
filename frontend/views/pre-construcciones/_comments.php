<style>
    .gc-header-brand-wrapper{
      display: none !important;
    }
</style>
<div id="graphcomment"></div>
<script type="text/javascript">

  /* - - - CONFIGURATION VARIABLES - - - */

  // make sure the id is yours
  window.gc_params = {
    graphcomment_id: 'drtitlesearch-com',

    // if your website has a fixed header, indicate it's height in pixels
    fixed_header_height: 0,
  };

  /* - - - DON'T EDIT BELOW THIS LINE - - - */

  
  (function() {
    var gc = document.createElement('script'); gc.type = 'text/javascript'; gc.async = true;
    gc.src = 'https://graphcomment.com/js/integration.js?' + Date.now();
    (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(gc);

    setTimeout(function(){
        console.log('holaa');
        $(".gc-header-brand-wrapper").hide();
        $(".gc-header-brand-wrapper").attr('style', 'width:0px !important');
        $("ul.gc-header-left").hide();
        $(".gc-header-left").attr('style', 'display:none !important');
    },10000)
  })();

</script>