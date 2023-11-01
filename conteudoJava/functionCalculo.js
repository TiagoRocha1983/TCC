$(function(){
  
    var placeholders = {
      '350': 'Vai usar 6 placas solares',
      '650': 'Vai usar 8 placas solares',
      '1000': 'Vai usar 10 placas solares'
    };
  
    $('#tipo').on('change', function(){      
      var placeholder = placeholders[$(this).val()] || 'Search term...';
      $('input').attr('placeholder', placeholder);
    });
  });