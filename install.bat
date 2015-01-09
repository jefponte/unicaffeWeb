set SERVICE_NAME=UnicafeProcrun
set PR_INSTALL=C:\services\amd64\prunsrv.exe
REM Service log configuration
set PR_LOGPREFIX=%SERVICE_NAME%
set PR_LOGPATH=C:\services\logs
set PR_STDOUTPUT=C:\services\logs\stdout.txt
set PR_STDERROR=C:\services\logs\stderr.txt
set PR_LOGLEVEL=Error
REM Path to java installation
set PR_JVM=C:\Program Files\Java\jre1.8.0_25\bin\server\jvm.dll
set PR_CLASSPATH=c:\services\servidor.jar
REM Startup configuration
set PR_STARTUP=auto
set PR_STARTMODE=jvm
set PR_STARTCLASS=br.com.andersonoliveirasilva.thread.RunnableTester
set PR_STARTMETHOD=main
REM Shutdown configuration
set PR_STOPMODE=jvm
set PR_STOPCLASS=br.com.andersonoliveirasilva.thread.RunnableTester
set PR_STOPMETHOD=main
REM JVM configuration
set PR_JVMMS=256
set PR_JVMMX=1024
set PR_JVMSS=4000
set PR_JVMOPTIONS=-Duser.language=PT;-Duser.region=br
REM Install service
prunsrv.exe //IS//%SERVICE_NAME% --DisplayName="Test for create service" --Description="Description of the test service"
prunsrv.exe //RS//%SERVICE_NAME%
pause