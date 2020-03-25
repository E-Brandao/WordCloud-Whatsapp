/*------------------
	Onload
--------------------*/

	$(window).on('load', function() {
		/*------------------
			Preloder
		--------------------*/
		$(".loader").fadeOut();
		$("#preloder").delay(400).fadeOut("slow");

	});

	(function($) {

		/*------------------
			Circle progress
		--------------------*/
		$('.circle-progress').each(function() {
			var cpvalue = $(this).data("cpvalue");
			var cpcolor = $(this).data("cpcolor");
			var cptitle = $(this).data("cptitle");
			var cpid 	= $(this).data("cpid");

			$(this).append('<div class="'+ cpid +'"></div><div class="progress-info"><h2>'+ cpvalue +'%</h2><p>'+ cptitle +'</p></div>');

			if (cpvalue < 100) {

				$('.' + cpid).circleProgress({
					value: '0.' + cpvalue,
					size: 166,
					thickness: 5,
					fill: cpcolor,
					emptyFill: "rgba(0, 0, 0, 0)"
				});
			} else {
				$('.' + cpid).circleProgress({
					value: 1,
					size: 166,
					thickness: 5,
					fill: cpcolor,
					emptyFill: "rgba(0, 0, 0, 0)"
				});
			}

		});

	})(jQuery);

/*----------------------------
	Saving txt temporarily
------------------------------*/

    function save_txt()
    {
      
      var file_data = $('#file').prop("files")[0];
      var form_data = new FormData();
      form_data.append('file', file_data);

      $.ajax({
      	url: 'php/insert_txt.php', 
      	dataType: 'text',
      	cache: false,
      	contentType: false,
      	processData: false,
      	data: form_data,
      	type: 'post',
      	success:function(response){
      		if (response) {
      			alert(response);
      		}
      	}
      });
  }


/*----------------------------
	Onclick send button
------------------------------*/

$("#send").click(function(){
  $("#tutorial").hide();
  $("#bottom-section").hide();
  save_txt();
  $("#result").show();
  $("#bottom-result").show();
});


/*----------------------------
	Onclick retry button
------------------------------*/

$("#retry").click(function(){
  $("#result").hide();
  $("#bottom-result").hide();
  document.getElementById("form-select").reset(); 
  $("#tutorial").show();
  $("#bottom-section").show();
});