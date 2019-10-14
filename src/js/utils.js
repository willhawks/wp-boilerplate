function getViewport() {
  var e = window,
    a = 'inner';
  if (!('innerWidth' in window)) {
    a = 'client';
    e = document.documentElement || document.body;
  }
  return {
    width: e[a + 'Width'],
    height: e[a + 'Height']
  };
}

function supportsCustomProps() {
  return window.CSS && CSS.supports('color', 'var(--fake-var)');
}

var createCookie = function(name, value, hours) {
  var expires;
  if (hours) {
    var date = new Date();
    date.setTime(date.getTime() + hours * 60 * 60 * 1000);
    expires = '; expires=' + date.toGMTString();
  } else {
    expires = '';
  }
  document.cookie = name + '=' + value + expires + '; path=/';
};

function getCookie(c_name) {
  if (document.cookie.length > 0) {
    var c_start = document.cookie.indexOf(c_name + '=');
    if (c_start != -1) {
      c_start = c_start + c_name.length + 1;
      var c_end = document.cookie.indexOf(';', c_start);
      if (c_end == -1) {
        c_end = document.cookie.length;
      }
      return unescape(document.cookie.substring(c_start, c_end));
    }
  }
  return '';
}

export { getViewport, supportsCustomProps, createCookie, getCookie };
