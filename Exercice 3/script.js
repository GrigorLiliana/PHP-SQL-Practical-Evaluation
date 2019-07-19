$(function() {
  $('form').on('submit', function(e) {
    e.preventDefault();

    $.ajax({
      url: 'ajax_evaluation.php',
      type: 'post',
      data: $('form').serialize(),
      dataType: 'html',
      success: function(result) {
        $('#my-div').text(result);
      },
      error: function(err) {
        // IF an Ajax error happens
        alert(err);
      }
    });
  });
}); //end jquery
