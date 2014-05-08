(function() {
  var nav;

  nav = function() {
    return nav.prototype._init();
  };

  nav.prototype = {
    menuTriggerId: 'menu-trigger',
    siteWrapperId: 'site-wrapper',
    navigationMenuId: 'navigation-menu',
    menuOpenClass: 'menu-open',
    _init: function() {
      return this._initEvents();
    },
    _initEvents: function() {
      var menuTriggerElt, siteWrapperElt;
      menuTriggerElt = document.getElementById(this.menuTriggerId);
      siteWrapperElt = document.getElementById(this.siteWrapperId);
      if (menuTriggerElt) {
        menuTriggerElt.addEventListener('click', (function(_this) {
          return function(ev) {
            ev.stopPropagation();
            ev.preventDefault();
            return _this._toggleMenu();
          };
        })(this));
      }
      return $(document).click((function(_this) {
        return function(event) {
          if (classie.has(siteWrapperElt, _this.menuOpenClass)) {
            return _this._toggleMenu();
          }
        };
      })(this));
    },
    _toggleMenu: function() {
      var siteWrapperElt;
      siteWrapperElt = document.getElementById(this.siteWrapperId);
      return classie.toggle(siteWrapperElt, this.menuOpenClass);
    }
  };

  nav();

}).call(this);
