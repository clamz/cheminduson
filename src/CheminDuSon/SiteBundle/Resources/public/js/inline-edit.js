(function() {
  jQuery(function($) {
    $.widget("cds.inlineEdit", {
      _create: function() {
        return this._initEvents();
      },
      isEdit: false,
      _initEvents: function() {
        var editIcon, element;
        element = this.element;
        editIcon = $('<i>', {
          "class": 'icon-cds-pencil inline-edit-trigger'
        });
        editIcon.hide();
        element.after(editIcon);
        element.parent().on('mouseenter', (function(_this) {
          return function() {
            if (!_this.isEdit) {
              return editIcon.show();
            }
          };
        })(this)).on('mouseleave', function() {
          return editIcon.hide();
        });
        return editIcon.on('click', (function(_this) {
          return function(e) {
            return _this._onEdit(e);
          };
        })(this));
      },
      _onEdit: function(e) {
        var container, element, elementValue, iconElt, input;
        this.isEdit = true;
        iconElt = e.target;
        $(iconElt).hide();
        container = $(iconElt).parent();
        element = container.find('span');
        elementValue = element.text();
        input = $('<input>', {
          type: 'text',
          value: elementValue
        });
        input.hide();
        element.hide('fast', function() {
          element.after(input);
          input.show('fast');
          return input.focus();
        });
        return input.on('keyup', (function(_this) {
          return function(e) {
            if (e.which === 13) {
              element.html(input.val());
            }
            if (e.which === 27) {
              element.html(elementValue);
            }
            if (e.which === 13 || e.which === 27) {
              _this.isEdit = false;
              return input.hide('fast', function() {
                return element.show('fast');
              });
            }
          };
        })(this));
      }
    });
    return $('.inline-edit').inlineEdit();
  });

}).call(this);
