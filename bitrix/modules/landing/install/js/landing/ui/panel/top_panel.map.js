{"version":3,"sources":["top_panel.js"],"names":["BX","namespace","removeClass","Landing","Utils","addClass","onCustomEvent","bind","makeFilterablePopupMenu","makeSelectablePopupMenu","style","encodeDataValue","UI","Panel","Top","id","data","BasePanel","apply","this","arguments","layout","document","querySelector","siteButton","pageButton","undoButton","redoButton","desktopButton","tabletButton","mobileButton","iframeWrapper","iframe","lastActive","loader","onDesktopSizeChange","onTabletSizeChange","onMobileSizeChange","onIframeClick","onSiteButtonClick","onPageButtonClick","onUndo","onRedo","onKeyDown","adjustHistoryButtonsState","contentDocument","window","sitesCount","parseInt","Main","getInstance","options","sites_count","pagesCount","pages_count","rootWindow","PageObject","getRootWindow","topHistory","getClass","History","instance","prototype","constructor","__proto__","superclass","event","key","keyCode","which","navigator","userAgent","match","ctrlKey","metaKey","formSettingsPanel","Reflection","isShown","shiftKey","preventDefault","canUndo","hasAttribute","getLoader","show","undo","then","hide","canRedo","redo","Loader","size","offset","top","left","history","classList","remove","removeAttribute","add","disableHistory","setAttribute","enableHistory","disableDevices","enableDevices","DOM","write","width","dataset","postfix","enableControls","setNoTouchDevice","disableControls","setTouchDevice","siteMenu","PopupMenuWindow","bindElement","events","onPopupClose","blur","menuShowDelay","offsetTop","popupWindow","contentContainer","minHeight","minWidth","siteId","site_id","landingId","filter","params","type","SPECIAL","Backend","getSites","sites","Promise","resolve","setTimeout","forEach","site","addMenuItem","ID","text","TITLE","items","editMask","sef_url","site_edit","showMask","site_show","push","Loc","getMessage","href","replace","pageMenu","getLandings","landings","landing","FOLDER_ID","IS_AREA","landing_edit","viewMask","landing_view","FOLDER","siteShowMask","addQueryParams","SITE_ID","folderId","requestAnimationFrame","close","getFormNameLayout","setFormName","Type","isString","formNameLayout","isDomNode","firstElementChild","textContent"],"mappings":"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","file":"top_panel.map.js"}