{"version":3,"sources":["info-helper.js"],"names":["BX","namespace","UI","InfoHelper","frameUrlTemplate","frameNode","popupLoader","availableDomainList","frameUrl","inited","init","params","this","ajax","runAction","then","response","data","bind","trialableFeatureList","demoStatus","window","proxy","event","origin","indexOf","action","close","location","href","open","reloadParent","url","top","SidePanel","Instance","code","option","__showExternal","licenseAgreed","ajaxRestPath","callback","result","slider","getTopSlider","contentWindow","postMessage","dataType","method","sessid","bitrix_sessid","onsuccess","onfailure","error_type","error","success","onCustomEvent","featureId","width","sliderId","getSliderId","frame","create","attrs","className","src","contentCallback","Promise","resolve","reject","replace","id","children","getLoader","loader","cacheable","rightBoundary","events","onLoad","showFrame","show","isOpen","Type","isPlainObject","isLimit","sendLimitSliderAnalyticsAjax","isArray","Uri","addParam","join","getFrame","getContent","onCloseComplete","onClose","analyticsLabels","defaultAnalyticsLabels","limits","limitAnalyticsLabels","Object","assign","module","console","info","analyticsLabel","getSlider","content","setTimeout","classList","add","Loader","target","size","container","sliderTop","getPreviousSlider","reload","isInited"],"mappings":"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","file":"info-helper.map.js"}