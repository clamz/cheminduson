nav= ->
    nav.prototype._init()
    
    
nav.prototype =
    menuTriggerId: 'menu-trigger'
    siteWrapperId: 'site-wrapper'
    navigationMenuId: 'navigation-menu'
    menuOpenClass: 'menu-open'
    _init: ->
        @_initEvents()
    _initEvents: ->
        menuTriggerElt = document.getElementById(@menuTriggerId)
        menuTriggerElt.addEventListener('click', (ev) =>
            ev.stopPropagation()
            ev.preventDefault()
            siteWrapperElt = document.getElementById(@siteWrapperId);
            classie.toggle(siteWrapperElt, @menuOpenClass)
        )
        $(document).click((event) =>
            

        )   


nav()