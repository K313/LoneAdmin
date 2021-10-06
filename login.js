
(function()
{
  
  function gid(id) { return document.getElementById(id); }
  function gtn(tn) { return document.getElementsByTagName(tn); }
  
  var xhrArr = [ ];
  function xhrLoad( ) { alert(this); }
  function xhrError( ) {  }
  function xhrProgress( ) {  }
  function req(cmd, onresp)
  {
    var len = xhrArr.length;
    if (! len) {
      var xr = new XMLHttpRequest( );
      xr.open('POST', 'index.php', true);
      xr.onload = xhrLoad;
      xr.onerror = xhrError;
      xr.onprogress = xhrProgress;
      xhrArr.shift(xr);
      xr.send(cmd);
    }
    else xhrArr.push([cmd, onresp]);
  }
  
  //req('aaa');
  
})();




