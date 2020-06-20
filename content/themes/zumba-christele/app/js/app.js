require('jquery.scrollex');

var app = {

  init: function() {

    console.log('init');

    app.addEvents();
    app.enableScrollex();
  },
  addEvents: function() {

    $('.ui-button').on('click', app.handleToggleMenu);
  },
  handleToggleMenu: function() {

    event.preventDefault();

    console.log('J\'ai clicqué sur le menu')

    $('body').toggleClass('menu-visible');
  },
  enableScrollex: function() {

    $('.intro--presentation').scrollex({
      enter: app.removeHeaderFixed,
      leave: app.setHeaderFixed,

      bottom: '+20%',
    });
  },
  removeHeaderFixed: function() {
    $('.header').removeClass('header--is-fixed');
  },
  setHeaderFixed: function() {
    $('.header').addClass('header--is-fixed');
  }
};

$(app.init);
