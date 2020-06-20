var app = {

  init: function() {

    console.log('init');

    app.addEvents();
  },
  addEvents: function() {

    $('.ui-button').on('click', app.handleToggleMenu);
  },
  handleToggleMenu: function() {

    event.preventDefault();

    console.log('J\'ai clicqué sur le menu')

    $('body').toggleClass('menu-visible');
  }
};

$(app.init);
