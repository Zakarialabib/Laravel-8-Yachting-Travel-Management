<script src="{{asset('frontend/assets/js/jquery.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.8.1/js/bootstrap-select.js"></script>
<script src="{{asset('frontend/assets/plugins/wow.min.js')}}"></script>
<script src="{{asset('frontend/assets/plugins/supersized.3.1.3.min.js')}}" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/npm/ion-rangeslider@2.3.1/js/ion.rangeSlider.min.js" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-zoom@1.7.21/jquery.zoom.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/photoswipe@4.1.3/dist/photoswipe.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/photoswipe@4.1.3/dist/photoswipe-ui-default.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chosen-jquery@0.1.1/lib/chosen.jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="{{asset('backend/app-assets/vendors/js/extensions/sweetalert.min.js')}}" type="text/javascript" ></script>
<script src="{{asset('frontend/assets/js/all.js')}}" type="text/javascript" ></script>

<script>
  window.watsonAssistantChatOptions = {
      integrationID: "a7f1d074-995a-4687-9781-ed9cc54b966a", 
      region: "us-south", 
      serviceInstanceID: "d6e1e8ba-1e36-4ae7-b73f-4e9c34c4f666", 
      onLoad: function(instance) { instance.render(); }
    };
  setTimeout(function(){
    const t=document.createElement('script');
    t.src="https://web-chat.global.assistant.watson.appdomain.cloud/loadWatsonAssistantChat.js";
    document.head.appendChild(t);
  });
  </script>
@stack('scripts')
