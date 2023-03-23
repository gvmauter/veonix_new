{"version":3,"file":"notification-manager.bundle.map.js","names":["this","BX","UI","exports","pull_client","main_core_events","main_core","ui_notification","ui_buttons","Uuid","static","replace","c","r","Math","random","v","toString","Notification","constructor","options","setUid","id","setCategory","category","setTitle","title","setText","text","setIcon","icon","setInputPlaceholderText","inputPlaceholderText","createButtons","button1Text","button2Text","SEPARATOR","getV4","uid","split","pop","join","Type","isStringFilled","Error","encodeIdToUid","getUid","getId","decodeUidToId","getCategory","getTitle","getText","getIcon","isString","getInputPlaceholderText","setButton1Text","Loc","getMessage","setButton2Text","getButton1Text","getButton2Text","PushNotification","PullHandler","getModuleId","handleNotify","params","extra","command","notification","notificationOptions","pushNotification","notifier","sendNotification","DesktopHelper","isBitrixDesktop","geApiVersion","navigator","userAgent","toLowerCase","includes","BXDesktopSystem","Number","GetProperty","desktop","apiReady","isMac","isLinux","BXIM","desktopStatus","Promise","resolve","turnedOnCallback","turnedOffCallback","desktopUtils","runningCheck","BrowserHelper","isChrome","isFirefox","isSafari","window","permission","isSafariBased","NotificationEvent","BaseEvent","CLICK","ACTION","CLOSE","eventType","getTypes","NotificationAction","BUTTON_1","BUTTON_2","USER_INPUT","action","NotificationCloseReason","CLOSED_BY_USER","EXPIRED","closeReason","BaseProvider","EventEmitter","super","eventNamespace","setEventNamespace","convertNotificationToNative","nativeNotification","canSendNotification","notify","notificationClick","eventOptions","data","emit","notificationAction","userInput","isSupported","console","warn","notificationClose","reason","NOTIFICATION_LIFETIME","DesktopProvider","getEventNamespace","registerEvents","isMainTab","notificationUid","NotificationShow","addEventListener","event","onNotificationClick","onNotificationAction","onNotificationClose","detail","MacProvider","NotificationCreate","NotificationAddText","NotificationAddImage","NotificationAddInput","NotificationAddAction","NotificationSetExpiration","addTextToNotification","trim","languageSafeRowLength","length","space","firstRow","words","shift","secondRow","WindowsProvider","BrowserProvider","body","tag","renotify","onclick","preventDefault","focus","isRunningOnAnyDevice","checkRunningOnThisDevice","then","isRunningOnThisDevice","BrowserNotificationAction","Action","balloon","setButtonClass","buttonType","getContainer","container","buttonOptions","isFunction","events","click","button","stopPropagation","Button","removeClass","addClass","BASE_BUTTON_CLASS","getButtonClass","TYPE_ACCEPT","getButtonTypes","buttonClass","isSupportedButtonType","_","t","_t","_t2","_t3","_t4","_t5","_t6","_t7","_t8","BrowserNotification","Balloon","userInputContainerNode","userInputNode","setActions","actions","isArray","forEach","push","onMouseEnter","handleMouseEnter","onMouseLeave","handleMouseLeave","Tag","render","animationClassName","contentWidth","isNumber","getWidth","handleContentClick","bind","getIconNode","getTitleNode","getTextNode","getUserInputContainerNode","getActionsNode","getCloseButtonNode","getData","getActions","map","isArrayFilled","onInputReplyClick","toggleUserInputContainerNode","handleUserInputEnter","handleUserInputClick","document","getElementById","replyToggleButton","showUserInput","setAutoHide","deactivateAutoHide","style","display","classList","add","disabled","activateAutoHide","remove","isCloseButtonVisible","handleCloseBtnClick","closedByUserHandler","clickHandler","close","userInputHandler","target","value","keyCode","KEY_CODE","ENTER","ESC","BrowserPageProvider","balloonOptions","type","width","position","autoHideDelay","showButton1","showButton2","action1Options","action2Options","Center","Notifier","provider","createProvider","PULL","subscribe","providerOptions","EVENT_NAMESPACE","isSupportedDesktopApp","isWindows","isSupportedBrowser","isNativeNotificationAllowed","eventName","handler","notifyViaDesktopProvider","NotificationManager","Event"],"sources":["notification-manager.bundle.js"],"mappings":"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"}