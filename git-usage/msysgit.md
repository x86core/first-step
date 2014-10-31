if has("multi_byte")
set fileencodings=ucs-bom,utf-8,cp936,big5,euc-jp,euc-kr,latin1
if v:lang =~ "^zh_CN"
set encoding=cp936
set termencoding=cp936
set fileencoding=cp936
elseif v:lang =~ "^zh_TW"
set encoding=big5
set termencoding=big5
set fileencoding=big5
elseif v:lang =~ "^ko"
set encoding=euc-kr
set termencoding=euc-kr
set fileencoding=euc-kr
elseif v:lang =~ "^ja_JP"
set encoding=euc-jp
set termencoding=euc-jp
set fileencoding=euc-jp
endif
if v:lang =~ "utf8$" || v:lang =~ "UTF-8$"
set encoding=utf-8
set termencoding=utf-8
set fileencoding=utf-8
endif
else
echoerr "Sorry, this version of (g)vim was not compiled with multi_byte"
endif

set autoindent