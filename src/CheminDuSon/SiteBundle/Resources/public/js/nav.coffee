
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
        siteWrapperElt = document.getElementById(@siteWrapperId);
        menuTriggerElt.addEventListener('click', (ev) =>
            ev.stopPropagation()
            ev.preventDefault()
            @_toggleMenu()
        )
        $(document).click((event) =>                    
            @_toggleMenu() if classie.has(siteWrapperElt, @menuOpenClass)

        )   
    _toggleMenu: ->
        siteWrapperElt = document.getElementById(@siteWrapperId);
        classie.toggle(siteWrapperElt, @menuOpenClass)

nav()