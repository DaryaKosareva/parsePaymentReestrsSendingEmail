@echo. >>C:\wamp\www\sb\log\%DATE:~6,4%%DATE:~3,2%%DATE:~0,2%.log
@echo %DATE:~6,4%-%DATE:~3,2%-%DATE:~0,2% %TIME:~0,-3%   *********START SESSION*********>>C:\wamp\www\sb\log\%DATE:~6,4%%DATE:~3,2%%DATE:~0,2%.log

@echo %DATE:~6,4%-%DATE:~3,2%-%DATE:~0,2% %TIME:~0,-3%   ---------START attachment.php--------->>C:\wamp\www\sb\log\%DATE:~6,4%%DATE:~3,2%%DATE:~0,2%.log
@C:\wamp\bin\php\php5.3.8\php.exe C:\wamp\www\sb\attachment.php
@set /p comment=<C:/wamp/www/sb/1.txt
@set comment
@if %comment%==null exit
@echo %DATE:~6,4%-%DATE:~3,2%-%DATE:~0,2% %TIME:~0,-3%   ---------FINISH attachment.php--------->>C:\wamp\www\sb\log\%DATE:~6,4%%DATE:~3,2%%DATE:~0,2%.log

@echo %DATE:~6,4%-%DATE:~3,2%-%DATE:~0,2% %TIME:~0,-3%   ---------START okna_US.php--------->>C:\wamp\www\sb\log\%DATE:~6,4%%DATE:~3,2%%DATE:~0,2%.log
@C:\wamp\bin\php\php5.3.8\php.exe C:\wamp\www\sb\okna_US.php
@echo %DATE:~6,4%-%DATE:~3,2%-%DATE:~0,2% %TIME:~0,-3%   ---------FINISH okna_US.php--------->>C:\wamp\www\sb\log\%DATE:~6,4%%DATE:~3,2%%DATE:~0,2%.log

@copy C:\WORK\ReestrsSberbankOkna\Sign\%DATE:~6,4%%DATE:~3,2%%DATE:~0,2%\*.* C:\WORK\ReestrsSberbankOkna\NoSign\
@copy C:\WORK\ReestrsSberbankUs\Sign\%DATE:~6,4%%DATE:~3,2%%DATE:~0,2%\*.* C:\WORK\ReestrsSberbankUs\NoSign\
@c:
@cd C:\SberSign
@sbersign /e C:\WORK\ReestrsSberbankOkna\NoSign\*.*
@sbersign /e C:\WORK\ReestrsSberbankUs\NoSign\*.*
@echo %DATE:~6,4%-%DATE:~3,2%-%DATE:~0,2% %TIME:~0,-3%   Info    Подписи удалены>>C:\wamp\www\sb\log\%DATE:~6,4%%DATE:~3,2%%DATE:~0,2%.log

@echo %DATE:~6,4%-%DATE:~3,2%-%DATE:~0,2% %TIME:~0,-3%   ---------START okna_otdel.php--------->>C:\wamp\www\sb\log\%DATE:~6,4%%DATE:~3,2%%DATE:~0,2%.log
@C:\wamp\bin\php\php5.3.8\php.exe C:\wamp\www\sb\okna_otdel.php
@echo %DATE:~6,4%-%DATE:~3,2%-%DATE:~0,2% %TIME:~0,-3%   ---------FINISH okna_otdel.php--------->>C:\wamp\www\sb\log\%DATE:~6,4%%DATE:~3,2%%DATE:~0,2%.log

@del /q C:\WORK\attachment\

@copy C:\WORK\ReestrsSberbankUs\NoSign\*.* C:\WORK\attachment\
@echo %DATE:~6,4%-%DATE:~3,2%-%DATE:~0,2% %TIME:~0,-3%   ---------START send.php--------->>C:\wamp\www\sb\log\%DATE:~6,4%%DATE:~3,2%%DATE:~0,2%.log
@C:\wamp\bin\php\php5.3.8\php.exe C:\wamp\www\sb\send.php
@echo %DATE:~6,4%-%DATE:~3,2%-%DATE:~0,2% %TIME:~0,-3%   ---------FINISH send.php--------->>C:\wamp\www\sb\log\%DATE:~6,4%%DATE:~3,2%%DATE:~0,2%.log

@del /q C:\WORK\attachment\

@copy C:\WORK\ReestrsSberbankOkna\NoSign\*.* C:\WORK\attachment\
@echo %DATE:~6,4%-%DATE:~3,2%-%DATE:~0,2% %TIME:~0,-3%   ---------START send.php--------->>C:\wamp\www\sb\log\%DATE:~6,4%%DATE:~3,2%%DATE:~0,2%.log
@C:\wamp\bin\php\php5.3.8\php.exe C:\wamp\www\sb\send.php
@echo %DATE:~6,4%-%DATE:~3,2%-%DATE:~0,2% %TIME:~0,-3%   ---------FINISH send.php--------->>C:\wamp\www\sb\log\%DATE:~6,4%%DATE:~3,2%%DATE:~0,2%.log

@del /q C:\WORK\attachment\
@del /q C:\WORK\ReestrsSberbankUs\NoSign\
@del /q C:\WORK\ReestrsSberbankOkna\NoSign\
@del /q C:\WORK\ReestrsSberbankUs\Sign\%DATE:~6,4%%DATE:~3,2%%DATE:~0,2%\
@del /q C:\WORK\ReestrsSberbankOkna\Sign\%DATE:~6,4%%DATE:~3,2%%DATE:~0,2%\

@echo %DATE:~6,4%-%DATE:~3,2%-%DATE:~0,2% %TIME:~0,-3%   *********FINISH SESSION*********>>C:\wamp\www\sb\log\%DATE:~6,4%%DATE:~3,2%%DATE:~0,2%.log

