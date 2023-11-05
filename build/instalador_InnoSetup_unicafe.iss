; Script generated by the Inno Setup Script Wizard.
; SEE THE DOCUMENTATION FOR DETAILS ON CREATING INNO SETUP SCRIPT FILES!

#define MyAppName "UniCafe"
#define MyAppVersion "Beta"
#define MyAppPublisher "UNILAB - Universidade da Integra��o Internacional da Lusofonia Afro-Brasileira"
#define MyAppURL "http://www.unilab.edu.br/"
#define MyAppExeName "UniCafeClient.exe"

[Setup]
AppId={{5A8261FA-E5F0-4E9C-8DCD-5B6A24B0C5ED}
AppName={#MyAppName}
AppVersion={#MyAppVersion}
;AppVerName={#MyAppName} {#MyAppVersion}
AppPublisher={#MyAppPublisher}
AppPublisherURL={#MyAppURL}
AppSupportURL={#MyAppURL}
AppUpdatesURL={#MyAppURL}
DefaultDirName={pf}\{#MyAppName}
DefaultGroupName={#MyAppName}
LicenseFile=..\doc\LICENSE.txt
InfoBeforeFile=..\doc\NOTICE.txt
InfoAfterFile=..\doc\depois.txt
OutputBaseFilename=setupUniCaffe64
Compression=lzma
SolidCompression=yes

[Languages]
Name: "brazilianportuguese"; MessagesFile: "compiler:Languages\BrazilianPortuguese.isl"

[Tasks]
Name: "desktopicon"; Description: "{cm:CreateDesktopIcon}"; GroupDescription: "{cm:AdditionalIcons}"; Flags: unchecked


[Files]
Source: "UniCafeClient.exe"; DestDir: "{app}"; Flags: ignoreversion
Source: "papel-de-parede.jpg"; DestDir:"C:\Windows\Web\Wallpaper\Windows"; Flags: ignoreversion;
Source: "install.bat"; DestDir: "{app}"; Flags: ignoreversion;
Source: "..\src\UniCaffe\UniCaffeUpdate\target\unicafe-update.jar"; DestDir: "{app}"; Flags: ignoreversion;
Source: "config_unilab\config.ini"; DestDir: "{app}"; Flags: ignoreversion;
Source: "..\src\UniCaffe\UniCaffeCliente\permitidos.txt"; DestDir: "{app}"; Flags: ignoreversion;
; NOTE: Don't use "Flags: ignoreversion" on any shared system files

[Icons]
Name: "{group}\{#MyAppName}"; Filename: "{app}\{#MyAppExeName}"
Name: "{commondesktop}\{#MyAppName}"; Filename: "{app}\{#MyAppExeName}"; Tasks: desktopicon


[Registry]
;loga com essa senha
Root: HKLM64; Subkey: "SOFTWARE\Microsoft\Windows NT\CurrentVersion\Winlogon"; ValueType: string; ValueName: "DefaultUserName"; ValueData: ".\unicafe"; Flags: uninsdeletekey
;Loga com esse usuario
Root: HKLM64; Subkey: "SOFTWARE\Microsoft\Windows NT\CurrentVersion\Winlogon"; ValueType: string; ValueName: "DefaultPassword"; ValueData: "unicafe@unilab"; Flags: uninsdeletekey
;Loga automatico
Root: HKLM64; Subkey: "SOFTWARE\Microsoft\Windows NT\CurrentVersion\Winlogon"; ValueType: string; ValueName: "AutoAdminLogon"; ValueData: "1"; Flags: uninsdeletekey
;Inicia automaticamente
Root: HKLM; Subkey: "SOFTWARE\Microsoft\Windows\CurrentVersion\Run"; ValueType: string; ValueName: "unicafe"; ValueData: "{app}\UniCafeClient.exe"; Flags: uninsdeletekey 
;N�o pergunte se pode me abrir. 
Root: HKLM64; Subkey: "SOFTWARE\Microsoft\Windows\CurrentVersion\Policies\System"; ValueType: dword; ValueName: "ConsentPromptBehaviorAdmin"; ValueData: "00"; Flags: uninsdeletekey 
;Roda como administrador
Root: HKLM64; Subkey: "SOFTWARE\Microsoft\Windows NT\CurrentVersion\AppCompatFlags\Layers"; ValueType: string; ValueName: "{app}\UniCafeClient.exe"; ValueData: "RUNASADMIN"; Flags: uninsdeletekey 


[Run]
Filename: "{app}\install.bat"; Parameters: "{app}"