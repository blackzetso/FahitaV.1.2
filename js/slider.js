$(document).ready(function() {

  var oBanner = document.querySelector(".carousel-banner");
  var oUL = document.querySelector(".carousel-banner ul");
  //复制所有的li，达到在page#1点击prev，在page#6点击next仍然有轮播效果。
  $(oUL).append($(oUL).html());
  var aLI = document.querySelectorAll(".carousel-banner ul>li");
  var aA = document.querySelectorAll(".carousel-banner ul>li a");
  var oPrev = document.querySelector(".btn-banner.prev");
  var oNext = document.querySelector(".btn-banner.next");
  var aIco = document.querySelectorAll(".banner-ico-box a");
  var li_width = 0;
  var len = aLI.length;
  var orginLen = len / 2;
  var timer = null;
  var now = 0;

  function bind(type, element, fn, userCapture) {
    if (element.addEventListener) {
      element.addEventListener(type, fn, userCapture);
    } else if (element.attachEvent) {
      element.attachEvent("on" + type, fn);
    }
  }

  //获取容器宽度， 支持响应式。
  function captureVPWidth(ev) {
    var event = ev || window.event;
    //resize开始，停止轮播
    if (event.type == "resize") {
      clearInterval(timer);
    }
    var iBannerWidth = oBanner.offsetWidth;
    var iBannerHeight = oBanner.offsetHeight;
    $(aLI).css("width", iBannerWidth + "px");
    $(oUL).css("width", iBannerWidth * aLI.length + "px");
    $(aA).css("width", iBannerWidth + "px");
    $(aA).css("height", iBannerHeight + "px");
    li_width = iBannerWidth;
    if (event.type == "resize") {
      console.log(now);
      if (now == len) {
        oUL.style.left = -li_width * 5 + "px";
      } else if (now == 0) {
        oUL.style.left = "0px";
      } else {
        oUL.style.left = -li_width * now + "px";
      }
      timer = setInterval(auto, 4000);
    }
  }

  //函数节流
  /*function throttle(method, context, event) {
    clearTimeout(method.tId);
    method.tId = setTimeout(function() {
      method.call(context, event);
    }, 500);
  }*/
  //函数节流 参考underscore _.throttle
  function throttle(func, wait, options) {
    /* options的默认值
     *  表示首次调用返回值方法时，会马上调用func；否则仅会记录当前时刻，当第二次调用的时间间隔超过wait时，才调用func。
     *  options.leading = true;
     * 表示当调用方法时，未到达wait指定的时间间隔，则启动计时器延迟调用func函数，若后续在既未达到wait指定的时间间隔和func函数又未被调用的情况下调用返回值方法，则被调用请求将被丢弃。
     *  options.trailing = true;
     * 注意：当options.trailing = false时，效果与上面的简单实现效果相同
     */
    var context, args, result;
    var timeout = null;
    var previous = 0;
    if (!options) options = {};
    var later = function() {
      previous = options.leading === false ? 0 : +new Date();
      timeout = null;
      result = func.apply(context, args);
      if (!timeout) context = args = null;
    };
    return function() {
      //var event = ev || window.event;
      var now = +new Date();
      if (!previous && options.leading === false) previous = now;
       var remaining = wait - (now - previous);
      context = this;
      args = arguments;
       
       if (remaining <= 0 || remaining > wait) {
         if (timeout) {
          clearTimeout(timeout);
          timeout = null;
        }
        previous = now;
        result = func.apply(context, args);
        if (!timeout) context = args = null;
      } else if (!timeout && options.trailing !== false) {
        // options.trailing=true时，延时执行func函数
        timeout = setTimeout(later, remaining);
      }
      return result;
    };
  };

  /*function resizeThrottle(ev) {
    var event = ev || window.event;
    throttle(captureVPWidth, window, event);
  }*/

  function auto() {
    if (document.fireEvent) {
      var event = document.createEventObject();
      oNext.fireEvent('click', event);
    } else if (document.dispatchEvent) {
      var event = document.createEvent("HTMLEvents");
      event.initEvent("click", true, true);
      event.eventType = "click";
      oNext.dispatchEvent(event);
    }
  }

  //timer = setInterval(auto, 4000);

  function fnPrev(ev) {
    var event = ev || window.event;
    if (now > 0) {
      now--;
    } else {
      //轮播处于第一个page#1时
      now = orginLen - 1;
      oUL.style.left = -(li_width * orginLen) + 'px';
    }
    scroll();
  }

  function fnNext(ev) {
    var event = ev || window.event;
    if (now < len - 1) {
      now++;
    } else {
      //轮播处于第二个page#6时
      now = orginLen;
      oUL.style.left = -(li_width * (orginLen - 1)) + 'px';
    }
    scroll();
  }

  function fnMouseOver(ev) {
    clearInterval(timer);
  }

  function fnMouseOut(ev) {
    timer = setInterval(auto, 4000);
  }

  function icoSwitch() {
    Array.prototype.slice.call(aIco).forEach(function(ico) {
      ico.className = "";
    });
    aIco[now % 6].className = "active";
  }

  function scroll() {
    act(oUL, 'left', -li_width * now);
    icoSwitch();
  }

  //原生js css属性获取
  function cssCapture(obj, attr) {
    if (obj.currentStyle) { //IE 
      return obj.currentStyle[attr];
    } else {
      return getComputedStyle(obj, null)[attr]; //w3c
    }
  }

  //原生js 模拟动画效果
  function act(obj, attr, target, fn) {
    obj.timer && clearInterval(obj.timer);

    obj.timer = setInterval(function() {
      var stop = true;
      var curr = parseInt(cssCapture(obj, attr));
      var speed = (target - curr) / 8;
      speed = speed > 0 ? Math.ceil(speed) : Math.floor(speed);
      if (curr != target) {
        stop = false;
        obj.style[attr] = curr + speed + "px";
      }
      if (stop) {
        clearInterval(obj.timer);
        obj.timer = null;
        fn && fn();
      }
    }, 30);
  }

  bind("resize", window, throttle(captureVPWidth, 2000, {
    leading: true,
    trailing: true
  }), false);
  bind("load", window, captureVPWidth, false);
  bind("click", oPrev, fnPrev, false);
  bind("click", oNext, fnNext, false);
  //bind("mouseover", oBanner, fnMouseOver, false);
  //bind("mouseout", oBanner, fnMouseOut, false);
});