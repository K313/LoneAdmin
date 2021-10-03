
(function(){
  function dw(s) { document.write(s); }
  
  dw('<div style="text-align:center;">');
  dw('<form action="." method="POST" style="border:solid 1px #aaa; margin:1em; padding:1em; display:inline-block; text-align:left;">');
  
  dw('<div style="margin:1em .5em .2em 1em;">login key:</div><input name="logkey" />');
  dw('<div style="margin:1em .5em .2em 1em; color:#a00;">login:</div><input name="logval" />');
  
  dw('<div style="margin:1em .5em .2em 1em;">password key:</div><input name="passkey" />');
  dw('<div style="margin:1em .5em .2em 1em; color:#a00;">password:</div><input name="passval" />');
  
  dw('<div style="margin:1em .5em .2em 1em;">tocken key:</div><input name="tockkey" />');
  dw('<div style="margin:1em .5em .2em 1em; color:#a00;">tocken:</div><input name="tockval" />');
  
  dw('<div style="margin:1em .5em .2em 1em;">submit key:</div><input name="subkey" />');
  dw('<div style="margin: 1em;text-align:center;"><input type="submit" name="subval" value="Build form" /></div>');
  
  dw('</form>');
  dw('</div>');
})();





