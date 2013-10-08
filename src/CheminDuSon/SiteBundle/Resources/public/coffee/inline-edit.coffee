jQuery ($) ->
    $.widget("cds.inlineEdit",
       _create: ->
           @_initEvents()
       isEdit: false
       _initEvents: ->
           element = @element
           editIcon = $('<i>',
               class: 'icon-cds-pencil inline-edit-trigger'
           )
           editIcon.hide()
           element.after(editIcon)
           element.parent().on('mouseenter', =>
               if(!@isEdit)
                    editIcon.show()
           ).on('mouseleave', ->
               editIcon.hide()
           )
           editIcon.on('click', (e)=>
               @_onEdit(e)
           )
       _onEdit: (e) ->
           @isEdit = true
           iconElt = e.target
           $(iconElt).hide()
           container    = $(iconElt).parent()
           element      = container.find('span')
           elementValue = element.text()
           input        = $('<input>',
               type: 'text'
               value: elementValue
           )
           input.hide()
           element.hide('fast', ->
               element.after(input)
               input.show('fast')
               input.focus()
           )
           
           input.on('keyup', (e) =>
             
             element.html(input.val()) if (e.which == 13)
             element.html(elementValue) if (e.which == 27)
             if (e.which == 13 or e.which ==27)
                @isEdit=false
                input.hide('fast', ->
                    element.show('fast')
                )
           )
    )
    
    $('.inline-edit').inlineEdit()