(function ($, window, document, undefined) {
  'use strict';

  var WWSJS = window.WWSJS;
  WWSJS.setting = WWSJS.setting || {};
  WWSJS.components = WWSJS.components || {};

  if (!WWSJS) {
    throw new Error("WWSJS is undefined");
  }

  /*
  WWSJS.component('コンポーネント名（重複不可）', function () {

  // dom構築前に実行される
  function boot() {}

  // dom構築後に実行される
  function init () {}

  // あとからコンポーネントが登録された場合、bootとinitはすぐに実行される
  // 実行が必要ない場合はisBooted,isReadyをfalseにする

  // レスポンシブを行う場合、モードが切り替わるたびに呼び出される
  // current: 現在の画面サイズ（配列）
  // before: 前回の画面サイズ（配列）
  // triggerIn: 移動元画面サイズ（配列）
  // triggerOut: 移動先画面サイズ（配列）
  function change(current, before, triggerIn, triggerOut) {}

  // changeと同じだがtriggerIn限定
  // triggerIn
  function triggerIn(triggerIn) {}

  // changeと同じだがtriggerOut限定
  // triggerOut
  function triggerIn(triggerIn) {}

  return {
    isBooted: false, // なくても可、はじめからtrueでboot()を実行させない
    isReady: false, // なくても可、はじめからtrueでready()を実行させない
    isResponsive: true,
    boot: boot,
    init: init,
    change: change
  };
  });
  */


  // blank icon
  /*WWSJS.component('blankIcon', function () {
    function init () {
      $('#container').find('a[target=_blank]:not(:has(img))').addClass('blank');
    }
    return {
      isResponsive: false,
      init :init
    };
  });*/

  // login add parameter
  WWSJS.component('loginParam', function () {
    var $inputHidden = $('<input type="hidden" name="useragent" value=""></input>');
    $inputHidden.attr('value', (WWSJS.Utils.userAgent.isSmartPhone()) ? 'S' : 'P');

    function init () {
      $('#login-area').find('form').prepend($inputHidden);
    }

    return {
      isResponsive: false,
      init: init
    };
  });

  // login-time reload parameter
  WWSJS.component('loginTimeReload', function () {
    function init () {
      if ($('html').hasClass('login')) {
        var country = (WWSJS.COUNTRY_URL_TO_COOKIE[WWSJS.locale.raw_country]) ? WWSJS.COUNTRY_URL_TO_COOKIE[WWSJS.locale.raw_country] : WWSJS.locale.raw_country;
        $('#login-data').find('input[name="type"]').attr('value', country + '/' + WWSJS.locale.language);
      }
    }

    return {
      isResponsive: false,
      init: init
    };
  });

  // match height
  WWSJS.component('matchHeight', function () {

    var mh = '.mh';

    function init () {
      $(mh).matchHeight();
    }

    function reinit () {
      init();
    }

    return {
      isResponsive: false,
      init: init,
      reinit: reinit
    };
  });

  // href変更 ws ⇔ wm,wl
  WWSJS.component('linkSwitch', function () {

    var linkEl = 'a.js-linkSwitch';
    var flg = '';

    function init () {
      change();
    }

    function reinit () {
      flg = '';
      init();
    }

    function changeWS ($el) {
      $el.each(function(){
        var $this = $(this);
        if (!$this.hasClass('dataLinkSet')) {
          $this.attr('data-link-pc', $this.attr('href'));
          $this.addClass('dataLinkSet');
        }
        $this.attr('href', $this.attr('data-link-sp'));
      });
    }
    function changeOther ($el) {
      $el.each(function(){
        var $this = $(this);
        $this.attr('href', $this.attr('data-link-pc'));
      });
    }

    function change(current, before, triggerIn, triggerOut) {
      var $el = $(linkEl);
      if (WWSJS.Utils.winNameCheck.hasName('ws')) {
        changeWS($el);
        flg = 'ws';
      } else if (!WWSJS.Utils.winNameCheck.hasName('ws') && flg === 'ws') {
        changeOther($el);
        flg = '';
      }
    }

    return {
      isResponsive: true,
      init: init,
      reinit: reinit,
      change: change
    };
  });

  // image 変更 ws ⇔ wm,wl
  WWSJS.component('imageSwitch', function () {

    var imageEl = 'img.js-imageSwitch';
    var flg = '';

    function init () {
      change();
    }

    function reinit () {
      flg = '';
      init();
    }

    function changeWS ($el) {
      $el.each(function(){
        var $this = $(this);
        if (!$this.hasClass('dataImageSet')) {
          $this.attr('data-image-sp', $this.attr('src'));
          $this.addClass('dataImageSet');
        }
        $this.attr('src', $this.attr('data-image-pc'));
      });
    }
    function changeOther ($el) {
      $el.each(function(){
        var $this = $(this);
        $this.attr('src', $this.attr('data-image-sp'));
      });
    }

    function change(current, before, triggerIn, triggerOut) {
      var $el = $(imageEl);
      if (!WWSJS.Utils.winNameCheck.hasName('ws') && flg === '') {
        changeWS($el);
        flg = 'wmwl';
      } else if (WWSJS.Utils.winNameCheck.hasName('ws') && flg === 'wmwl') {
        changeOther($el);
        flg = '';
      }
    }

    return {
      isResponsive: true,
      init: init,
      reinit: reinit,
      change: change
    };
  });



  // スムーズスクロール
  WWSJS.component('smoothScroll', function () {
    function boot() {
      $(document).on('click', 'a[href^="#"][data-scroll]', function (e) {
        click.call(this, e);
      });
    }

    function init () {}

    function click (e) {
      e.preventDefault();
      var offset = ($(this).attr('data-scroll-offset')) ? $(this).attr('data-scroll-offset')*1 : 0;
      targetLink(this, offset);
    }

    function targetLink(el, offset, callback) {
      var target = $(el).attr('href');
      var $target = (target == '#') ? $('body') : $(target);
      _scroll($target, offset, callback);
    }

    function targetElem(el, offset, callback) {
      _scroll($(el), offset, callback);
    }

    function _scroll ($el, offset, callback) {
      if($el[0]) {
        offset = (offset) ? offset : 0;
        var position = $el.offset().top - offset;
        $(WWSJS.Utils.isHtmlScrollable() ? 'html' : 'body').animate({
            scrollTop: position
          }, 800, WWSJS.setting.easing, function () {
            if(Object.prototype.toString.call(callback) === '[object Function]') {
              callback();
            }
        });
      }
    }
    return {
      isResponsive: false,
      boot: boot,
      targetLink: targetLink,
      targetElem: targetElem
    };
  });


  WWSJS.component('toggle', function () {

    var toggle = '.js-toggle'; //親box
    var toggleBtn = '.js-toggleSwitch'; //ボタン（複数可）
    var toggleContent = '.js-toggleContent'; //開くコンテンツ
    var toggleClose = '.js-toggleClose'; //js-toggleContent内に追加で置ける閉じるボタン
    var toggleOverlay = '.js-toggleOverlay';
    var componentTarget = toggle;
    var eventFlg = false;
    var flgClass = 'is-open';
    
    function component (el, id, openFlg) {
      this.$el = $(el);
      this.id = id;
      this.transition = this.$el.attr('data-toggle-transition');
      this.transitionTime = (function(self) {
        if(self.transition === 'slide') {
          return WWSJS.setting.slideTransitionTime;
        } else if(self.transition === 'fade') {
          return WWSJS.setting.fadeTransitionTime;
        } else {
          return 0;
        }
      })(this);
      this.scope = (this.$el.attr('data-toggle-scope')) ? this.$el.attr('data-toggle-scope').split(',') : undefined;
      this.modalScope = (this.$el.attr('data-toggle-modal-scope')) ? this.$el.attr('data-toggle-modal-scope').split(',') : undefined;
      this.toggleTarget = this.$el.attr('data-toggle-target');
      this.toggleOutside = this.$el.attr('data-toggle-outside');
      this.toggleCloseTarget = this.$el.attr('data-toggle-close-target');
      // this.toggleTrigger = this.$el.attr('data-toggle-trigger');
      this.init ();
    }
    component.prototype.init = function () {
      var self = this;
      if (!eventFlg) {
        eventFlg = true;
        $(document).on('click.toggle', toggleBtn, function (e) {
          click.call(this, e);
        });

        $(document).on('click.toggle', toggleClose, function (e) {
          click.call(this, e, $(this).closest(toggleContent).attr('data-parent-id'));
        });

        $(document).on('click.toggle', toggleOverlay, function (e) {
          click.call(this, e, $(this).closest(toggleContent).attr('data-parent-id'));
        });
      }
    };
    component.prototype.change = function (current, before, triggerIn, triggerOut) {

    };

    var eventType = {
      close: function (type, $toggle, $toggleContent, transitionTime) {
        // var toggleTrigger = (self.toggleTrigger !== undefined);
        // if (toggleTrigger) $(document).trigger('toggleTrigger' + toggleTrigger);
        WWSJS.Utils.setFocusLoop('off', $toggle, toggleBtn);
        eventType[type + 'Close']($toggle, $toggleContent, transitionTime);
      },
      open: function (type, $toggle, $toggleContent, transitionTime) {
        eventType[type + 'Open']($toggle, $toggleContent, transitionTime, function () {
          WWSJS.Utils.getfocusElement($toggleContent).eq(0).focus();
          
          if ($toggleContent.find(toggleClose)[0]) {
            WWSJS.Utils.setFocusLoop('on', $toggle, toggleContent);
          }
        });
      },
      slideOpen: function ($toggle, $toggleContent, transitionTime, callback) {
        $toggle.addClass(flgClass);
        $toggleContent.slideDown({
          duration: transitionTime,
          easing: WWSJS.setting.easing,
          complete: function(elements) {
            if (typeof callback === 'function') callback()
          }
        });
      },
      slideClose: function ($toggle, $toggleContent, transitionTime, callback) {
        $toggleContent.slideUp({
          duration: transitionTime,
          easing: WWSJS.setting.easing,
          complete: function(elements) {
            $toggle.removeClass(flgClass);
            $(this).css({display: ''});
            if (typeof callback === 'function') callback()
          }
        });
      },
      fadeOpen: function ($toggle, $toggleContent, transitionTime, callback) {
        $toggle.addClass(flgClass);
        $toggleContent.fadeIn(transitionTime, function () {
          if (typeof callback === 'function') callback()
        });
      },
      fadeClose: function ($toggle, $toggleContent, transitionTime, callback) {
        $toggleContent.fadeOut(transitionTime, function () {
          $toggle.removeClass(flgClass);
          $(this).css({display: ''});
          if (typeof callback === 'function') callback()
        });
      }
    };

    function click (e, self, parentId) {
      e.preventDefault();

      var thisId = (parentId) ? parentId : $(this).closest(toggle).attr('data-el-id');
      var self = elementList[thisId];

      if (!thisId) return;
      if (self.scope && !WWSJS.Utils.winNameCheck.hasName(self.scope)) return;

      var thisBtn = this;
      var $toggle = self.$el;
      var $toggleContent = (self.toggleTarget !== undefined) ? $(self.toggleTarget) : $toggle.find(toggleContent);
      var transition = (function() {
        // option指定があれば優先
        //if(option && option.slide !== undefined && !option.slide) {
        //  return true;
        //}

        return self.transition;
      })();
      var toggleOutsideEvent = (self.toggleOutside !== undefined);
      var toggleCloseTarget = (self.toggleCloseTarget !== undefined);

      var eventName;
      if (transition === 'slide') {
        eventName = 'slide';
      } else if (transition === undefined || transition === 'fade') {
        eventName = 'fade';
      }

      if($toggle.hasClass(flgClass)) {
        if (toggleOutsideEvent) $(document).off('click.toggleOutside' + self.id);
        if (toggleCloseTarget) $(document).off('click.toggleCloseTarget' + self.id);
        eventType.close(eventName, $toggle, $toggleContent, self.transitionTime);
      } else {
        if (toggleOutsideEvent) {
          $(document).on('click.toggleOutside' + self.id, function(e) {
            if ($toggleContent[0] !== e.target && !$.contains($toggleContent[0], e.target) && !$.contains($(thisBtn)[0], e.target)) {
              eventType.close(eventName, $toggle, $toggleContent, self.transitionTime);
              $().off(e);
            }
          });
        }
        if (toggleCloseTarget) {
          $(document).on('click.toggleCloseTarget' + self.id, function(e) {
            var closeTarget = self.toggleCloseTarget.split(',');
            var flg = false;

            $.each(closeTarget, function (index, value) {
              $(value).each(function () {
                if ($(this)[0] === e.target || $.contains($(this)[0], e.target)) flg = true;
              });
            });
            if (flg) {
              eventType.close(eventName, $toggle, $toggleContent, self.transitionTime);
              $().off(e);
            }
          });
        }
        eventType.open(eventName, $toggle, $toggleContent, self.transitionTime);
      }
    }


    function triggerClick (el, option) {
      if(el && $(el)[0] && $(el).hasClass(toggle.substr(1))) {
        $(el).find(toggleBtn).trigger('click', option);
      }
    }

    /* ---------------------------------- */
    var elementList = {};

    function boot () {}
    function init () {
      $(componentTarget).each(function (index, el) {
        var thisEl = addComponent(el);
      });
    }
    function reinit () {
      $(toggle).each(function (index, el) {
        if ($(el).attr('data-el-id') === undefined) {
          addComponent(el);
        }
      });
    }
    function addComponent (el) {
      if ($(el).attr('data-el-id') !== undefined) return;
      var id = WWSJS.Utils.getUniqueId();
      var thisEl = new component(el, id);
      elementList[id] = thisEl;
      $(el).attr('data-el-id', id);
      if ($(el).attr('data-toggle-target')) $($(el).attr('data-toggle-target')).attr('data-parent-id', id);
      return thisEl;
    }
    function change(current, before, triggerIn, triggerOut) {
      for (var key in elementList) {
        if (elementList.hasOwnProperty(key)) {
          elementList[key].change(current, before, triggerIn, triggerOut)
        }
      }
    }

    return {
      isResponsive: true,
      boot: boot,
      init: init,
      reinit: reinit,
      change: change,
      addComponent: addComponent,
      elementList: elementList
    };
  });


  //tab
  WWSJS.component('tab', function () {

    var tabBox = '.js-tab';
    var tabBtnWrap = '.js-tabBtnWrap';
    var tabBtnBox = '.js-tabBtnBox';
    var tabBtn = '.js-tabBtn';
    var tabContentWrap = '.js-tabContentWrap';
    var tabContent = '.js-tabContent';
    var isActive = 'is-active';

    function boot () {
      $(document).on('click', tabBox + ' > ' + tabBtnWrap + ' ' + tabBtn, function(e){
        type1.call(this, e);
      });
      $(document).on('click', tabBox + ' :not(' + tabBtnWrap + ') ' + tabBtn, function(e){
        type2.call(this, e);
      });
    }

    function init () {
    }

    function type2 (e) {
      e.preventDefault();
      var $this = $(this);
      var $tabBox = $this.closest(tabBox);
      var $tabBtnBox = $tabBox.children(tabBtnBox);
      var index = $tabBtnBox.find(tabBtn).index(this);
      var $targetContent = ($this.attr('data-tab-target') === undefined) ? $tabBox.children(tabContent).eq(index) : $($this.attr('data-tab-target'));
      var transition = $tabBox.attr('data-tab-transition');

      if ($targetContent[0] && !$this.parent(tabBtnBox).hasClass(isActive)) {
        if (transition === 'fade') {
          $tabBox.children(tabContent + '.' + isActive).animate({opacity: 0}, WWSJS.setting.fadeTransitionTime, function () {
            $(this).removeClass(isActive).css({opacity: ''});
            $targetContent.css({opacity: 0}).addClass(isActive).animate({opacity: 1}, WWSJS.setting.fadeTransitionTime, function () {
              $(this).css({opacity: ''});
            });
          });
        } else {
          $tabBox.children(tabContent).removeClass(isActive);
          $targetContent.addClass(isActive);
        }

        $tabBtnBox.removeClass(isActive);
        $this.parent(tabBtnBox).addClass(isActive);
      }
    }

    function type1 (e) {
      e.preventDefault();
      var $this = $(this);
      var $tabBox = $this.closest(tabBox);
      var index = $tabBox.find(tabBtnWrap).eq(0).find(tabBtn).index(this);
      var $targetWrap = ($tabBox.attr('data-tab-target') === undefined) ? $tabBox : $($tabBox.attr('data-tab-target'));
      var $targetContent = $targetWrap.children(tabContentWrap).children(tabContent).eq(index);
      var transition = $tabBox.attr('data-tab-transition');

      if($targetContent[0] && !$targetContent.hasClass(isActive)) {
        // contents
        if (transition === 'fade') {
          $targetWrap.children(tabContentWrap).children(tabContent + '.' + isActive).animate({opacity: 0}, WWSJS.setting.fadeTransitionTime, function () {
            $(this).removeClass(isActive).css({opacity: ''});
            $targetContent.css({opacity: 0}).addClass(isActive).animate({opacity: 1}, WWSJS.setting.fadeTransitionTime, function () {
              $(this).css({opacity: ''});
            });
          });
        } else {
          $targetWrap.children(tabContentWrap).children(tabContent).removeClass(isActive);
          $targetContent.addClass(isActive);
        }
        // btn
        $tabBox.find(tabBtnWrap).eq(0).find(tabBtn).removeClass(isActive);
        $this.addClass(isActive);
      }
    }

    function change(current, before, triggerIn, triggerOut) {

    }

    return {
      isResponsive: true,
      boot: boot,
      init: init
    };
  });

  //toggle tab
  WWSJS.component('toggletab', function () {

    var toggleTabBox = '.js-toggletab';
    var toggleTabMenu = '.js-toggletabMenu';
    var toggleTabBtn = '.js-toggletabBtn';
    var toggleTabContent = '.js-toggletabContent';
    var isActive = 'is-active';

    function boot () {
      $(document).on('click', toggleTabBox + ' ' + toggleTabBtn, function (e) {
        click.call(this, e);
      });
    }

    function click (e) {
      e.preventDefault();
      var $this = $(this);
      var $toggletabBox = $this.closest(toggleTabBox);
      var target = $this.attr('data-toggletab-target');
      var targetIsId = /^#/.test(target);
      var $target = (targetIsId) ? $(target) : $toggletabBox.find(target).eq(0);
      var toggleScope = $toggletabBox.attr('data-toggle-scope');
      var only = $toggletabBox.attr('data-toggle-only');

      if($target[0]) {
        if(WWSJS.Utils.winNameCheck.hasName(toggleScope)) {
          eventType.toggleClick.call(this, e, $target, $toggletabBox, only);
        } else {
          eventType.tabClick.call(this, e, $target, $toggletabBox);
        }
      }
    }

    var eventType = {
      toggleSlideOpen: function ($this, $target, $toggletabBox, only) {
        var $activeToggle = $toggletabBox.find(toggleTabContent + '.' + isActive);
        if (only !== undefined && $activeToggle[0]) {
          var isScroll = ($(window).scrollTop() > $activeToggle.offset().top);
          $toggletabBox.find(toggleTabMenu).removeClass(isActive);
          $activeToggle.removeClass(isActive).css({display: 'block'});
          $activeToggle.slideUp(WWSJS.setting.slideTransitionTime, WWSJS.setting.easing, function() {

          });
          if(isScroll) {
            $('html, body').animate({
                scrollTop: $this.offset().top - $activeToggle.outerHeight()
              }, WWSJS.setting.slideTransitionTime, WWSJS.setting.easing, function () {
            });
          }
        }
        $this.closest(toggleTabMenu).addClass(isActive);
        $target.addClass(isActive).css({display: 'none'});
        $target.slideDown(WWSJS.setting.slideTransitionTime, WWSJS.setting.easing, function() {

        });
      },
      toggleSlideClose: function ($this, $target, $toggletabBox, only) {
        if (only === undefined) {
          $this.closest(toggleTabMenu).removeClass(isActive);
        } else {
          $toggletabBox.find(toggleTabMenu).removeClass(isActive);
          $target = $toggletabBox.find(toggleTabContent + '.' + isActive);
        }
        $target.removeClass(isActive).css({display: 'block'});
        $target.slideUp(WWSJS.setting.slideTransitionTime, WWSJS.setting.easing, function() {

        });
      },
      toggleNormalOpen: function ($this, $target, $toggletabBox, only) {
        $toggletabBox.find(toggleTabContent).removeClass(isActive);
        $target.addClass(isActive);
      },
      toggleNormalClose: function ($this, $target, $toggletabBox, only) {
        if (only === undefined) {
          $this.closest(toggleTabMenu).removeClass(isActive);
          $target.removeClass(isActive);
        } else {
          $toggletabBox.find(toggleTabMenu).removeClass(isActive);
          $toggletabBox.find(toggleTabContent).removeClass(isActive);
        }
      },
      toggleClick: function (e, $target, $toggletabBox, only) {
        var $this = $(this);
        var toggleTransition = $toggletabBox.attr('data-toggle-transition');

        // transition slide
        if (toggleTransition === 'slide') {
          // 自分にis-activeがあるか
          if(!$target.hasClass(isActive)) {
            eventType.toggleSlideOpen($this, $target, $toggletabBox, only);
          } else {
            eventType.toggleSlideClose($this, $target, $toggletabBox, only);
          }
        } else {
          if(!$target.hasClass(isActive)) {
            eventType.toggleNormalOpen($this, $target, $toggletabBox, only);
          } else {
            eventType.toggleNormalClose($this, $target, $toggletabBox, only);
          }
        }
      },
      tabClick :function (e, $target, $toggletabBox) {
        var $this = $(this);
        var tabTransition = $toggletabBox.attr('data-tab-transition');

        if(!$target.hasClass(isActive)) {
          $toggletabBox.find(toggleTabMenu + '.' + isActive).removeClass(isActive);
          $this.closest(toggleTabMenu).addClass(isActive);

          if (tabTransition === 'fade') {
            $toggletabBox.find(toggleTabContent + '.' + isActive).animate({opacity: 0}, WWSJS.setting.fadeTransitionTime, function () {
              $(this).removeClass(isActive);
              $target.css({opacity: 0}).addClass(isActive).animate({opacity: 1}, WWSJS.setting.fadeTransitionTime, function () {
                $this.removeClass(isActive).css({opacity: ''});
                $this.css({opacity: ''});
              });
            });
          } else {
            $toggletabBox.find(toggleTabContent).removeClass(isActive);
            $target.addClass(isActive);
            $this.closest(toggleTabMenu).addClass(isActive);
          }
        }
      }
    }

    function change (current, before, triggerIn, triggerOut) {
      var $toggleTabBox = $(toggleTabBox);
      $toggleTabBox.find(toggleTabContent).css('display', '');

      if (!WWSJS.Utils.winNameCheck.hasName('ws')) {
        var $activeModule = $toggleTabBox.find(toggleTabMenu + '.' + isActive);
        var index = $toggleTabBox.find(toggleTabMenu).index($activeModule.eq(0));
        index = (index === -1) ? 0 : index;
        if ($activeModule.length !== 1) {
          $toggleTabBox.find(toggleTabMenu).removeClass(isActive);
          $toggleTabBox.find(toggleTabContent).removeClass(isActive);
          $toggleTabBox.find(toggleTabMenu).eq(index).addClass(isActive);
          $toggleTabBox.find(toggleTabContent).eq(index).addClass(isActive);
        }
      }
    };

    return {
      isResponsive: true,
      boot: boot,
      change: change
    };
  });


  // 通常モーダル
  WWSJS.component('modal', function () {

    var modal = '.js-modal';
    var modalContent = '.js-modalContent';
    var modalOverlay = '.js-modalOverlay';
    var modalOpenBtn = '.js-modalOpen';
    var modalCloseBtn = '.js-modalClose';
    var modalCloseParentBtn = '.js-modalCloseParent';
    var isOpen = 'is-open';
    var isModal = 'is-modal';
    var isModalCurrentBtn = 'is-modalCurrentBtn';
    var isModalFixed = 'is-modal-fixed';

    function boot () {
      $(document).on('click', modalOpenBtn, function(e) {
        modalOpen.call(this, e);
      });

      $(document).on('click', modalCloseBtn, function(e) {
        e.preventDefault();
        modalClose.call(this, e);
      });

      $(document).on('click', modalOverlay, function(e) {
        var attr = $(this).closest(modal).attr('data-modal-outside');
        var outside = !(attr && attr === 'false');
        if (outside && !$.contains($(this)[0], e.target)) {
          modalClose.call(this, e);
        }
      });

      $(document).on('click', modalCloseParentBtn, function(e) {
        e.preventDefault();
        if (window != window.parent) {
          WWSJS.Utils.setFocusLoop('off');
          window.parent.WWSJS.components.modal.close();
        } else if (WWSJS.Utils.userAgent.isAnaApl()) {
          history.back();
        } else if (WWSJS.Utils.userAgent.isSafari() && WWSJS.Utils.userAgent.isiOS()) {
          window.open('about:blank','_self').close();
        } else {
          window.close();
        }
      });
    }

    function init () {
    }

    function modalOpen (e) {
      var target = $(this).attr('data-modal-target');
      var iframe = $(this).attr('data-modal-iframe');
      var scope = $(this).attr('data-modal-scope');
      var fixed = ($(this).attr('data-modal-fixed') !== undefined);
      var $modal = $(target);

      if (!$modal[0]) return;

      if (scope !== undefined && WWSJS.Utils.winNameCheck.hasName(scope)) {
        e.preventDefault();

        var $modalContent = $modal.find(modalContent);
        if (iframe !== undefined && !$modalContent.find('iframe')[0]) {
          $modalContent.html('<iframe src="' + iframe + '" frameborder="0"></iframe>');
        }
        $modal.attr('data-modal-scope', scope);
        $modal.css({opacity: 0, display: 'block'});

        var winH = $(window).height();
        var contentH = winH - (winH / 100) * 6;
        //contentH = ($modalContent.outerHeight() < contentH) ? $modalContent.outerHeight() : contentH;
        $modalContent.css({height: contentH + 'px'});
        $modalContent.css({top: (fixed) ? getFixedVCenter($modalContent) : getVCenter($modalContent) + 'px'});
        $modal.animate({opacity: 1}, WWSJS.setting.fadeTransitionTime, function () {});
        $modal.addClass(isOpen);
        $('html').addClass(isModal);
        if (fixed) $('html').addClass(isModalFixed);
        if (fixed) {
          $(window).on('resize.modal', function (e) {
            var winH = $(window).height();
            var contentH = winH - (winH / 100) * 6;
            $modalContent.css({height: contentH + 'px'});
            $modalContent.css({top: getFixedVCenter($modalContent) + 'px'});
          });
        }
        
        $(this).addClass(isModalCurrentBtn);
        if (iframe !== undefined) {
          $modalContent.find('iframe')[0].contentWindow.focus();
        } else {
          WWSJS.Utils.getfocusElement($modalContent).eq(0).focus();
          if ($modalContent.find(modalCloseBtn)[0]) {
            WWSJS.Utils.setFocusLoop('on', $modal, modalContent);
          }
        }
      }
    }

    function modalClose (flg) {
      var transitionTime = (flg === 'change') ? 0 : WWSJS.setting.fadeTransitionTime;
      var $modal = $(this).closest(modal);
      WWSJS.Utils.setFocusLoop('off', 'body', '.' + isModalCurrentBtn);
      $modal.animate({opacity: 0}, transitionTime, function () {
        $(this).hide();
        $(this).removeClass(isOpen);
        $('html').removeClass(isModal);
        $('html').removeClass(isModalFixed);
        $('.' + isModalCurrentBtn).removeClass(isModalCurrentBtn);
      });
      $(window).off('resize.modal');
    }

    function close () {
      $(modal + '.' + isOpen).each(function () {
        modalClose.call(this, 'close');
      });
    }

    function change (current, before, triggerIn, triggerOut) {
      $(modal).each(function () {
        var scope = $(this).attr('data-modal-scope');
        if (scope !== undefined && WWSJS.Utils.winNameCheck.hasOtherName(scope, before)) {
          modalClose.call(this, 'change');
        }
      });
    }

    function getVCenter ($modalContent) {
      var contentH = $modalContent.outerHeight();
      var windowH = $(window).height();
      var windowScroll = $(window).scrollTop();
      return ((windowH - contentH) / 2) + windowScroll;
    }
    function getFixedVCenter ($modalContent) {
      var contentH = $modalContent.outerHeight();
      var windowH = $(window).height();
      return (windowH - contentH) / 2;
    }

    return {
      isResponsive: true,
      boot: boot,
      init: init,
      change: change,
      close: close
    };
  });



  // アイコンスライダー部分
  WWSJS.component('shortNavSlider', function () {

    var shortNavArea = '#short-nav-area';
    var slider = '.js-iconSlider';
    var isInit = false;

    function init () {
      if (isInit) return;
      if (!$(shortNavArea).find(slider)[0]) return;
      $(shortNavArea).find(slider).slick({
          dots: false,
          infinite: false,
          speed: WWSJS.setting.slideTransitionTime,
          mobileFirst: true,
          slidesToShow: 3,
          slidesToScroll: 3,
          cssEase: WWSJS.setting.cssEase,
          easing: WWSJS.setting.easing,
          responsive: [{
              breakpoint: WWSJS.setting.breakpoint[1] - 1,
              settings: {
                  slidesToShow: 4,
                  slidesToScroll: 4
              }
          },{
              breakpoint: WWSJS.setting.breakpoint[2] - 1,
              settings: {
                  slidesToShow: 5
              }
          }]
      });

      isInit = true;
    }

    function reinit () {
      if (isInit) {
        $(shortNavArea).find(slider).slick('unslick');
      }
      init();
    }

    return {
      isResponsive: false,
      init: init,
      reinit: reinit
    };
  });

  // メインスライダー
  WWSJS.component('mainSlider', function () {

    var mainArea = '#main-visual';
    var slider = '.slider';
    var stopBtn = '.slick-stop';
    var playBtn = '.slick-play';
    var control = '.slick-control';
    var isActive = 'is-active';
    var isHorizontal = 'is-horizontal';
    var isHorizontalFlg = false;
    var isInit = false;

    function init () {
      if (isInit) return;
      if (!$(mainArea).find(slider)[0]) return;
      if ($(mainArea).find(slider).find('.slide').length <= 1) $(mainArea).addClass('slider-solo');

      $(mainArea).append('<div class="slick-controls-area"><div class="slick-controls-inner"><div class="slick-controls-wrap"><button class="slick-stop slick-control"><span class="sr-only">stop</span></button><button class="slick-play slick-control is-active"><span class="sr-only">play</span></button></div><div class="slick-dots-wrap"></div></div></div>');
      $(mainArea).find(slider).slick({
        autoplay: true,
        autoplaySpeed: 6000,
        arrows: false,
        dots: true,
        infinite: true,
        variableWidth: false,
        centerMode: false,
        fade: false,
        speed: WWSJS.setting.slideTransitionTime,
        mobileFirst: true,
        cssEase: WWSJS.setting.cssEase,
        easing: WWSJS.setting.easing,
        respondTo: 'window',
        appendDots: '#main-visual .slick-dots-wrap',
        responsive: [{
            breakpoint: WWSJS.setting.breakpoint[1] - 1,
            settings: {
              fade: true,
              centerMode: true
              //respondTo: 'window'
            }
        }]
      });

      $(mainArea).find(slider).on('swipe', function(event, slick, direction){
        sliderStop.call($(mainArea).find(stopBtn));
      });

      if(isHori ()) {
        isHorizontalFlg = true;
        $(mainArea).find(slider).addClass(isHorizontal);
      }

      isInit = true;
    }

    $(document).on('mouseenter', mainArea + ' .slick-controls-area', function (e) {
      $(mainArea).find(slider).slick('slickPause');
    });
    $(document).on('mouseleave', mainArea + ' .slick-controls-area', function (e) {
      if ($(mainArea).find('.slick-controls-wrap').find('.slick-play').hasClass('is-active')) {
        $(mainArea).find(slider).slick('slickPlay');
      }
    });

    $(document).on('click', mainArea + ' .slick-dots li', function (e) {
      sliderStop.call($(mainArea).find(stopBtn));
    });
    $(document).on('click', mainArea + ' ' + stopBtn, function (e) {
      sliderStop.call(this);
    });
    $(document).on('click', mainArea + ' ' + playBtn, function (e) {
      sliderPlay.call(this);
    });

    function sliderStop() {
      $(mainArea).find(control).removeClass(isActive);
      $(this).addClass(isActive);
      $(mainArea).find(slider).slick('slickPause');
    }
    function sliderPlay() {
      $(mainArea).find(control).removeClass(isActive);
      $(this).addClass(isActive);
      $(mainArea).find(slider).slick('slickPlay');
    }

    function isHori () {
      // var sliderH = $('#main-visual .slick-slide').height();
      // var targetW = 1440 / (740 / sliderH);
      var targetW = 1440 / (740 / 240);
      return ($(window).width() >= targetW);
    }

    var resizeHandlerThrottle = WWSJS.Utils.throttle(function () {
      if (isHori() && !isHorizontalFlg) {
        isHorizontalFlg = true;
        $(mainArea).find(slider).addClass(isHorizontal);
      } else if (!isHori() && isHorizontalFlg) {
        isHorizontalFlg = false;
        $(mainArea).find(slider).removeClass(isHorizontal);
      }
    }, 50);

    $(window).resize(function () {
      resizeHandlerThrottle();
    });

    function reinit () {
      if (isInit) {
        $(mainArea).find(slider).slick('unslick');
      }
      init();
    }

    return {
      isResponsive: false,
      init: init,
      reinit: reinit
    };
  });

  // gnav
  WWSJS.component('gnav', function () {

    var gnavOpen = '.js-gnavOpen';
    var gnavClose = '.js-gnavClose';
    var wrapper = '#wrapper';
    var gnav = '#nav-area';
    var gnavOverlay = '.js-gnavOverlay'
    var gnavSupportNav = '#support-nav';

    var flgOpen = 'is-gnav';
    var flgAnim = 'is-gnavAnim';
    var isOpen = 'is-open';

    var $html = $('html');

    var eventType = {
      pcOpen: function (e, $nav) {
        var self = this;
        if ($nav.hasClass(isOpen)) {
          this.pcClose(e, $nav);
        } else {
          var wait = 0;
          var $parentOpen = $(gnav).find('.nav.is-open');
          if ($parentOpen[0]) {
            wait = WWSJS.setting.slideTransitionTime;
            this.pcClose(e, $parentOpen);
          }
          setTimeout(function () {
            $nav.addClass(isOpen);
            $nav.find('.navbar-nav-sub').slideDown(WWSJS.setting.slideTransitionTime, WWSJS.setting.easing, function () {

            });
          }, wait);

          $(document).on('click.gnavClose', function(e) {
            var flg = true;
            $('#navbar .navbar-nav-sub').each(function () {
              if ($.contains($(this)[0], e.target)) {
                flg = false;
              }
            });
            if (flg) {
              self.pcClose(e, $nav);
              $().off(e);
            }
          });
        }
      },
      pcClose: function (e, $nav) {
        $nav.removeClass(isOpen);
        $nav.find('.navbar-nav-sub').slideUp(WWSJS.setting.slideTransitionTime, WWSJS.setting.easing, function () {

        });
        $(document).off('click.gnavClose');
      },
      spOpen: function (e, $nav) {
        var $navSub = $nav.find('.navbar-nav-sub');
        if ($nav.hasClass(isOpen)) {
          $nav.removeClass(isOpen);
          $navSub.slideUp(WWSJS.setting.slideTransitionTime, WWSJS.setting.easing, function () {
          });
        } else {
          $nav.addClass(isOpen);
          $navSub.slideDown(WWSJS.setting.slideTransitionTime, WWSJS.setting.easing, function () {
          });
        }
      },
      spClose: function (e, $nav) {
        $nav.removeClass(isOpen);
      },
      spGnavOpen: function (e) {
        var $gnav = $(gnav);
        $(wrapper).prepend('<div class="gnav-overlay js-gnavOverlay" style="opacity: 0;"></div>');
        $(wrapper).find(gnavOverlay).animate({opacity: 0.5}, WWSJS.setting.fadeTransitionTime, function () {
        });
        $gnav.css({'marginLeft': '13.9%'});
        
        $html.addClass(flgOpen+ ' ' +flgAnim);
        var wH = $(window).height();
        gnavHeightSet(wH);
        
        setTimeout(function () {
          $gnav.css({'marginLeft': ''});
          WWSJS.Utils.getfocusElement(gnav).eq(0).focus();
          if ($gnav.find(gnavClose)[0]) {
            WWSJS.Utils.setFocusLoop('on', gnav);
          }
        }, 420);
      },
      spGnavClose: function (e) {
        WWSJS.Utils.setFocusLoop('off', wrapper, gnavOpen, true);
        $(wrapper).find(gnavOverlay).animate({opacity: 0}, WWSJS.setting.fadeTransitionTime, function () {
          $(this).remove();
        });
        $html.removeClass(flgAnim);
        setTimeout(function () {
          $html.removeClass(flgOpen);
          gnavHeightSet('');
        }, 400);
      },
      spContact: function (e, $nav) {
        var $contact = $nav.find('.support-cont');
        if ($nav.hasClass(isOpen)) {
          $nav.removeClass(isOpen);
          $contact.slideUp(WWSJS.setting.slideTransitionTime, WWSJS.setting.easing, function () {
          });
        } else {
          $nav.addClass(isOpen);
          $contact.hide();
          $contact.slideDown(WWSJS.setting.slideTransitionTime, WWSJS.setting.easing, function () {
          });
        }
      }
    };

    // wl
    $(document).on('click', gnav + ' .nav-link', function (e) {
      var $nav = $(this).parent('.nav');
      if ($nav.hasClass('is-child')) {
        e.preventDefault();
        if (WWSJS.Utils.winNameCheck.hasName('wl')) {
          eventType.pcOpen(e, $nav);
        } else {
          eventType.spOpen(e, $nav);
        }
      }
    });
    $(document).on('click', gnav + ' .nav-close', function (e) {
      e.preventDefault();
      if (WWSJS.Utils.winNameCheck.hasName('wl')) {
        var $nav = $(this).closest('.nav');
        eventType.pcClose(e, $nav);
      }
    });
    /*$(document).on('click', function (e) {
      if (WWSJS.Utils.winNameCheck.hasName('wl')) {
        if ($toggleContent[0] !== e.target && !$.contains($toggleContent[0], e.target) && !$.contains($(thisBtn)[0], e.target)) {

        if (!$.contains($(this)[0], e.target)) {
          $().off(e);
        }
      }
    });*/

    // ws, wm
    $(document).on('click', gnavOpen, function (e) {
      e.preventDefault();
      if ($html.hasClass(flgOpen)) {
        eventType.spGnavClose.call(this, e);
      } else {
        eventType.spGnavOpen.call(this, e);
      }
    });
    $(document).on('click', gnavClose, function (e) {
      e.preventDefault();
      eventType.spGnavClose.call(this, e);
    });
    $(document).on('click', gnavOverlay, function (e) {
      e.preventDefault();
      eventType.spGnavClose.call(this, e);
    });
    $(document).on('click', gnavSupportNav + ' .btn-support', function (e) {
      e.preventDefault();
      if (!WWSJS.Utils.winNameCheck.hasName('wl')) {
        eventType.spContact(e, $(gnavSupportNav));
      }
    });

    function init () {

    }

    function gnavHeightSet (n) {
      $(gnav).height(n);
      $('body').height(n);
    }

    function change(current, before, triggerIn, triggerOut) {
      // WWSJS.Utils.winNameCheck.hasOtherName('ws', before)
      if (WWSJS.Utils.winNameCheck.hasName('wl')) {
        $(wrapper).find(gnavOverlay).remove();
        $(gnav).find('.nav').removeClass(isOpen);
        $(gnav).find('.nav').find('.navbar-nav-sub').css({display: ''});
        $(gnavSupportNav).removeClass(isOpen);
        $(gnavSupportNav).find('.support-cont').css({display: ''});
        $('html').removeClass(flgOpen + ' ' + flgAnim);
        gnavHeightSet('');
        WWSJS.Utils.setFocusLoop('off');
      } else if (WWSJS.Utils.winNameCheck.hasOtherName('wl', before)) {
        $(gnav).find('.nav').removeClass(isOpen);
        $(document).trigger('click.gnavClose');
      }
    }

    return {
      isResponsive: true,
      init: init,
      change: change
    };
  });


  // sticky header
  WWSJS.component('stickyHeader', function () {

    var sticky = '#header-fixed';
    var stickyClass = 'sticky-header';

    var visibleLine = 450;

    function init () {
      if (!$(sticky)[0]) return;
      setTimeout(function () {
        $(window).on('scroll', function() {
          scrollCheck();
        }).trigger('scroll');
      }, 300);
    }

    function scrollCheck () {
      var s = $(window).scrollTop();
      if (WWSJS.Utils.winNameCheck.hasName('wl')) {
        if (s > visibleLine && !$('html').hasClass(stickyClass)) {
          $('html').addClass(stickyClass);
          $(sticky).css({display: 'none'}).fadeIn(WWSJS.setting.fadeTransitionTime, function () {
          });
        } else if (s <= visibleLine && $('html').hasClass(stickyClass)) {
          $(sticky).fadeOut(WWSJS.setting.fadeTransitionTime, function () {
            $(this).css({display: ''});
            $('html').removeClass(stickyClass);
          });
        }
      } else {
        if ($('html').hasClass(stickyClass)) {
          $('html').removeClass(stickyClass);
          $(sticky).hide();
        }
      }
    }

    return {
      isResponsive: false,
      init: init
    };
  });

  // sticky header login btn
  WWSJS.component('stickyLogin', function () {

    var sticky = '#header-fixed';
    var loginArea = '#login-area';
    var button = '.btn-login';
    var loginContent = '.login-cont';

    function init () {
      $(document).on('click', sticky + ' ' + button, function (e) {
        e.preventDefault();
        WWSJS.components.smoothScroll.targetElem('body');
        setTimeout(function () {
          if ($(loginArea).find(loginContent).is(':hidden')) {
            $(loginArea).find(button).trigger('click');
          }
        }, 800);
      });
    }

    return {
      isResponsive: false,
      init: init
    };
  });


  // fare block
  WWSJS.component('fare', function () {

    var fareArea = '.fareset-chSlider';
    var fareContent = '.fareset-wrap';

    function init () {
      if (!$(fareArea)[0]) return;
      $(fareArea).not('.initSlider').each(function () {
        var $clone = $(this).find(fareContent).clone();
        initSlider($clone, $(this));
      });
    }

    function initSlider ($el, $this) {
      $el.addClass('fare-slider');
      $this.append($el);

      $el.slick({
        autoplay: false,
        arrows: false,
        dots: false,
        infinite: true,
        variableWidth: false,
        centerMode: true,
        centerPadding: '6%',
        speed: WWSJS.setting.slideTransitionTime,
        mobileFirst: true,
        cssEase: WWSJS.setting.cssEase,
        easing: WWSJS.setting.easing
      });

      $this.addClass('initSlider');
    }

    function reinit () {
      init();
    }

    return {
      isResponsive: false,
      init: init,
      reinit: reinit
    };
  });

  // mymenu randQueryString set
  WWSJS.component('myMenuRandQuerySet', function () {

    var randQueryStr = (window.randQueryString) ? window.randQueryString.substr(1) : '';

    function init () {
      if ($('body.members-module')[0] && randQueryStr) {
        randQuerySet();
      }
    }

    function randQuerySet () {
      $('#modal-module a').not('.randQuerySet').each(function () {
        var $this = $(this);
        var href = $this.attr('href');
        $(this).addClass('randQuerySet');
        if (/^#/.test(href) || /^javascript:/.test(href)) return;

        $this.attr('href', getQuery(href, randQueryStr));
        if ($this.attr('data-link-pc')) $this.attr('data-link-pc', getQuery($this.attr('data-link-pc'), randQueryStr));
        if ($this.attr('data-link-sp')) $this.attr('data-link-sp', getQuery($this.attr('data-link-sp'), randQueryStr));
      });
    }

    function getQuery (href, randQueryStr) {
      var hrefSplit = href.match(/^(.*?)(\?.*?)?(#.*)?$/);
      var hrefSplit2 = (hrefSplit[2] && /&$/.test(hrefSplit[2])) ? hrefSplit[2].substr(0, hrefSplit[2].length-1) : hrefSplit[2];
      var param = (hrefSplit2) ? hrefSplit2 + '&' + randQueryStr : '?' + randQueryStr;
      var hash = (hrefSplit[3]) ? hrefSplit[3] : '';
      return hrefSplit[1] + param + hash;
    }

    function reinit () {
      init();
    }

    return {
      isResponsive: false,
      init: init,
      reinit: reinit
    };
  });

  // mymenu focus
  WWSJS.component('myMenuFocus', function () {
    function init () {
      if ($('body.members-module')[0]) {
        WWSJS.Utils.setFocusLoop('on', 'body');
      }
    }

    return {
      isResponsive: false,
      init: init
    };
  });

  // ie9 placeholder
  WWSJS.component('spPlaceholder', function () {

    var target = '.js-sp-placeholder';

    function init () {
      if (!WWSJS.Utils.userAgent.isIEVerLte(9)) return;
      $(target).each(function () {
        addPlaceholder($(this).find('input[type="search"],input[type="text"],input[type="textarea"],[type="password"]'));
      });
      addPlaceholder($('#search'));
    }

    function addPlaceholder ($el) {
      if ($el.hasClass('init-ie9-placeholder')) return;
      var placeholder = $el.attr('placeholder');
      if (placeholder !== undefined || placeholder !== '') {
        var addEl = '<span class="placeholder">' + placeholder + '</span>';
        $el.addClass('init-ie9-placeholder');
        $el.before(addEl);
        $el.parent().addClass('sp-placeholder');

        var $span = $el.prev('span.placeholder');
        if ($el.val() !== '') {
          $span.hide();
        }
        $span.on('focusin', function (e) {
          $el.focus();
        });
        $el.on('focusin', function (e) {
          $span.hide();
          $el.addClass('isFocus');
        });
        $el.on('focusout', function (e) {
          if ($el.val() === '') {
            $span.show();
          }
          $el.removeClass('isFocus');
        });
      }
    }

    return {
      isResponsive: false,
      init: init
    };
  });

  // members info hidden
  WWSJS.component('membersInfoHidden', function () {

    function init () {
      var $content = $('#members-box').find('.content').children();
      if (!$content[0]) {
        $('#members-box').hide();
        $('#members-btn').hide();
      }
    }

    return {
      isResponsive: false,
      init: init
    };
  });

  // input keyboard enable
  WWSJS.component('inputKeyboardEnable', function () {
    function init () {
      $(document).on('keydown', '.ico-checkbox', function (e) {
        if (e.keyCode === 13 || e.keyCode === 32) {
          e.preventDefault();
          var $input = $(this).find('input');
          $input.prop('checked', !$input.prop('checked'));
        }
      });
    }

    return {
      isResponsive: false,
      init: init
    };
  });

})(jQuery, window, document);
