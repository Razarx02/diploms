$( window ).on("load", function() {

  $('.mob-start').on('click', function () {
      console.log("click");
          if($('.mob-start').hasClass('mob-start--active')){
              $('.mob-start').removeClass('mob-start--active');
              $('.sidebar').removeClass('sidebar--active');
          }else{
              $('.mob-start').addClass('mob-start--active');
              $('.sidebar').addClass('sidebar--active');
          }                           
    });

  $('#marks_admin').on('change', function() {
      mark_id = this.value;
      $('#table').html("<tr><td>Загрузка данных</td></tr>");
      $.ajax({
          type: 'POST',
          url: '/extracts/get_model2/' + mark_id,
          data: 'id=' + mark_id,
          success: function(data){
            console.log(data);
           
            
            $('#table').html(data);
            $('.pagi').hide();

          }
      })

    });
  
});

// Admin Tabs

$('.admin_tab').on("click", function(){
  var index = $(this).index();

  if( !$(this).hasClass('active') ){
    $('.admin_tab.active').removeClass('active');
    $(this).addClass('active');
    $('.admin_tab_content.active').removeClass('active');
    $('.admin_tab_content').eq(index).addClass('active');
  }
});

// Admin Tabs END


$('input[type="tel"]').click(function(){
    $(this).setCursorPosition(3);
}).mask("+7 (999) 999 99 99");
  
$.fn.setCursorPosition = function(pos) {
if ($(this).get(0).setSelectionRange) {
$(this).get(0).setSelectionRange(pos, pos);
} else if ($(this).get(0).createTextRange) {
var range = $(this).get(0).createTextRange();
range.collapse(true);
range.moveEnd('character', pos);
range.moveStart('character', pos);
range.select();
}
};
 
  