function scrollToSection(section) {
  e.preventDefault()

  $('html, body').animate(
    {
      scrollTop: $($(this).attr('href')).offset().top,
    },
    500,
    'linear'
  )
}
