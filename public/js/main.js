$(document).ready(function () {
    window._token = $('meta[name="csrf-token"]').attr('content')
  
    moment.updateLocale('en', {
      week: {dow: 1} // Monday is the first day of the week
    })
  
    $('.treeview').each(function () {
      var shouldExpand = false
      $(this).find('li').each(function () {
        if ($(this).hasClass('active')) {
          shouldExpand = true
        }
      })
      if (shouldExpand) {
        $(this).addClass('active')
      }
    })
  })
  