
   $(function(){
    $('[id*=region]').on('click', function(){
      let region = $(this);
      let regionId = $(this)[0].id;
      let allRegion = $('[id*=region-]');
      allRegion.css('fill', '#1e357d');
      region.css('fill', '#FF6400')
      regionId = regionId.replace('region-','');
      let boucle = true;
      while(boucle){
        regionId = regionId.replace('-',' ');
        if(regionId.indexOf('-') == -1)
          boucle = false;
      }
    $('#infosRegion').text(regionId)

    $.ajax({
        method: "POST",
        url: "{{ path('personne_peer_province') }}",
        data: {region: regionId},
        success: function(datas){

           datas.forEach(data => {
               $('#detailsPers').text(data.nombreTotalPersonne)
           });
        }
    });

   })

   let form = $("#wizard");

   form.validate({
     errorPlacement: function errorPlacement(error, element) { element.before(error); },
     rules: {
         confirm: {
             equalTo: "#password"
         }
     }
    });

   form.children("div").steps({
       headerTag: "h2",
       bodyTag: "section",
       transitionEffect: "slideLeft",
       onStepChanging: function (event, currentIndex, newIndex)
       {
           form.validate().settings.ignore = ":disabled,:hidden";
           return form.valid();
       },
       onFinishing: function (event, currentIndex)
       {
           form.validate().settings.ignore = ":disabled";
           return form.valid();
       },
       onFinished: function (event, currentIndex)
       {
        form.submit();
       }
   });

  });